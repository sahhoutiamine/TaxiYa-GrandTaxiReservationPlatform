<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - TaxiYa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E40AF',      // Blue
                        secondary: '#FBBF24',    // Yellow
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', sans-serif; }
        .star-btn:hover svg,
        .star-btn.active svg {
            fill: #FBBF24;
            color: #FBBF24;
            transform: scale(1.1);
        }
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
            </a>

            <div class="flex items-center gap-6">
                <a href="search.html" class="text-gray-700 hover:text-primary font-medium transition-colors">Search</a>
                <a href="bookings.html" class="text-primary font-bold">My Bookings</a>
                <div class="flex items-center gap-3 pl-6 border-l border-gray-200">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                        A
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<section class="py-10">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
            <div>
                <h1 class="text-4xl font-black text-dark mb-2">My Bookings</h1>
                <p class="text-gray-600">Manage your upcoming trips and view your travel history</p>
            </div>

            <div class="bg-white p-1 rounded-xl shadow-sm border border-gray-200 flex">
                <button onclick="switchTab('upcoming')" id="tab-upcoming" class="px-6 py-2 bg-primary text-white font-semibold rounded-lg shadow transition-all">
                    Upcoming
                </button>
                <button onclick="switchTab('history')" id="tab-history" class="px-6 py-2 text-gray-600 font-semibold rounded-lg hover:bg-gray-50 transition-all">
                    History
                </button>
            </div>
        </div>

        <div id="upcoming-section" class="space-y-6">

            <div class="bg-white rounded-2xl shadow-lg border-l-8 border-accent overflow-hidden hover:shadow-xl transition-all">
                <div class="p-6 md:p-8">
                    <div class="flex flex-col md:flex-row justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-3 py-1 bg-accent/10 text-accent text-xs font-bold rounded-full border border-accent/20">CONFIRMED</span>
                                <span class="text-sm text-gray-500">Booking #TX-8821</span>
                            </div>

                            <div class="flex items-center gap-8 mb-6">
                                <div>
                                    <div class="text-sm text-gray-500 mb-1">From</div>
                                    <div class="text-2xl font-bold text-dark">Casablanca</div>
                                    <div class="text-primary font-semibold">08:00 AM</div>
                                </div>

                                <div class="flex-1 flex flex-col items-center px-4">
                                    <div class="text-xs text-gray-400 mb-2">Feb 15, 2026</div>
                                    <div class="w-full h-0.5 bg-gray-200 relative">
                                        <div class="absolute -top-1.5 left-0 w-3 h-3 rounded-full bg-primary"></div>
                                        <div class="absolute -top-1.5 right-0 w-3 h-3 rounded-full bg-primary"></div>
                                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-gray-100 px-2 text-gray-500 text-xs">
                                            3h 30m
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <div class="text-sm text-gray-500 mb-1">To</div>
                                    <div class="text-2xl font-bold text-dark">Marrakech</div>
                                    <div class="text-primary font-semibold">11:30 AM</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 text-sm text-gray-600 bg-gray-50 p-4 rounded-xl">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600">M</div>
                                    <span>Mohamed El Fassi</span>
                                </div>
                                <div class="w-px h-4 bg-gray-300"></div>
                                <div>Mercedes White • ABC 123</div>
                            </div>
                        </div>

                        <div class="md:w-64 flex flex-col justify-between border-t md:border-t-0 md:border-l border-gray-100 pt-6 md:pt-0 md:pl-8">
                            <div class="text-center md:text-right">
                                <div class="text-sm text-gray-500 mb-1">Seat No.</div>
                                <div class="text-4xl font-black text-secondary">3</div>
                                <div class="text-sm font-semibold text-gray-600 mt-1">100 MAD</div>
                            </div>

                            <div class="space-y-3 mt-6">
                                <button onclick="openTicketModal()" class="w-full py-3 bg-primary text-white font-bold rounded-xl shadow-lg shadow-primary/30 hover:bg-blue-700 transition-all flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                    </svg>
                                    View Ticket
                                </button>
                                <button class="w-full py-2 text-red-500 font-semibold hover:bg-red-50 rounded-lg transition-all text-sm">
                                    Cancel Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="history-section" class="hidden space-y-6">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-bold text-dark">Casablanca to Rabat</h3>
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-xs font-bold rounded">COMPLETED</span>
                            </div>
                            <p class="text-sm text-gray-500">Jan 28, 2026 • Seat 5 • 60 MAD</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <button onclick="openRateModal('Mohamed El Fassi')" class="px-4 py-2 border border-primary text-primary font-medium rounded-lg hover:bg-primary hover:text-white transition-all">
                            Rate Driver
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 opacity-75">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-bold text-dark">Marrakech to Agadir</h3>
                                <span class="px-2 py-0.5 bg-red-100 text-red-600 text-xs font-bold rounded">CANCELLED</span>
                            </div>
                            <p class="text-sm text-gray-500">Jan 10, 2026 • Refunded</p>
                        </div>
                    </div>
                    <div>
                        <span class="text-sm text-gray-400">Cancelled by you</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div id="ticketModal" class="fixed inset-0 bg-dark/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-sm rounded-3xl overflow-hidden shadow-2xl">
        <div class="bg-primary p-6 text-white text-center relative">
            <button onclick="closeTicketModal()" class="absolute top-4 right-4 text-white/70 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="text-sm font-medium text-blue-200 mb-1">TaxiYa E-Ticket</div>
            <h3 class="text-2xl font-black">Casablanca <br> <span class="text-blue-300 text-lg font-normal">to</span> Marrakech</h3>
        </div>
        <div class="p-6 relative">
            <div class="text-center mb-6">
                <div class="text-sm text-gray-500 mb-1">Departure</div>
                <div class="text-xl font-bold text-dark">Feb 15, 2026 • 08:00 AM</div>
            </div>
            <div class="flex justify-between border-b-2 border-dashed border-gray-100 pb-6 mb-6">
                <div class="text-center">
                    <div class="text-xs text-gray-500">SEAT</div>
                    <div class="text-2xl font-black text-primary">3</div>
                </div>
                <div class="text-center">
                    <div class="text-xs text-gray-500">PLATFORM</div>
                    <div class="text-2xl font-black text-dark">A2</div>
                </div>
                <div class="text-center">
                    <div class="text-xs text-gray-500">PRICE</div>
                    <div class="text-xl font-bold text-dark">100 Dhs</div>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="bg-white p-2 border-2 border-dark rounded-xl mb-3">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=TaxiYa-Booking-8821" alt="QR Code" class="w-32 h-32">
                </div>
                <p class="text-xs text-center text-gray-400">Show this code to the driver to board</p>
                <div class="mt-2 font-mono text-sm font-bold text-dark tracking-widest">TX-8821-3</div>
            </div>
        </div>
    </div>
