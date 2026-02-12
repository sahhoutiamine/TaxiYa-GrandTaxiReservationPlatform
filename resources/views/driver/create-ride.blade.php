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
            <a href="../index.html" class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-secondary to-yellow-300 rounded-xl flex items-center justify-center transform rotate-45">
                    <svg class="w-7 h-7 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                    </svg>
                </div>
                <span class="text-3xl font-display font-black text-dark">TaxiYa</span>
                <span class="px-2 py-1 bg-secondary/20 text-secondary text-xs font-bold rounded">DRIVER</span>
            </a>

            <div class="flex items-center gap-6">
                <a href="dashboard.html" class="text-gray-700 hover:text-primary font-medium transition-colors">Dashboard</a>
                <a href="create-ride.html" class="text-primary font-bold">Create Ride</a>
                <a href="earnings.html" class="text-gray-700 hover:text-primary font-medium transition-colors">Earnings</a>
                <div class="flex items-center gap-3 pl-6 border-l border-gray-200">
                    <div class="text-right">
                        <div class="text-xs text-gray-500">Driver</div>
                        <div class="font-semibold">Mohamed El Fassi</div>
                    </div>
                    <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold">
                        M
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<section class="py-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-dark">Plan a New Journey</h1>
            <p class="text-gray-600">Fill in the details to publish your ride and get passengers.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <form class="bg-white rounded-2xl shadow-lg p-8 space-y-8">

                    <div>
                        <h3 class="text-lg font-bold text-dark mb-4 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-primary flex items-center justify-center text-sm">1</div>
                            Route Details
                        </h3>

                        <div class="grid md:grid-cols-2 gap-6 relative">
                            <div class="hidden md:block absolute top-10 left-1/2 -translate-x-1/2 w-8 h-1 bg-gray-200"></div>

                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-700">From (Departure)</label>
                                <div class="relative">
                                    <input type="text" id="inputFrom" placeholder="e.g. Casablanca" class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all" oninput="updatePreview()">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-700">To (Destination)</label>
                                <div class="relative">
                                    <input type="text" id="inputTo" placeholder="e.g. Marrakech" class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all" oninput="updatePreview()">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    <div>
                        <h3 class="text-lg font-bold text-dark mb-4 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-primary flex items-center justify-center text-sm">2</div>
                            Schedule & Distance
                        </h3>

                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-700">Date</label>
                                <input type="date" id="inputDate" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all" oninput="updatePreview()">
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-700">Departure Time</label>
                                <input type="time" id="inputTime" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all" oninput="updatePreview()">
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-700">Total Distance (km)</label>
                                <div class="relative">
                                    <input type="number" id="inputDistance" placeholder="e.g. 240" min="1" class="w-full pl-4 pr-12 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all" oninput="updatePreview()">
                                    <div class="absolute right-4 top-3.5 text-xs font-bold text-gray-400">KM</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    <div>
                        <h3 class="text-lg font-bold text-dark mb-4 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-primary flex items-center justify-center text-sm">3</div>
                            Pricing & Seats
                        </h3>

                        <div class="flex flex-col md:flex-row gap-8 items-start">
                            <div class="w-full md:w-1/2 space-y-2">
                                <label class="text-sm font-semibold text-gray-700">Price per Seat (MAD)</label>
                                <div class="relative">
                                    <input type="number" id="inputPrice" value="100" min="50" step="10" class="w-full pl-4 pr-12 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all font-bold text-lg" oninput="updatePreview()">
                                    <div class="absolute right-4 top-3.5 text-gray-500 font-medium">MAD</div>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">
                                    <span class="text-accent font-bold">Note:</span> Front seat will be automatically priced at <span id="frontSeatPrice">120</span> MAD (+20%)
                                </p>
                            </div>

                            <div class="w-full md:w-1/2 bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-semibold text-gray-600">Total Potential Earnings</span>
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="text-3xl font-black text-primary" id="totalEarnings">620 MAD</div>
                                <div class="text-xs text-gray-500 mt-1">Based on full occupancy (6 seats)</div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 flex gap-4">
                        <button type="button" class="flex-1 py-4 bg-primary text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            Publish Ride
                        </button>
                        <button type="button" class="px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 font-bold rounded-xl hover:border-gray-400 transition-all">
                            Save Draft
                        </button>
                    </div>

                </form>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wider mb-4">Traveler Preview</h3>

                    <div class="bg-white rounded-2xl p-6 shadow-xl border-2 border-primary/10">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="px-2 py-1 bg-accent/10 text-accent text-[10px] font-bold rounded-full">UPCOMING</span>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                        <span class="text-xs font-bold">4.8</span>
                                    </div>
                                </div>
                                <h3 class="font-bold text-md text-dark">Mohamed El Fassi</h3>
                                <p class="text-xs text-gray-500">White Mercedes - ABC 12345</p>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-black text-primary" id="previewPrice">100 MAD</div>
                                <div class="text-[10px] text-gray-500">per seat</div>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-2 mb-6 p-3 bg-gray-50 rounded-xl border border-gray-100">
                            <div>
                                <div class="text-[10px] text-gray-500 mb-1">Departure</div>
                                <div class="font-bold text-sm text-dark" id="previewTime">--:--</div>
                                <div class="text-[10px] text-gray-500 truncate" id="previewFrom">Casablanca</div>
                            </div>

                            <div class="text-center pt-1">
                                <div class="text-[10px] text-gray-500 mb-0.5" id="previewDuration">--h --m</div>
                                <svg class="w-full h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </div>

                            <div class="text-center pt-1 border-l border-gray-200">
                                <div class="text-[10px] text-gray-500 mb-0.5">Distance</div>
                                <div class="font-bold text-xs text-dark" id="previewDistance">-- km</div>
                            </div>

                            <div class="text-right">
                                <div class="text-[10px] text-gray-500 mb-1">Arrival</div>
                                <div class="font-bold text-sm text-dark">--:--</div>
                                <div class="text-[10px] text-gray-500 truncate" id="previewTo">Marrakech</div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="font-semibold text-gray-600">Seat Availability</span>
                                <span class="text-accent font-bold">6 seats open</span>
                            </div>
                            <div class="grid grid-cols-6 gap-1">
                                <div class="aspect-square bg-gray-200 rounded flex items-center justify-center text-[10px] font-bold text-gray-400">D</div>
                                <div class="aspect-square bg-gray-100 border border-gray-200 rounded flex items-center justify-center text-[10px] font-bold text-gray-400">1</div>
                                <div class="aspect-square bg-gray-100 border border-gray-200 rounded flex items-center justify-center text-[10px] font-bold text-gray-400">2</div>
                                <div class="aspect-square bg-gray-100 border border-gray-200 rounded flex items-center justify-center text-[10px] font-bold text-gray-400">3</div>
                                <div class="aspect-square bg-gray-100 border border-gray-200 rounded flex items-center justify-center text-[10px] font-bold text-gray-400">4</div>
                                <div class="aspect-square bg-gray-100 border border-gray-200 rounded flex items-center justify-center text-[10px] font-bold text-gray-400">5</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <h4 class="font-bold text-primary text-sm mb-2">Driver Tips</h4>
                        <ul class="text-xs text-gray-600 space-y-2 list-disc list-inside">
                            <li>Popular route! Prices usually range from 80-120 MAD.</li>
                            <li>Rides departing between 8-10 AM fill up 40% faster.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function updatePreview() {
        // Get values
        const from = document.getElementById('inputFrom').value || 'Casablanca';
        const to = document.getElementById('inputTo').value || 'Marrakech';
        const time = document.getElementById('inputTime').value || '--:--';
        const distance = document.getElementById('inputDistance').value;
        const price = parseInt(document.getElementById('inputPrice').value) || 0;

        // Update Preview Text
        document.getElementById('previewFrom').textContent = from;
        document.getElementById('previewTo').textContent = to;
        document.getElementById('previewTime').textContent = time;
        document.getElementById('previewPrice').textContent = price + ' MAD';

        // Calculate Distance & Duration
        if (distance) {
            document.getElementById('previewDistance').textContent = distance + ' km';

            // Estimate duration (Average speed 70km/h)
            const hours = Math.floor(distance / 70);
            const minutes = Math.round(((distance % 70) / 70) * 60);

            let durationText = '';
            if (hours > 0) durationText += `${hours}h `;
            if (minutes > 0) durationText += `${minutes}m`;

            document.getElementById('previewDuration').textContent = durationText || '0m';
        } else {
            document.getElementById('previewDistance').textContent = '-- km';
            document.getElementById('previewDuration').textContent = '--h --m';
        }

        // Calculate Earnings
        const frontPrice = Math.round(price * 1.2);
        document.getElementById('frontSeatPrice').textContent = frontPrice;

        const total = frontPrice + (price * 5);
        document.getElementById('totalEarnings').textContent = total + ' MAD';
    }

    // Initialize date to today
    document.getElementById('inputDate').valueAsDate = new Date();
</script>
</body>
</html>
