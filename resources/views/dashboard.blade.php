<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Coodiddy</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
        />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/feather-icons"></script>
        
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
            </div>
        </header>
        <div class="banner">
            <img
                alt="Banner image with a dog"
                height="300"
                src="{{ asset('img/doggy3 2.png') }}"
                width="1200"
            />
            <div class="banner-text">
                <h1>Vendor</h1>
                <p><a href="">Home</a>&gt;</p>
                <p><a href="">Vendor</a></p>
            </div>
        </div>
        <div class="content">
            <div class="container-filter">
                <div class="filter-bar">
                    <div class="filter">
                        <div class="filter-icon">
                            <i class="uil uil-filter" ></i>
                            <p>Filter</p>
                        </div>
                        <div class="vertical-line"></div>
                        <p>1-16 of 32 results</p> 
                    </div>
                    
                    <div class="search">
                        <i class="uil uil-bars"></i>
                        <input class="search-input" placeholder="Search" type="text" />
                        <i class="uil uil-search"></i>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="card">
                    <img
                        alt="Pet shop image"
                        height="200"
                        src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                        width="250"
                    />
                    <div class="card-content">
                        <div class="card-content-head">
                            <p>DayPet Care</p>
                            <i class="uil uil-heart"></i>
                        </div>
                        <div class="card-content-main"> 
                            <p class="price">Bandung <br> Rp.200.000/<span>day</span></p>
                            <form action="{{ route('detailVendor') }}" method="POST">
                                @csrf
                                <button type="submit" class="contact-btn">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img
                        alt="Pet shop image"
                        height="200"
                        src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                        width="250"
                    />
                    <div class="card-content">
                        <div class="card-content-head">
                            <p>DayPet Care</p>
                            <i class="uil uil-heart"></i>
                        </div>
                        <div class="card-content-main"> 
                            <p class="price">Bandung <br> Rp.200.000/<span>day</span></p>
                            <form action="{{ route('detailVendor') }}" method="POST">
                                @csrf
                                <button type="submit" class="contact-btn">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img
                        alt="Pet shop image"
                        height="200"
                        src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                        width="250"
                    />
                    <div class="card-content">
                        <div class="card-content-head">
                            <p>DayPet Care</p>
                            <i class="uil uil-heart"></i>
                        </div>
                        <div class="card-content-main"> 
                            <p class="price">Bandung <br> Rp.200.000/<span>day</span></p>
                            <form action="{{ route('detailVendor') }}" method="POST">
                                @csrf
                                <button type="submit" class="contact-btn">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img
                        alt="Pet shop image"
                        height="200"
                        src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                        width="250"
                    />
                    <div class="card-content">
                        <div class="card-content-head">
                            <p>DayPet Care</p>
                            <i class="uil uil-heart"></i>
                        </div>
                        <div class="card-content-main"> 
                            <p class="price">Bandung <br> Rp.200.000/<span>day</span></p>
                            <form action="{{ route('detailVendor') }}" method="POST">
                                @csrf
                                <button type="submit" class="contact-btn">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img
                        alt="Pet shop image"
                        height="200"
                        src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                        width="250"
                    />
                    <div class="card-content">
                        <div class="card-content-head">
                            <p>DayPet Care</p>
                            <i class="uil uil-heart"></i>
                        </div>
                        <div class="card-content-main"> 
                            <p class="price">Bandung <br> Rp.200.000/<span>day</span></p>
                            <form action="{{ route('detailVendor') }}" method="POST">
                                @csrf
                                <button type="submit" class="contact-btn">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img
                        alt="Pet shop image"
                        height="200"
                        src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                        width="250"
                    />
                    <div class="card-content">
                        <div class="card-content-head">
                            <p>DayPet Care</p>
                            <i class="uil uil-heart"></i>
                        </div>
                        <div class="card-content-main"> 
                            <p class="price">Bandung <br> Rp.200.000/<span>day</span></p>
                            <form action="{{ route('detailVendor') }}" method="POST">
                                @csrf
                                <button type="submit" class="contact-btn">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img
                        alt="Pet shop image"
                        height="200"
                        src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                        width="250"
                    />
                    <div class="card-content">
                        <div class="card-content-head">
                            <p>DayPet Care</p>
                            <i class="uil uil-heart"></i>
                        </div>
                        <div class="card-content-main"> 
                            <p class="price">Bandung <br> Rp.200.000/<span>day</span></p>
                            <form action="{{ route('detailVendor') }}" method="POST">
                                @csrf
                                <button type="submit" class="contact-btn">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img
                        alt="Pet shop image"
                        height="200"
                        src="{{ asset('img/IMG_1142-e1490899405898 1.png') }}"
                        width="250"
                    />
                    <div class="card-content">
                        <div class="card-content-head">
                            <p>DayPet Care</p>
                            <i class="uil uil-heart"></i>
                        </div>
                        <div class="card-content-main"> 
                            <p class="price">Bandung <br> Rp.200.000/<span>day</span></p>
                            <form action="{{ route('detailVendor') }}" method="POST">
                                @csrf
                                <button type="submit" class="contact-btn">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>
                    <i class="uil uil-angle-right-b"></i>
                </button>
            </div>
        </div>
        <footer>
            <div class="footer">
                <div class="footer-section-head">
                    <p><span>Coodiddy</span></p>
                    <p>
                        Our vision is to connect pet owners with trusted<br> caregivers,
                        making pet care services accessible,<br> convenient, and
                        reliable for everyone.
                    </p>
                </div>
                <div class="footer-section-list">
                    <div class="footer-section">
                        <h3>Page</h3>
                        <p><a href="">Register as a vendor</a></p>
                        <p><a href="">vendor</a></p>
                        
                    </div>
                    <div class="footer-section">
                        <h3>Community</h3>
                        <p><a href="">Events</a></p>
                        <p><a href="">Blog</a></p>
                        <p><a href="">Article</a></p>
                    </div>
                    <div class="footer-section">
                        <h3>Socials</h3>
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