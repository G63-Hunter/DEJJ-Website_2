<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects | Dejj Engineering & Investments Solutions</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dejj: { red: '#E31E24', blue: '#1A4A94', cyan: '#8AD1E8', dark: '#111827' }
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'], display: ['Outfit', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 font-sans">
    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <header class="pt-40 pb-20 bg-slate-900 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="font-display text-5xl md:text-7xl font-extrabold mb-6 italic">Our <span
                    class="text-dejj-red">Impact.</span></h1>
            <p class="text-xl text-white/70 max-w-2xl leading-relaxed">Showcasing our commitment to quality across
                Uganda's diverse landscapes.</p>
        </div>
    </header>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php
                $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
                while ($row = $stmt->fetch()):
                    // Fetch media for this project
                    $mediaStmt = $pdo->prepare("SELECT * FROM project_media WHERE project_id = ?");
                    $mediaStmt->execute([$row['id']]);
                    $mediaItems = $mediaStmt->fetchAll(PDO::FETCH_ASSOC);
                    $mediaJson = htmlspecialchars(json_encode($mediaItems));
                    ?>
                    <!-- Project Card -->
                    <div
                        class="group reveal bg-white rounded-[2.5rem] overflow-hidden shadow-lg border border-slate-100 transform transition-all hover:-translate-y-2 ">
                        <div class="h-72 overflow-hidden relative cursor-pointer"
                            onclick="openGallery(<?php echo $mediaJson; ?>, '<?php echo addslashes(htmlspecialchars($row['title'])); ?>')">
                            <img src="<?php echo htmlspecialchars($row['image_url']); ?>"
                                alt="<?php echo htmlspecialchars($row['title']); ?>"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                onerror="this.src='Images/photo_2026-02-10_13-24-24.jpg'">

                            <div
                                class="absolute inset-0 bg-dejj-dark/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span
                                    class="bg-white text-dejj-blue px-6 py-2 rounded-full font-bold shadow-lg flex items-center gap-2">
                                    <i class="fa-solid fa-play-circle text-dejj-red"></i> View Gallery
                                </span>
                            </div>

                            <div class="absolute inset-0 bg-gradient-to-t from-dejj-dark/80 via-transparent to-transparent">
                            </div>
                            <div class="absolute bottom-6 left-6 right-6 text-white transform transition-all">
                                <h3 class="font-display text-2xl font-bold mb-1">
                                    <?php echo htmlspecialchars($row['title']); ?>
                                </h3>
                                <div class="flex items-center gap-2 text-sm text-white/80">
                                    <i class="fa-solid fa-location-dot text-dejj-red"></i>
                                    <?php echo htmlspecialchars($row['location']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span
                                    class="bg-dejj-red/10 text-dejj-red px-3 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider">
                                    <?php echo htmlspecialchars($row['category'] ?? 'Engineering'); ?>
                                </span>
                                <span class="text-[10px] text-slate-400 font-medium">
                                    <i class="fa-solid fa-photo-film mr-1"></i> <?php echo count($mediaItems); ?> items
                                </span>
                            </div>
                            <p class="text-slate-600 mb-6 text-sm line-clamp-3">
                                <?php echo htmlspecialchars($row['description'] ?? 'No description available.'); ?>
                            </p>
                            <button
                                onclick="openProjectDetails(<?php echo htmlspecialchars(json_encode($row)); ?>, <?php echo htmlspecialchars(json_encode($mediaItems)); ?>)"
                                class="text-dejj-blue font-bold text-sm flex items-center gap-2 hover:text-dejj-red transition-colors">
                                Read More <i class="fa-solid fa-arrow-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="mt-24 p-12 bg-dejj-blue rounded-[3rem] text-center text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-extrabold mb-4">Have a project in mind?</h2>
                    <p class="text-white/80 mb-8 max-w-xl mx-auto">Let's build a sustainable water solution together.
                        Our team is ready to survey, design, and drill.</p>
                    <a href="index.php#contact"
                        class="inline-block bg-white text-dejj-blue px-10 py-4 rounded-2xl font-extrabold hover:bg-dejj-red hover:text-white transition-all transform hover:scale-105 shadow-xl">Get
                        Started Today</a>
                </div>
                <!-- Decor -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full -ml-32 -mb-32"></div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer_public.php'; ?>


    <!-- Gallery Modal -->
    <div id="gallery-modal"
        class="hidden fixed inset-0 z-[100] bg-dejj-dark/95 backdrop-blur-md flex flex-col items-center justify-center p-4">
        <button onclick="closeGallery()"
            class="absolute top-8 right-8 text-white/50 hover:text-dejj-red transition-all">
            <i class="fa-solid fa-xmark text-4xl"></i>
        </button>
        <div class="max-w-5xl w-full flex flex-col items-center">
            <h2 id="modal-title" class="text-white text-2xl md:text-3xl font-extrabold mb-8 text-center px-4">Project
                Title</h2>
            <div
                class="relative w-full aspect-video bg-black rounded-[2.5rem] overflow-hidden shadow-2xl flex items-center justify-center border border-white/10">
                <div id="media-viewport" class="w-full h-full"></div>
                <button onclick="prevMedia()"
                    class="absolute left-6 w-14 h-14 rounded-full bg-white/10 hover:bg-dejj-blue text-white flex items-center justify-center transition-all group">
                    <i class="fa-solid fa-chevron-left text-xl group-hover:-translate-x-1 transition-transform"></i>
                </button>
                <button onclick="nextMedia()"
                    class="absolute right-6 w-14 h-14 rounded-full bg-white/10 hover:bg-dejj-blue text-white flex items-center justify-center transition-all group">
                    <i class="fa-solid fa-chevron-right text-xl group-hover:translate-x-1 transition-transform"></i>
                </button>
            </div>
            <div id="media-counter" class="mt-8 text-white/60 font-bold uppercase tracking-widest text-sm text-center">
            </div>
        </div>
    </div>

    <!-- Details Modal -->
    <div id="details-modal"
        class="hidden fixed inset-0 z-[100] bg-dejj-dark/90 backdrop-blur-lg flex items-center justify-center p-4">
        <div
            class="bg-white w-full max-w-3xl rounded-[3rem] p-10 md:p-16 relative shadow-2xl overflow-y-auto max-h-[90vh]">
            <button onclick="closeDetails()"
                class="absolute top-8 right-8 text-slate-400 hover:text-dejj-red transition-all">
                <i class="fa-solid fa-xmark text-3xl"></i>
            </button>

            <div class="mb-8">
                <span id="detail-category"
                    class="inline-block bg-dejj-red/10 text-dejj-red px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-4">Category</span>
                <h2 id="detail-title" class="font-display text-4xl md:text-5xl font-black text-dejj-dark leading-tight">
                    Project Title</h2>
                <p id="detail-location" class="text-slate-400 font-bold mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-dejj-red"></i> Location Info
                </p>
            </div>

            <div class="prose prose-slate max-w-none">
                <h4
                    class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 mb-4 pb-2 border-b border-slate-100 italic">
                    Project Description</h4>
                <p id="detail-description"
                    class="text-slate-600 leading-relaxed text-lg font-medium whitespace-pre-line">
                    Full description goes here...
                </p>
            </div>

            <div class="mt-12 pt-10 border-t border-slate-100 flex flex-wrap gap-4">
                <button id="view-gallery-btn"
                    class="bg-dejj-blue text-white px-8 py-4 rounded-2xl font-bold hover:bg-dejj-red transition-all shadow-lg hover:shadow-dejj-red/20 flex items-center gap-3">
                    <i class="fa-solid fa-images"></i> View Media Gallery
                </button>
                <button onclick="closeDetails()"
                    class="px-8 py-4 rounded-2xl font-bold border-2 border-slate-100 text-slate-400 hover:bg-slate-50 transition-all">Close
                    Details</button>
            </div>
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
            document.body.classList.add('overflow-hidden');
            renderMedia();
        }

        function closeGallery() {
            document.getElementById('gallery-modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            document.getElementById('media-viewport').innerHTML = '';
        }

        // Open project details modal with description and media capability
        function openProjectDetails(project, media) {
            document.getElementById('detail-title').textContent = project.title;
            document.getElementById('detail-category').textContent = project.category || 'Engineering';
            document.getElementById('detail-location').innerHTML = `<i class="fa-solid fa-location-dot text-dejj-red"></i> ${project.location}`;
            document.getElementById('detail-description').textContent = project.description;

            document.getElementById('view-gallery-btn').onclick = () => {
                closeDetails();
                openGallery(media, project.title);
            };

            document.getElementById('details-modal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeDetails() {
            document.getElementById('details-modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function renderMedia() {
            if (currentMedia.length === 0) {
                document.getElementById('media-viewport').innerHTML = '<div class="text-white italic">No media available for this project.</div>';
                document.getElementById('media-counter').textContent = '';
                return;
            }
            const item = currentMedia[currentIndex];
            const viewport = document.getElementById('media-viewport');
            // Support videos from data items too
            const path = item.file_url.startsWith('http') ? item.file_url : item.file_url;

            if (item.file_type === 'video') {
                viewport.innerHTML = `<video src="${path}" border="0" controls autoplay class="w-full h-full object-contain"></video>`;
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

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeGallery();
            if (e.key === 'ArrowRight') nextMedia();
            if (e.key === 'ArrowLeft') prevMedia();
        });
    </script>
    <script src="js/main.js"></script>
</body>

</html>