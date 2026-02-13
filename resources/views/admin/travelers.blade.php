<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelers - TaxiYa Admin</title>
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
            <li><a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Dashboard</a></li>
            <li><a href="{{ route('admin.drivers') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Drivers</a></li>
            <li><a href="{{ route('admin.travelers') }}" class="flex items-center gap-3 px-4 py-3 bg-primary text-white rounded-xl transition-colors">Travelers</a></li>
            <li><a href="{{ route('admin.rides') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Rides</a></li>
        </ul>
    </nav>
</aside>

<main class="flex-1 overflow-y-auto">
    <header class="bg-white shadow-sm sticky top-0 z-30 px-8 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-black text-dark">Travelers Directory</h1>
        <div class="w-10 h-10 bg-dark rounded-full flex items-center justify-center text-white font-bold">A</div>
    </header>

    <div class="p-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs text-gray-500 uppercase">
                <tr>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Total Rides</th>
                    <th class="px-6 py-4">Last Active</th>
                    <th class="px-6 py-4">Account Status</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse($travelers as $traveler)
                    @php
                        $isSuspended = $traveler->status === 'suspended';
                    @endphp
                    <tr class="hover:bg-gray-50 {{ $isSuspended ? 'bg-red-50/50' : '' }}">
                        <td class="px-6 py-4 font-semibold text-dark">
                            {{ $traveler->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $traveler->email }}
                        </td>
                        <td class="px-6 py-4 text-sm text-dark">
                            {{ $traveler->voyageur_trips_count }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{-- Bach t-affichi "2 hours ago" matalan --}}
                            {{ $traveler->last_active_at ? $traveler->last_active_at->diffForHumans() : 'Never' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="flex items-center">
                                <span class="w-2 h-2 {{ $isSuspended ? 'bg-red-500' : 'bg-green-500' }} rounded-full inline-block mr-2"></span>
                                <span class="capitalize">{{ $traveler->status }}</span>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">
                            No travelers found in the database.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>