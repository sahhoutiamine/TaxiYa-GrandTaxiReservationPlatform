<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard - TaxiYa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E40AF',
                        secondary: '#FBBF24',
                        accent: '#10B981',
                        dark: '#111827',
                    },
                    fontFamily: {
                        display: ['Poppins', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-secondary to-yellow-300 rounded-xl flex items-center justify-center transform rotate-45">
                        <svg class="w-7 h-7 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-display font-black text-dark">TaxiYa</span>
                    <span class="px-2 py-1 bg-secondary/20 text-secondary text-xs font-bold rounded">DRIVER</span>
                </a>

                <div class="flex items-center gap-6">
                    <a href="{{ route('driver.dashboard') }}" class="text-primary font-semibold">Dashboard</a>
                    <a href="{{ route('rides.create') }}" class="text-gray-700 hover:text-primary font-medium transition-colors">Create Ride</a>
                    <a href="#" class="text-gray-700 hover:text-primary font-medium transition-colors">Earnings</a>
                    <div class="flex items-center gap-3 pl-6 border-l border-gray-200">
                        <div class="text-right">
                            <div class="text-xs text-gray-500">Driver</div>
                            <div class="font-semibold">{{ $driver->name }}</div>
                        </div>
                        <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr($driver->name, 0, 1)) }}
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition-all text-sm flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Stats Cards -->
    <section class="py-8 bg-gradient-to-br from-primary to-blue-700">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-sm font-semibold text-blue-200">Today's Rides</div>
                        <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-black">{{ $todaysRidesCount }}</div>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-sm font-semibold text-blue-200">Confirmed Seats</div>
                        <svg class="w-8 h-8 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-black">{{ $confirmedSeatsCount }}/{{ $totalSeatsCapacity }}</div>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-sm font-semibold text-blue-200">Today's Earnings</div>
                        <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-black">{{ number_format($todaysEarnings, 2) }} MAD</div>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-sm font-semibold text-blue-200">Rating</div>
                        <svg class="w-8 h-8 text-secondary fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-black">{{ $formattedRating }}<span class="text-xl text-blue-200">/5</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-black text-dark">My Rides</h2>
                <a href="{{ route('rides.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-blue-700 transition-all shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create New Ride
                </a>
            </div>

            <!-- Ride Cards -->
            <div class="space-y-6">
                <!-- Active Ride -->
            @forelse($trips as $trip)
                <div class="bg-white rounded-2xl p-6 shadow-lg {{ $trip->departure_date->isToday() ? 'border-2 border-primary' : '' }}">
                    <div class="flex items-center gap-2 mb-4">
                        @if($trip->departure_date->isToday())
                            <span class="px-3 py-1 bg-accent/10 text-accent text-xs font-bold rounded-full">ACTIVE TODAY</span>
                        @else
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">UPCOMING</span>
                        @endif
                        <span class="text-sm text-gray-500">Ride #{{ $trip->id }}</span>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <div class="flex justify-between mb-4">
                                <div>
                                    <div class="text-sm text-gray-600 mb-1">From</div>
                                    <div class="text-xl font-bold text-dark">{{ $trip->departureCity->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $trip->departure_date->format('g:i A') }}</div>
                                </div>
                                <svg class="w-8 h-8 text-primary self-center" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                                <div class="text-right">
                                    <div class="text-sm text-gray-600 mb-1">To</div>
                                    <div class="text-xl font-bold text-dark">{{ $trip->arrivalCity->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $trip->departure_date->addHours(2)->format('g:i A') }}</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span>📅 {{ $trip->departure_date->format('M d, Y') }}</span>
                                <span>⏱️ 2h 00m</span>
                                <span class="font-semibold text-primary">{{ number_format($trip->price_per_seat, 0) }} MAD/seat</span>
                            </div>
                        </div>

                        <div>
                            <div class="mb-3">
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="font-semibold text-dark">Seats Booked</span>
                                    <span class="text-primary font-bold">{{ $trip->reservations->count() }} of 6</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div class="bg-primary h-3 rounded-full" style="width: {{ ($trip->reservations->count() / 6) * 100 }}%"></div>
                                </div>
                            </div>

                            <!-- Seat Status -->
                            <div class="grid grid-cols-6 gap-2 mb-4">
                                <div class="aspect-square bg-gray-300 rounded flex items-center justify-center text-xs font-bold text-gray-500" title="Driver">
                                    D
                                </div>
                                @php
                                    $reservedSeats = $trip->reservations->pluck('seat')->toArray();
                                @endphp
                                @for($i = 1; $i <= 6; $i++)
                                    @php
                                        $isBooked = in_array($i, $reservedSeats);
                                    @endphp
                                    <div class="aspect-square {{ $isBooked ? 'bg-accent text-white' : 'bg-gray-200 text-gray-400' }} rounded flex items-center justify-center text-xs font-bold" title="{{ $isBooked ? 'Booked' : 'Available' }}">
                                        {{ $i }}
                                    </div>
                                @endfor
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-blue-700 transition-all text-sm">
                                    View Passengers
                                </button>
                                <button class="px-4 py-2 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:border-primary transition-all text-sm">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl p-12 shadow-lg text-center flex flex-col items-center justify-center">
                    <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-dark mb-3">No Active Trips Found</h3>
                    <p class="text-gray-500 max-w-md mb-8">You haven't scheduled any upcoming trips yet. Start by creating a new ride to begin accepting passengers.</p>
                    
                    <a href="{{ route('rides.create') }}" class="px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-primary/30 flex items-center gap-2 transform hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Create Your First Ride
                    </a>
                </div>
            @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-gray-400">&copy; 2026 TaxiYa. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
