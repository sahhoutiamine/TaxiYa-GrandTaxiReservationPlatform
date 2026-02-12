<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - TaxiYa</title>

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

        .role-btn.active {
            background-color: white;
            color: #1E40AF; /* primary */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        .role-btn.inactive {
            background-color: transparent;
            color: #6B7280; /* gray-500 */
        }
        .role-btn.inactive:hover {
            color: #374151; /* gray-700 */
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center py-4">
            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-secondary to-yellow-300 rounded-xl flex items-center justify-center transform rotate-45">
                    <svg class="w-6 h-6 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                    </svg>
                </div>
                <span class="text-2xl font-display font-black text-dark">TaxiYa</span>
            </a>
            <a href="/" class="text-sm font-semibold text-gray-500 hover:text-primary">Back to Home</a>
        </div>
    </div>
</nav>

<div class="flex-grow flex items-center justify-center py-12 px-6">
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-lg w-full border border-gray-100">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-black text-dark mb-2">Create Account</h1>
            <p class="text-gray-500" id="headerText">Join 8 million Moroccans traveling smarter</p>
        </div>

        <div class="flex p-1 bg-gray-100 rounded-xl mb-8">
            <button type="button" onclick="setRole('voyageur')" id="btn-traveler" class="role-btn active flex-1 py-2 rounded-lg text-sm font-bold transition-all">
                Traveler
            </button>
            <button type="button" onclick="setRole('cheffeur')" id="btn-driver" class="role-btn inactive flex-1 py-2 rounded-lg text-sm font-bold transition-all">
                Driver
            </button>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4" id="registerForm">
            @csrf
            <input type="hidden" name="role" id="roleInput" value="voyageur">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Mohamed" required autofocus
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all @error('first_name') border-red-500 @enderror">
                    @error('first_name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Amine" required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all @error('last_name') border-red-500 @enderror">
                    @error('last_name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                <div class="relative">
                    <span class="absolute left-4 top-3.5 text-gray-500 font-semibold">+212</span>
                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="6 00 00 00 00" required
                           class="w-full pl-16 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all @error('phone') border-red-500 @enderror">
                </div>
                @error('phone')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div id="driverFields" class="{{ old('role') === 'cheffeur' ? '' : 'hidden' }} space-y-4 pt-2 border-t border-gray-100 mt-2">
                <p class="text-sm font-semibold text-primary">Vehicle Information</p>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">License Number</label>
                    <input type="text" name="license_number" value="{{ old('license_number') }}" placeholder="12345 - A - 6" id="plateInput"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all @error('license_number') border-red-500 @enderror">
                    @error('license_number')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" placeholder="••••••••" required autocomplete="new-password"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••" required autocomplete="new-password"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
                </div>
            </div>

            <div class="flex items-start gap-3 pt-2">
                <input type="checkbox" required class="mt-1 w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary">
                <span class="text-sm text-gray-600">I agree to the <a href="#" class="text-primary font-bold">Terms of Service</a> and <a href="#" class="text-primary font-bold">Privacy Policy</a></span>
            </div>

            <button type="submit" id="submitBtn" class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-blue-700 transform hover:-translate-y-0.5 transition-all shadow-lg shadow-primary/30 text-lg mt-4">
                {{ old('role') === 'cheffeur' ? 'Register & Start Driving' : 'Create Traveler Account' }}
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-bold text-primary hover:text-blue-700">Log In</a>
            </p>
        </div>
    </div>
</div>

<script>
    function setRole(role) {
        const roleInput = document.getElementById('roleInput');
        const driverFields = document.getElementById('driverFields');
        const submitBtn = document.getElementById('submitBtn');
        const headerText = document.getElementById('headerText');
        const plateInput = document.getElementById('plateInput');

        // Buttons
        const btnTraveler = document.getElementById('btn-traveler');
        const btnDriver = document.getElementById('btn-driver');

        roleInput.value = role;

        if (role === 'cheffeur') {
            // UI Updates for Driver
            btnDriver.classList.add('active');
            btnDriver.classList.remove('inactive');
            btnTraveler.classList.add('inactive');
            btnTraveler.classList.remove('active');

            // Show Fields
            driverFields.classList.remove('hidden');
            plateInput.required = true;

            // Text Updates
            submitBtn.textContent = 'Register & Start Driving';
            headerText.textContent = 'Start earning money with your taxi today';
        } else {
            // UI Updates for Traveler
            btnTraveler.classList.add('active');
            btnTraveler.classList.remove('inactive');
            btnDriver.classList.add('inactive');
            btnDriver.classList.remove('active');

            // Hide Fields
            driverFields.classList.add('hidden');
            plateInput.required = false;

            // Text Updates
            submitBtn.textContent = 'Create Traveler Account';
            headerText.textContent = 'Join 8 million Moroccans traveling smarter';
        }
    }
    
    // Initialize on page load if there's an old role
    window.addEventListener('DOMContentLoaded', () => {
        const oldRole = "{{ old('role', 'voyageur') }}";
        setRole(oldRole);
    });
</script>
</body>
</html>
