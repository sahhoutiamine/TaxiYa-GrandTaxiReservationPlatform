<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - TaxiYa</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

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
<body class="bg-gray-50 font-body">
<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-secondary to-yellow-300 rounded-xl flex items-center justify-center transform rotate-45">
                    <svg class="w-7 h-7 text-white -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                    </svg>
                </div>
                <span class="text-3xl font-display font-black text-dark">TaxiYa</span>
            </a>
            <div class="flex items-center gap-6">
                <a href="{{ route('dashboard') }}" class="text-primary font-semibold">Search</a>
                <a href="{{ route('mybookings') }}" class="text-gray-700 hover:text-primary font-medium">My Bookings</a>
                
                @auth
                <div class="flex items-center gap-3 pl-4 border-l border-gray-100">
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
        </div>
    </div>
</nav>

<section class="bg-white border-b shadow-sm sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-6 py-4">
       <form id="searchForm" action="{{ route('search') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <select name="from" required
                        class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all text-gray-900 bg-white">
                    <option value="" disabled selected>Select departure city</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ request('from') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <select name="to" required
                        class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all text-gray-900 bg-white">
                    <option value="" disabled selected>Select arrival city</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ request('to') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <input type="date" value="{{ request('date') }}" name ="date"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none">
            </div>
            <button type="submit"
                    class="px-8 py-3 bg-primary text-white font-bold rounded-lg hover:bg-blue-700 transition-all">Update
                Search
            </button>
        </form>
    </div>
</section>

<section class="py-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="md:col-span-1 hidden md:block">
                <div class="bg-white rounded-xl p-6 shadow-sm sticky top-32">
                    <h3 class="font-bold text-dark mb-4">Filters</h3>
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Departure Time</h4>
                        <label class="flex items-center gap-2 mb-2">
                            <input type="checkbox" name="time_filter[]" value="morning" form="searchForm" 
                                   class="rounded text-primary" onchange="this.form.submit()"
                                   {{ is_array(request('time_filter')) && in_array('morning', request('time_filter')) ? 'checked' : '' }}>
                            <span class="text-sm">Morning (Before 12:00)</span>
                        </label>
                        <label class="flex items-center gap-2 mb-2">
                            <input type="checkbox" name="time_filter[]" value="afternoon" form="searchForm" 
                                   class="rounded text-primary" onchange="this.form.submit()"
                                   {{ is_array(request('time_filter')) && in_array('afternoon', request('time_filter')) ? 'checked' : '' }}>
                            <span class="text-sm">Afternoon (12:00 - 18:00)</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="time_filter[]" value="evening" form="searchForm" 
                                   class="rounded text-primary" onchange="this.form.submit()"
                                   {{ is_array(request('time_filter')) && in_array('evening', request('time_filter')) ? 'checked' : '' }}>
                            <span class="text-sm">Evening (After 18:00)</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Results List -->
            <div class="md:col-span-3">
                <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-primary font-bold text-sm mb-1 uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Search Results
                        </div>
                        <h2 class="text-3xl font-black text-dark mb-2">Available Rides</h2>
                        <p class="text-gray-600 flex items-center gap-2">
                            <span class="font-bold text-primary">{{ $result->count() }}</span> rides found 
                            @if(request('from') && request('to'))
                                from <span class="font-semibold text-dark">{{ $cities->find(request('from'))?->name ?? 'Unknown' }}</span> 
                                to <span class="font-semibold text-dark">{{ $cities->find(request('to'))?->name ?? 'Unknown' }}</span>
                            @endif
                            @if(request('date'))
                                on <span class="font-semibold text-dark">{{ \Carbon\Carbon::parse(request('date'))->format('M d, Y') }}</span>
                            @endif
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-500">Sort by:</span>
                        <select name="sort_by" form="searchForm" onchange="this.form.submit()"
                                class="bg-white border border-gray-200 rounded-lg px-3 py-2 text-sm font-medium focus:ring-2 focus:ring-primary/20 outline-none">
                            <option value="earliest" {{ request('sort_by') == 'earliest' ? 'selected' : '' }}>Earliest Departure</option>
                            <option value="lowest_price" {{ request('sort_by') == 'lowest_price' ? 'selected' : '' }}>Lowest Price</option>
                            <option value="seats" {{ request('sort_by') == 'seats' ? 'selected' : '' }}>Available Seats</option>
                        </select>
                    </div>
                </div>




                @forelse($result as $trip)
                <div class="space-y-6 mb-6">
                    <!-- Ride Card 1 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all border-2 border-transparent hover:border-primary">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="px-3 py-1 bg-accent/10 text-accent text-xs font-bold rounded-full">Verified Driver</span>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                        <span class="text-sm font-semibold">{{rand(1,4)}}.{{rand(1,9)}} </span>
                                    </div>
                                </div>
                                <h3 class="font-bold text-lg text-dark">{{ $trip->cheffeur->name}}</h3>
                                <p class="text-sm text-gray-600">{{$trip->cheffeur->taxis->model ?? 'Standard Taxi'}} - {{ $trip->cheffeur->taxis->license_plate ?? 'ABC 1234' }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-black text-primary">{{ $trip->price_per_seat}} MAD</div>
                                <div class="text-sm text-gray-600">per seat</div>
                            </div>
                        </div>

                    <div class="grid grid-cols-4 gap-4 mb-6 p-4 bg-gray-50 rounded-xl">
                        <div>
                            <div class="text-xs text-gray-600 mb-1">Departure</div>
                            <div class="font-bold text-dark">{{ $trip->departure_date->format('h:i A') }}</div>
                            <div class="text-xs text-gray-500">{{ $trip->departureCity->name}}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xs text-gray-600 mb-1">Duration</div>
                            <div class="font-bold text-dark text-[10px]">{{ floor($trip->duration_hours) }}h {{ round(($trip->duration_hours - floor($trip->duration_hours)) * 60) }}m</div>
                        </div>
                        <div class="text-center border-l border-gray-200">
                            <div class="text-xs text-gray-600 mb-1">Distance</div>
                            <div class="font-bold text-dark">{{ round($trip->distance) }} km</div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs text-gray-600 mb-1">Arrival</div>
                            <div class="font-bold text-dark">{{ $trip->arrival_date->format('h:i A') }}</div>
                            <div class="text-xs text-gray-500">{{ $trip->arrivalCity->name}}</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <span class="font-bold text-accent">{{$trip->available_seats}} seats left</span>
                        </div>
                        <a href="{{ route('payment', $trip->id) }}"
                           class="px-8 py-3 bg-primary text-white font-bold rounded-lg hover:bg-blue-700 transition-all shadow-lg">
                            Book Ride
                        </a>
                    </div>
                </div>
                </div>
                @empty
                <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100">
                    <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-2xl font-black text-dark mb-3">No rides found</h3>
                    <p class="text-gray-500 max-w-sm mx-auto mb-8">We couldn't find any taxis for this route on the selected date. Try changing your search parameters.</p>
                </div>
                @endforelse









            </div>
        </div>
    </div>
</section>
</body>
</html>
