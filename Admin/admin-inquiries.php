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
    <title>Inquiries | Dejj Admin</title>
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
            <a href="admin-projects.php"
                class="flex items-center gap-4 px-6 py-4 hover:bg-white/5 rounded-2xl transition-all">
                <i class="fa-solid fa-folder-open"></i> Projects
            </a>
            <a href="admin-inquiries.php" class="flex items-center gap-4 px-6 py-4 bg-dejj-blue rounded-2xl font-bold">
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
        <header class="mb-12">
            <h1 class="text-3xl font-extrabold text-dejj-dark">Client Inquiries</h1>
            <p class="text-slate-500 mt-1">Manage and respond to service requests</p>
        </header>

        <div class="space-y-4">
            <?php
            $stmt = $pdo->query("SELECT * FROM inquiries ORDER BY created_at DESC");
            while ($row = $stmt->fetch()):
                $nameParts = explode(' ', $row['name']);
                $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                $isReplied = ($row['status'] === 'replied');
                ?>
                <!-- Inquiry -->
                <div
                    class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 flex items-center justify-between group <?php echo $isReplied ? 'opacity-60' : ''; ?>">
                    <div class="flex gap-6 items-center">
                        <div
                            class="w-14 h-14 rounded-2xl bg-slate-50 flex items-center justify-center text-dejj-blue font-bold text-xl">
                            <?php echo $initials; ?>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-dejj-dark"><?php echo htmlspecialchars($row['name']); ?> <span
                                    class="text-slate-400 font-medium ml-2"><?php echo htmlspecialchars($row['email']); ?></span>
                            </h4>
                            <p class="text-slate-500 text-sm mt-1 italic">
                                "<?php echo htmlspecialchars(substr($row['message'], 0, 100)); ?>..."</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-8">
                        <?php if (!$isReplied): ?>
                            <span
                                class="px-4 py-2 bg-dejj-red/10 text-dejj-red text-xs font-bold rounded-full uppercase tracking-widest">New</span>
                            <a href="update_inquiry.php?id=<?php echo $row['id']; ?>&status=replied"
                                class="bg-dejj-blue text-white px-6 py-3 rounded-xl font-bold shadow-md hover:bg-dejj-red transition-all">Mark
                                Replied</a>
                        <?php else: ?>
                            <span
                                class="px-4 py-2 bg-slate-100 text-slate-400 text-xs font-bold rounded-full uppercase tracking-widest">Replied</span>
                            <a href="update_inquiry.php?id=<?php echo $row['id']; ?>&status=pending"
                                class="text-dejj-blue font-bold">Unmark</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>

</html>