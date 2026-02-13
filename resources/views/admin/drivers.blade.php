<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers - TaxiYa Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { primary: '#1E40AF', secondary: '#FBBF24', accent: '#10B981', dark: '#111827' },
                    fontFamily: { display: ['Poppins', 'sans-serif'], body: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>body { font-family: 'Inter', sans-serif; } h1, h2, h3 { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-gray-100 h-screen flex overflow-hidden">

<aside class="w-64 bg-dark text-white flex flex-col hidden md:flex">
    <div class="p-6 flex items-center gap-3 border-b border-gray-800">
        <span class="text-2xl font-display font-black tracking-tight text-secondary">TaxiYa</span>
    </div>
    <nav class="flex-1 overflow-y-auto py-6">
        <ul class="space-y-2 px-4">
            <li><a href="dashboard.html" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Dashboard</a></li>
            <li><a href="drivers.html" class="flex items-center gap-3 px-4 py-3 bg-primary text-white rounded-xl transition-colors">Drivers</a></li>
            <li><a href="travelers.html" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Travelers</a></li>
            <li><a href="rides.html" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Rides</a></li>
        </ul>
    </nav>
</aside>

<main class="flex-1 overflow-y-auto">
    <header class="bg-white shadow-sm sticky top-0 z-30 px-8 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-black text-dark">All Drivers</h1>
        <div class="w-10 h-10 bg-dark rounded-full flex items-center justify-center text-white font-bold">A</div>
    </header>

    <div class="p-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs text-gray-500 uppercase">
                <tr>
                    <th class="px-6 py-4">Driver Details</th>
                    <th class="px-6 py-4">Vehicle</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Rating</th>
                    <th class="px-6 py-4">Joined</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold">M</div>
                            <div>
                                <div class="font-semibold text-dark">Mohamed El Fassi</div>
                                <div class="text-xs text-gray-500">+212 600-123456</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">Mercedes 240d (White)</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-bold">VERIFIED</span></td>
                    <td class="px-6 py-4 font-bold text-dark">4.8 ★</td>
                    <td class="px-6 py-4 text-sm text-gray-500">Jan 10, 2026</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">K</div>
                            <div>
                                <div class="font-semibold text-dark">Kamal Bennani</div>
                                <div class="text-xs text-gray-500">+212 600-987654</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">Dacia Lodgy (Silver)</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-bold">PENDING</span></td>
                    <td class="px-6 py-4 text-gray-400">-</td>
                    <td class="px-6 py-4 text-sm text-gray-500">Feb 12, 2026</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>
