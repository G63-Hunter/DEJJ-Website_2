<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dejj Engineering & Investments Solutions | Uganda</title>
    <meta name="description"
        content="Dejj Engineering & Investments Solutions is specialized in Engineering services and Water consultancy, specifically in Borehole drilling and Hydrogeological Surveys in Uganda.">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dejj: {
                            red: '#E31E24',
                            blue: '#1A4A94',
                            cyan: '#8AD1E8',
                            dark: '#111827',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 text-slate-900 font-sans selection:bg-dejj-blue selection:text-white">

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-dejj-blue/5 rounded-full blur-3xl">
            </div>
            <div class="absolute bottom-[-10%] left-[-10%] w-[500px] h-[500px] bg-dejj-red/5 rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white shadow-sm border border-slate-100 mb-4 animate-bounce">
                        <span class="relative flex h-3 w-3">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-dejj-red opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-dejj-red"></span>
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-600">Registered in Uganda
                            Since 2024</span>
                    </div>

                    <h1 class="font-display text-5xl md:text-7xl font-extrabold leading-[1.1] text-slate-900">
                        Borehole Drilling & <span class="text-dejj-blue italic">Water</span><br>
                        <span class="text-dejj-red">Solutions.</span>
                    </h1>

                    <p class="text-lg text-slate-600 max-w-lg leading-relaxed">
                        Dejj Engineering & Investments Solutions provides world-class borehole drilling, hydrogeological
                        surveys, and comprehensive water consultancy across Uganda.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="#services"
                            class="group flex items-center gap-3 bg-dejj-blue text-white px-8 py-4 rounded-2xl font-bold hover:bg-dejj-dark transition-all transform hover:-translate-y-1 shadow-xl shadow-dejj-blue/20">
                            Our Services
                            <i class="fa-solid fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                        </a>
                        <a href="projects.php"
                            class="flex items-center gap-3 bg-white text-slate-900 border border-slate-200 px-8 py-4 rounded-2xl font-bold hover:bg-slate-50 transition-all transform hover:-translate-y-1">
                            View Projects
                        </a>
                    </div>

                    <div class="flex items-center gap-8 pt-10 border-t border-slate-200">
                        <div class="flex flex-col">
                            <span class="text-3xl font-bold text-dejj-blue">100%</span>
                            <span class="text-xs uppercase font-bold tracking-widest text-slate-400">Success Rate</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-3xl font-bold text-dejj-red">Uganda</span>
                            <span class="text-xs uppercase font-bold tracking-widest text-slate-400">Wide
                                Operations</span>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div
                        class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="Images/photo_2026-02-10_13-30-40.jpg" alt="Borehole Drilling"
                            class="w-full h-[600px] object-cover">
                    </div>
                    <!-- Decorative shapes -->
                    <div
                        class="absolute -top-10 -right-10 w-40 h-40 bg-dejj-red rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob">
                    </div>
                    <div
                        class="absolute -bottom-10 -left-10 w-40 h-40 bg-dejj-blue rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="order-2 lg:order-1">
                    <div class="grid grid-cols-2 gap-4">
                        <img src="Images/photo_2026-02-10_13-08-22-removebg-preview (1).png" alt="Equipment"
                            class="rounded-3xl bg-slate-50 p-4 shadow-inner">
                        <div class="space-y-4 pt-12">
                            <img src="Images/photo_2026-02-10_13-24-18.jpg" alt="Team" class="rounded-3xl shadow-lg">
                            <div class="bg-dejj-red p-8 rounded-3xl text-white">
                                <p class="text-sm font-medium opacity-80 mb-2">Established</p>
                                <p class="text-3xl font-bold">Feb 2024</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2 space-y-8">
                    <div class="inline-block">
                        <span class="text-dejj-red font-bold uppercase tracking-[0.3em] text-sm">Our Legacy</span>
                        <div class="h-1 w-12 bg-dejj-blue mt-2"></div>
                    </div>
                    <h2 class="font-display text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                        Uganda's Premier <span class="text-dejj-blue">Water Engineering</span> Partner.
                    </h2>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Registered in February 2024, Dejj Engineering & Investments Solutions was founded with a vision
                        to revolutionize water accessibility and engineering standards in Uganda. We combine
                        cutting-edge hydrogeological technology with local expertise to deliver sustainable water
                        solutions.
                    </p>

                    <div class="space-y-6">
                        <div class="flex gap-5 items-start">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-2xl bg-dejj-blue/10 flex items-center justify-center text-dejj-blue">
                                <i class="fa-solid fa-check-double text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-slate-900 mb-1">Unmatched Accuracy</h4>
                                <p class="text-slate-600">Advanced surveys ensure the highest success rates in borehole
                                    placement.</p>
                            </div>
                        </div>
                        <div class="flex gap-5 items-start">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-2xl bg-dejj-red/10 flex items-center justify-center text-dejj-red">
                                <i class="fa-solid fa-droplet text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-slate-900 mb-1">Sustainable Solutions</h4>
                                <p class="text-slate-600">We don't just drill; we provide long-term water management
                                    strategies.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-20 space-y-4">
                <span class="text-dejj-blue font-bold uppercase tracking-[0.3em] text-sm">Professional Expertise</span>
                <h2 class="font-display text-4xl md:text-5xl font-extrabold text-slate-900">Our Comprehensive Solutions
                </h2>
                <div class="w-24 h-1.5 bg-dejj-red mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div
                    class="group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:-translate-y-2">
                    <div
                        class="w-16 h-16 rounded-2xl bg-dejj-blue/5 flex items-center justify-center text-dejj-blue mb-8 group-hover:bg-dejj-blue group-hover:text-white transition-colors">
                        <i class="fa-solid fa-compass-drafting text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Engineering Services</h3>
                    <p class="text-slate-600 leading-relaxed mb-6">Cutting-edge structural and civil engineering
                        solutions tailored to Ugandan infrastructure needs.</p>
                    <a href="index.php#contact"
                        class="text-dejj-blue font-bold flex items-center gap-2 group-hover:gap-4 transition-all">
                        Inquire Now <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>

                <!-- Service 2 -->
                <div
                    class="group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:-translate-y-2">
                    <div
                        class="w-16 h-16 rounded-2xl bg-dejj-red/5 flex items-center justify-center text-dejj-red mb-8 group-hover:bg-dejj-red group-hover:text-white transition-colors">
                        <i class="fa-solid fa-bore-hole text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Borehole Drilling</h3>
                    <p class="text-slate-600 leading-relaxed mb-6">Professional drilling services for industrial,
                        agricultural, and domestic water supply needs.</p>
                    <a href="index.php#contact"
                        class="text-dejj-red font-bold flex items-center gap-2 group-hover:gap-4 transition-all">
                        Inquire Now <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>

                <!-- Service 3 -->
                <div
                    class="group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:-translate-y-2">
                    <div
                        class="w-16 h-16 rounded-2xl bg-dejj-blue/5 flex items-center justify-center text-dejj-blue mb-8 group-hover:bg-dejj-blue group-hover:text-white transition-colors">
                        <i class="fa-solid fa-earth-africa text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Hydrogeological Surveys</h3>
                    <p class="text-slate-600 leading-relaxed mb-6">Identifying underground water potential using the
                        latest geophysical surveying technology.</p>
                    <a href="index.php#contact"
                        class="text-dejj-blue font-bold flex items-center gap-2 group-hover:gap-4 transition-all">
                        Inquire Now <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>

                <!-- Service 4 -->
                <div
                    class="group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:-translate-y-2">
                    <div
                        class="w-16 h-16 rounded-2xl bg-dejj-red/5 flex items-center justify-center text-dejj-red mb-8 group-hover:bg-dejj-red group-hover:text-white transition-colors">
                        <i class="fa-solid fa-handshake-angle text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Water Consultancy</h3>
                    <p class="text-slate-600 leading-relaxed mb-6">Expert advice on water rights, quality testing, and
                        sustainable resource management.</p>
                    <a href="index.php#contact"
                        class="text-dejj-red font-bold flex items-center gap-2 group-hover:gap-4 transition-all">
                        Inquire Now <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
                <div class="max-w-2xl">
                    <span class="text-dejj-red font-bold uppercase tracking-[0.3em] text-sm">Our Work</span>
                    <h2 class="font-display text-4xl md:text-5xl font-extrabold text-slate-900 mt-4 leading-tight">
                        Driving Impact Through <br> <span class="text-dejj-blue">Engineering Excellence.</span></h2>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <?php
                $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 3");
                while ($row = $stmt->fetch()):
                    $img = $row['image_url'];
                    $location = htmlspecialchars($row['location']);
                    $title = htmlspecialchars($row['title']);

                    // Fetch media
                    $mStmt = $pdo->prepare("SELECT * FROM project_media WHERE project_id = ?");
                    $mStmt->execute([$row['id']]);
                    $media = $mStmt->fetchAll(PDO::FETCH_ASSOC);
                    $mediaJson = htmlspecialchars(json_encode($media));
                    ?>
                    <!-- Project -->
                    <div class="group relative rounded-[2.5rem] overflow-hidden aspect-[4/5] shadow-xl cursor-pointer"
                        onclick="openGallery(<?php echo $mediaJson; ?>, '<?php echo addslashes($title); ?>')">
                        <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo $title; ?>"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            onerror="this.src='Images/photo_2026-02-10_13-24-24.jpg'">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-dejj-blue/90 via-dejj-blue/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 p-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500 w-full">
                            <span
                                class="text-white/70 text-sm font-medium uppercase tracking-widest mb-2 block"><?php echo $location; ?></span>
                            <h4 class="text-2xl font-bold text-white mb-4"><?php echo $title; ?></h4>
                            <div class="flex items-center gap-2 text-white/60 text-xs mb-4">
                                <i class="fa-solid fa-images"></i> <?php echo count($media); ?> Media Items
                            </div>
                            <div class="h-1 w-0 group-hover:w-full bg-dejj-red transition-all duration-700"></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="mt-16 text-center">
                <p class="text-slate-500 font-medium italic">And over 50+ other successfully completed projects across
                    the country.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-dejj-dark relative overflow-hidden text-white">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-dejj-blue/5 skew-x-12 translate-x-20"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-20">
                <div class="space-y-12">
                    <div class="space-y-4">
                        <span class="text-dejj-red font-bold uppercase tracking-[0.3em] text-sm italic">Get In
                            Touch</span>
                        <h2 class="font-display text-4xl md:text-6xl font-extrabold">Let's Discuss Your Next <span
                                class="text-dejj-blue italic">Water</span> Project.</h2>
                    </div>

                    <div class="grid gap-8">
                        <div class="flex gap-6 items-center">
                            <div
                                class="w-16 h-16 rounded-[1.5rem] bg-white/10 flex items-center justify-center text-dejj-cyan text-2xl">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <p class="text-white/60 text-sm uppercase tracking-widest font-bold mb-1">Our Location
                                </p>
                                <p class="text-xl font-bold">Kampala, Uganda</p>
                            </div>
                        </div>
                        <div class="flex gap-6 items-center">
                            <div
                                class="w-16 h-16 rounded-[1.5rem] bg-white/10 flex items-center justify-center text-dejj-red text-2xl">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-white/60 text-sm uppercase tracking-widest font-bold mb-1">Email Us</p>
                                <p class="text-xl font-bold"><a href="mailto:dejjengineering@gmail.com" target="_blank"
                                        class="email-link"> dejjengineering@gmail.com</a></p>
                            </div>
                        </div>
                        <div class="flex gap-6 items-center">
                            <div
                                class="w-16 h-16 rounded-[1.5rem] bg-white/10 flex items-center justify-center text-dejj-blue text-2xl">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div>
                                <p class="text-white/60 text-sm uppercase tracking-widest font-bold mb-1">Call Anytime
                                </p>
                                <p class="text-xl font-bold">+256 788909998 or +256 702914220</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4 pt-10">
                        <a href="#"
                            class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-dejj-blue transition-all"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"
                            class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-dejj-blue transition-all"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"
                            class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-dejj-red transition-all"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="https://wa.me/256787707491" target="_blank"
                            class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-green-500 transition-all"><i
                                class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="bg-white p-10 md:p-12 rounded-[3rem] shadow-2xl text-slate-900 border border-white/10">
                    <form action="submit_inquiry.php" method="POST" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-400 uppercase tracking-wider">Full
                                    Name</label>
                                <input type="text" name="name" required
                                    class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none focus:border-dejj-blue transition-all"
                                    placeholder="John Okello">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-400 uppercase tracking-wider">Email
                                    Address</label>
                                <input type="email" name="email" required
                                    class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none focus:border-dejj-blue transition-all"
                                    placeholder="john@example.com">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-400 uppercase tracking-wider">Subject</label>
                            <select name="subject"
                                class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none focus:border-dejj-blue transition-all appearance-none cursor-pointer">
                                <option value="Borehole Drilling Inquiry">Borehole Drilling Inquiry</option>
                                <option value="Hydrogeological Survey">Hydrogeological Survey</option>
                                <option value="Water Consultancy">Water Consultancy</option>
                                <option value="Other Engineering Service">Other Engineering Service</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-400 uppercase tracking-wider">Message</label>
                            <textarea name="message" rows="4" required
                                class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none focus:border-dejj-blue transition-all"
                                placeholder="Tell us about your requirements..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full py-5 bg-dejj-blue text-white rounded-2xl font-extrabold text-lg shadow-xl shadow-dejj-blue/20 hover:bg-dejj-red transition-all transform hover:scale-[1.02]">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer_public.php'; ?>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        const menuBtn = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-xl', 'bg-white/95');
                nav.classList.remove('bg-white/80');
            } else {
                nav.classList.remove('shadow-xl', 'bg-white/95');
                nav.classList.add('bg-white/80');
            }
        });
    </script>
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
                class="relative w-full aspect-video bg-black rounded-[2.5rem] overflow-hidden shadow-2xl flex items-center justify-center">
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

        function renderMedia() {
            if (currentMedia.length === 0) {
                document.getElementById('media-viewport').innerHTML = '<div class="text-white italic">No media files available.</div>';
                document.getElementById('media-counter').textContent = '';
                return;
            }
            const item = currentMedia[currentIndex];
            const viewport = document.getElementById('media-viewport');
            if (item.file_type === 'video') {
                viewport.innerHTML = `<video src="${item.file_url}" border="0" controls autoplay class="w-full h-full object-contain"></video>`;
            } else {
                viewport.innerHTML = `<img src="${item.file_url}" class="w-full h-full object-contain">`;
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
</body>

</html>