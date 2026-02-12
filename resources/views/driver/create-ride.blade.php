<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Ride - TaxiYa Driver</title>
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
                <div class="w-12 h-12 bg-gradient-to-br from-secondary to-yellow-300 rounded-xl flex items-center justify-center transform rotate-45 shadow-lg shadow-secondary/20">
                    <svg class="w-7 h-7 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                    </svg>
                </div>
                <span class="text-3xl font-display font-black text-dark">TaxiYa</span>
            </a>

            <div class="flex items-center gap-6">
                <a href="{{ route('driver.dashboard') }}" class="text-gray-700 hover:text-primary font-medium transition-colors">Dashboard</a>
                <a href="#" class="text-primary font-bold border-b-2 border-primary">Create Ride</a>
                <div class="flex items-center gap-3 pl-6 border-l border-gray-200">
                    <div class="text-right">
                        <div class="text-xs text-gray-500">Driver</div>
                        <div class="font-semibold">{{ auth()->user()->name }}</div>
                    </div>
                    <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold shadow-md">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<section class="py-12 bg-gradient-to-br from-primary to-blue-700 text-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center gap-4 mb-4">
            <span class="px-3 py-1 bg-white/20 backdrop-blur-md text-white text-xs font-bold rounded-full uppercase tracking-widest">New Journey</span>
        </div>
        <h1 class="text-4xl font-black mb-2">Publish a Ride</h1>
        <p class="text-blue-100 italic">Set your route and adjust your price if needed.</p>
    </div>
</section>

