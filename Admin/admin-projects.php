<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
require_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Management | Dejj Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dejj: { red: '#E31E24', blue: '#1A4A94', dark: '#111827', slate: '#f8fafc' }
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
</head>

<body class="bg-dejj-slate min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-72 bg-dejj-dark text-white p-8 flex flex-col fixed h-full">
        <div class="mb-12">
            <img src="../Images/LOGO.png" alt="Dejj Logo" class="h-16 w-auto brightness-0 invert">
        </div>

        <nav class="flex-1 space-y-2">
            <a href="admin-dashboard.php"
                class="flex items-center gap-4 px-6 py-4 hover:bg-white/5 rounded-2xl transition-all">
                <i class="fa-solid fa-chart-line"></i> Dashboard
            </a>
            <a href="admin-projects.php" class="flex items-center gap-4 px-6 py-4 bg-dejj-blue rounded-2xl font-bold">
                <i class="fa-solid fa-folder-open"></i> Projects
            </a>
            <a href="admin-inquiries.php"
                class="flex items-center gap-4 px-6 py-4 hover:bg-white/5 rounded-2xl transition-all">
                <i class="fa-solid fa-envelope"></i> Inquiries
            </a>
        </nav>

        <a href="logout.php"
            class="flex items-center gap-4 px-6 py-4 text-dejj-red font-bold mt-auto hover:bg-dejj-red/10 rounded-2xl transition-all">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </aside>

    <!-- Main Content -->
    <main class="ml-72 flex-1 p-12">
        <header class="flex justify-between items-center mb-12">
            <h1 class="text-3xl font-extrabold text-dejj-dark">All Projects</h1>
            <button onclick="document.getElementById('add-modal').classList.remove('hidden')"
                class="bg-dejj-blue text-white px-8 py-4 rounded-2xl font-bold hover:bg-dejj-red transition-all shadow-lg">+
                Add Project</button>
        </header>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
            while ($row = $stmt->fetch()):
                // Fetch media
                $mStmt = $pdo->prepare("SELECT * FROM project_media WHERE project_id = ?");
                $mStmt->execute([$row['id']]);
                $media = $mStmt->fetchAll(PDO::FETCH_ASSOC);
                $mediaJson = htmlspecialchars(json_encode($media));
                ?>
                <!-- Project Card -->
                <div
                    class="bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="h-48 bg-slate-100 relative">
                        <img src="../<?php echo htmlspecialchars($row['image_url']); ?>" class="w-full h-full object-cover"
                            onerror="this.src='../Images/photo_2026-02-10_13-24-24.jpg'">
                        <div
                            class="absolute inset-0 bg-dejj-dark/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-4">
                            <button
                                onclick="openGallery(<?php echo $mediaJson; ?>, '<?php echo addslashes(htmlspecialchars($row['title'])); ?>')"
                                class="w-12 h-12 bg-white rounded-full text-dejj-blue hover:bg-dejj-blue hover:text-white transition-all"><i
                                    class="fa-solid fa-eye"></i></button>
                            <a href="edit_project.php?id=<?php echo $row['id']; ?>"
                                class="w-12 h-12 bg-white rounded-full text-amber-500 hover:bg-amber-500 hover:text-white transition-all flex items-center justify-center">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="delete_project.php?id=<?php echo $row['id']; ?>"
                                onclick="return confirm('Are you sure you want to delete this project?')"
                                class="w-12 h-12 bg-white rounded-full text-dejj-red hover:bg-dejj-red hover:text-white transition-all flex items-center justify-center">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="font-extrabold text-lg text-dejj-dark mb-2">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </h3>
                        <p class="text-slate-500 text-sm mb-4"><?php echo htmlspecialchars($row['location']); ?></p>
                        <div class="flex justify-between items-center">
                            <span
                                class="px-3 py-1 bg-slate-100 text-slate-400 text-[10px] font-bold uppercase rounded-md tracking-widest"><?php echo htmlspecialchars($row['category'] ?? 'Engineering'); ?></span>
                            <span class="text-[10px] text-slate-400 font-bold"><i class="fa-solid fa-images"></i>
                                <?php echo count($media); ?> Media</span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Add Modal (Reuse from dashboard) -->
        <div id="add-modal"
            class="hidden fixed inset-0 bg-dejj-dark/90 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
            <div class="bg-white w-full max-w-2xl rounded-[3rem] p-12 relative shadow-2xl">
                <button onclick="document.getElementById('add-modal').classList.add('hidden')"
                    class="absolute top-8 right-8 text-slate-400 hover:text-dejj-red"><i
                        class="fa-solid fa-xmark text-2xl"></i></button>
                <h2 class="text-3xl font-extrabold text-dejj-dark mb-8 uppercase tracking-tighter">Add New Project</h2>
                <form action="add_project.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Project
                                Title</label>
                            <input type="text" name="title" required
                                class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none"
                                placeholder="Enter title...">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Location</label>
                            <input type="text" name="location" required
                                class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none"
                                placeholder="e.g., Kampala, Uganda">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Category</label>
                        <select name="category" required
                            class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none">
                            <option value="Drilling">Borehole Drilling</option>
                            <option value="Survey">Hydrogeological Survey</option>
                            <option value="Consultancy">Water Consultancy</option>
                            <option value="Engineering">Installation of Permanent Casings</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Description</label>
                        <textarea name="description" rows="3" required
                            class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none"
                            placeholder="Brief project summary..."></textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Project Media (Images
                            & Videos)</label>
                        <input type="file" name="media[]" accept="image/*,video/*" multiple required
                            class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-dashed border-slate-200">
                        <p class="text-[10px] text-slate-400 italic">You can select multiple files at once.</p>
                    </div>
                    <button type="submit"
                        class="w-full py-5 bg-dejj-blue text-white rounded-2xl font-extrabold hover:bg-dejj-red transition-all">Upload
                        Project</button>
                </form>
            </div>
        </div>
        <!-- Gallery Modal -->
        <div id="gallery-modal"
            class="hidden fixed inset-0 z-[100] bg-dejj-dark/95 backdrop-blur-md flex flex-col items-center justify-center p-4">
            <button onclick="closeGallery()"
                class="absolute top-8 right-8 text-white/50 hover:text-dejj-red transition-all"><i
                    class="fa-solid fa-xmark text-4xl"></i></button>
            <div class="max-w-4xl w-full">
                <h2 id="modal-title" class="text-white text-2xl font-bold mb-6 text-center">Project Title</h2>
                <div
                    class="relative aspect-video bg-black rounded-3xl overflow-hidden shadow-2xl flex items-center justify-center">
                    <div id="media-viewport" class="w-full h-full"></div>
                    <button onclick="prevMedia()"
                        class="absolute left-4 w-10 h-10 rounded-full bg-white/10 hover:bg-dejj-blue text-white"><i
                            class="fa-solid fa-chevron-left"></i></button>
                    <button onclick="nextMedia()"
                        class="absolute right-4 w-10 h-10 rounded-full bg-white/10 hover:bg-dejj-blue text-white"><i
                            class="fa-solid fa-chevron-right"></i></button>
                </div>
                <div id="media-counter"
                    class="text-center text-white/60 mt-4 text-sm font-bold tracking-widest uppercase"></div>
            </div>
        </div>

        <script>
            let currentMedia = [];
            let currentIndex = 0;

            function openGallery(media, title) {
                currentMedia = media;
                currentIndex = 0;
                document.getElementById('modal-title').textContent = title;
                document.getElementById('gallery-modal').classList.remove('hidden');
                renderMedia();
            }

            function closeGallery() {
                document.getElementById('gallery-modal').classList.add('hidden');
                document.getElementById('media-viewport').innerHTML = '';
            }

            function renderMedia() {
                if (currentMedia.length === 0) {
                    document.getElementById('media-viewport').innerHTML = '<div class="text-white italic">No media files.</div>';
                    document.getElementById('media-counter').textContent = '';
                    return;
                }
                const item = currentMedia[currentIndex];
                const viewport = document.getElementById('media-viewport');
                const path = '../' + item.file_url;

                if (item.file_type === 'video') {
                    viewport.innerHTML = `<video src="${path}" controls autoplay class="w-full h-full object-contain"></video>`;
                } else {
                    viewport.innerHTML = `<img src="${path}" class="w-full h-full object-contain">`;
                }
                document.getElementById('media-counter').textContent = `Item ${currentIndex + 1} of ${currentMedia.length}`;
            }

            function nextMedia() {
                if (currentMedia.length === 0) return;
                currentIndex = (currentIndex + 1) % currentMedia.length;
                renderMedia();
            }

            function prevMedia() {
                if (currentMedia.length === 0) return;
                currentIndex = (currentIndex - 1 + currentMedia.length) % currentMedia.length;
                renderMedia();
            }
        </script>
    </main>
</body>

</html>