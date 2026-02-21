<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if post data is empty while content-length is large (usually means post_max_size exceeded)
    if (empty($_POST) && $_SERVER['CONTENT_LENGTH'] > 0) {
        die("Error: The upload limit was exceeded. The total size of your files is too large for the current server settings.");
    }
    $title = $_POST['title'] ?? '';
    $location = $_POST['location'] ?? '';
    $category = $_POST['category'] ?? '';
    $description = $_POST['description'] ?? '';

    try {
        $pdo->beginTransaction();

        // 1. Insert into projects table
        $stmt = $pdo->prepare("INSERT INTO projects (title, location, category, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $location, $category, $description]);
        $project_id = $pdo->lastInsertId();

        // 2. Handle Multiple Media Uploads
        $featured_image = '';
        if (isset($_FILES['media'])) {
            $upload_dir = '../Images/projects/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $media = $_FILES['media'];
            $file_count = count($media['name']);

            for ($i = 0; $i < $file_count; $i++) {
                if ($media['error'][$i] === UPLOAD_ERR_OK) {
                    $tmp_name = $media['tmp_name'][$i];
                    $original_name = $media['name'][$i];
                    $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));

                    $new_name = uniqid('media_') . '_' . $i . '.' . $ext;
                    $target_path = $upload_dir . $new_name;
                    $db_path = 'Images/projects/' . $new_name;

                    if (move_uploaded_file($tmp_name, $target_path)) {
                        $browser_type = $media['type'][$i];
                        $is_video = strpos($browser_type, 'video/') === 0 || in_array($ext, ['mp4', 'webm', 'mov', 'avi', 'mpeg', 'mpg', 'wmv', 'm4v', '3gp', 'flv', 'mkv']);
                        $file_type = $is_video ? 'video' : 'image';

                        // Save to project_media
                        $stmt_media = $pdo->prepare("INSERT INTO project_media (project_id, file_url, file_type) VALUES (?, ?, ?)");
                        $stmt_media->execute([$project_id, $db_path, $file_type]);

                        // Set featured image (first image found)
                        if ($file_type === 'image' && $featured_image === '') {
                            $featured_image = $db_path;
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

        // 3. Update project with featured image if we found one
        if ($featured_image !== '') {
            $update = $pdo->prepare("UPDATE projects SET image_url = ? WHERE id = ?");
            $update->execute([$featured_image, $project_id]);
        }

        $pdo->commit();
        header("Location: admin-projects.php?success=1");
        exit;

    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        die("Error adding project: " . $e->getMessage());
    }
} else {
    header("Location: admin-projects.php");
    exit;
}
?>