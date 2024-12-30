<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Coodiddy</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            rel="stylesheet"
        />

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/css/style.css'])
    </head>
    <body class="bg-gray-100">
        <header class="header">
            <div class="logo">Coodiddy</div>
            <div class="user-menu">
                <p><a href="">Register as a Vendor </a></p>
                <p><a href="">Vendor</a></p>

                <div class="user-dropdown"
b                       alt="User profile picture"
                        height="40"
                        src="https://storage.googleapis.com/a1aa/image/XzyUF3YlmbYpLJDsfOguCXNDhKETrZXVR6ysBqzF8rQjQJeTA.jpg"
                        width="40"
                        onclick="toggleDropdown()"
                    >
                    <div class="dropdown" id="dropdown-menu">
                        <div class="user-info">
                            <div>
                                <h4>Tedy Sukma Permana</h4>
                                <p><i class="uil uil-store"></i>DaysPet Care</p>
                            </div>
                            <img
                                src="img/IMG_1142-e1490899405898 1.png"
                                alt="Profile Picture"
                                class="user-pic"
                            />
                        </div>
                        <div class="menu-options">
                            <div class="menu-item">
                                <i class="uil uil-cog"></i>
                                <span>Settings</span>
                            </div>
                            <div class="menu-item logout">
                                <i class="uil uil-signout"></i>
                                <span>Logout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="max-w-5xl mx-auto p-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <div class="bg-white p-6 rounded-lg shadow-md mb-6 mt-20">
                        <h2 class="text-lg font-bold mb-4">Vendor Address</h2>
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-home text-xl"></i>
                            <div>
                                <p class="font-semibold">DaysPet Care</p>
                                <p>
                                    Jl. Muararajeun No 23 Kelurahan Cibeunying
                                    Kecamatan Neglasari, 40195, Kota Bandung
                                </p>
                                <p>082934123431</p>
                            </div>
                        </div>
                        <button class="mt-4 px-4 py-2 bg-gray-200 rounded">
                            Change Address
                        </button>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                        <h2 class="text-lg font-bold mb-4">Booking</h2>
                        <div class="flex items-start space-x-4">
                            <img
                                alt="Pet image"
                                class="w-20 h-20 rounded-full"
                                height="80"
                                src="https://storage.googleapis.com/a1aa/image/sLLDmQ3SRGbWORjRUf79ZPhnl62wpdgZ3Ommf5cq5Kiv9c9TA.jpg"
                                width="80"
                            />
                            <div>
                                <p>
                                    Entrust your pet cat with a service for pet
                                    sitting, grooming and pedicure.
                                </p>
                                <p>Phone: 0873-0956-4743</p>
                                <p>Name: Ambalingham</p>
                            </div>
                        </div>
                        <button class="mt-4 px-4 py-2 bg-gray-200 rounded">
                            Change your plan
                        </button>
                        <div class="mt-4">
                            <label class="block mb-2" for="status">
                                Picked up
                            </label>
                            <select
                                class="w-full px-4 py-2 border rounded"
                                id="status"
                            >
                                <option>
                                    Jl. P.H.H Mustafa No 241 Gg Aluminium RT 03
                                    RW 20, Kota Bandung Kelurahan Sukasuka,
                                    Kecamatan Adadeh 08779812334
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white p-6 rounded-lg shadow-md mb-6 flex flex-col items-center mt-20"
                >
                    <h2 class="text-lg font-bold mb-4">Payment Summary</h2>
                    <div class="space-y-2 w-full">
                        <div class="flex justify-between">
                            <span> Pet sitting (3 Hari) </span>
                            <span> Rp. 600.000 </span>
                        </div>
                        <div class="flex justify-between">
                            <span> Grooming </span>
                            <span> Rp. 120.000 </span>
                        </div>
                        <div class="flex justify-between">
                            <span> Pedicure </span>
                            <span> Rp. 50.000 </span>
                        </div>
                        <div class="flex justify-between">
                            <span> Pickup </span>
                            <span> Rp. 10.000 </span>
                        </div>
                        <div class="flex justify-between font-bold">
                            <span> Total </span>
                            <span> Rp. 780.000 </span>
                        </div>
                    </div>
                    <div class="mt-4 w-full">
                        <label class="block mb-2" for="payment">
                            Select Payment
                        </label>
                        <select
                            class="w-full px-4 py-2 border rounded"
                            id="payment"
                        >
                            <option>Balance</option>
                            <option>Gopay</option>
                            <option>Bank Transfer</option>
                        </select>
                    </div>
                    <button
                        class="mt-4 w-full px-4 py-2 bg-[#A9714B] text-white rounded"
                    >
                        Pay
                    </button>
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
    <script src="script.js"></script>
    </body>
</html>
