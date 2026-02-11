<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - TaxiYa</title>

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
            <a href="../index.html" class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-secondary to-yellow-300 rounded-xl flex items-center justify-center transform rotate-45">
                    <svg class="w-7 h-7 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                    </svg>
                </div>
                <span class="text-3xl font-display font-black text-dark">TaxiYa</span>
            </a>

            <div class="flex items-center gap-6">
                <a href="search.html" class="text-primary font-semibold">Search</a>
                <a href="bookings.html" class="text-gray-700 hover:text-primary font-medium transition-colors">My Bookings</a>
                <div class="flex items-center gap-3 pl-6 border-l border-gray-200">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                        A
                    </div>
                    <button class="text-gray-600 hover:text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Search Bar -->
<section class="bg-white border-b shadow-sm sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <form class="flex gap-4" action="#" method="post">
            <div class="flex-1">
                <select name="from"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none bg-white">
                    <option value="" disabled selected>Select departure city</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <select name="to"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none bg-white">
                    <option value="" disabled selected>Select departure city</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <input type="date" name="date" value="2026-02-15"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none">
            </div>
            <button type="submit" class="px-8 py-3 bg-primary text-white font-bold rounded-lg hover:bg-blue-700 transition-all">
                Search
            </button>
        </form>
    </div>
</section>

