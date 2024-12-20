<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coodiddy</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50 font-poppins">

  <!-- Navbar -->
  <nav class="bg-transparent absolute w-full z-20 top-0 left-0 flex justify-between items-center p-4 font-poppins transition-all duration-300 ease-in-out">
    <div class="text-2xl font-bold text-gray-800 ml-16">
      <a href="#" class="hover:text-[#6B4423] text-3xl font-bold">Coodiddy</a>
    </div>
    <div class="flex items-center space-x-8 mr-16">
      <a href="#" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Register as Vendor?</a>
      <a href="#" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Vendor</a>
      <a href="#" class="bg-[#A5724C] text-white py-0.5 px-6 rounded-xl hover:bg-[#4A3B32] font-poppins font-normal text-base">Login</a>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="bg-[#F8F0E3] h-screen mt-0 bg-cover bg-center transition-all duration-300 ease-in-out" style="background-image: url('{{ asset('img/hero-bg.png') }}'); background-size: 100%;">
    <div class="container mx-auto flex flex-col md:flex-row items-center h-full px-4 relative transition-all duration-300 ease-in-out">
      {{-- <img src="{{ asset('svg/hero-square.svg') }}" alt="Hero Square" class="absolute inset-0 w-[700px] h-[700px] object-cover z-0 mt-40 -ml-8" /> --}}
    {{-- text container --}}
      <div class="md:w-1/2 mb-8 md:mb-0 text-center md:text-left mx-auto z-10">
        <div class="text-5xl font-bold text-[#4A3B32] mb-4 space-y-1">
          <h1>CARE OF OUR &nbsp;<img src="{{ asset('svg/paw-black.svg') }}" alt="Paw Print" class="w-8 h-8 inline-block" style="transform: translateY(-10px);"></h1>
          <h1 class="text-[#6B4423]">DEAREST, <span class="text-[#8B5E3C]">IN DAILY</span></h1> 
          <h1 class="text-[#8B5E3C]">DEVOTION TO YOU</h1>
        </div>
        <p class="mt-4 text-gray-600 max-w-2xl mx-auto md:ml-0 text-lg">
            "We understand that your pets are family. That's why we're committed to providing exceptional care services with genuine love and attention to detail. Our certified vendors ensure your beloved companions receive the best possible care, making every day special for them while you're away."
        </p>
        <button class="mt-6 bg-[#2E2C2C] text-white py-2 px-6 rounded-3xl hover:bg-[#6B4423] font-poppins font-normal text-base">
          Search For Vendors
        </button>
      </div>
      <!-- Image Container -->
      <div class="md:w-1/2 flex justify-center mx-8">
        <div class="relative w-150 h-150">
          {{-- <img src="{{ asset('svg/hero-animal.svg') }}" alt="Cat Hero" class="object-cover w-full h-full"> --}}
        </div>
      </div>
    </div>
  </section>

<!-- ... existing code ... -->
<!-- Services Section -->
<section class="py-16 bg-white transition-all duration-300 ease-in-out">
 <div class="container mx-auto px-4 text-center transition-all duration-300 ease-in-out">
   <h1 class="text-5xl font-bold text-[#4A3B32] mb-8">Our Services</h1>
   <p class="text-gray-600 mb-20 text-lg">"Your One-Stop Solution for Professional Pet Care Services and Booking Management"</p>
   
   <!-- Top Row Services -->
   <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
     <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-lg shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/pet-search.jpg') }}" alt="Pet Care Search" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Pet Care Search</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">This website allows users to search for services, animal sitting by Location, Reviews users, prices, and types of services offered.</p>
     </div>
      <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-lg shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/vendor-information.jpg') }}" alt="Service and Pricing Information" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Service and Pricing Information</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Provides complete information about facilities, service quality, and custody fees, so pet owners can make informed decisions.</p>
     </div>
      <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-lg shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/online-book.jpg') }}" alt="Online Booking and Payment" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Online Booking and Payment</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Simplify the process of ordering daycare services through online booking features and secure and convenient digital payments.</p>
     </div>
   </div>
    <!-- Bottom Row Services -->
   <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
     <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-lg shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/vendor-profile.jpg') }}" alt="Vendor Profile and Reviews" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Vendor Profile and Reviews</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Displays a complete vendors profile with reviews and ratings from previous users, helping pet owners choose a place they trust.</p>
     </div>
      <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-lg shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/scheduling.jpg') }}" alt="Scheduling and Reminders" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Scheduling and Reminders</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Allows users to schedule animal daycare within a specific period of time, with automatic reminders to prepare for daycare or pick up animals.</p>
     </div>
      <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-lg shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/communication.jpg') }}" alt="Communication with Providers Service" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Communication with Providers Service</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Facilitates direct communication between owners and service providers via messages or calls</p>
     </div>
   </div>
 </div>
</section>
<!-- ... existing code ... -->

  <!-- Vendor Section -->
  <section class="py-16 bg-neutral-50 transition-all duration-300 ease-in-out">
    <div class="container mx-auto px-4 transition-all duration-300 ease-in-out">
      <h2 class="text-center text-gray-800 text-xl font-bold mb-8">Recommendations for Trusted Vendors</h2>
      <div class="grid grid-cols-4 gap-x-6 gap-y-8">
        <!-- Vendor Card -->
        <div class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
          <img src="/pet-shop.png" alt="" class="w-full h-auto mb-4 rounded-lg object-cover">
          <h3 class="font-semibold text-gray-700">DayPet Care</h3>
          <p class="text-sm text-gray-500">Bandung</p>
          <p class="text-yellow font-bold mt-auto">Rp.200.000/day</p>
          <button
            class="mt-auto bg-yellow py px hover:bg-darkyellow"
            >Contact
          </button>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
