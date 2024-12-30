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
  <header class="header">
    <div class="logo">Coodiddy</div>
    <div class="user-menu">
        <p><a href="">Register as a Vendor</a></p>
        <p><a href="{{ route('vendor') }}">Vendor</a></p>

        @auth
        <!-- User is logged in -->
        <div class="user-dropdown">
            <img
                alt="User profile picture"
                height="40"
                src="https://storage.googleapis.com/a1aa/image/XzyUF3YlmbYpLJDsfOguCXNDhKETrZXVR6ysBqzF8rQjQJeTA.jpg"
                width="40"
                class="profile-pic"
                onclick="toggleDropdown()" 
            />
            <div class="dropdown" id="dropdown-menu">
                <div class="user-info">
                    <div>
                        <h4>{{ Auth::user()->name }}</h4>
                        <p><i class="uil uil-store"></i> {{ Auth::user()->vendor_name ?? 'No Vendor' }}</p>
                    </div>
                    <img src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}" alt="Profile Picture" class="user-pic" />
                </div>
                <div class="menu-options">
                    <!-- Settings Menu Item -->
                    <div class="menu-item">
                        <a href="{{ route('profile.edit') }}">
                            <i class="uil uil-cog"></i>
                            <span>Settings</span>
                        </a>
                    </div>
                
                    <!-- Logout Menu Item -->
                    <div class="menu-item logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">
                                <i class="uil uil-signout"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- User is not logged in -->
        <p><a href="{{ route('login') }}">Login</a></p>
        @endauth
    </div>
</header>

<script>
    // Toggle the dropdown visibility
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.classList.toggle('hidden');
    }

    // Optional: Close the dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown-menu');
        const profileImg = event.target.closest('img');

        if (!profileImg && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>


  
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

