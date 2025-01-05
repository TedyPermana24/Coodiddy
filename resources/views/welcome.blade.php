@extends('components.layout')

@section('style')
  <style>
    /* Navigation buttons positioned outside cards */
    #prevBtn, #nextBtn {
        z-index: 10;
        width: 48px;
        height: 48px;
    }

    #prevBtn {
        left: -56px; /* Position it slightly outside the slider */
    }

    #nextBtn {
        right: -56px; /* Position it slightly outside the slider */
    }

    /* Ensure smooth carousel behavior */
    #slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }
  </style>
@endsection

@section('content')
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
  <section class="h-screen bg-white transition-all duration-300 ease-in-out pt-20">
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
  <section class="w-full h-auto pt-60">
    <img src="{{ asset('img/img-section.png') }}" alt="Pet Care" 
        class="w-full object-cover">
  </section>

<!-- Vendor Section -->
  <div class="w-full overflow-hidden relative h-auto py-20">
    <div class="container mx-auto px-4">
      <!-- Title Section -->
      <div class="text-center mb-8">
        <h2 class="text-5xl font-bold text-[#4A3B32] pt-12 mb-8">Vendor</h2>
        <p class="text-gray-600 mb-20 text-lg">Recommendations for trusted vendors</p>
      </div>

      <!-- Slider Container -->
      <div class="relative overflow-hidden">
        <!-- Slider Wrapper -->
        <div id="slider" class="flex gap-6 transition-transform duration-500 ease-in-out">
            <!-- Cards -->
            @foreach ($pethotels as $p)
                @foreach ($p->hotelPricings as $pr)
                    <div class="w-1/4 flex-shrink-0 bg-white rounded-2xl shadow-md">
                        <div class="relative w-full h-0" style="padding-bottom: 75%;">
                            <img src="{{ asset('img/communication.jpg') }}" alt="Pet Shop"
                                class="absolute inset-0 w-full h-full object-cover rounded-t-2xl">
                        </div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold">{{ $p->name }}</h3>
                                <div class="flex gap-1">
                                    @for ($i = 0; $i < floor($p->ratings); $i++)
                                        <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="w-6 h-6">
                                    @endfor
                                    @for ($i = 0; $i < (5 - ceil($p->ratings)); $i++)
                                        <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="w-6 h-6">
                                    @endfor
                                </div>
                            </div>
                            <div class="flex items-center gap-2 mb-2">
                                <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="w-5 h-5">
                                <span class="text-xl font-medium text-[#8B5E3C]">{{ $pr->species }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="w-5 h-5">
                                <span class="text-xl font-medium text-[#0071FF]">{{ $p->location }}</span>
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <p class="text-xl">
                                    <span class="font-bold">Rp{{ number_format($pr->price_per_day, 0, ',', '.') }}/</span>
                                    <span class="font-bold text-gray-500">day</span>
                                </p>
                                <a href="{{ route('vendor.detail', ['id' => $p->id]) }}" 
                                  class="bg-[#B17F5B] text-white px-4 py-2 rounded-md font-bold text-lg">
                                  Contact
                              </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    
        <!-- Navigation Buttons -->
        <button id="prevBtn"
        class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-[#B17F5B] text-white w-12 h-12 rounded-full shadow-lg z-50 flex items-center justify-center">
        <img src="{{ asset('svg/arrow-left.svg') }}" alt="Previous" class="w-6 h-6">
        </button>
        <button id="nextBtn"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#B17F5B] text-white w-12 h-12 rounded-full shadow-lg z-50 flex items-center justify-center">
            <img src="{{ asset('svg/arrow-right.svg') }}" alt="Next" class="w-6 h-6">
        </button>
    
        <!-- Dots Navigation -->
        <div id="dotsNav" class="flex justify-center gap-2 mt-6"></div>
    </div>

    </div>
  </div>

@endsection

@section('script')

<script>
  document.addEventListener('DOMContentLoaded', () => {
      const slider = document.getElementById('slider');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      const dotsNav = document.getElementById('dotsNav');
      const cards = Array.from(slider.children);
      const cardsPerPage = 4; // Number of cards displayed per dot
      const totalPages = Math.ceil(cards.length / cardsPerPage);
      const cardWidth = cards[0].getBoundingClientRect().width;
      let currentIndex = 0;

      // Create dots dynamically based on total pages
      function createDots() {
          dotsNav.innerHTML = '';
          for (let i = 0; i < totalPages; i++) {
              const dot = document.createElement('button');
              dot.classList.add(
                  'w-4', 'h-4', 'rounded-full',
                  'transition-all', 'duration-300',
                  i === 0 ? 'bg-[#B17F5B]' : 'bg-[#D9D9D9]'
              );
              dot.dataset.index = i;
              dotsNav.appendChild(dot);
          }
      }

      // Move slider to a specific page
      function moveToPage(pageIndex) {
          const offset = -(pageIndex * cardsPerPage * cardWidth);
          slider.style.transform = `translateX(${offset}px)`;
          currentIndex = pageIndex;

          // Update active dot
          Array.from(dotsNav.children).forEach((dot, i) => {
              dot.classList.toggle('bg-[#B17F5B]', i === pageIndex);
              dot.classList.toggle('bg-[#D9D9D9]', i !== pageIndex);
          });

          // Enable/Disable buttons
          prevBtn.disabled = currentIndex === 0;
          nextBtn.disabled = currentIndex === totalPages - 1;
      }

      // Event listeners for navigation
      prevBtn.addEventListener('click', () => {
          if (currentIndex > 0) moveToPage(currentIndex - 1);
      });

      nextBtn.addEventListener('click', () => {
          if (currentIndex < totalPages - 1) moveToPage(currentIndex + 1);
      });

      dotsNav.addEventListener('click', (e) => {
          if (e.target.tagName === 'BUTTON') {
              const pageIndex = parseInt(e.target.dataset.index, 10);
              moveToPage(pageIndex);
          }
      });

      // Initialize carousel
      createDots();
      moveToPage(0);

      // Adjust card width on resize
      window.addEventListener('resize', () => {
          const newCardWidth = cards[0].getBoundingClientRect().width;
          slider.style.transform = `translateX(-${currentIndex * cardsPerPage * newCardWidth}px)`;
      });
  });
</script>





  
@endsection



