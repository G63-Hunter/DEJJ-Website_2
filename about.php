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
    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <header class="pt-40 pb-20 bg-dejj-dark text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="Images/photo_2026-02-10_13-24-18.jpg" alt="Background" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <h1 class="font-display text-5xl md:text-7xl font-extrabold mb-6 animate-float">Who We <span
                    class="text-dejj-red italic">Are.</span></h1>
            <p class="text-xl text-white/70 max-w-2xl leading-relaxed">Defining engineering excellence in Uganda through
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
                        We are fully aligned to environmental laws and regulations with technical expertriates. We are
                        located at Lico Holdings Building Ltd , Kireka opposite Shell Petrol station, Third floor. Suit
                        12 B.
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
                <div class="bg-white p-10 rounded-[2rem] card-hover">
                    <i class="fa-solid fa-shield-halved text-4xl text-dejj-blue mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">Integrity</h3>
                    <p class="text-slate-600">We believe in transparent operations and delivering exactly what we
                        promise, every time.</p>
                </div>
                <div class="bg-white p-10 rounded-[2rem] card-hover">
                    <i class="fa-solid fa-microchip text-4xl text-dejj-red mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">Innovation</h3>
                    <p class="text-slate-600">Using the latest geophysical technology to minimize risk and maximize
                        results.</p>
                </div>
                <div class="bg-white p-10 rounded-[2rem] card-hover">
                    <i class="fa-solid fa-handshake-angle text-4xl text-dejj-blue mb-6"></i>
                    <h3 class="text-2xl font-bold mb-4">Sustainability</h3>
                    <p class="text-slate-600">Protecting Uganda's water tables through scientific management and ethical
                        drilling.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer_public.php'; ?>

    <script src="js/main.js"></script>
</body>

</html>