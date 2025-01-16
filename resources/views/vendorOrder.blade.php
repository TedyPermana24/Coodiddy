@extends('components.layoutVendor')

@section('content')
    <!-- Main Content -->
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

        <!-- Main Dashboard -->
        <main class="flex-1 p-16">
            <!-- Welcome Section -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-black mb-2">Welcome to Coodiddy</h1>
                <p class="text-xl font-normal text-black">Make the most comfortable home for the animals we all love.</p>
            </div>

            <!-- Orders Section -->
            <div class="p-8 bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
                <h2 class="text-2xl font-bold text-[#a4724c] mb-6">Order</h2>

                <!-- Order Table -->
                <div class="flex flex-col justify-between items-start mb-6 w-auto">
                    <!-- Order Header -->
                    <div class="flex justify-start items-center pl-6 pr-6 bg-[#a4724c] w-full gap-7 mb-4">
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Name Pet</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Pet Type</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Day Sitting</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Add. Services</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Pick Up/Drop Off</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Status</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white mr-16 ml-16">
                            <h1 class="py-3 px-4 text-center text-sm">Action</h1>
                        </div>
                    </div>

                    <!-- Card 1 -->
                    <div class="card w-full border-0 shadow-xl mb-9">
                        <div class="flex justify-between items-center w-full gap-7 bg-[#F8F0E3] p-4 pl-11 pr-11">
                            <div class="flex items-center gap-2 w-1/2 text-black">
                                <img src="../../public/img/cat-login-long.jpg" alt="Avatar" class="w-7 h-7 rounded-full mr-3">
                                <p class="font-medium">Fathurrahman Pratama Putra</p>
                            </div>
                            <div class="flex items-center gap-2 w-1/2 text-black justify-end">
                                <p class="font-medium">No. Order 2SDF32413212</p>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center pl-6 pr-6 w-full gap-7 pt-4 pb-4">
                            <div class="flex items-center justify-left gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">Khaleed Kashmiri</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">Cat</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">2 Days</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">Grooming</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">Pick Up</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-yellow-500">
                                <h1 class="py-3 px-4 text-left font-medium">On Progress</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-blue-500 mr-16 ml-16">
                                <a href="{{ route('dashboard.vendor.order.detail') }}" class="py-3 px-4 text-center font-medium cursor-pointer hover:text-[#a4724c]">See Details</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card w-full border-0 shadow-xl mb-9">
                        <div class="flex justify-between items-center w-full gap-7 bg-[#F8F0E3] p-4 pl-11 pr-11">
                            <div class="flex items-center gap-2 w-1/2 text-black">
                                <img src="../../public/img/cat-login-long.jpg" alt="Avatar" class="w-7 h-7 rounded-full mr-3">
                                <p class="font-medium">Fathurrahman Pratama Putra</p>
                            </div>
                            <div class="flex items-center gap-2 w-1/2 text-black justify-end">
                                <p class="font-medium">No. Order 2SDF32413212</p>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center pl-6 pr-6 w-full gap-7 pt-4 pb-4">
                            <div class="flex items-center justify-left gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">Khidir Karawita</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">Cat</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">3 Days</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">Grooming, Pedicure</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">Drop Off</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-green-500">
                                <h1 class="py-3 px-4 text-left font-medium">Completed</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-blue-500 mr-16 ml-16">
                                <a href="#" class="py-3 px-4 text-center font-medium cursor-pointer hover:text-[#a4724c]">See Details</a>
                            </div>
                        </div>
                    </div>

                    <!-- mangga tambah card na -->
                    <!-- for each na ge pang set keun -->

                </div>
            </div>
        </main>
    </div>
@endsection
