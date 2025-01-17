@extends('components.layoutVendor')

@section('content')
    <!-- Main Content -->
    <div class="flex flex-1">
    
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
                    <section class="bg-white shadow rounded-lg p-6 mb-6">
                        <div class="space-y-6">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <img src="{{ asset('svg/no-order.svg') }}" alt="No Order" class="w-4 h-4">
                                    <p class="text-sm font-medium">No Order</p>
                                </div>
                                <p class="text-xs ml-6">{{$booking->payments->order_id}}</p>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <img src="{{ asset('svg/person.svg') }}" alt="Person" class="w-4 h-4">
                                    <p class="text-sm font-medium">Customer</p>
                                </div>
                                <p class="text-xs ml-6">{{$booking->user->name}}</p>
                            </div>  
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <img src="{{ asset('svg/location.svg') }}" alt="Location" class="w-4 h-4">
                                    <p class="text-sm font-medium">Address</p>
                                </div>
                                <p class="text-xs ml-6">{{$booking->contact->address}}</p>
                            </div>

                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <img src="{{ asset('svg/truck.svg') }}" alt="Truck" class="w-4 h-4">
                                    <p class="text-sm font-medium">Pick Up / Drop Off</p>
                                </div>
                                <p class="text-xs ml-6">{{$booking->delivery}} by Driver Coodiddy</p>
                            </div>
                        </div>
                    </section>

                    @if($booking->status == 'completed' || $booking->status === 'reviewed')
                        <section class="bg-white shadow rounded-lg p-6">
                            <div class="max-w-4xl mx-auto p-4">
                                <div class="flex items-center mb-4">
                                    <i class="fas fa-money-bill-wave text-brown-500 text-2xl mr-2"></i>
                                    <h1 class="text-xl font-semibold">Earnings</h1>
                                </div>
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="bg-brown-500 text-black">
                                            <th class="p-2 text-left">Name Pet</th>
                                            <th class="p-2 text-left">Services</th>
                                            <th class="p-2 text-left">Quantity</th>
                                            <th class="p-2 text-left">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-2 border-t border-gray-300">{{ $booking->pet->pet_name }}</td>
                                            <td class="p-2 border-t border-gray-300">Pet Sitting</td>
                                            <td class="p-2 border-t border-gray-300">{{$booking->days_difference}} day</td>
                                            <td class="p-2 border-t border-gray-300 text-brown-500 font-semibold">Rp {{ number_format($booking->petHotel->hotelPricings->first()->price_per_day * $booking->days_difference, 0, ',', '.') }}</td>
                                        </tr>
                                        @foreach ($servicesWithPrices as $service)
                                        <tr>
                                            <td class="p-2 border-t border-gray-300"></td>
                                            <td class="p-2 border-t border-gray-300">{{ $service['name'] }}</td>
                                            <td class="p-2 border-t border-gray-300"></td>
                                            <td class="p-2 border-t border-gray-300 text-brown-500 font-semibold">
                                                Rp {{ number_format($service['price'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="p-2 border-t border-gray-300"></td>
                                            <td class="p-2 border-t border-gray-300">Fees & Charges</td>
                                            <td class="p-2 border-t border-gray-300"></td>
                                            <td class="p-2 border-t border-gray-300 text-brown-500 font-semibold">- Rp 5.000</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 border-t border-gray-300"></td>
                                            <td class="p-2 border-t border-gray-300"></td>
                                            <td class="p-2 border-t border-gray-300 font-semibold">Total</td>
                                            <td class="p-2 border-t border-gray-300 text-brown-500 font-bold">
                                                Rp {{
                                                    number_format(
                                                        ($booking->petHotel->hotelPricings->first()->price_per_day * $booking->days_difference) 
                                                        + $totalServicePrice - 5000, 
                                                        0, ',', '.'
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    @endif
                </div>

                <!-- Order Status -->
                <section class="bg-white shadow rounded-lg p-6 w-1/3 h-full">
                    <div class="flex items-center justify-center mb-6">
                        <h3 class="text-sm font-bold text-center">Order Status</h3>
                    </div>

                    <div class="space-y-4">
                        <form action="{{ route('vendor.processed', ['id' => $booking->id]) }}" method="POST">
                            @csrf
                            @if($booking->status === 'paid')
                                <div class="flex items-center gap-2 mb-5">`
                                    <img src="{{ asset('svg/incoming-order.svg') }}" alt="Incoming Order" class="w-5 h-5">
                                    <div>
                                        <p class="text-xs font-medium">Incoming Order</p>
                                    </div>
                                </div>
                                <button type="submit" class="w-full bg-[#a4724c] text-white py-2 rounded-full text-sm">
                                    Ready for pickup
                                </button>
                            @elseif($booking->status === 'processed')
                                <div class="flex items-center gap-2 mb-5">
                                    <img src="{{ asset('svg/incoming-order.svg') }}" alt="Incoming Order" class="w-5 h-5">
                                    <div>
                                        <p class="text-xs font-medium">Incoming Order</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-5">
                                    <img src="{{ asset('svg/incoming-order.svg') }}" alt="Processed" class="w-5 h-5">
                                    <div>
                                        <p class="text-xs font-medium">Processed</p>
                                    </div>
                                </div>
                                <button type="submit" class="w-full bg-[#a4724c] text-white py-2 rounded-full text-sm">
                                    Finished?
                                </button>
                                @elseif($booking->status === 'completed' || $booking->status === 'reviewed')
                                <div class="flex items-center gap-2 mb-5">
                                    <img src="{{ asset('svg/incoming-order.svg') }}" alt="Incoming Order" class="w-5 h-5">
                                    <div>
                                        <p class="text-xs font-medium">Incoming Order</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-5">
                                    <img src="{{ asset('svg/incoming-order.svg') }}" alt="Processed" class="w-5 h-5">
                                    <div>
                                        <p class="text-xs font-medium">Processed</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-5">
                                    <img src="{{ asset('svg/incoming-order.svg') }}" alt="Finished" class="w-5 h-5">
                                    <div>
                                        <p class="text-xs font-medium">Finished</p>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>

                </section>
                
            </div>
        </main>
    </div>
@endsection