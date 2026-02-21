<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
require_login();

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: admin-projects.php");
    exit;
}

// Fetch current project data
$stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->execute([$id]);
$project = $stmt->fetch();

if (!$project) {
    header("Location: admin-projects.php");
    exit;
}

// Fetch project media
$mStmt = $pdo->prepare("SELECT * FROM project_media WHERE project_id = ?");
$mStmt->execute([$id]);
$mediaItems = $mStmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST) && $_SERVER['CONTENT_LENGTH'] > 0) {
        die("Error: The upload limit was exceeded. The total size of your files is too large for the current server settings.");
    }
    $title = $_POST['title'] ?? '';
    $location = $_POST['location'] ?? '';
    $category = $_POST['category'] ?? '';
    $description = $_POST['description'] ?? '';

    try {
        $pdo->beginTransaction();

        // 1. Update project details
        $stmt = $pdo->prepare("UPDATE projects SET title = ?, location = ?, category = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $location, $category, $description, $id]);

        // 2. Handle New Media Uploads
        if (isset($_FILES['media']) && !empty($_FILES['media']['name'][0])) {
            $upload_dir = '../Images/projects/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $media = $_FILES['media'];
            $file_count = count($media['name']);

            for ($i = 0; $i < $file_count; $i++) {
                if ($media['error'][$i] === UPLOAD_ERR_OK) {
                    $tmp_name = $media['tmp_name'][$i];
                    $ext = strtolower(pathinfo($media['name'][$i], PATHINFO_EXTENSION));
                    $new_name = uniqid('media_') . '_' . time() . '_' . $i . '.' . $ext;
                    $db_path = 'Images/projects/' . $new_name;

                    if (move_uploaded_file($tmp_name, $upload_dir . $new_name)) {
                        $browser_type = $media['type'][$i];
                        $is_video = strpos($browser_type, 'video/') === 0 || in_array($ext, ['mp4', 'webm', 'mov', 'avi', 'mpeg', 'mpg', 'wmv', 'm4v', '3gp', 'flv', 'mkv']);
                        $file_type = $is_video ? 'video' : 'image';
                        $stmt_media = $pdo->prepare("INSERT INTO project_media (project_id, file_url, file_type) VALUES (?, ?, ?)");
                        $stmt_media->execute([$id, $db_path, $file_type]);

                        // If project has no featured image, use this if it's an image
                        if ($project['image_url'] == '' && $file_type == 'image') {
                            $update_feat = $pdo->prepare("UPDATE projects SET image_url = ? WHERE id = ?");
                            $update_feat->execute([$db_path, $id]);
                        }
                    }
                } else if ($media['error'][$i] !== UPLOAD_ERR_NO_FILE) {
                    $error_msgs = [
                        UPLOAD_ERR_INI_SIZE => "File is too large (exceeds PHP limit).",
                        UPLOAD_ERR_FORM_SIZE => "File is too large (exceeds form limit).",
                        UPLOAD_ERR_PARTIAL => "File was only partially uploaded.",
                        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
                        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
                        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
                    ];
                    $err = $error_msgs[$media['error'][$i]] ?? "Unknown upload error.";
                    throw new Exception("Error uploading '{$media['name'][$i]}': " . $err);
                }
            }
        }

        $pdo->commit();
        header("Location: edit_project.php?id=$id&success=1");
        exit;

    } catch (Exception $e) {
        if ($pdo->inTransaction())
            $pdo->rollBack();
        die("Error updating project: " . $e->getMessage());
    }
}

