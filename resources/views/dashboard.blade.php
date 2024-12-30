@extends('components.layout')

@section('content')
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
                            <form action="{{ route('vendor.detail') }}" method="POST">
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
                            <form action="{{ route('vendor.detail') }}" method="POST">
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
                            <form action="{{ route('vendor.detail') }}" method="POST">
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
                            <form action="{{ route('vendor.detail') }}" method="POST">
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
                            <form action="{{ route('vendor.detail') }}" method="POST">
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
                            <form action="{{ route('vendor.detail') }}" method="POST">
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
                            <form action="{{ route('vendor.detail') }}" method="POST">
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
                            <form action="{{ route('vendor.detail') }}" method="POST">
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
@endsection

@section('script')
<script src="script.js"></script>
@endsection
   
