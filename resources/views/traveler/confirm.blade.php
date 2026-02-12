<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout - TaxiYa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
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
</head>
<body class="bg-gray-50 font-body">
<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="search.html" class="flex items-center gap-2 text-gray-600 hover:text-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Search
        </a>
        <div class="text-xl font-display font-black text-dark">Checkout</div>
        <div class="w-20"></div> </div>
</nav>

<div class="max-w-6xl mx-auto px-6 py-10">
    <div class="grid lg:grid-cols-3 gap-10">

        <div class="lg:col-span-2 space-y-8">

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-dark flex items-center gap-2">
                        <span class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center text-sm">1</span>
                        Select Your Seat
                    </h2>
                    <div class="flex gap-4 text-xs">
                        <div class="flex items-center gap-1"><div class="w-3 h-3 bg-white border-2 border-primary rounded-sm"></div> Available</div>
                        <div class="flex items-center gap-1"><div class="w-3 h-3 bg-primary rounded-sm"></div> Selected</div>
                        <div class="flex items-center gap-1"><div class="w-3 h-3 bg-gray-300 rounded-sm"></div> Taken</div>
                    </div>
                </div>

                <div class="bg-gray-100 rounded-xl p-8 max-w-md mx-auto relative">
                    <div class="mb-6 flex justify-between px-4">
                        <div class="w-1/3"></div> <div class="w-1/3">
                            <div class="bg-gray-300 h-16 rounded-lg flex items-center justify-center text-gray-500 text-xs font-bold mb-1">DRIVER</div>
                        </div>
                        <div class="w-1/3 pl-2">
                            <button onclick="selectSeat(1, 120)" id="seat-1" class="seat-btn w-full h-16 bg-white border-2 border-accent hover:border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-sm group">
                                <span class="font-bold text-dark">1</span>
                                <span class="text-[10px] text-accent font-medium group-hover:text-primary">120 MAD</span>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-2 mb-4">
                        <button disabled class="h-16 bg-gray-300 rounded-lg flex flex-col items-center justify-center cursor-not-allowed opacity-60">
                            <span class="font-bold text-gray-500">2</span>
                        </button>
                        <button onclick="selectSeat(3, 100)" id="seat-3" class="seat-btn h-16 bg-white border-2 border-accent hover:border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-sm">
                            <span class="font-bold text-dark">3</span>
                            <span class="text-[10px] text-accent font-medium">100 MAD</span>
                        </button>
                        <button disabled class="h-16 bg-gray-300 rounded-lg flex flex-col items-center justify-center cursor-not-allowed opacity-60">
                            <span class="font-bold text-gray-500">4</span>
                        </button>
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        <button onclick="selectSeat(5, 100)" id="seat-5" class="seat-btn h-16 bg-white border-2 border-accent hover:border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-sm">
                            <span class="font-bold text-dark">5</span>
                            <span class="text-[10px] text-accent font-medium">100 MAD</span>
                        </button>
                        <button disabled class="h-16 bg-gray-300 rounded-lg flex flex-col items-center justify-center cursor-not-allowed opacity-60">
                            <span class="font-bold text-gray-500">6</span>
                        </button>
                        <div class="h-16 opacity-0"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-dark flex items-center gap-2 mb-6">
                    <span class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center text-sm">2</span>
                    Payment Details
                </h2>

                <form onsubmit="event.preventDefault(); alert('Booking Confirmed!');" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cardholder Name</label>
                        <input type="text" placeholder="e.g. Mohamed Alami" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Card Number</label>
                        <div class="relative">
                            <input type="text" placeholder="0000 0000 0000 0000" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 outline-none pl-12">
                            <svg class="w-6 h-6 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Expiry Date</label>
                            <input type="text" placeholder="MM/YY" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">CVC</label>
                            <input type="text" placeholder="123" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 outline-none">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 sticky top-24">
                <h3 class="text-lg font-bold text-dark mb-4">Trip Summary</h3>

                <div class="relative pl-6 pb-6 border-l-2 border-gray-200 ml-2">
                    <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-primary"></div>
                    <div class="absolute -left-[9px] bottom-0 w-4 h-4 rounded-full bg-secondary"></div>

                    <div class="mb-6">
                        <p class="text-xs text-gray-500">08:00 AM</p>
                        <p class="font-bold text-dark">Casablanca</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">11:30 AM</p>
                        <p class="font-bold text-dark">Marrakech</p>
                    </div>
                </div>

                <div class="py-4 border-t border-b border-gray-100 space-y-3 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Date</span>
                        <span class="font-medium text-dark">Feb 15, 2026</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Total Distance</span>
                        <span class="font-medium text-dark">240 km</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Seat Selected</span>
                        <span id="summary-seat" class="font-bold text-primary">None</span>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-6">
                    <span class="font-bold text-dark">Total</span>
                    <span id="summary-price" class="text-2xl font-black text-primary">0 MAD</span>
                </div>

                <button id="confirm-btn" onclick="alert('Payment Successful! Ticket sent.')" disabled class="w-full py-4 bg-gray-300 text-gray-500 font-bold rounded-xl transition-all shadow-none">
                    Confirm Payment
                </button>

                <p class="text-xs text-gray-400 text-center mt-4">
                    By confirming, you agree to our Terms & Conditions.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    let currentPrice = 0;

    function selectSeat(seatNum, price) {
        // Reset visual state of all buttons
        document.querySelectorAll('.seat-btn').forEach(btn => {
            btn.className = 'seat-btn w-full h-16 bg-white border-2 border-accent hover:border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-sm group';
            // Reset text colors inside
            btn.querySelector('span:first-child').className = 'font-bold text-dark';
            btn.querySelector('span:last-child').className = 'text-[10px] text-accent font-medium';
        });

        // Set active state
        const activeBtn = document.getElementById(`seat-${seatNum}`);
        activeBtn.className = 'seat-btn w-full h-16 bg-primary border-2 border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-lg ring-2 ring-primary/30';
        activeBtn.querySelector('span:first-child').className = 'font-bold text-white';
        activeBtn.querySelector('span:last-child').className = 'text-[10px] text-white/80 font-medium';

        // Update Summary
        document.getElementById('summary-seat').innerText = `#${seatNum}`;
        document.getElementById('summary-price').innerText = `${price} MAD`;
        currentPrice = price;

        // Enable Button
        const btn = document.getElementById('confirm-btn');
        btn.disabled = false;
        btn.className = 'w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:-translate-y-1';
    }
</script>
</body>
</html>