<!-- Results -->
<section class="py-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Filters Sidebar -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-xl p-6 shadow-sm sticky top-32">
                    <h3 class="font-bold text-dark mb-4">Filters</h3>

                    <!-- Time Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Departure Time</h4>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                                <span class="text-sm">Morning (6AM-12PM)</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                                <span class="text-sm">Afternoon (12PM-6PM)</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                                <span class="text-sm">Evening (6PM-12AM)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Max Price</h4>
                        <input type="range" min="50" max="200" value="150" class="w-full">
                        <div class="flex justify-between text-sm text-gray-600 mt-2">
                            <span>50 MAD</span>
                            <span class="font-semibold text-primary">150 MAD</span>
                        </div>
                    </div>

                    <!-- Seat Type -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Seat Preference</h4>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="seat" class="w-4 h-4 border-gray-300 text-primary focus:ring-primary">
                                <span class="text-sm">Front Seats (+20%)</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="seat" class="w-4 h-4 border-gray-300 text-primary focus:ring-primary">
                                <span class="text-sm">Back Seats</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="seat" checked class="w-4 h-4 border-gray-300 text-primary focus:ring-primary">
                                <span class="text-sm">Any Available</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Results List -->
            <div class="md:col-span-3">
                <div class="mb-6">
                    <h2 class="text-2xl font-black text-dark mb-2">Available Rides</h2>
                    <p class="text-gray-600">12 rides found from Casablanca to Marrakech on Feb 15, 2026</p>
                </div>

                <div class="space-y-6">
                    <!-- Ride Card 1 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all border-2 border-transparent hover:border-primary">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="px-3 py-1 bg-accent/10 text-accent text-xs font-bold rounded-full">Verified Driver</span>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                        <span class="text-sm font-semibold">4.8</span>
                                    </div>
                                </div>
                                <h3 class="font-bold text-lg text-dark">Mohamed El Fassi</h3>
                                <p class="text-sm text-gray-600">White Mercedes - ABC 12345</p>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-black text-primary">100 MAD</div>
                                <div class="text-sm text-gray-600">per seat</div>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4 mb-6 p-4 bg-gray-50 rounded-xl">
                            <div>
                                <div class="text-xs text-gray-600 mb-1">Departure</div>
                                <div class="font-bold text-dark">08:00 AM</div>
                                <div class="text-sm text-gray-600">Casablanca</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-gray-600 mb-1">Duration</div>
                                <div class="font-bold text-dark">3h 30m</div>
                                <svg class="w-6 h-6 text-primary mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </div>
                            <div class="text-right">
                                <div class="text-xs text-gray-600 mb-1">Arrival</div>
                                <div class="font-bold text-dark">11:30 AM</div>
                                <div class="text-sm text-gray-600">Marrakech</div>
                            </div>
                        </div>

                        <!-- Seat Visualization -->
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="font-semibold text-dark">Select Your Seat</h4>
                                <span class="text-sm text-gray-600">3 of 6 available</span>
                            </div>

                            <!-- Taxi Seats Layout -->
                            <div class="bg-gradient-to-b from-gray-100 to-gray-200 rounded-xl p-6 relative">
                                <div class="text-center text-xs font-semibold text-gray-600 mb-4">FRONT</div>

                                <!-- Driver Seat (Not Selectable) -->
                                <div class="mb-4">
                                    <div class="grid grid-cols-2 gap-3 max-w-xs mx-auto">
                                        <div class="bg-gray-400 rounded-lg p-4 flex items-center justify-center cursor-not-allowed opacity-50">
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                            </svg>
                                        </div>
                                        <!-- Seat 1 - Front Right (Available) -->
                                        <button onclick="selectSeat(this, 1)" class="seat-btn bg-accent hover:bg-accent/80 rounded-lg p-4 font-bold text-white transition-all transform hover:scale-105 shadow-lg">
                                            1
                                            <div class="text-xs font-normal mt-1">120 MAD</div>
                                        </button>
                                    </div>
                                </div>

                                <!-- Back Seats -->
                                <div class="mb-4">
                                    <div class="grid grid-cols-3 gap-3">
                                        <!-- Seat 2 - Taken -->
                                        <button class="bg-gray-300 rounded-lg p-4 font-bold text-gray-500 cursor-not-allowed" disabled>
                                            2
                                            <div class="text-xs font-normal mt-1">Taken</div>
                                        </button>
                                        <!-- Seat 3 - Available -->
                                        <button onclick="selectSeat(this, 3)" class="seat-btn bg-accent hover:bg-accent/80 rounded-lg p-4 font-bold text-white transition-all transform hover:scale-105 shadow-lg">
                                            3
                                            <div class="text-xs font-normal mt-1">100 MAD</div>
                                        </button>
                                        <!-- Seat 4 - Taken -->
                                        <button class="bg-gray-300 rounded-lg p-4 font-bold text-gray-500 cursor-not-allowed" disabled>
                                            4
                                            <div class="text-xs font-normal mt-1">Taken</div>
                                        </button>
                                    </div>
                                </div>

                                <!-- Back Row Seats -->
                                <div>
                                    <div class="grid grid-cols-3 gap-3">
                                        <!-- Seat 5 - Available -->
                                        <button onclick="selectSeat(this, 5)" class="seat-btn bg-accent hover:bg-accent/80 rounded-lg p-4 font-bold text-white transition-all transform hover:scale-105 shadow-lg">
                                            5
                                            <div class="text-xs font-normal mt-1">100 MAD</div>
                                        </button>
                                        <!-- Seat 6 - Taken -->
                                        <button class="bg-gray-300 rounded-lg p-4 font-bold text-gray-500 cursor-not-allowed" disabled>
                                            6
                                            <div class="text-xs font-normal mt-1">Taken</div>
                                        </button>
                                        <!-- Empty space for layout -->
                                        <div></div>
                                    </div>
                                </div>

                                <div class="text-center text-xs font-semibold text-gray-600 mt-4">BACK</div>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <button onclick="bookSeat()" class="flex-1 px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-blue-700 transition-all shadow-lg disabled:opacity-50 disabled:cursor-not-allowed" id="bookBtn" disabled>
                                Select a Seat to Continue
                            </button>
                            <button class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:border-primary hover:text-primary transition-all">
                                View Details
                            </button>
                        </div>
                    </div>

                    <!-- More ride cards would go here... -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="text-center text-gray-500 py-8">
                            <p>More rides available... (Sample shows 1 of 12)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-12 mt-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="text-gray-400">&copy; 2026 TaxiYa. All rights reserved.</p>
    </div>
</footer>

<script>
    let selectedSeat = null;
    let selectedPrice = 0;

    function selectSeat(button, seatNumber) {
        // Remove previous selection
        document.querySelectorAll('.seat-btn').forEach(btn => {
            btn.classList.remove('ring-4', 'ring-primary', 'bg-primary');
            btn.classList.add('bg-accent');
        });

        // Highlight selected
        button.classList.remove('bg-accent');
        button.classList.add('bg-primary', 'ring-4', 'ring-primary');

        selectedSeat = seatNumber;
        selectedPrice = button.querySelector('.text-xs').textContent;

        // Enable book button
        const bookBtn = document.getElementById('bookBtn');
        bookBtn.disabled = false;
        bookBtn.textContent = `Book Seat ${seatNumber} - ${selectedPrice}`;
    }

    function bookSeat() {
        if (selectedSeat) {
            alert(`Booking seat ${selectedSeat} for ${selectedPrice}!\nRedirecting to payment...`);
            // In real app, redirect to payment page
            window.location.href = 'booking-confirm.html';
        }
    }
</script>
</body>
</html>
