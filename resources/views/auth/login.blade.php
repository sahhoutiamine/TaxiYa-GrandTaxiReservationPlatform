<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TaxiYa</title>

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
<body class="bg-gray-50 flex flex-col min-h-screen">
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center py-4">
            <a href="../index.html" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-secondary to-yellow-300 rounded-xl flex items-center justify-center transform rotate-45">
                    <svg class="w-6 h-6 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                    </svg>
                </div>
                <span class="text-2xl font-display font-black text-dark">TaxiYa</span>
            </a>
            <a href="../index.html" class="text-sm font-semibold text-gray-500 hover:text-primary">Back to Home</a>
        </div>
    </div>
</nav>

<div class="flex-grow flex items-center justify-center py-12 px-6">
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full border border-gray-100">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black text-dark mb-2">Welcome Back</h1>
            <p class="text-gray-500">Sign in to book your grand taxi seat</p>
        </div>

        <form action="../traveler/search.html" method="GET" class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                <input type="email" placeholder="you@example.com" required
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-sm font-bold text-gray-700">Password</label>
                    <a href="#" class="text-sm font-semibold text-primary hover:text-blue-700">Forgot Password?</a>
                </div>
                <input type="password" placeholder="••••••••" required
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
            </div>

            <button type="submit" class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-blue-700 transform hover:-translate-y-0.5 transition-all shadow-lg shadow-primary/30 text-lg">
                Sign In
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-gray-600">
                Don't have an account?
                <a href="register.html" class="font-bold text-primary hover:text-blue-700">Sign Up</a>
            </p>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-400">By logging in, you agree to our Terms of Service and Privacy Policy.</p>
        </div>
    </div>
</div>
</body>
</html>
