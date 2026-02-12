<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Pending - TaxiYa</title>
    
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
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <!-- Navigation -->
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
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="flex-grow flex items-center justify-center px-6 py-12">
        <div class="bg-white rounded-3xl p-10 max-w-lg w-full text-center shadow-2xl border border-gray-100 relative overflow-hidden">
            <!-- Decorative circle -->
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-secondary/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                    <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <h2 class="text-3xl font-black text-dark mb-4 font-display">Verification Pending</h2>
                
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Thank you for registering with TaxiYa! Your account is currently under review. We will send you an email as soon as your driver account is verified and activated.
                </p>

                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-8">
                    <p class="text-sm text-primary font-medium flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        While you wait, please check your email for any additional requirements.
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-primary hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition-all shadow-lg hover:shadow-primary/30 transform hover:-translate-y-1">
                        Return to Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-8">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-gray-400">&copy; {{ date('Y') }} TaxiYa. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
