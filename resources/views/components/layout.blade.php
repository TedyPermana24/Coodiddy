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
  <nav class="bg-[#F8F0E3] absolute w-full z-20 top-0 left-0 flex justify-between items-center py-7 px-16 font-poppins transition-all duration-300 ease-in-out">
    <div class="text-2xl font-bold text-gray-800 ml-16">
      <a href="/" class="hover:text-[#6B4423] text-3xl font-bold">Coodiddy</a>
    </div>
    <div class="flex items-center space-x-8 mr-16">
      <a href="#" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Register as Vendor?</a>
      <a href="#" class="text-gray-800 hover:text-[#6B4423] font-poppins font-normal text-base">Vendor</a>
      @auth
      <!-- Jika User Login -->
      <div class="relative">
          <img 
              alt="User profile picture"
              class="h-10 w-10 rounded-full cursor-pointer border border-gray-300"
              src="https://storage.googleapis.com/a1aa/image/XzyUF3YlmbYpLJDsfOguCXNDhKETrZXVR6ysBqzF8rQjQJeTA.jpg"
              onclick="toggleDropdown()"
          />
          <!-- Dropdown menu -->
          <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-md z-30">
              {{-- <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a> --}}
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button 
                      type="submit" 
                      class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100"
                  >
                      Logout
                  </button>
              </form>
          </div>
      </div>
      @else
      <!-- Jika User Belum Login -->
      <a href="{{ route('login') }}" class="bg-[#A5724C] text-white py-1 px-6 rounded-xl hover:bg-[#4A3B32] font-poppins font-normal text-base">Login</a>
      @endauth
    </div>
</nav>


  
@yield('content')
  

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

