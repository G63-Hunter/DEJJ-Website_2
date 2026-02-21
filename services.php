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
    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <header class="pt-40 pb-20 bg-dejj-blue text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="font-display text-5xl md:text-7xl font-extrabold mb-6">Our <span
                    class="text-dejj-cyan italic">Expertise.</span></h1>
            <p class="text-xl text-white/70 max-w-2xl leading-relaxed">Comprehensive water and engineering solutions
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
                <div class="bg-white p-12 rounded-[3rem] card-hover border border-slate-100">
                    <div
                        class="w-16 h-16 rounded-2xl bg-dejj-red/5 flex items-center justify-center text-dejj-red mb-8">
                        <i class="fa-solid fa-compass-drafting text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Engineering Services</h3>
                    <p class="text-slate-600 leading-relaxed">From structural design to civil works, we offer
                        comprehensive engineering consultancy and project management across Uganda.</p>
                </div>
                <div class="bg-white p-12 rounded-[3rem] card-hover border border-slate-100">
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

    <?php include 'includes/footer_public.php'; ?>

    <script src="js/main.js"></script>
</body>

</html>