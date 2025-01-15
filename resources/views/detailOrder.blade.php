@extends('components.layout')

@section('content')
    <!-- Main Content -->
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#f8f0e3] py-6 px-4 flex flex-col h-screen">
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
                </nav>
            </div>

            <!-- Back Link -->
            <div class="flex items-center gap-2 pt-4">
                <img src="{{ asset('svg/back.svg') }}" alt="Back" class="w-4 h-4">
                <a href="#" class="text-black">Back to Coodiddy</a>
            </div>
        </aside>

        <!-- Main Dashboard -->
        <main class="flex-1 p-6">
            <div class="flex gap-16 ml-10 mr-10">
                <!-- Order Details -->
                <div class="w-full">
                    <section class="bg-white shadow rounded-lg p-6 mb-6">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('svg/on-progress.svg') }}" alt="On Progress" class="w-6 h-6">
                            <h3 class="text-lg font-bold">On Progress</h3>
                        </div>
                    </section>

                    <!-- Order Details Content -->
                    <section class="bg-white shadow rounded-lg p-6">
                        <div class="space-y-6">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <img src="{{ asset('svg/no-order.svg') }}" alt="No Order" class="w-4 h-4">
                                    <p class="text-sm font-medium">No Order</p>
                                </div>
                                <p class="text-xs ml-6">2SDF32413212</p>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <img src="{{ asset('svg/person.svg') }}" alt="Person" class="w-4 h-4">
                                    <p class="text-sm font-medium">Customer</p>
                                </div>
                                <p class="text-xs ml-6">Fathurrahman Pratama Putra</p>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <img src="{{ asset('svg/location.svg') }}" alt="Location" class="w-4 h-4">
                                    <p class="text-sm font-medium">Address</p>
                                </div>
                                <p class="text-xs ml-6">Sukasari, Kec. Pameungpeuk, Kabupaten Bandung, Jawa Barat 40376</p>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <img src="{{ asset('svg/truck.svg') }}" alt="Truck" class="w-4 h-4">
                                    <p class="text-sm font-medium">Pick Up / Drop Off</p>
                                </div>
                                <p class="text-xs ml-6">Pick Up by Driver Coodiddy</p>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Order Status -->
                <section class="bg-white shadow rounded-lg p-6 w-1/3">
                    <div class="flex items-center justify-center mb-6">
                        <h3 class="text-sm font-bold text-center">Order Status</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('svg/incoming-order.svg') }}" alt="Incoming Order" class="w-5 h-5">
                            <div>
                                <p class="text-xs font-medium">Incoming Order</p>
                                <p class="text-xs text-gray-500">02/01/2025 07:00</p>
                            </div>
                        </div>
                        <button class="w-full bg-[#a4724c] text-white py-2 rounded-full text-sm">
                            Ready for pickup
                        </button>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection