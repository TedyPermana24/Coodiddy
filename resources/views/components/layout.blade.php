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
<nav class="bg-[#F8F0E3] absolute w-full z-20 top-0 left-0 flex justify-between items-center py-7 px-16 font-poppins transition-all duration-300 ease-in-out mb-20">
    <div class="text-2xl font-bold text-gray-800 ml-16">
        <a href="{{ route('home') }}" class="hover:text-[#6B4423] text-3xl font-bold">Coodiddy</a>
    </div>
    <div class="flex items-center space-x-8 mr-16">
        <p><a href="{{ route('registerVendor') }}" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Register as Vendor?</a></p>
        <p><a href="{{ route('vendor') }}" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Vendor</a></p>

        @auth
        <!-- User is logged in -->
        <div class="user-dropdown flex items-center">
            <img
                alt="User profile picture"
                src="{{ asset('img/kucing-kosan-hendra.jpg') }}"
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

        <div class="w-52 h-36 bg-white rounded-lg border border-[#d9d9d9] flex-col justify-start items-start gap-1 dropdown hidden border-solid" id="dropdown-menu">
            <!-- User Info Section -->
            <div class="self-stretch h-16 p-2.5 border-b border-black flex-col justify-start items-start gap-2.5 flex">
                <div class="self-stretch justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-black text-xs font-semibold font-poppins">
                        {{ Auth::user()->name }}
                    </div>
                </div>
                <div class="self-stretch justify-start items-center inline-flex">
                    <img src="{{ asset('svg/vendor.svg') }}" class="w-4 h-4 mr-2" alt="No Vendor Icon">
                    <div class="w-32 h-4 text-black text-xs font-normal font-poppins">
                        {{ Auth::user()->vendor_name ?? 'No Vendor' }}
                    </div>
                </div>
            </div>
        
            <!-- Menu Options Section -->
            <div class="self-stretch h-16 p-2.5 flex-col justify-start items-end gap-2.5 flex">
                <!-- Settings Menu Item -->
                <div class="self-stretch justify-start items-center gap-2 inline-flex">
                    <a href="{{ route('profile.edit') }}" class="w-32 h-4 text-black text-xs font-normal font-poppins flex items-center">
                        <img src="{{ asset('svg/settings.svg') }}" class="w-4 h-4 mr-2" alt="Settings Icon">
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
        
        @else
        <!-- User is not logged in -->
        <a href="{{ route('login') }}" class="bg-[#A5724C] text-white py-2 px-8 rounded-xl hover:bg-[#4A3B32] font-poppins font-normal text-base">Login</a>
        @endauth
    </div>
</nav>

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




  
@yield('content')
  

  <!-- Footer -->
  <footer class="bg-[#FFF5E0] w-full pt-8 sm:pt-12 md:pt-16 lg:pt-20 pb-4">
    <div class="container mx-auto px-4">
        <!-- Footer Content -->
        <div class="flex flex-col lg:flex-row lg:justify-between gap-8 lg:gap-0 mb-8">
            <!-- Brand Section -->
            <div class="w-full lg:w-1/3">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#4A3B32] mb-4 sm:mb-6 lg:mb-8 text-center lg:text-left">Coodiddy</h2>
                <p class="text-sm sm:text-base md:text-lg text-gray-600 mb-8 lg:mb-20 text-center lg:text-left">Our mission is to connect pet owners with trusted caregivers, making pet care services accessible, convenient, and reliable for everyone.</p>
            </div>
  
            <!-- Navigation Sections -->
            <div class="flex flex-col sm:flex-row gap-8 sm:gap-12 md:gap-16 lg:gap-20 justify-center lg:justify-end">
                <!-- Pages Section -->
                <div class="text-center sm:text-left">
                    <h3 class="text-xl sm:text-2xl font-semibold text-[#4A3B32] mb-4 sm:mb-6 lg:mb-8">Page</h3>
                    <ul class="space-y-2 sm:space-y-3">
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Register as a vendor?</a></li>
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Vendor</a></li>
                    </ul>
                </div>
  
                <!-- Community Section -->
                <div class="text-center sm:text-left">
                    <h3 class="text-xl sm:text-2xl font-semibold text-[#4A3B32] mb-4 sm:mb-6 lg:mb-8 footer-nav hover:footer-nav">Community</h3>
                    <ul class="space-y-2 sm:space-y-3">
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Events</a></li>
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Blog</a></li>
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Article</a></li>
                    </ul>
                </div>
  
                <!-- Socials Section -->
                <div class="text-center sm:text-left">
                    <h3 class="text-xl sm:text-2xl font-semibold text-[#4A3B32] mb-4 sm:mb-6 lg:mb-8">Socials</h3>
                    <ul class="space-y-2 sm:space-y-3">
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Discord</a></li>
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Instagram</a></li>
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Twitter</a></li>
                        <li><a href="#" class="text-sm sm:text-base md:text-lg text-gray-600 footer-nav hover:footer-nav">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
  
        <!-- Copyright -->
        <div class="border-t-2 border-gray-300 pt-4">
            <p class="text-base sm:text-lg md:text-xl font-semibold text-[#4A3B32] text-center lg:text-left">&copy;2024 Coodiddy, All rights reserved</p>
        </div>
    </div>
</footer>

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
</body>
</html>

