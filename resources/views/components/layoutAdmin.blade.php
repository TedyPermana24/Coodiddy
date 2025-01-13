<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coodiddy</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50 font-poppins overscroll-none">

<!-- Navbar -->
<nav class="bg-[#F8F0E3] w-full z-20 flex justify-between items-center py-7 px-16 font-poppins transition-all duration-300 ease-in-out mb-20">
    <div class="ml-16">
        <!-- SVG Logo for Coodiddy -->
        <a href="{{ route('home') }}">
            <img src="{{ asset('svg/coodiddy-vendor.svg') }}" alt="Coodiddy Logo" class="w-36">
        </a>
    </div>
    <div class="flex items-center space-x-8 mr-16">
        <p><a href="{{ route('registerVendor') }}" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Register as Vendor?</a></p>
        <p><a href="{{ route('vendor') }}" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Vendor</a></p>

        <!-- User is logged in, no login option -->
        <a href="{{ route('profile.edit') }}" class="bg-[#A5724C] text-white py-2 px-8 rounded-xl hover:bg-[#4A3B32] font-poppins font-normal text-base">Profile</a>
        <form method="POST" action="{{ route('logout') }}" class="ml-4">
            @csrf
            <button type="submit" class="bg-[#ea2424] text-white py-2 px-8 rounded-xl hover:bg-[#4A3B32] font-poppins font-normal text-base">
                Logout
            </button>
        </form>
    </div>
</nav>

@yield('content')

</body>
</html>
