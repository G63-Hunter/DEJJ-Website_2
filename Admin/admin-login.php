<?php
require_once '../includes/db.php';
require_once '../includes/auth.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);
            $admin = $stmt->fetch();

            if ($admin) {
                if (password_verify($password, $admin['password'])) {
                    session_regenerate_id(true);
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_username'] = $admin['username'];
                    header("Location: admin-dashboard.php");
                    exit;
                } else {
                    $error = "Invalid password. Please try again.";
                }
            } else {
                $error = "Admin account '$username' not found. Have you run setup.php?";
            }
        } catch (PDOException $e) {
            $error = "Database Error: " . $e->getMessage();
        }
    } else {
        $error = "Please fill in all fields.";
    }
}

// Redirect if already logged in
if (is_logged_in()) {
    header("Location: admin-dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Dejj Engineering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dejj: {
                            red: '#E31E24',
                            blue: '#1A4A94',
                            dark: '#111827',
                            slate: '#f8fafc'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-dejj-slate min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-dejj-blue/5 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-dejj-red/5 rounded-full blur-3xl"></div>

    <div class="w-full max-w-md relative z-10">
        <!-- Logo -->
        <div class="text-center mb-10">
            <img src="../Images/LOGO.png" alt="Dejj Logo" class="h-20 mx-auto mb-4">
            <h1 class="text-2xl font-extrabold text-dejj-dark">Admin Access</h1>
            <p class="text-slate-500 font-medium">Please sign in to continue</p>
        </div>

        <!-- Login Card -->
        <div class="glass-effect p-10 rounded-[2.5rem] shadow-2xl shadow-dejj-dark/5 border border-white/50">
            <?php if ($error): ?>
                <div
                    class="mb-6 p-4 bg-red-50 border border-red-100 text-dejj-red text-sm font-bold rounded-2xl flex items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="" class="space-y-6">
                <div class="space-y-2">
                    <label for="username"
                        class="text-xs font-bold uppercase tracking-widest text-slate-400 ml-1">Username</label>
                    <div class="relative">
                        <i class="fa-solid fa-user absolute left-6 top-1/2 -translate-y-1/2 text-slate-300"></i>
                        <input type="text" id="username" name="username" required
                            class="w-full pl-14 pr-6 py-4 rounded-2xl bg-white border border-slate-100 focus:outline-none focus:ring-2 focus:ring-dejj-blue/20 focus:border-dejj-blue transition-all"
                            placeholder="Enter your username">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password"
                        class="text-xs font-bold uppercase tracking-widest text-slate-400 ml-1">Password</label>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-6 top-1/2 -translate-y-1/2 text-slate-300"></i>
                        <input type="password" id="password" name="password" required
                            class="w-full pl-14 pr-6 py-4 rounded-2xl bg-white border border-slate-100 focus:outline-none focus:ring-2 focus:ring-dejj-blue/20 focus:border-dejj-blue transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox"
                            class="w-4 h-4 rounded border-slate-200 text-dejj-blue focus:ring-dejj-blue/20">
                        <span class="text-sm text-slate-500 group-hover:text-dejj-dark transition-colors">Remember
                            me</span>
                    </label>
                    <a href="#" class="text-sm font-bold text-dejj-blue hover:text-dejj-red transition-colors">Forgot
                        Password?</a>
                </div>

                <button type="submit"
                    class="w-full py-5 bg-dejj-blue text-white rounded-2xl font-bold text-lg shadow-lg shadow-dejj-blue/20 hover:bg-dejj-red hover:shadow-dejj-red/20 transform hover:-translate-y-1 transition-all active:scale-[0.98]">
                    Sign In
                </button>
            </form>
        </div>

        <p class="text-center mt-10 text-slate-400 text-sm">
            &copy;
            <?php echo date('Y'); ?> Dejj Engineering. All rights reserved.
        </p>
    </div>
</body>

</html>