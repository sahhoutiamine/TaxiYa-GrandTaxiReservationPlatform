<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-3xl text-dark leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-bold">
                Logged in as {{ ucfirst(Auth::user()->role) }}
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-64px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="overflow-hidden mb-8">
                <div class="p-8 bg-gradient-to-br from-primary to-blue-700 rounded-3xl shadow-xl text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-3xl font-black mb-2">Hello, {{ Auth::user()->name }}!</h3>
                        <p class="text-blue-100 text-lg">Welcome to your TaxiYa dashboard. Ready for your next journey?</p>
                    </div>
                    
                    <!-- Decorative Icon -->
                    <div class="absolute -right-12 -bottom-12 opacity-10 transform -rotate-12">
                        <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Stats / Quick Actions -->
                <div class="md:col-span-2 space-y-8">
                    <!-- Placeholder for Content based on Role -->
                    @if(Auth::user()->role === 'cheffeur')
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                            <h4 class="text-xl font-bold text-dark mb-6">Your Recent Trips</h4>
                            <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-12 text-center">
                                <p class="text-gray-500 font-medium">No trips scheduled yet.</p>
                                <button class="mt-4 px-6 py-2 bg-primary text-white font-bold rounded-xl hover:bg-blue-700 transition-all">
                                    Create New Trip
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                            <h4 class="text-xl font-bold text-dark mb-6">Your Reservations</h4>
                            <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-12 text-center">
                                <p class="text-gray-500 font-medium">You haven't made any reservations yet.</p>
                                <a href="{{ route('home') }}" class="mt-4 inline-block px-6 py-2 bg-primary text-white font-bold rounded-xl hover:bg-blue-700 transition-all">
                                    Search for Taxis
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar Info -->
                <div class="space-y-8">
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                        <h4 class="text-xl font-bold text-dark mb-6">Profile Info</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Phone</label>
                                <p class="text-gray-900 font-semibold">{{ Auth::user()->phone ?? 'Not set' }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Email</label>
                                <p class="text-gray-900 font-semibold">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="pt-4 mt-4 border-t border-gray-50">
                                <a href="{{ route('profile.edit') }}" class="text-primary font-bold hover:underline">Edit Profile</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-secondary/10 rounded-3xl p-8 border border-secondary/20">
                        <h4 class="text-xl font-bold text-secondary-dark mb-2">Need Help?</h4>
                        <p class="text-gray-700 text-sm mb-4">Our support team is available 24/7 for travelers and drivers.</p>
                        <button class="w-full bg-secondary text-dark font-bold py-3 rounded-xl hover:bg-yellow-400 transition-all">
                            Contact Support
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
