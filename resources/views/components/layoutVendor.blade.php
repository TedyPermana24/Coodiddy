<!DOCTYPE html>
<html class="h-full" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coodiddy</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50 font-poppins overscroll-none h-full">

<!-- Navbar -->
<nav class="bg-[#F8F0E3] w-full z-20 top-0 left-0 flex justify-between items-center py-7 px-16 font-poppins transition-all duration-300 ease-in-out">
    <div class="text-2xl font-bold text-gray-800 ml-16">
          <a href="{{ route('dashboard.vendor.order') }}" class="hover:text-[#6B4423] text-3xl font-bold flex ">
            Coodiddy 
            <span class="text-lg"> Vendor</span>
          </a>
    </div>
    <div class="flex items-center space-x-8 mr-16">

        <div class="flex">
            <div class="self-stretch justify-start items-center inline-flex">
                <div class="w-32 h-4 text-black text-lg font-bold font-poppins mb-3">
                    @if (Auth::user()->petHotels && Auth::user()->petHotels->status === 'active')
                    {{ Auth::user()->petHotels->name }}
                </a>
                    @else
                        No Vendor
                    @endif
                </div>
            </div>
            <div class="text-3xl mr-6">|</div>
        </div>

        <!-- User is logged in -->
        <div class="user-dropdown flex items-center">
            <img
                alt="User profile picture"
                src="{{ Auth::user()->image ? asset(Storage::url(Auth::user()->image)) : asset('img/kucing-kosan-hendra.jpg') }}" 
                class="w-10 h-10 object-cover rounded-full cursor-pointer"
            />
        </div>

        
    </div>
</nav>
  
<div class="flex flex-1 h-full">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#f8f0e3] py-6 px-4 flex flex-col h-auto">
        <div class="flex-1">
            <!-- Vendor Name -->
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold">
                @if (Auth::user()->petHotels && Auth::user()->petHotels->status === 'active')
                    {{ Auth::user()->petHotels->name }}
                @endif
                </h2>
                <div class="flex gap-1 items-center justify-center">
                    {{-- @for ($i = 0; $i < floor($p->reviews_avg_rating); $i++)
                    <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="w-4 h-4">
                    @endfor
                
                    @if ($p->reviews_avg_rating - floor($p->reviews_avg_rating) >= 0.5)
                        <img src="{{ asset('svg/star-half.svg') }}" alt="Half star" class="w-4 h-4">
                    @endif
                
                    @for ($i = 0; $i < (5 - ceil($p->reviews_avg_rating)); $i++)
                        <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="w-4 h-4">
                    @endfor --}}
                </div>   
            </div>

            <!-- Balance Info -->
            <div class="border-y border-gray-400 py-4 mb-6 space-y-2">
                <div class="flex justify-between text-sm">
                <span>Balance:</span>
                    <span>Rp 
                    {{ 
                        Auth::user()->role === 'vendor' 
                            ? Auth::user()->petHotels->balance ?? 0
                            : 0
                    }}
                </div>
                <!-- <div class="flex justify-between text-sm">
                    <span>Total Transaction:</span>
                    <span>
                    {{
                       Auth::user()->role === 'vendor' 
                        ? Auth::user()->bookings()->whereIn('status', ['completed', 'reviewed'])->count()
                        : 0
                    }}
                    </span>
                </div> -->
            </div>

            <!-- Navigation -->
            <nav class="space-y-4">
                <!-- <div class="flex items-center gap-2">
                    <img src="{{ asset('svg/home.svg') }}" alt="Home" class="w-4 h-4">
                    <a href="#" class="text-black">Home</a>
                </div> -->
                <div class="flex items-center gap-2">
                    <img src="{{ asset('svg/order.svg') }}" alt="Order" class="w-4 h-4">
                    <a href="#" class="text-black">Order</a>
                </div>
                <!-- <div class="flex items-center gap-2">
                    <img src="{{ asset('svg/settings.svg') }}" alt="Settings" class="w-4 h-4">
                    <a href="#" class="text-black">Settings</a>
                </div> -->
                <div class="flex items-center gap-2 pt-4">
                    <img src="{{ asset('svg/back.svg') }}" alt="Back" class="w-4 h-4">
                    <a href="{{route('home')}}" class="text-black">Back to Coodiddy</a>
                </div>
            </nav>
        </div>
    </aside>

@yield('content')
</div>

@yield('script')

</body>
</html>

