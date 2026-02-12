<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxiYa - Book Your Grand Taxi Seat</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E40AF',      // Blue
                        secondary: '#FBBF24',    // Yellow (taxi color)
                        accent: '#10B981',       // Green
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

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gray-50">
<!-- Navigation -->
<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center py-4">
            <a href="index.html" class="flex items-center gap-3">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-secondary to-yellow-300 rounded-xl flex items-center justify-center transform rotate-45">
                    <svg class="w-7 h-7 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                    </svg>
                </div>
                <span class="text-3xl font-display font-black text-dark">TaxiYa</span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="text-gray-700 hover:text-primary font-medium transition-colors">Search Rides</a>
                <a href="#how-it-works" class="text-gray-700 hover:text-primary font-medium transition-colors">How It
                    Works</a>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="px-6 py-2.5 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-all shadow-lg shadow-red-200">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="px-5 py-2.5 text-gray-700 font-semibold hover:text-primary transition-colors">Login</a>
                    <a href="{{ route('register') }}"
                       class="px-6 py-2.5 bg-primary text-white font-semibold rounded-lg hover:bg-blue-700 transition-all shadow-lg shadow-primary/30">
                        Sign Up
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-primary via-blue-700 to-blue-900 text-white py-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="taxi-pattern" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
                    <circle cx="50" cy="50" r="2" fill="white"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#taxi-pattern)"/>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <div
                    class="inline-block px-4 py-2 bg-secondary/20 text-secondary rounded-full text-sm font-semibold mb-6">
                    🚖 Morocco's Grand Taxi Revolution
                </div>
                <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">
                    Book Your Grand Taxi Seat in Seconds
                </h1>
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    No more waiting! Reserve your specific seat, know exact departure time, and pay online. Join 8
                    million Moroccans traveling smarter.
                </p>

                <!-- Quick Stats -->
                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div>
                        <div class="text-3xl font-black text-secondary">8M+</div>
                        <div class="text-sm text-blue-200">Daily Users</div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-secondary">6</div>
                        <div class="text-sm text-blue-200">Seats per Taxi</div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-secondary">100%</div>
                        <div class="text-sm text-blue-200">Guaranteed Seat</div>
                    </div>
                </div>
            </div>

            <!-- Search Card -->
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-8 shadow-2xl">
                <h3 class="text-2xl font-bold text-dark mb-6">Find Your Ride</h3>
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">From</label>
                            <select name="from" required
                                    class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all text-gray-900 bg-white">
                                <option value="" disabled selected>Select departure city</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ (isset($result) && request('from') == $city->id) ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">To</label>
                            <select name="to" required
                                    class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all text-gray-900 bg-white">
                                <option value="" disabled selected>Select arrival city</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ (isset($result) && request('to') == $city->id) ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Date</label>
                            <input type="date" name="date" value="{{ request('date') }}" required
                                   class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all text-gray-900">
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-blue-700 transform hover:-translate-y-0.5 transition-all shadow-lg shadow-primary/40 text-lg">
                        Search Available Rides
                    </button>
                </form>

                <div class="mt-6 flex items-center justify-center gap-2 text-sm text-gray-600">
                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                    </svg>
                    No waiting, instant confirmation
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-20 bg-white" id="how-it-works">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-dark mb-4">How TaxiYa Works</h2>
            <p class="text-xl text-gray-600">Simple, fast, and reliable. Book your seat in 3 easy steps.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-12">
            <!-- Step 1 -->
            <div class="text-center">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-primary to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <div class="text-6xl font-black text-primary/10 mb-4">01</div>
                <h3 class="text-2xl font-bold text-dark mb-3">Search</h3>
                <p class="text-gray-600 leading-relaxed">Enter your departure city, destination, and travel date to see
                    all available grand taxis.</p>
            </div>

            <!-- Step 2 -->
            <div class="text-center">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-secondary to-yellow-400 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div class="text-6xl font-black text-secondary/10 mb-4">02</div>
                <h3 class="text-2xl font-bold text-dark mb-3">Choose Your Seat</h3>
                <p class="text-gray-600 leading-relaxed">Select your preferred seat from the 6 available positions. See
                    which seats are already taken.</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-accent to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div class="text-6xl font-black text-accent/10 mb-4">03</div>
                <h3 class="text-2xl font-bold text-dark mb-3">Confirm & Go</h3>
                <p class="text-gray-600 leading-relaxed">Pay securely online and receive instant confirmation. Show up
                    at departure time, your seat is guaranteed!</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefits -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black text-dark mb-6">Why Choose TaxiYa?</h2>

                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-dark mb-2">No More Waiting</h4>
                            <p class="text-gray-600">Know exactly when your taxi departs. No unpredictable waiting
                                times.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-dark mb-2">Fixed Transparent Pricing</h4>
                            <p class="text-gray-600">See exact prices upfront. Pay online securely with no
                                surprises.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-dark mb-2">Guaranteed Seat</h4>
                            <p class="text-gray-600">Your reserved seat is guaranteed. No overbooking, no stress.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600&h=600&fit=crop"
                     alt="Grand Taxi" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -right-6 bg-white rounded-xl p-6 shadow-xl">
                    <div class="text-4xl font-black text-primary">6</div>
                    <div class="text-sm font-semibold text-gray-600">Seats Available</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA for Drivers -->
<section class="py-20 bg-gradient-to-r from-secondary to-yellow-300">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-black text-dark mb-4">Are You a Driver?</h2>
        <p class="text-xl text-gray-800 mb-8">
            Optimize your earnings, reduce waiting time, and manage your schedule efficiently
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @guest
                <a href="{{ route('register') }}"
                   class="px-10 py-4 bg-dark text-white font-bold rounded-xl hover:bg-gray-800 transition-all shadow-xl text-lg">
                    Register as Driver
                </a>
                <a href="{{ route('login') }}"
                   class="px-10 py-4 bg-white text-dark font-bold rounded-xl hover:bg-gray-100 transition-all shadow-xl text-lg">
                    Driver Login
                </a>
            @else
                <a href="{{ route('dashboard') }}"
                   class="px-10 py-4 bg-dark text-white font-bold rounded-xl hover:bg-gray-800 transition-all shadow-xl text-lg">
                    Go to Dashboard
                </a>
            @endguest
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-12 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-secondary to-yellow-300 rounded-lg flex items-center justify-center transform rotate-45">
                        <svg class="w-6 h-6 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-display font-black">TaxiYa</span>
                </div>
                <p class="text-gray-400">Revolutionizing Morocco's Grand Taxi experience</p>
            </div>

            <div>
                <h4 class="font-bold mb-4">For Travelers</h4>
                <ul class="space-y-2">
                    <li><a href="traveler/search.blade.php" class="text-gray-400 hover:text-white transition-colors">Search
                            Rides</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">How It Works</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Pricing</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">For Drivers</h4>
                <ul class="space-y-2">
                    @guest
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition-colors">Become a
                                Driver</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors">Driver
                                Login</a></li>
                    @else
                        <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white transition-colors">Dashboard</a></li>
                    @endguest
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Driver Benefits</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">Support</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Help Center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>

        <div class="text-center pt-8 border-t border-gray-800">
            <p class="text-gray-400">&copy; 2026 TaxiYa. All rights reserved. Made with 💛 in Morocco</p>
        </div>
    </div>
</footer>
</body>
</html>
