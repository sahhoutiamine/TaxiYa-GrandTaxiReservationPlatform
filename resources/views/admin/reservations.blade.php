<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - TaxiYa Admin</title>
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
            <li><a href="drivers.html" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Drivers</a></li>
            <li><a href="travelers.html" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-xl transition-colors">Travelers</a></li>
            <li><a href="rides.html" class="flex items-center gap-3 px-4 py-3 bg-primary text-white rounded-xl transition-colors">Rides</a></li>
        </ul>
    </nav>
</aside>

<main class="flex-1 overflow-y-auto">
    <header class="bg-white shadow-sm sticky top-0 z-30 px-8 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-black text-dark">Reservations</h1>
        <div class="w-10 h-10 bg-dark rounded-full flex items-center justify-center text-white font-bold">A</div>
    </header>

    <div class="p-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs text-gray-500 uppercase">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Traveler</th>
                    <th class="px-6 py-4">Trip Details</th>
                    <th class="px-6 py-4">Seats</th>
                    <th class="px-6 py-4">Total Price</th>
                    <th class="px-6 py-4">Status</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse($reservations as $reservation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-sm text-gray-500">
                            #{{ $reservation->id }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="font-semibold text-dark">{{ $reservation->user->name }}</div>
                            <div class="text-xs text-gray-500">{{ $reservation->user->email }}</div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-dark">
                                {{ $reservation->trip->departureCity->name }} → {{ $reservation->trip->arrivalCity->name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $reservation->trip->departure_date->format('M d, h:i A') }}
                            </div>
                        </td>

                        <td class="px-6 py-4 text-sm font-bold text-dark">
                            {{ $reservation->seat }}
                        </td>

                        <td class="px-6 py-4 text-sm text-primary font-bold">
                            {{ number_format($reservation->total_price, 2) }} MAD
                        </td>

                        <td class="px-6 py-4">
                            @php
                                $statusClasses = match($reservation->status) {
                                    'confirmed' => 'bg-green-100 text-green-700',
                                    'pending'   => 'bg-yellow-100 text-yellow-700',
                                    'cancelled' => 'bg-red-100 text-red-700',
                                    default     => 'bg-gray-100 text-gray-700',
                                };
                            @endphp
                            <span class="px-2 py-1 rounded text-xs font-bold uppercase {{ $statusClasses }}">
                                {{ $reservation->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <p class="text-lg font-medium text-dark">No reservations found</p>
                                <p class="text-sm text-gray-400">There are no bookings for this trip yet.</p>
                            </div>
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
