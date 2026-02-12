<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Ride - TaxiYa</title>
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
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
                </a>
                <div class="flex items-center gap-6">
                    <a href="{{ route('driver.dashboard') }}" class="text-gray-700 hover:text-primary font-medium transition-colors">Dashboard</a>
                    <a href="#" class="text-primary font-semibold border-b-2 border-primary">Create Ride</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-12 bg-gradient-to-br from-primary to-blue-700 text-white">
        <div class="max-w-3xl mx-auto px-6">
            <h1 class="text-4xl font-black mb-2">Publish a Ride</h1>
            <p class="text-blue-100 italic">Fill in the details below to find passengers for your next trip.</p>
        </div>
    </section>

    <main class="max-w-3xl mx-auto px-6 -mt-10 mb-20">
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12">
                <form action="" method="POST" class="space-y-8">
                @csrf
                <input type="hidden" name="cheffeur_id" value="{{ auth()->user()->id }}">

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Departure City</label>
                        <select name="departure_city_id" required class="w-full bg-gray-50 border-2 border-gray-100 rounded-xl px-4 py-3 focus:border-primary focus:bg-white transition-all outline-none">
                            <option value="">Select departure</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Arrival City</label>
                        <select name="arrival_city_id" required class="w-full bg-gray-50 border-2 border-gray-100 rounded-xl px-4 py-3 focus:border-primary focus:bg-white transition-all outline-none">
                            <option value="">Select arrival</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr class="border-gray-100">

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Departure Date & Time</label>
                    <input type="datetime-local" name="departure_date" required class="w-full bg-gray-50 border-2 border-gray-100 rounded-xl px-4 py-3 focus:border-primary focus:bg-white transition-all outline-none">
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Price per Seat (MAD)</label>
                        <div class="relative">
                            <input type="number" name="price_per_seat" placeholder="e.g. 100" required class="w-full bg-gray-50 border-2 border-gray-100 rounded-xl pl-4 pr-12 py-3 focus:border-primary focus:bg-white transition-all outline-none">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold">DH</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Available Seats</label>
                        <div class="flex items-center gap-4 bg-gray-50 border-2 border-gray-100 rounded-xl px-4 py-2">
                             <input type="number" name="available_seats" min="1" max="8" value="4" required class="w-full bg-transparent border-none outline-none font-bold text-lg">
                             <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-secondary hover:bg-yellow-500 text-dark font-black py-4 rounded-xl shadow-lg shadow-yellow-200 transform transition-all active:scale-[0.98] flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                        PUBLISH THIS RIDE
                    </button>
                    <p class="text-center text-gray-400 text-xs mt-4">By publishing, you agree to TaxiYa's Driver Terms of Service.</p>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-dark text-white py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-gray-400">&copy; 2026 TaxiYa. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>