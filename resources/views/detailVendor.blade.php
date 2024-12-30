<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Coodiddy</title>
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="header">
            <div class="logo">Coodiddy</div>
            <div class="user-menu">
                <p><a href="">Register as a Vendor </a></p>
                <p><a href="">Vendor</a></p>

                <div class="user-dropdown">
                    <img
                        alt="User profile picture"
                        height="40"
                        src="https://storage.googleapis.com/a1aa/image/XzyUF3YlmbYpLJDsfOguCXNDhKETrZXVR6ysBqzF8rQjQJeTA.jpg"
                        width="40"
                        class="profile-pic" 
                    />
                    <div class="dropdown" id="dropdown-menu">
                        <div class="user-info">
                            <div>
                                <h4>Tedy Sukma Permana</h4>
                                <p><i class="uil uil-store"></i>DaysPet Care</p>
                            </div>
                            <img
                                src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                                alt="Profile Picture"
                                class="user-pic"
                            />
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
            </div>
        </header>
        <main class="max-w-6xl mx-auto p-4 mt-20">
            <div
                class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4"
            >
                <div
                    class="bg-white p-4 rounded-lg shadow-md w-full md:w-1/2 h-auto"
                >
                    <img
                        alt="Pet shop front view"
                        class="w-full rounded-lg h-64 "
                        height="150"
                        src="{{ asset('img/IMG_1142-e1490899405898 2 (2).png') }}"
                        width="600"
                    />
                    <div class="mt-4 flex space-x-4">
                        <img
                            alt="Pet shop interior view 1"
                            class="w-1/3 h-24 object-cover rounded-lg"
                            src="{{ asset('img/kandang kucing 1.png') }}"
                        />
                        <img
                            alt="Pet shop interior view 2"
                            class="w-1/3 h-24 object-cover rounded-lg"
                            src="{{ asset('img/kandang kucing2 1.png') }}"
                        />
                        <img
                            alt="Pet shop interior view 3"
                            class="w-1/3 h-24 object-cover rounded-lg"
                            src="{{ asset('img/kandang kucing 1.png') }}"
                        />
                    </div>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-md w-full md:w-1/2 h-auto flex flex-col justify-between"
                >
                    <div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-2xl font-bold">DayPet Care</h2>
                                <div class="flex items-center mt-2">
                                    <div class="flex text-yellow-500">
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                    </div>
                                    <span class="ml-2 text-gray-600">
                                        440+ Visitors
                                    </span>
                                </div>
                            </div>
                            <i
                                class="far fa-heart heart text-2xl cursor-pointer"
                            >
                            </i>
                        </div>
                        <p class="mt-4 text-gray-700">
                            DayPet Care offers professional pet care services
                            with modern and comfortable facilities. We have an
                            experienced team ready to give your pet full
                            attention. Equipped with a spacious indoor play
                            area, a quality grooming station, and a 24/7
                            monitoring system to ensure the safety and comfort
                            of every animal we care for.
                        </p>
                    </div>
                    <div>
                        <p class="mt-4 text-xl font-bold">Bandung</p>
                        <p class="text-xl font-bold">Rp.200.000/day</p>
                        <div class="mt-4 flex space-x-4">
                            <button
                                class="bg-[#A97142] text-white px-4 py-2 rounded-lg"
                            >
                                Book Now
                            </button>
                            <button
                                class="bg-[#A97142] text-white px-4 py-2 rounded-lg"
                            >
                                Contact
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">Reviews</h3>
                    <span
                        class="bg-[#A97142] text-white px-3 py-1 rounded-full"
                    >
                        13
                    </span>
                </div>
                <div class="mt-4">
                    <div class="flex items-start">
                        <img
                            alt="Reviewer avatar"
                            class="w-12 h-12 rounded-full"
                            height="50"
                            src="https://storage.googleapis.com/a1aa/image/DMuf9NYWTfrcEULCyWvnejR2yEP4I0fvk8gYYF9q0Jw1CdyPB.jpg"
                            width="50"
                        />
                        <div class="ml-4 flex-1">
                            <div class="flex justify-between items-center">
                                <h4 class="font-bold">Tedy Sukma Permana</h4>
                                <span class="text-gray-500">
                                    November 3, 2024
                                </span>
                            </div>
                            <div class="flex items-center mt-1 text-yellow-500">
                                <i class="fas fa-star star cursor-pointer"> </i>
                                <i class="fas fa-star star cursor-pointer"> </i>
                                <i class="fas fa-star star cursor-pointer"> </i>
                                <i class="fas fa-star star cursor-pointer"> </i>
                                <i class="fas fa-star star cursor-pointer"> </i>
                            </div>
                            <p class="mt-2 text-gray-700">
                                The service was very satisfactory! The staff is
                                friendly and professional in handling my cat.
                                The facilities are clean and complete, with a
                                comfortable play area for pets. The price is
                                very much in line with the quality of the
                                service provided. Highly recommended for pet
                                owners who are looking for a trusted pet shop in
                                Bandung.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="footer mt-2">
                <div class="footer-section-head">
                    <p class="mb-2"><span>Coodiddy</span></p>
                    <p>
                        Our vision is to connect pet owners with trusted<br> caregivers,
                        making pet care services accessible,<br> convenient, and
                        reliable for everyone.
                    </p>
                </div>
                <div class="footer-section-list">
                    <div class="footer-section">
                        <h3 class="text-xl font-bold">Page</h3>
                        <p><a href="">Register as a vendor</a></p>
                        <p><a href="">vendor</a></p>
                        
                    </div>
                    <div class="footer-section">
                        <h3 class="text-xl font-bold">Community</h3>
                        <p><a href="">Events</a></p>
                        <p><a href="">Blog</a></p>
                        <p><a href="">Article</a></p>
                    </div>
                    <div class="footer-section">
                        <h3 class="text-xl font-bold">Socials</h3>
                        <p><a href="">Discord</a></p>
                        <p><a href="">Instagram</a></p>
                        <p><a href="">Twitter</a></p>
                        <p><a href="">Facebook</a></p>
                    </div>
                </div>
            </div>
            <span class="footer-line"></span>
            <div class="footer-copyright">
                <p>&copy; 2024 Coodiddy. All rights reserved</p>
            </div>
        </footer>
    </body>
</html>
