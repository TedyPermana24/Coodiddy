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
  <nav class="bg-transparent absolute w-full z-20 top-0 left-0 flex justify-between items-center py-7 px-16 font-poppins transition-all duration-300 ease-in-out">
    <div class="text-2xl font-bold text-gray-800 ml-16">
      <a href="#" class="hover:text-[#6B4423] text-3xl font-bold">Coodiddy</a>
    </div>
    <div class="flex items-center space-x-8 mr-16">
      <a href="#" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Register as Vendor?</a>
      <a href="#" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Vendor</a>
      <a href="{{ route('login') }}" class="bg-[#A5724C] text-white py-2 px-8 rounded-xl hover:bg-[#4A3B32] font-poppins font-normal text-base">Login</a>
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
        <p class="mt-4 mb-12 text-gray-600 max-w-2xl mx-auto md:ml-0 text-lg">
            "We understand that your pets are family. That's why we're committed to providing exceptional care services with genuine love and attention to detail. Our certified vendors ensure your beloved companions receive the best possible care, making every day special for them while you're away."
        </p>
        <a href="#" class="text-xl bg-[#2E2C2C] text-white py-4 px-16 rounded-3xl hover:bg-[#6B4423] font-poppins font-semibold">
          Search For Vendors
        </a>
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
<section class="h-screen bg-white transition-all duration-300 ease-in-out">
 <div class="container mx-auto px-4 text-center transition-all duration-300 ease-in-out">
   <h1 class="text-5xl font-bold text-[#4A3B32] pt-12 mb-8">Our Services</h1>
   <p class="text-gray-600 mb-20 text-lg">"Your One-Stop Solution for Professional Pet Care Services and Booking Management"</p>
   
   <!-- Top Row Services -->
   <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
     <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-xl shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/pet-search.jpg') }}" alt="Pet Care Search" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Pet Care Search</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">This website allows users to search for services, animal sitting by Location, Reviews users, prices, and types of services offered.</p>
     </div>
      <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-xl shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/vendor-information.jpg') }}" alt="Service and Pricing Information" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Service and Pricing Information</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Provides complete information about facilities, service quality, and custody fees, so pet owners can make informed decisions.</p>
     </div>
      <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-xl shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/online-book.jpg') }}" alt="Online Booking and Payment" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Online Booking and Payment</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Simplify the process of ordering daycare services through online booking features and secure and convenient digital payments.</p>
     </div>
   </div>
    <!-- Bottom Row Services -->
   <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
     <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-xl shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/vendor-profile.jpg') }}" alt="Vendor Profile and Reviews" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Vendor Profile and Reviews</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Displays a complete vendors profile with reviews and ratings from previous users, helping pet owners choose a place they trust.</p>
     </div>
      <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-xl shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/scheduling.jpg') }}" alt="Scheduling and Reminders" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Scheduling and Reminders</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Allows users to schedule animal daycare within a specific period of time, with automatic reminders to prepare for daycare or pick up animals.</p>
     </div>
      <div class="bg-[#F8F0E3] hover:bg-gradient-to-br from-[#8B5E3C] to-[#4A3B32] p-8 rounded-xl shadow-xl transition-all duration-300 group">
        <div class="w-16 h-16 bg-white rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden border-2 border-[#6B4423]">
            <img src="{{ asset('img/communication.jpg') }}" alt="Communication with Providers Service" class="w-full h-full object-cover">
        </div>
       <h3 class="text-xl font-semibold mb-4 text-gray-800 transition-colors duration-300 group-hover:text-white">Communication with Providers Service</h3>
       <p class="text-lg text-gray-600 transition-colors duration-300 group-hover:text-white">Facilitates direct communication between owners and service providers via messages or calls</p>
     </div>
   </div>
 </div>
</section>


<!-- Image Section -->
<section class="w-full h-auto">
   <img src="{{ asset('img/img-section.png') }}" alt="Pet Care" 
       class="w-full object-cover">
</section>

