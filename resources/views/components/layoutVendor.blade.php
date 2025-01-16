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
<nav class="bg-[#F8F0E3] w-full z-20 top-0 left-0 flex justify-between items-center py-7 px-16 font-poppins transition-all duration-300 ease-in-out">
    <div class="text-2xl font-bold text-gray-800 ml-16">
        {{-- <a href="{{ route('home') }}" class="hover:text-[#6B4423] text-3xl font-bold">
            <img src="{{ asset('svg/coodiddy-vendor.svg') }}" alt="Coodiddy" class="w-full h-full object-contain">
          </a> --}}
          <a href="{{ route('home') }}" class="hover:text-[#6B4423] text-3xl font-bold flex ">
            Coodiddy 
            <span class="text-lg"> Vendor</span>
          </a>
    </div>
    <div class="flex items-center space-x-8 mr-16">

        <div class="flex">
            <div class="self-stretch justify-start items-center inline-flex">
                <div class="w-32 h-4 text-black text-lg font-bold font-poppins mb-3">
                    @if (Auth::user()->petHotels && Auth::user()->petHotels->status === 'active')
                    {{ Auth::user()->petHotels->name }} <!-- Nama pet hotel jika status aktif -->
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
                id="profile-img" onclick="toggleDropdown()"
            />
            <!-- Arrow Icon -->
            <img id="arrow-icon" 
                src="{{ asset('svg/arrow-down.svg') }}" 
                class="w-4 h-4 ml-2 transition-transform duration-300" 
                data-arrow-down="{{ asset('svg/arrow-down.svg') }}" 
                data-arrow-up="{{ asset('svg/arrow-up.svg') }}" 
            />
        </div>

        <div class="w-52 h-40 bg-white rounded-lg border border-[#d9d9d9] flex-col justify-start items-start gap-1 dropdown hidden border-solid" id="dropdown-menu">
            <!-- User Info Section -->
            <div class="self-stretch h-16 p-2.5 border-b border-black flex-col justify-start items-start gap-2.5 flex">
                <div class="self-stretch justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-black text-xs font-semibold font-poppins">
                        {{ Auth::user()->name }}
                    </div>
                </div>
                <div class="self-stretch justify-start items-center inline-flex">
                    <a href="{{ route('dashboard.vendor') }}"><img src="{{ asset('svg/vendor.svg') }}" class="w-4 h-4 mr-2" alt="No Vendor Icon">
                    <div class="w-32 h-4 text-black text-xs font-normal font-poppins">
                        @if (Auth::user()->petHotels && Auth::user()->petHotels->status === 'active')
                        {{ Auth::user()->petHotels->name }} <!-- Nama pet hotel jika status aktif -->
                    </a>
                        @else
                            No Vendor
                        @endif
                    </div>
                </div>
            </div>
        
            <!-- Menu Options Section -->
            <div class="self-stretch h-16 p-2.5 flex-col justify-start items-end gap-2.5 flex">
                <div class="self-stretch justify-start items-center gap-2 inline-flex">
                    <a href="{{ route('list') }}" class="w-32 h-4 text-black text-xs font-normal font-poppins flex items-center">
                        <img src="{{ asset('svg/order.svg') }}" class="w-4 h-4 mr-2" alt="Order Icon">
                        Booking
                    </a>
                </div> 
                <!-- Settings Menu Item -->
                <div class="self-stretch justify-start items-center gap-2 inline-flex">
                    <a href="{{ route('profile') }}" class="w-32 h-4 text-black text-xs font-normal font-poppins flex items-center"> {{-- routenya arahkan ke profile/edit jadi di profile ada views  --}}
                        <img src="{{ asset('svg/settings.svg') }}" class="w-4 h-4 mr-2" alt="Settings Icon"> {{-- profile, pets, contact terhubung masuk ke settings, jadi ntar perbaiki lagi urg simpen layoutna views--}}
                        Settings
                    </a>
                </div>
        
                <!-- Logout Menu Item -->
                <div class="self-stretch justify-start items-start gap-2 inline-flex">
                    <form method="POST" action="{{ route('logout') }}" class="w-full flex items-center">
                        @csrf
                        <button type="submit" class="w-full text-left text-[#ea2424] text-xs font-normal font-poppins flex items-center">
                            <img src="{{ asset('svg/logout.svg') }}" class="w-4 h-4 mr-2" alt="Logout Icon">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
  