<section class="py-10 -mt-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <form action="{{ route('rides.store') }}" method="POST" class="bg-white rounded-3xl shadow-xl p-8 space-y-8 border border-gray-100">
                    @csrf
                    
                    <input type="hidden" name="distance" id="inputDistance" value="{{ $distance ?? 0 }}">

                    <div>
                        <h3 class="text-lg font-bold text-dark mb-6 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-secondary text-dark flex items-center justify-center font-black shadow-lg shadow-secondary/30">1</div>
                            Route & Time
                        </h3>

                        <div class="grid md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-500 uppercase tracking-wider">Departure City</label>
                                <select name="departure_city_id" id="inputFrom" required onchange="updatePreview()"
                                    class="w-full px-4 py-4 border-2 border-gray-100 rounded-2xl focus:border-secondary outline-none transition-all text-dark font-semibold bg-gray-50/50">
                                    <option value="" disabled selected>Where from?</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" data-name="{{ $city->name }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-500 uppercase tracking-wider">Destination City</label>
                                <select name="arrival_city_id" id="inputTo" required onchange="updatePreview()"
                                    class="w-full px-4 py-4 border-2 border-gray-100 rounded-2xl focus:border-secondary outline-none transition-all text-dark font-semibold bg-gray-50/50">
                                    <option value="" disabled selected>Where to?</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" data-name="{{ $city->name }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2 max-w-md">
                            <label class="text-sm font-bold text-gray-500 uppercase tracking-wider">Departure Date & Time</label>
                            <input type="datetime-local" name="departure_date" id="inputDate" required class="w-full px-4 py-4 border-2 border-gray-100 rounded-2xl focus:border-primary outline-none bg-gray-50/50 font-medium" oninput="updatePreview()">
                        </div>
                        <div class="space-y-2 max-w-md mt-4">
                            <label class="text-sm font-bold text-gray-500 uppercase tracking-wider">Available Seats</label>
                            <input type="number" name="available_seats" id="inputSeats" min="1" max="8" value="4" required class="w-full px-4 py-4 border-2 border-gray-100 rounded-2xl focus:border-primary outline-none bg-gray-50/50 font-medium" oninput="updatePreview()">
                        </div>
                    </div>

                    <hr class="border-gray-50">

                    <div>
                        <h3 class="text-lg font-bold text-dark mb-6 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-secondary text-dark flex items-center justify-center font-black shadow-lg shadow-secondary/30">2</div>
                            Pricing Strategy
                        </h3>

                        <div class="flex flex-col md:flex-row gap-8 items-stretch">
                            <div class="w-full md:w-1/2 space-y-2">
                                <label class="text-sm font-bold text-gray-500 uppercase tracking-wider">Price per Seat (Adjustable)</label>
                                <div class="relative">
                                    <input type="number" name="price_per_seat" id="inputPrice" 
                                           value="{{ $price ?? 120 }}" 
                                           min="10"
                                           required
                                           class="w-full pl-6 pr-16 py-5 border-2 border-primary/20 rounded-2xl focus:border-primary focus:bg-white transition-all text-2xl font-black text-primary bg-blue-50/30 outline-none"
                                           oninput="updatePreview()">
                                    <div class="absolute right-6 top-5 text-primary font-black">MAD</div>
                                </div>
                                <p class="text-[10px] text-gray-400 italic mt-1 font-medium">We've suggested a price, but you can set your own.</p>
                            </div>

                            <div class="w-full md:w-1/2 bg-gradient-to-br from-primary to-blue-800 rounded-3xl p-6 text-white shadow-xl shadow-primary/20 flex flex-col justify-center border border-white/10">
                                <span class="text-blue-200 text-xs font-bold uppercase tracking-widest mb-1">Potential Earnings</span>
                                <div class="text-4xl font-black" id="totalEarnings">0 MAD</div>
                                <div class="text-[10px] text-blue-200 mt-2 opacity-80 italic">* Total for <span id="previewSeatsCount">{{ $seats ?? 6 }}</span> seats</div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full py-5 bg-primary text-white font-black text-lg rounded-2xl hover:bg-blue-800 transition-all shadow-xl shadow-primary/30 transform active:scale-[0.98] flex items-center justify-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                            PUBLISH RIDE
                        </button>
                    </div>
                </form>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-28">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-2 h-2 bg-accent rounded-full animate-pulse"></div>
                        <h3 class="font-bold text-gray-400 text-xs uppercase tracking-widest">Live Preview</h3>
                    </div>
                    
                    <div class="bg-white rounded-3xl p-6 shadow-2xl border-2 border-primary/5">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center font-bold text-primary">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <div>
                                    <h3 class="font-bold text-dark">{{ auth()->user()->name }}</h3>
                                    <div class="flex text-secondary text-[10px]">★★★★★</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-black text-primary" id="previewPrice">{{ $price ?? 120 }} MAD</div>
                                <div class="text-[10px] text-gray-400 uppercase font-bold">per seat</div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4 space-y-4 border border-gray-100 mb-6">
                            <div class="relative pl-6 border-l-2 border-dashed border-primary/30 space-y-6">
                                <div class="relative">
                                    <div class="absolute -left-[31px] top-0 w-4 h-4 rounded-full bg-primary border-4 border-white"></div>
                                    <div class="font-bold text-dark" id="previewFrom">---</div>
                                    <div class="text-xs text-primary font-medium" id="previewTime">--:--</div>
                                </div>
                                <div class="relative">
                                    <div class="absolute -left-[31px] top-0 w-4 h-4 rounded-full bg-secondary border-4 border-white"></div>
                                    <div class="font-bold text-dark" id="previewTo">---</div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between items-center px-2">
                             <span class="text-xs font-bold text-gray-500 uppercase">Available</span>
                             <span class="text-accent font-black text-xs"><span id="previewSeatsText">{{ $seats ?? 6 }}</span> Seats</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function updatePreview() {
        // Elements
        const fromSelect = document.getElementById('inputFrom');
        const toSelect = document.getElementById('inputTo');
        const priceInput = document.getElementById('inputPrice');
        const seatsInput = document.getElementById('inputSeats');
        
        // Values
        const fromName = fromSelect.options[fromSelect.selectedIndex]?.getAttribute('data-name') || '---';
        const toName = toSelect.options[toSelect.selectedIndex]?.getAttribute('data-name') || '---';
        
        const dateTime = document.getElementById('inputDate').value;
        const time = dateTime ? new Date(dateTime).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) : '--:--';
        
        const price = parseInt(priceInput.value) || 0;
        const seats = parseInt(seatsInput.value) || 0;

        // Update UI
        document.getElementById('previewFrom').textContent = fromName;
        document.getElementById('previewTo').textContent = toName;
        document.getElementById('previewTime').textContent = time;
        document.getElementById('previewPrice').textContent = price + ' MAD';
        document.getElementById('totalEarnings').textContent = (price * seats) + ' MAD';
        document.getElementById('previewSeatsCount').textContent = seats;
        document.getElementById('previewSeatsText').textContent = seats;
    }

    // Initialize on load to show controller defaults
    window.onload = updatePreview;
</script>
</body>
</html>