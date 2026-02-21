<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="fixed top-0 w-full z-50 glass transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <a href="index.php" class="flex-shrink-0 flex items-center">
                <img src="Images/LOGO.png" alt="Dejj Logo" class="h-24 w-auto object-contain py-1">
            </a>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="index.php"
                    class="text-sm font-semibold <?php echo $current_page == 'index.php' ? 'text-dejj-red' : 'hover:text-dejj-red'; ?> transition-colors capitalize">Home</a>
                <a href="about.php"
                    class="text-sm font-semibold <?php echo $current_page == 'about.php' ? 'text-dejj-red' : 'hover:text-dejj-red'; ?> transition-colors capitalize">About</a>
                <a href="services.php"
                    class="text-sm font-semibold <?php echo $current_page == 'services.php' ? 'text-dejj-red' : 'hover:text-dejj-red'; ?> transition-colors capitalize">Services</a>
                <a href="projects.php"
                    class="text-sm font-semibold <?php echo $current_page == 'projects.php' ? 'text-dejj-red' : 'hover:text-dejj-red'; ?> transition-colors capitalize">Projects</a>
                <a href="index.php#contact"
                    class="bg-dejj-blue text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-dejj-red transition-all shadow-lg hover:shadow-dejj-red/20">Contact
                    Us</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-dejj-blue p-2">
                    <i class="fa-solid fa-bars-staggered text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="hidden md:hidden bg-white/95 backdrop-blur-xl absolute top-full left-0 w-full border-b border-slate-100 py-6 px-4 shadow-xl">
        <div class="flex flex-col space-y-4">
            <a href="index.php"
                class="mobile-link text-lg font-semibold <?php echo $current_page == 'index.php' ? 'text-dejj-red' : 'text-slate-800'; ?>">Home</a>
            <a href="about.php"
                class="mobile-link text-lg font-semibold <?php echo $current_page == 'about.php' ? 'text-dejj-red' : 'text-slate-800'; ?>">About</a>
            <a href="services.php"
                class="mobile-link text-lg font-semibold <?php echo $current_page == 'services.php' ? 'text-dejj-red' : 'text-slate-800'; ?>">Services</a>
            <a href="projects.php"
                class="mobile-link text-lg font-semibold <?php echo $current_page == 'projects.php' ? 'text-dejj-red' : 'text-slate-800'; ?>">Projects</a>
            <a href="index.php#contact"
                class="mobile-link bg-dejj-blue text-white py-4 rounded-xl text-center font-bold">Contact Us</a>
        </div>
    </div>
</nav>