</div>

<div id="rateModal" class="fixed inset-0 bg-dark/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-sm rounded-2xl p-6 shadow-2xl transform scale-100 transition-all">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3 text-xl font-bold text-gray-600">
                M
            </div>
            <h3 class="text-xl font-bold text-dark" id="driverName">Driver Name</h3>
            <p class="text-sm text-gray-500">How was your ride?</p>
        </div>

        <div class="flex justify-center gap-2 mb-8">
            <button onclick="rate(1)" class="star-btn transition-transform hover:scale-110">
                <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </button>
            <button onclick="rate(2)" class="star-btn transition-transform hover:scale-110">
                <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </button>
            <button onclick="rate(3)" class="star-btn transition-transform hover:scale-110">
                <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </button>
            <button onclick="rate(4)" class="star-btn transition-transform hover:scale-110">
                <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </button>
            <button onclick="rate(5)" class="star-btn transition-transform hover:scale-110">
                <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </button>
        </div>

        <textarea placeholder="Write a comment (optional)..." class="w-full p-3 border border-gray-200 rounded-lg mb-4 text-sm focus:ring-2 focus:ring-primary outline-none resize-none" rows="3"></textarea>

        <div class="flex gap-3">
            <button onclick="closeRateModal()" class="flex-1 py-3 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50">Cancel</button>
            <button onclick="submitRating()" class="flex-1 py-3 bg-secondary text-dark font-bold rounded-xl hover:bg-yellow-400 shadow-lg shadow-yellow-200">Submit</button>
        </div>
    </div>
</div>

<script>
    // Tab Logic
    function switchTab(tabName) {
        const upcomingBtn = document.getElementById('tab-upcoming');
        const historyBtn = document.getElementById('tab-history');
        const upcomingSection = document.getElementById('upcoming-section');
        const historySection = document.getElementById('history-section');

        if (tabName === 'upcoming') {
            upcomingBtn.classList.add('bg-primary', 'text-white', 'shadow');
            upcomingBtn.classList.remove('text-gray-600', 'hover:bg-gray-50');
            historyBtn.classList.remove('bg-primary', 'text-white', 'shadow');
            historyBtn.classList.add('text-gray-600', 'hover:bg-gray-50');
            upcomingSection.classList.remove('hidden');
            historySection.classList.add('hidden');
        } else {
            historyBtn.classList.add('bg-primary', 'text-white', 'shadow');
            historyBtn.classList.remove('text-gray-600', 'hover:bg-gray-50');
            upcomingBtn.classList.remove('bg-primary', 'text-white', 'shadow');
            upcomingBtn.classList.add('text-gray-600', 'hover:bg-gray-50');
            historySection.classList.remove('hidden');
            upcomingSection.classList.add('hidden');
        }
    }

    // Ticket Modal Logic
    function openTicketModal() {
        document.getElementById('ticketModal').classList.remove('hidden');
    }
    function closeTicketModal() {
        document.getElementById('ticketModal').classList.add('hidden');
    }

    // Rating Modal Logic
    let currentRating = 0;

    function openRateModal(driverName) {
        document.getElementById('driverName').textContent = driverName;
        document.getElementById('rateModal').classList.remove('hidden');
        rate(0); // Reset stars
    }

    function closeRateModal() {
        document.getElementById('rateModal').classList.add('hidden');
    }

    function rate(stars) {
        currentRating = stars;
        const starBtns = document.querySelectorAll('.star-btn');

        starBtns.forEach((btn, index) => {
            if (index < stars) {
                btn.classList.add('active');
                btn.querySelector('svg').classList.remove('text-gray-300');
                btn.querySelector('svg').classList.add('text-secondary'); // Yellow
            } else {
                btn.classList.remove('active');
                btn.querySelector('svg').classList.add('text-gray-300');
                btn.querySelector('svg').classList.remove('text-secondary');
            }
        });
    }

    function submitRating() {
        if (currentRating === 0) {
            alert('Please select a star rating');
            return;
        }
        alert(`Thank you! You rated the trip ${currentRating} stars.`);
        closeRateModal();
    }

    // Close modals on outside click
    window.onclick = function(event) {
        if (event.target == document.getElementById('ticketModal')) {
            closeTicketModal();
        }
        if (event.target == document.getElementById('rateModal')) {
            closeRateModal();
        }
    }
</script>
</body>
</html>
