<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rides - TaxiYa Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {primary: '#1E40AF', secondary: '#FBBF24', accent: '#10B981', dark: '#111827'},
                    fontFamily: {display: ['Poppins', 'sans-serif'], body: ['Inter', 'sans-serif']}
                }
            }
        }
    </script>
    <style>body {
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3 {
            font-family: 'Poppins', sans-serif;
        }</style>
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
            <li><a href="{{ route('admin.travelers') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Travelers</a></li>
            <li><a href="{{ route('admin.rides') }}" class="flex items-center gap-3 px-4 py-3 bg-primary text-white rounded-xl transition-colors">Rides</a></li>
        </ul>
    </nav>
    <div class="p-6 border-t border-gray-800">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-3 text-gray-400 hover:text-white transition-colors w-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</aside>

<main class="flex-1 overflow-y-auto">
    <header class="bg-white shadow-sm sticky top-0 z-30 px-8 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-black text-dark">Rides Management</h1>
        <div class="w-10 h-10 bg-dark rounded-full flex items-center justify-center text-white font-bold">{{ substr(auth()->user()->name, 0, 1) }}</div>
    </header>

    <div class="p-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs text-gray-500 uppercase">
                <tr>
                    <th class="px-6 py-4">Ride ID</th>
                    <th class="px-6 py-4">Route</th>
                    <th class="px-6 py-4">Driver</th>
                    <th class="px-6 py-4">Departure</th>
                    <th class="px-6 py-4">Seats</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($rides as $ride)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-mono text-sm text-gray-500">
                            #{{ $ride->id }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-dark">
                            {{ $ride->departureCity->name }} → {{ $ride->arrivalCity->name }}
                        </td>

                        <td class="px-6 py-4 text-sm">
                            {{ $ride->cheffeur->name }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $ride->departure_date->format('Y M d, h:i A') }}
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <span class="font-bold text-dark">{{ $ride->booked_seats ?? 0 }}</span>/6 Booked
                        </td>

                        <td class="px-6 py-4">
                            @php
                                $statusClasses = match($ride->status) {
                                    'completed' => 'bg-green-100 text-green-700',
                                    'active'    => 'bg-blue-100 text-blue-700',
                                    'cancelled' => 'bg-red-100 text-red-700',
                                    'waiting'   => 'bg-yellow-100 text-yellow-700',
                                    default     => 'bg-gray-100 text-gray-700',
                                };
                            @endphp
                            <span class="px-2 py-1 rounded text-xs font-bold uppercase {{ $statusClasses }}">
                        {{ $ride->status }}
                    </span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.reservations', $ride->id) }}"
                               class="inline-flex items-center gap-1 px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary hover:text-white rounded-lg transition-all text-xs font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                View
                            </a>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.reservations', $ride->id) }}"
                               class="inline-flex items-center gap-1 px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary hover:text-white rounded-lg transition-all text-xs font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>
