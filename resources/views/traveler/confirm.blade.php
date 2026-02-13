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
        <a href="{{ url()->previous() }}" class="flex items-center gap-2 text-gray-600 hover:text-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Search
        </a>
        <div class="text-xl font-display font-black text-dark">Checkout</div>
        @auth
        <div class="flex items-center gap-4">
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="text-sm font-semibold text-red-500 hover:text-red-700 transition-colors">
                    Logout
                </button>
            </form>
            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
        </div>
        @else
        <a href="{{ route('login') }}" class="px-6 py-2 bg-primary text-white font-bold rounded-lg hover:bg-blue-700 transition-all">Login</a>
        @endauth
    </div>
</nav>

<div class="max-w-6xl mx-auto px-6 py-10">
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

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
                    {{-- Row 1: Driver & Seat 1 (Premium Seat) --}}
                    <div class="mb-6 flex justify-between px-4">
                        <div class="w-1/3"></div>
                        <div class="w-1/3">
                            <div class="bg-gray-300 h-16 rounded-lg flex items-center justify-center text-gray-500 text-xs font-bold mb-1">DRIVER</div>
                        </div>
                        <div class="w-1/3 pl-2">
                            @php
                                $seatNum = 1;
                                $price = $trip->price_per_seat * 1.20;
                                $isTaken = in_array($seatNum, $takenSeats ?? []);
                            @endphp
                            <button type="button" id="seat-{{ $seatNum }}"
                                    @if($isTaken) disabled class="w-full h-16 bg-gray-300 rounded-lg flex flex-col items-center justify-center cursor-not-allowed opacity-60"
                                    @else onclick="selectSeat({{ $seatNum }}, {{ $price }})" class="seat-btn w-full h-16 bg-white border-2 border-accent hover:border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-sm group"
                                @endif>
                                <span class="font-bold {{ $isTaken ? 'text-gray-500' : 'text-dark' }}">{{ $seatNum }}</span>
                                @if(!$isTaken)<span class="text-[10px] text-accent font-medium group-hover:text-primary">{{ number_format($price, 0) }} MAD</span>@endif
                            </button>
                        </div>
                    </div>

                    {{-- Row 2: Seats 2, 3, 4 --}}
                    <div class="grid grid-cols-3 gap-2 mb-4">
                        @foreach([2, 3, 4] as $seatNum)
                            @php
                                $price = $trip->price_per_seat;
                                $isTaken = in_array($seatNum, $takenSeats ?? []);
                            @endphp
                            <button type="button" id="seat-{{ $seatNum }}"
                                    @if($isTaken) disabled class="w-full h-16 bg-gray-300 rounded-lg flex flex-col items-center justify-center cursor-not-allowed opacity-60"
                                    @else onclick="selectSeat({{ $seatNum }}, {{ $price }})" class="seat-btn w-full h-16 bg-white border-2 border-accent hover:border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-sm group"
                                @endif>
                                <span class="font-bold {{ $isTaken ? 'text-gray-500' : 'text-dark' }}">{{ $seatNum }}</span>
                                @if(!$isTaken)<span class="text-[10px] text-accent font-medium group-hover:text-primary">{{ number_format($price, 0) }} MAD</span>@endif
                            </button>
                        @endforeach
                    </div>

                    {{-- Row 3: Seats 5, 6 --}}
                    <div class="grid grid-cols-3 gap-2">
                        @foreach([5, 6] as $seatNum)
                            @php
                                $price = $trip->price_per_seat;
                                $isTaken = in_array($seatNum, $takenSeats ?? []);
                            @endphp
                            <button type="button" id="seat-{{ $seatNum }}"
                                    @if($isTaken) disabled class="w-full h-16 bg-gray-300 rounded-lg flex flex-col items-center justify-center cursor-not-allowed opacity-60"
                                    @else onclick="selectSeat({{ $seatNum }}, {{ $price }})" class="seat-btn w-full h-16 bg-white border-2 border-accent hover:border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-sm group"
                                @endif>
                                <span class="font-bold {{ $isTaken ? 'text-gray-500' : 'text-dark' }}">{{ $seatNum }}</span>
                                @if(!$isTaken)<span class="text-[10px] text-accent font-medium group-hover:text-primary">{{ number_format($price, 0) }} MAD</span>@endif
                            </button>
                        @endforeach
                        <div class="h-16 opacity-0"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-dark flex items-center gap-2 mb-6">
                    <span class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center text-sm">2</span>
                    Payment Details
                </h2>

                <form id="payment-form" action="{{ route('payment.process', $trip->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="seat_number" id="selected-seat-input" required>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cardholder Name</label>
                        <input type="text" name="cardholder_name" required placeholder="e.g. Mohamed Alami" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 outline-none">
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
                        <p class="text-xs text-gray-500">{{ $departureDate->format('h:i A') }}</p>
                        <p class="font-bold text-dark">{{ $trip->departureCity->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">{{ $arrivalDate->format('h:i A') }} <span class="text-[10px]">(Est.)</span></p>
                        <p class="font-bold text-dark">{{ $trip->arrivalCity->name }}</p>
                    </div>
                </div>

                <div class="py-4 border-t border-b border-gray-100 space-y-3 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Date</span>
                        <span class="font-medium text-dark">{{ $departureDate->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Total Distance</span>
                        <span class="font-medium text-dark">{{ $distance }} km</span>
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

                <button id="confirm-btn" type="submit" form="payment-form" disabled class="w-full py-4 bg-gray-300 text-gray-500 font-bold rounded-xl transition-all shadow-none">
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
    function selectSeat(seatNum, price) {
        // 1. Reset visual state
        document.querySelectorAll('.seat-btn:not([disabled])').forEach(btn => {
            btn.className = 'seat-btn w-full h-16 bg-white border-2 border-accent hover:border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-sm group';
            const spans = btn.getElementsByTagName('span');
            if(spans.length >= 2) {
                spans[0].className = 'font-bold text-dark';
                spans[1].className = 'text-[10px] text-accent font-medium group-hover:text-primary';
            }
        });

        // 2. Set active state
        const activeBtn = document.getElementById(`seat-${seatNum}`);
        if(activeBtn) {
            activeBtn.className = 'seat-btn w-full h-16 bg-primary border-2 border-primary rounded-lg flex flex-col items-center justify-center transition-all shadow-lg ring-2 ring-primary/30';
            const spans = activeBtn.getElementsByTagName('span');
            if(spans.length >= 2) {
                spans[0].className = 'font-bold text-white';
                spans[1].className = 'text-[10px] text-white/80 font-medium';
            }
        }

        // 3. Update Summary Panel
        document.getElementById('summary-seat').innerText = `#${seatNum}`;
        document.getElementById('summary-price').innerText = `${Math.round(price)} MAD`;

        // 4. Update Hidden Input for Form Submission
        document.getElementById('selected-seat-input').value = seatNum;

        // 5. Enable Confirm Button
        const btn = document.getElementById('confirm-btn');
        btn.disabled = false;
        btn.className = 'w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:-translate-y-1';
    }
</script>
</body>
</html>