<div class="flex flex-1">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#f8f0e3] py-6 px-4 flex flex-col h-auto">
        <div class="flex-1">
            <!-- Vendor Name -->
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold">Daypet Care</h2>
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
                    <span>Rp. 1,234,000</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span>Total Transaction:</span>
                    <span>20</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-4">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('svg/home.svg') }}" alt="Home" class="w-4 h-4">
                    <a href="#" class="text-black">Home</a>
                </div>
                <div class="flex items-center gap-2">
                    <img src="{{ asset('svg/order.svg') }}" alt="Order" class="w-4 h-4">
                    <a href="#" class="text-black">Order</a>
                </div>
                <div class="flex items-center gap-2">
                    <img src="{{ asset('svg/settings.svg') }}" alt="Settings" class="w-4 h-4">
                    <a href="#" class="text-black">Settings</a>
                </div>
                <div class="flex items-center gap-2 pt-4">
                    <img src="{{ asset('svg/back.svg') }}" alt="Back" class="w-4 h-4">
                    <a href="#" class="text-black">Back to Coodiddy</a>
                </div>
            </nav>
        </div>
    </aside>

@yield('content')
</div>

  @yield('script')

  <script>
    function toggleDropdown() {
         const dropdown = document.getElementById('userDropdown');
         dropdown.classList.toggle('hidden');
     }
  
     // Optional: Close the dropdown when clicking outside
     document.addEventListener('click', function(event) {
         const dropdown = document.getElementById('userDropdown');
         const profileImg = event.target.closest('img');
         
         if (!profileImg && !dropdown.contains(event.target)) {
             dropdown.classList.add('hidden');
         }
     });
  </script>

<script>
    // Tunggu hingga seluruh DOM dimuat
    document.addEventListener("DOMContentLoaded", function() {
        // Fungsi untuk toggle dropdown dan ganti gambar arrow
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            const arrowIcon = document.getElementById('arrow-icon');

            // Pastikan dropdown ditemukan
            if (!dropdown) {
                console.error("Dropdown element with ID 'dropdown-menu' not found");
                return;
            }

            // Pastikan arrowIcon ditemukan
            if (!arrowIcon) {
                console.error("Arrow Icon element with ID 'arrow-icon' not found");
                return;
            }

            dropdown.classList.toggle('hidden');
            
            // // Debugging: Log status dropdown
            // console.log("Dropdown hidden:", dropdown.classList.contains('hidden'));

            // Cek apakah dropdown terlihat dan ganti gambar arrow sesuai
            if (dropdown.classList.contains('hidden')) {
                // console.log("Arrow pointing down");
                // Ganti gambar arrow ke arah bawah
                arrowIcon.src = arrowIcon.getAttribute('data-arrow-down');
            } else {
                // console.log("Arrow pointing up");
                // Ganti gambar arrow ke arah atas
                arrowIcon.src = arrowIcon.getAttribute('data-arrow-up');
            }
        }

        // Menutup dropdown saat klik di luar
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdown-menu');
            const profileImg = event.target.closest('img');
            const arrowIcon = document.getElementById('arrow-icon');

            // Pastikan dropdown ditemukan sebelum mencoba menggunakan contains
            if (!dropdown) {
                console.error("Dropdown element not found for outside click detection");
                return;
            }

            // Cek apakah klik terjadi di luar dropdown atau gambar profil
            if (!profileImg && !dropdown.contains(event.target) && event.target !== arrowIcon) {
                dropdown.classList.add('hidden');
                // Debugging: Log untuk menutup dropdown
                // console.log("Closing dropdown and resetting arrow");
                // Reset gambar arrow ke arah bawah
                arrowIcon.src = arrowIcon.getAttribute('data-arrow-down');
            }
        });

        // Bind fungsi toggleDropdown ke elemen gambar profil
        const profileImg = document.getElementById('profile-img');
        if (profileImg) {
            profileImg.addEventListener('click', toggleDropdown);
        } else {
            console.error("Profile image element with ID 'profile-img' not found");
        }
    });
</script>
</body>
</html>

