<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Dejj Engineering & Investments Solutions</title>

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
                        class="text-sm font-semibold text-dejj-red transition-colors capitalize">About</a>
                    <a href="services.php"
                        class="text-sm font-semibold hover:text-dejj-red transition-colors capitalize">Services</a>
                    <a href="projects.php"
                        class="text-sm font-semibold hover:text-dejj-red transition-colors capitalize">Projects</a>
                    <a href="index.php#contact"
                        class="bg-dejj-blue text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-dejj-red transition-all">Contact
                        Us</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="pt-40 pb-20 bg-dejj-dark text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="Images/photo_2026-02-10_13-24-18.jpg" alt="Background" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center md:text-left">
            <h1 class="font-display text-5xl md:text-7xl font-extrabold mb-6 animate-float">Who We <span
                    class="text-dejj-red italic">Are.</span></h1>
            <p class="text-xl text-white/70 max-w-2xl leading-relaxed mx-auto md:mx-0">Defining engineering excellence in Uganda through
                dedication, technology, and local insight.</p>
        </div>
    </header>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-20">
                <div class="space-y-8 reveal">
                    <h2 class="font-display text-4xl font-extrabold text-dejj-blue">Our Story</h2>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Dejj Engineering & Investments Solutions was registered in February 2024 with a singular
                        mission: to bridge the gap in sustainable water infrastructure in Uganda. Recognizing the
                        critical need for professional hydrogeological services and reliable borehole drilling, our
                        founders established a firm that blends international engineering standards with deep local
                        knowledge.
                    </p>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        We provide high quality water pump installation for underground waters for communities. We also
                        carry out business to business investments.
                        <br><br>
                        We are fully aligned to environmental laws and regulations with technical expertriates.
                        <br><br> We are located at Lico Holdings Ltd Building, Kireka opposite Shell Petrol station,
                        Third floor. Suit 12 B
                    </p>
                    <div class="grid grid-cols-2 gap-8 pt-8 border-t border-slate-100">
                        <div>
                            <p class="text-4xl font-extrabold text-dejj-red">Feb 2024</p>
                            <p class="text-sm font-bold uppercase tracking-widest text-slate-400">Founded In Uganda</p>
                        </div>
                        <div>
                            <p class="text-4xl font-extrabold text-dejj-blue">50+</p>
                            <p class="text-sm font-bold uppercase tracking-widest text-slate-400">Projects Completed</p>
                        </div>
                    </div>
                </div>
                <div class="relative reveal shadow-2xl rounded-[3rem] overflow-hidden">
                    <img src="Images/photo_2026-02-10_13-30-32.jpg" alt="Team Work" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="font-display text-4xl font-extrabold text-slate-900 mb-4">Our Core Values</h2>
                <div class="w-20 h-1 bg-dejj-red mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="bg-white p-10 rounded-[2rem] card-hover shadow-sm">
                    <i class="fa-solid fa-shield-halved text-4xl text-dejj-blue mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">Integrity</h3>
                    <p class="text-slate-600">We believe in transparent operations and delivering exactly what we
                        promise, every time.</p>
                </div>
                <div class="bg-white p-10 rounded-[2rem] card-hover shadow-sm">
                    <i class="fa-solid fa-microchip text-4xl text-dejj-red mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">Innovation</h3>
                    <p class="text-slate-600">Using the latest geophysical technology to minimize risk and maximize
                        results.</p>
                </div>
                <div class="bg-white p-10 rounded-[2rem] card-hover shadow-sm">
                    <i class="fa-solid fa-handshake-angle text-4xl text-dejj-blue mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">Sustainability</h3>
                    <p class="text-slate-600">Protecting Uganda's water tables through scientific management and ethical
                        drilling.</p>
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