<!-- Vendor Section -->
<div class="w-full overflow-hidden relative h-auto">
  <div class="container mx-auto px-4">
    <!-- Title Section -->
    <div class="text-center mb-8">
      <h2 class="text-5xl font-bold text-[#4A3B32] pt-12 mb-8">Vendor</h2>
      <p class="text-gray-600 mb-20 text-lg">Recommendations for trusted vendors</p>
    </div>

    <!-- Slider Container -->
    <div class="relative overflow-hidden">
      <!-- Slider Wrapper -->
      <div id="slider" class="flex justify-center gap-8 transition-transform duration-500 ease-in-out">

        <!-- Card 1 -->
        <div class="w-1/3 bg-white rounded-2xl shadow-[0_3px_10px_rgb(0,0,0,0.2)] mb-8">
          <!-- Image Container -->
          <div class="w-full relative" style="padding-bottom: 75%;">
            <img src="{{ asset('img/communication.jpg') }}" alt="Pet Shop" class="absolute top-0 left-0 w-full h-full object-cover rounded-t-xl">
          </div>
          <!-- Content Container -->
          <div class="p-4">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-2xl font-bold">DayPet Care</h3>
              <div class="flex items-center gap-1">
                <!-- Rating stars -->
                @for ($i = 0; $i < 4; $i++)
                  <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="h-6 w-6">
                @endfor
                <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="h-6 w-6">
              </div>
            </div>
            <div class="flex items-center gap-2 mb-1">
              <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#8B5E3C]">All Pets</span>
            </div>
            <div class="flex items-center gap-2">
              <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#0071FF]">Bandung</span>
            </div>
            <div class="flex items-center justify-between mt-1">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500">day</span>
              </p>
              <a href="{{ route('detailVendor') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
        </div>

        <!-- Card 1 -->
        <div class="w-1/3 bg-white rounded-2xl shadow-[0_3px_10px_rgb(0,0,0,0.2)] mb-8">
          <!-- Image Container -->
          <div class="w-full relative" style="padding-bottom: 75%;">
            <img src="{{ asset('img/communication.jpg') }}" alt="Pet Shop" class="absolute top-0 left-0 w-full h-full object-cover rounded-t-xl">
          </div>
          <!-- Content Container -->
          <div class="p-4">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-2xl font-bold">DayPet Care</h3>
              <div class="flex items-center gap-1">
                <!-- Rating stars -->
                @for ($i = 0; $i < 4; $i++)
                  <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="h-6 w-6">
                @endfor
                <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="h-6 w-6">
              </div>
            </div>
            <div class="flex items-center gap-2 mb-1">
              <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#8B5E3C]">All Pets</span>
            </div>
            <div class="flex items-center gap-2">
              <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#0071FF]">Bandung</span>
            </div>
            <div class="flex items-center justify-between mt-1">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500">day</span>
              </p>
              <a href="{{ route('detailVendor') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
        </div>

        <!-- Card 1 -->
        <div class="w-1/3 bg-white rounded-2xl shadow-[0_3px_10px_rgb(0,0,0,0.2)] mb-8">
          <!-- Image Container -->
          <div class="w-full relative" style="padding-bottom: 75%;">
            <img src="{{ asset('img/communication.jpg') }}" alt="Pet Shop" class="absolute top-0 left-0 w-full h-full object-cover rounded-t-xl">
          </div>
          <!-- Content Container -->
          <div class="p-4">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-2xl font-bold">DayPet Care</h3>
              <div class="flex items-center gap-1">
                <!-- Rating stars -->
                @for ($i = 0; $i < 4; $i++)
                  <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="h-6 w-6">
                @endfor
                <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="h-6 w-6">
              </div>
            </div>
            <div class="flex items-center gap-2 mb-1">
              <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#8B5E3C]">All Pets</span>
            </div>
            <div class="flex items-center gap-2">
              <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#0071FF]">Bandung</span>
            </div>
            <div class="flex items-center justify-between mt-1">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500">day</span>
              </p>
              <a href="{{ route('detailVendor') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
        </div>

        <!-- Card 1 -->
        <div class="w-1/3 bg-white rounded-2xl shadow-[0_3px_10px_rgb(0,0,0,0.2)] mb-8">
          <!-- Image Container -->
          <div class="w-full relative" style="padding-bottom: 75%;">
            <img src="{{ asset('img/communication.jpg') }}" alt="Pet Shop" class="absolute top-0 left-0 w-full h-full object-cover rounded-t-xl">
          </div>
          <!-- Content Container -->
          <div class="p-4">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-2xl font-bold">DayPet Care</h3>
              <div class="flex items-center gap-1">
                <!-- Rating stars -->
                @for ($i = 0; $i < 4; $i++)
                  <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="h-6 w-6">
                @endfor
                <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="h-6 w-6">
              </div>
            </div>
            <div class="flex items-center gap-2 mb-1">
              <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#8B5E3C]">All Pets</span>
            </div>
            <div class="flex items-center gap-2">
              <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#0071FF]">Bandung</span>
            </div>
            <div class="flex items-center justify-between mt-1">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500">day</span>
              </p>
              <a href="{{ route('detailVendor') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
        </div>
        <!-- Additional Cards -->
        <!-- Repeat the above card format as needed -->
      </div>

      <!-- Navigation Buttons -->
      <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-[#B17F5B] text-white p-4 w-16 h-16 rounded-full shadow-lg flex items-center justify-center">
        <img src="{{ asset('svg/arrow-left.svg') }}" alt="Previous" class="w-6 h-6">
      </button>
      <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#B17F5B] text-white p-4 w-16 h-16 rounded-full shadow-lg flex items-center justify-center">
        <img src="{{ asset('svg/arrow-right.svg') }}" alt="Next" class="w-6 h-6 ml-1">
      </button>

      <!-- Dots Navigation -->
      <div class="flex justify-center gap-2 mt-6 mb-24">
        <button class="w-4 h-4 rounded-full bg-[#B17F5B] transition-all duration-300" id="dot-0"></button>
        <button class="w-4 h-4 rounded-full bg-[#D9D9D9] transition-all duration-300" id="dot-1"></button>
        <button class="w-4 h-4 rounded-full bg-[#D9D9D9] transition-all duration-300" id="dot-2"></button>
      </div>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="bg-[#FFF5E0] w-full pt-20 pb-4">
  <div class="container mx-auto px-4">
      <!-- Footer Content -->
      <div class="flex justify-between mb-8">
          <!-- Brand Section -->
          <div class="w-1/3">
              <h2 class="text-4xl font-bold text-[#4A3B32] mb-8">Coodiddy</h2>
              <p class="text-gray-600 mb-20 text-lg">Our mission is to connect pet owners with trusted caregivers, making pet care services accessible, convenient, and reliable for everyone.</p>
          </div>

          <!-- Navigation Sections -->
          <div class="flex gap-20">
              <!-- Pages Section -->
              <div>
                  <h3 class="text-2xl font-semibold text-[#4A3B32] mb-8">Page</h3>
                  <ul class="space-y-2">
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Register as a vendor?</a></li>
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Vendor</a></li>
                  </ul>
              </div>

              <!-- Community Section -->
              <div>
                  <h3 class="text-2xl font-semibold text-[#4A3B32] mb-8">Community</h3>
                  <ul class="space-y-2">
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Events</a></li>
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Blog</a></li>
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Article</a></li>
                  </ul>
              </div>

              <!-- Socials Section -->
              <div>
                  <h3 class="text-2xl font-semibold text-[#4A3B32] mb-8">Socials</h3>
                  <ul class="space-y-2">
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Discord</a></li>
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Instagram</a></li>
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Twitter</a></li>
                      <li><a href="#" class="text-gray-600 mb-20 text-lg">Facebook</a></li>
                  </ul>
              </div>
          </div>
      </div>

      <!-- Copyright -->
      <div class="border-t-2 border-gray-300 pt-4">
          <p class="text-xl font-semibold text-[#4A3B32]">&copy;2024 Coodiddy, All rights reserved</p>
      </div>
  </div>
</footer>


<script>
  const slider = document.getElementById('slider');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  const dots = Array.from(document.querySelectorAll('[id^="dot-"]'));
  let currentIndex = 0;

  // Calculate total number of vendor cards inside the slider
  const totalCards = slider.querySelectorAll('.w-1/3').length;

  // Set to always show 3 cards
  const cardsToShow = 3;

  function updateSlider() {
    // Adjust the translateX calculation to always display 3 cards
    slider.style.transform = `translateX(-${(currentIndex * 100) / cardsToShow}%)`;
    updateDots();
    updateButtons();
  }

  function updateDots() {
    dots.forEach((dot, index) => {
      if (index === Math.floor(currentIndex / cardsToShow)) {
        dot.classList.add('bg-[#B17F5B]');
        dot.classList.remove('bg-[#D9D9D9]');
      } else {
        dot.classList.add('bg-[#D9D9D9]');
        dot.classList.remove('bg-[#B17F5B]');
      }
    });
  }

  function updateButtons() {
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex + cardsToShow >= totalCards;
  }

  nextBtn.addEventListener('click', () => {
    if (currentIndex + cardsToShow < totalCards) {
      currentIndex++;
      updateSlider();
    }
  });

  prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateSlider();
    }
  });

  window.addEventListener('resize', () => {
    // No longer need to adjust cardsToShow since it's always 3
    updateSlider();
  });

  updateSlider();
</script>


  

</body>
</html>

