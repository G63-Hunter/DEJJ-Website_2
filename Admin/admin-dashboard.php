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
    <title>Dashboard | Dejj Admin</title>
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
            <a href="#" class="flex items-center gap-4 px-6 py-4 bg-dejj-blue rounded-2xl font-bold">
                <i class="fa-solid fa-chart-line"></i> Dashboard
            </a>
            <a href="admin-projects.php"
                class="flex items-center gap-4 px-6 py-4 hover:bg-white/5 rounded-2xl transition-all">
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
            <div>
                <h1 class="text-3xl font-extrabold text-dejj-dark">Dashboard Overview</h1>
                <p class="text-slate-500 mt-1">Welcome back, Admin</p>
            </div>
            <button onclick="document.getElementById('add-modal').classList.remove('hidden')"
                class="bg-dejj-blue text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-dejj-blue/20 hover:bg-dejj-red transition-all flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> New Project
            </button>
        </header>

        <!-- Stats -->
        <?php
        // Fetch real counts
        $projectCount = $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn();
        $inquiryCount = $pdo->query("SELECT COUNT(*) FROM inquiries")->fetchColumn();
        $pendingInquiries = $pdo->query("SELECT COUNT(*) FROM inquiries WHERE status = 'pending'")->fetchColumn();
        ?>
        <div class="grid grid-cols-3 gap-8 mb-12">
            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-bold uppercase tracking-widest mb-2">Total Projects</p>
                <p class="text-4xl font-extrabold text-dejj-dark"><?php echo $projectCount; ?></p>
                <div class="mt-4 text-xs font-bold text-green-500 flex items-center gap-1">
                    <i class="fa-solid fa-arrow-up"></i> Ongoing works
                </div>
            </div>
            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-bold uppercase tracking-widest mb-2">New Inquiries</p>
                <p class="text-4xl font-extrabold text-dejj-red"><?php echo sprintf("%02d", $inquiryCount); ?></p>
                <div class="mt-4 text-xs font-bold text-dejj-blue flex items-center gap-1">
                    <i class="fa-solid fa-clock"></i> <?php echo $pendingInquiries; ?> pending review
                </div>
            </div>
            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-bold uppercase tracking-widest mb-2">Active Admins</p>
                <p class="text-4xl font-extrabold text-dejj-blue">01</p>
                <div class="mt-4 text-xs font-bold text-slate-400 flex items-center gap-1">
                    <i class="fa-solid fa-shield-halved"></i> Secured Access
                </div>
            </div>
        </div>

        <!-- Recent Projects Table -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                <h3 class="text-xl font-extrabold text-dejj-dark">Recent Projects</h3>
                <div class="flex gap-4">
                    <input type="text" placeholder="Search projects..."
                        class="px-6 py-2 rounded-xl bg-slate-50 border border-slate-100 focus:outline-none text-sm">
                </div>
            </div>
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-xs font-bold uppercase tracking-widest">
                        <th class="px-8 py-6">Project Name</th>
                        <th class="px-8 py-6">Type</th>
                        <th class="px-8 py-6">Location</th>
                        <th class="px-8 py-6">Status</th>
                        <th class="px-8 py-6">Date</th>
                        <th class="px-8 py-6">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php
                    $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 5");
                    while ($row = $stmt->fetch()):
                        $date = date('M d, Y', strtotime($row['created_at']));
                        ?>
                        <tr class="hover:bg-slate-50 transition-all">
                            <td class="px-8 py-6 font-bold text-dejj-dark"><?php echo htmlspecialchars($row['title']); ?>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 bg-dejj-blue/10 text-dejj-blue rounded-lg text-xs font-bold">
                                    <?php echo htmlspecialchars($row['category'] ?? 'Engineering'); ?>
                                </span>
                            </td>
                            <td class="px-8 py-6 text-slate-500"><?php echo htmlspecialchars($row['location']); ?></td>
                            <td class="px-8 py-6">
                                <span class="text-green-500 font-bold flex items-center gap-2">
                                    <i class="fa-solid fa-circle text-[8px]"></i> Active
                                </span>
                            </td>
                            <td class="px-8 py-6 text-slate-400 text-sm"><?php echo $date; ?></td>
                            <td class="px-8 py-6">
                                <div class="flex gap-3">
                                    <a href="edit_project.php?id=<?php echo $row['id']; ?>"
                                        class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center hover:bg-dejj-blue hover:text-white transition-all text-amber-500">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="delete_project.php?id=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this project?')"
                                        class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center hover:bg-dejj-red hover:text-white transition-all">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal Mockup -->
    <div id="add-modal"
        class="hidden fixed inset-0 bg-dejj-dark/90 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-2xl rounded-[3rem] p-12 relative">
            <button onclick="document.getElementById('add-modal').classList.add('hidden')"
                class="absolute top-8 right-8 text-slate-400 hover:text-dejj-red"><i
                    class="fa-solid fa-xmark text-2xl"></i></button>
            <h2 class="text-3xl font-extrabold text-dejj-dark mb-8">Add New Project</h2>
            <form action="add_project.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Project Title</label>
                        <input type="text" name="title" required
                            class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none"
                            placeholder="e.g. Mbale Water Point">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Location</label>
                        <input type="text" name="location" required
                            class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none"
                            placeholder="e.g. Mbale, Eastern">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Category</label>
                    <select name="category" required
                        class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none">
                        <option value="Drilling">Borehole Drilling</option>
                        <option value="Survey">Hydrogeological Survey</option>
                        <option value="Consultancy">Water Consultancy</option>
                        <option value="Engineering">Civil/Structural Engineering</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Project
                        Description</label>
                    <textarea name="description" rows="3" required
                        class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-slate-100 focus:outline-none"
                        placeholder="Brief project summary..."></textarea>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Project Media (Images &
                        Videos)</label>
                    <input type="file" name="media[]" accept="image/*,video/*" multiple required
                        class="w-full px-6 py-4 rounded-2xl bg-slate-50 border border-dashed border-slate-200">
                    <p class="text-[10px] text-slate-400 italic">You can select multiple files at once.</p>
                </div>
                <button type="submit"
                    class="w-full py-4 bg-dejj-blue text-white rounded-2xl font-bold hover:bg-dejj-red transition-all">Save
                    Project</button>
            </form>
        </div>
    </div>
</body>

</html>