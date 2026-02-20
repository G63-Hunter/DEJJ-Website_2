<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Dejj Engineering & Investments Solutions</title>

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
</head>

<body class="bg-slate-50 text-slate-900 font-sans">
    <nav class="fixed top-0 w-full z-50 glass transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="index.php" class="flex-shrink-0 flex items-center">
                    <img src="Images/LOGO.png" alt="Dejj Logo" class="h-24 w-auto object-contain py-1">
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php"
                        class="text-sm font-semibold hover:text-dejj-red transition-colors capitalize">Home</a>
                    <a href="about.php"
                        class="text-sm font-semibold hover:text-dejj-red transition-colors capitalize">About</a>
                    <a href="services.php"
                        class="text-sm font-semibold text-dejj-red transition-colors capitalize">Services</a>
                    <a href="projects.php"
                        class="text-sm font-semibold hover:text-dejj-red transition-colors capitalize">Projects</a>
                    <a href="index.php#contact"
                        class="bg-dejj-blue text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-dejj-red transition-all">Contact
                        Us</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="pt-40 pb-20 bg-dejj-blue text-white relative overflow-hidden text-center md:text-left">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="font-display text-5xl md:text-7xl font-extrabold mb-6">Our <span
                    class="text-dejj-cyan italic">Expertise.</span></h1>
            <p class="text-xl text-white/70 max-w-2xl leading-relaxed mx-auto md:mx-0">Comprehensive water and engineering solutions
                designed for longevity and impact.</p>
        </div>
    </header>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 space-y-32">
            <!-- Service 1 -->
            <div class="grid lg:grid-cols-2 gap-20 items-center reveal">
                <div class="rounded-[3rem] overflow-hidden shadow-2xl h-[500px]">
                    <img src="Images/photo_2026-02-14_17-33-13.jpg" alt="Drilling" class="w-full h-full object-cover">
                </div>
                <div class="space-y-6">
                    <span class="text-dejj-red font-bold uppercase tracking-[0.3em] text-sm">Core Service</span>
                    <h2 class="font-display text-4xl font-extrabold text-slate-900">Professional Borehole Drilling</h2>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        We provide state-of-the-art borehole drilling services for all sectors. Our rigs are equipped to
                        handle diverse geological formations across Uganda, ensuring reliable water access for:
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3"><i class="fa-solid fa-circle-check text-dejj-blue"></i>
                            Large-scale agricultural irrigation</li>
                        <li class="flex items-center gap-3"><i class="fa-solid fa-circle-check text-dejj-blue"></i>
                            Industrial water manufacturing</li>
                        <li class="flex items-center gap-3"><i class="fa-solid fa-circle-check text-dejj-blue"></i>
                            Rural community water points</li>
                        <li class="flex items-center gap-3"><i class="fa-solid fa-circle-check text-dejj-blue"></i>
                            Domestic residential wells</li>
                    </ul>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="grid lg:grid-cols-2 gap-20 items-center reveal order-last lg:order-none">
                <div class="space-y-6 order-2 lg:order-1">
                    <span class="text-dejj-blue font-bold uppercase tracking-[0.3em] text-sm">Technology Driven</span>
                    <h2 class="font-display text-4xl font-extrabold text-slate-900">Hydrogeological Surveys</h2>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Precision is everything in water discovery. We use electrical resistivity tomography and seismic
                        refraction to map underground aquifers with over 95% accuracy.
                    </p>
                    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                        <h4 class="font-bold mb-2">Why survey with DEJJ?</h4>
                        <p class="text-slate-600">Reduced dry-hole risk, aquifer yield estimation, and water quality
                            pre-assessment.</p>
                    </div>
                </div>
                <div class="rounded-[3rem] overflow-hidden shadow-2xl h-[500px] order-1 lg:order-2">
                    <img src="Images/photo_2026-02-10_13-24-28.jpg" alt="Survey" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- More Services -->
            <div class="grid md:grid-cols-2 gap-8 reveal">
                <div class="bg-white p-12 rounded-[3rem] card-hover border border-slate-100 shadow-sm">
                    <div
                        class="w-16 h-16 rounded-2xl bg-dejj-red/5 flex items-center justify-center text-dejj-red mb-8">
                        <i class="fa-solid fa-compass-drafting text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Engineering Services</h3>
                    <p class="text-slate-600 leading-relaxed">From structural design to civil works, we offer
                        comprehensive engineering consultancy and project management across Uganda.</p>
                </div>
                <div class="bg-white p-12 rounded-[3rem] card-hover border border-slate-100 shadow-sm">
                    <div
                        class="w-16 h-16 rounded-2xl bg-dejj-blue/5 flex items-center justify-center text-dejj-blue mb-8">
                        <i class="fa-solid fa-handshake-angle text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Water Consultancy</h3>
                    <p class="text-slate-600 leading-relaxed">Expert guidance on water policy, environmental impact
                        assessments, and sustainable aquifer management strategies.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dejj-dark pt-20 pb-10 text-white/70 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Brand -->
                <div class="space-y-6">
                    <img src="Images/LOGO.png" alt="Dejj Logo" class="h-16 w-auto brightness-0 invert">
                    <p class="text-sm leading-relaxed">
                        Professional borehole drilling and hydrogeological survey
                        services across Uganda.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-dejj-blue hover:text-white transition-all"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-dejj-red hover:text-white transition-all"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-dejj-blue hover:text-white transition-all"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://wa.me/256787707491" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-green-500 hover:text-white transition-all"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Navigation -->
                <div>
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">Quick Links</h4>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="index.php" class="hover:text-dejj-red transition-colors">Home</a></li>
                        <li><a href="about.php" class="hover:text-dejj-red transition-colors">About</a></li>
                        <li><a href="services.php" class="hover:text-dejj-red transition-colors">Our Services</a></li>
                        <li><a href="projects.php" class="hover:text-dejj-red transition-colors">Projects</a></li>
                        <li><a href="index.php#contact" class="hover:text-dejj-red transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">Expertise</h4>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="services.php" class="hover:text-dejj-blue transition-colors">Borehole Drilling</a></li>
                        <li><a href="services.php" class="hover:text-dejj-blue transition-colors">Hydrogeological Surveys</a></li>
                        <li><a href="services.php" class="hover:text-dejj-blue transition-colors">Water Consultancy</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">Contact Us</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex gap-3"><i class="fa-solid fa-location-dot text-dejj-red"></i><a
                                href="https://www.google.com/maps/place/Lico+Holdings+Ltd+Building/@0.346648,32.6495484,20.08z/data=!4m6!3m5!1s0x177db9f0f40d4c1b:0x784eae36e0c84133!8m2!3d0.346647!4d32.6498661!16s%2Fg%2F11ghgjq56z?entry=ttu&g_ep=EgoyMDI2MDIwOC4wIKXMDSoASAFQAw%3D%3D">Kampala, Uganda</a>
                        </li>
                        <li class="flex gap-3"><i class="fa-solid fa-phone text-dejj-blue"></i> +256 788909998 / +256 702914220</li>
                        <li class="flex gap-3"><i class="fa-solid fa-envelope text-dejj-cyan"></i>
                            <a href="mailto: dejjengineering@gmail.com">dejjengineering@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-bold uppercase tracking-[0.2em]">
                <p>© 2024 DEJJ Engineering & Investments Solutions. All rights reserved.</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-white transition-colors">Privacy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