// Handle media deletion
if (isset($_GET['delete_media'])) {
    $media_id = $_GET['delete_media'];
    $stmt = $pdo->prepare("SELECT file_url FROM project_media WHERE id = ? AND project_id = ?");
    $stmt->execute([$media_id, $id]);
    $file = $stmt->fetch();

    if ($file) {
        if (file_exists('../' . $file['file_url'])) {
            unlink('../' . $file['file_url']);
        }
        $del = $pdo->prepare("DELETE FROM project_media WHERE id = ?");
        $del->execute([$media_id]);

        // If this was the featured image, clear it or pick a new one
        if ($project['image_url'] == $file['file_url']) {
            $pick = $pdo->prepare("SELECT file_url FROM project_media WHERE project_id = ? AND file_type = 'image' LIMIT 1");
            $pick->execute([$id]);
            $new_feat = $pick->fetchColumn() ?: '';
            $upd = $pdo->prepare("UPDATE projects SET image_url = ? WHERE id = ?");
            $upd->execute([$new_feat, $id]);
        }
    }
    header("Location: edit_project.php?id=$id");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project | Dejj Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { dejj: { red: '#E31E24', blue: '#1A4A94', dark: '#111827', slate: '#f8fafc' } }
                }
            }
        }
    </script>
</head>

<body class="bg-dejj-slate min-h-screen">
    <div class="max-w-4xl mx-auto py-12 px-6">
        <div class="flex items-center justify-between mb-12">
            <a href="admin-projects.php"
                class="flex items-center gap-2 text-slate-400 hover:text-dejj-blue font-bold transition-all">
                <i class="fa-solid fa-arrow-left"></i> Back to Projects
            </a>
            <h1 class="text-3xl font-extrabold text-dejj-dark">Edit Project</h1>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-500 text-white p-4 rounded-2xl mb-8 font-bold flex items-center gap-3">
                <i class="fa-solid fa-check-circle"></i> Project updated successfully!
            </div>
        <?php endif; ?>

        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Main Form -->
                <form method="POST" enctype="multipart/form-data"
                    class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Project
                                Title</label>
                            <input type="text" name="title" value="<?php echo htmlspecialchars($project['title']); ?>"
                                required
                                class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none focus:border-dejj-blue">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Location</label>
                            <input type="text" name="location"
                                value="<?php echo htmlspecialchars($project['location']); ?>" required
                                class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none focus:border-dejj-blue">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Category</label>
                        <select name="category" required
                            class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none focus:border-dejj-blue">
                            <option value="Drilling" <?php echo $project['category'] == 'Drilling' ? 'selected' : ''; ?>>
                                Borehole Drilling</option>
                            <option value="Survey" <?php echo $project['category'] == 'Survey' ? 'selected' : ''; ?>>
                                Hydrogeological Survey</option>
                            <option value="Consultancy" <?php echo $project['category'] == 'Consultancy' ? 'selected' : ''; ?>>Water Consultancy</option>
                            <option value="Engineering" <?php echo $project['category'] == 'Engineering' ? 'selected' : ''; ?>>Installation of Permanent Casings</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Description</label>
                        <textarea name="description" rows="5" required
                            class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none focus:border-dejj-blue"><?php echo htmlspecialchars($project['description']); ?></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Add More Media</label>
                        <input type="file" name="media[]" multiple accept="image/*,video/*"
                            class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-dashed border-slate-200">
                    </div>

                    <button type="submit"
                        class="w-full py-5 bg-dejj-blue text-white rounded-2xl font-extrabold hover:bg-dejj-red transition-all shadow-lg">
                        Update Project
                    </button>
                </form>
            </div>

            <div class="space-y-8">
                <!-- Current Media -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-6">Current Media</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <?php foreach ($mediaItems as $item): ?>
                            <div class="relative group rounded-2xl overflow-hidden aspect-video bg-slate-100">
                                <?php if ($item['file_type'] == 'video'): ?>
                                    <video src="../<?php echo $item['file_url']; ?>" class="w-full h-full object-cover"></video>
                                    <div class="absolute inset-0 flex items-center justify-center text-white text-2xl">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                <?php else: ?>
                                    <img src="../<?php echo $item['file_url']; ?>" class="w-full h-full object-cover">
                                <?php endif; ?>

                                <div
                                    class="absolute inset-0 bg-dejj-dark/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <a href="?id=<?php echo $id; ?>&delete_media=<?php echo $item['id']; ?>"
                                        onclick="return confirm('Delete this media?')"
                                        class="w-10 h-10 bg-dejj-red text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php if (empty($mediaItems)): ?>
                            <p class="text-slate-400 italic text-sm text-center">No media files.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>