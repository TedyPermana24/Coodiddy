@extends('components.layout')

@section('content')
        <main class="max-w-5xl mx-auto p-4 pt-40 pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Bagian Vendor Address -->
                <div class="lg:col-span-2">
                    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                        <h2 class="text-sm font-bold uppercase mb-4 text-gray-600">
                            Vendor Address
                        </h2>
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-home text-gray-800 text-xl"></i>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $petHotel->name }}</p>
                                <p class="text-sm text-gray-600">
                                    {{ $petHotel->address }}
                                </p>
                                <p class="text-sm text-gray-600">{{ $petHotel->phone }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Booking -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-sm font-bold uppercase mb-4 text-gray-600">
                            Booking
                        </h2>
                        <p class="text-sm text-gray-600 mb-4">
                            {{ $petHotel->description }}
                        </p>
                        <button onclick="openModal()" class="px-4 py-2 bg-gray-100 text-sm text-gray-600 rounded-lg">
                            Insert your plan
                        </button>
                    </div>
                </div>

                <!-- Bagian Payment Summary -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-sm font-bold uppercase mb-4 text-gray-600">
                        Payment Summary
                    </h2>
                    
                @if($activeBooking)
                    <div class="space-y-3">
                        <!-- Timer -->
                        <div class="text-center mb-4" 
                             x-data="timer({{ $activeBooking['expiry_timestamp'] }})" 
                             x-init="startTimer()">
                            <p class="text-sm text-gray-600">Time remaining to pay:</p>
                            <p class="font-bold text-xl" x-text="timeDisplay"></p>
                        </div>
            
                        <!-- Pet Information -->
                        <div class="border-b pb-3">
                            <p class="font-medium text-gray-700">{{ $activeBooking['pet_name'] }}</p>
                            <div class="text-sm text-gray-600">
                                <p>Check-in: {{ \Carbon\Carbon::parse($activeBooking['created_at'])->format('d M Y') }}</p>
                                <p>Check-out: {{ \Carbon\Carbon::parse($activeBooking['created_at'])->addDays($activeBooking['days'])->format('d M Y') }}</p>
                            </div>
                        </div>
            
                        <!-- Base Price -->
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Base Price (per day)</span>
                            <span>Rp. {{ number_format($activeBooking['price_per_day'], 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Days</span>
                            <span>{{ $activeBooking['days'] }} days</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Subtotal</span>
                            <span>Rp. {{ number_format($activeBooking['base_price'], 0, ',', '.') }}</span>
                        </div>
            
                        <!-- Additional Services -->
                        @if(!empty($activeBooking['selected_services']))
                            <div class="space-y-2">
                                <div class="text-sm font-medium text-gray-600">Additional Services:</div>
                                @foreach($activeBooking['selected_services'] as $service)
                                    <div class="flex justify-between text-sm text-gray-600">
                                        <span>{{ $service['name'] }}</span>
                                        <span>Rp. {{ number_format($service['price'], 0, ',', '.') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
            
                        <!-- Delivery Fee -->
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>{{ $activeBooking['delivery_type'] }}</span>
                            <span>Rp. {{ number_format($activeBooking['delivery_price'], 0, ',', '.') }}</span>
                        </div>
            
                        <!-- Total -->
                        <div class="border-t border-gray-300 pt-3 mt-3">
                            <div class="flex justify-between font-semibold text-gray-700">
                                <span>Total</span>
                                <span>Rp. {{ number_format($activeBooking['total_price'], 0, ',', '.') }}</span>
                            </div>
                        </div>
            
                        <!-- Action Buttons -->
                        <div class="flex space-x-3">
                            <form action="{{ route('booking.cancel', $activeBooking['booking_id']) }}" 
                                  method="POST" 
                                  class="w-1/2">
                                @csrf
                                @method('POST')
                                <button type="submit" 
                                        class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                    Cancel
                                </button>
                            </form>
                            
                            <button id="pay-button" class="w-1/2 px-4 py-2 bg-[#B17F5B] text-white rounded-lg hover:bg-[#96684A]">
                                Pay Now
                            </button>
                        </div>
                    </div>
                @else
                    <div class="text-center text-gray-600 py-4">
                        <p>No active booking</p>
                    </div>
                @endif
                </div>

                @if(session('success'))
                    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg" 
                        x-data="{ show: true }" 
                        x-show="show" 
                        x-init="setTimeout(() => show = false, 3000)">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </main>

        <div id="petModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-start justify-center p-4 overflow-y-auto" style="z-index: 9999;">
            <div class="bg-white rounded-lg w-full max-w-4xl my-8 relative" style="max-height: 80vh;">
                <!-- Fixed Header -->
                <div class="sticky top-0 bg-white p-4 border-b">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold">Your plan</h2>
                        <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
        
                <!-- Scrollable Content -->
                <div class="overflow-y-auto p-4" style="max-height: calc(80vh - 140px);">
                    <form action="{{ route('booking.store', ['id' => $petHotel->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            <!-- Bagian Pet -->
                            <h3 class="font-medium mb-4 text-lg">Pet</h3>
                            <div class="space-y-4">

                                <!-- Input Pet Name -->
                                <div class="flex items-center gap-4 mb-4">
                                    <label class="block text-sm font-medium text-gray-700 w-32">Pet Name</label>
                                    <select name="pet_id" class="w-full p-2 border rounded-lg text-gray-500 focus:border-[#B17F5B] focus:ring-0" required>
                                        <option value="">Select your pet</option>
                                        @foreach($pets as $pet)
                                            <option value="{{ $pet->id }}">{{ $pet->pet_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label class="block text-sm font-medium text-gray-700 w-32">Pet Type</label>
                                    <select name="hotel_pricing_id" class="w-full p-2 border rounded-lg text-gray-500 focus:border-[#B17F5B] focus:ring-0" required>
                                        <option value="">Select a pricing</option>
                                        @foreach($petHotel->hotelPricings as $hotelPricing)
                                            <option value="{{ $hotelPricing->id }}">
                                                {{ $hotelPricing->species }} - Rp.{{ number_format($hotelPricing->price_per_day ?? 0, 0, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                    
                                <!-- Alamat (Dropdown dari Contact) -->
                                <div class="flex items-center gap-4">
                                    <label class="block text-sm font-medium text-gray-700 w-32">Address</label>
                                    <select name="address_id" class="w-full p-2 border rounded-lg text-gray-500 focus:border-[#B17F5B] focus:ring-0" required>
                                        <option value="">Choose an address</option>
                                        @foreach($contacts as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->address }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    
                            <!-- Bagian Services -->
                            <div>
                                <h3 class="font-medium mb-4 text-lg">Services</h3>
                                <div class="space-y-4">
                                    <!-- Day Sitting -->
                                    <div class="flex items-center gap-4">
                                        <label class="block text-sm font-medium text-gray-700 w-32">Day Sitting</label>
                                        <input type="number" name="days" placeholder="Insert the number of days" class="w-full p-2 border rounded-lg focus:border-[#B17F5B] focus:ring-0" required>
                                    </div>
                    
                                    <!-- Pick-Up/Drop-Off -->
                                    <div class="flex items-center gap-4">
                                        <label class="block text-sm font-medium text-gray-700 w-32">Pick-Up/Drop-Off</label>
                                        <select name="pickup_dropoff" class="w-full p-2 border rounded-lg text-gray-500 focus:border-[#B17F5B] focus:ring-0" required>
                                            <option value="">Choose pick-up or drop-off</option>
                                            <option value="Pick Up">Pick-up</option>
                                            <option value="Drop Off">Drop-off</option>
                                        </select>
                                    </div>
                    
                                    <!-- Additional Services -->
                                    <div>
                                        @if($petHotel->additionalServices->isNotEmpty())
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Additional Services</label>
                                        <div class="space-y-2 pl-4">
                                            @foreach($petHotel->additionalServices as $service)
                                                <label class="flex items-center space-x-2">
                                                    <input type="checkbox" name="additional_services[]" value="{{ $service->service_name }}" class="rounded">
                                                    <span>{{ $service->service_name }} (Rp {{ number_format($service->price, 0, ',', '.') }})</span>
                                                </label>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    
                </div>
        
                <!-- Fixed Footer -->
                <div class="sticky bottom-0 bg-white p-4 border-t">
                    <div class="flex justify-end space-x-4">
                        <button
                            type="button"
                            onclick="closeModal()"
                            class="px-4 py-2 bg-gray-200 rounded-lg text-gray-600"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-amber-700 text-white rounded-lg"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        
     
@endsection


@section('script')
<script>
    function openModal() {
        document.getElementById('petModal').classList.remove('hidden');
        document.getElementById('petModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('petModal').classList.remove('flex');
        document.getElementById('petModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('petModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>

<script>
    function timer(expiryTimestamp) {
        return {
            expiryTime: expiryTimestamp,
            timeDisplay: '',
            startTimer() {
                const updateTimer = () => {
                    const now = new Date().getTime();
                    const distance = this.expiryTime - now;

                    if (distance <= 0) {
                        this.timeDisplay = 'Expired';
                        location.reload();
                        return;
                    }

                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    this.timeDisplay = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                };

                updateTimer();
                setInterval(updateTimer, 1000);
            }
        }
    }
</script>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
@if($activeBooking && isset($activeBooking['booking_id']))
<script>
    const payButton = document.querySelector('#pay-button');
    if (payButton) {
        payButton.addEventListener('click', async function(e) {
            e.preventDefault();
            
            try {
                const response = await fetch(`/payments/pay/{{ $activeBooking['booking_id'] }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                
                const data = await response.json();

                if (data.status === 'success') {
                    window.snap.pay(data.snap_token, {
                        onSuccess: async function(result) {
                            console.log('Payment successful:', result);
                            await handleCallback(result);
                        },
                        onPending: async function(result) {
                            console.log('Payment pending:', result);
                            await handleCallback(result);
                        },
                        onError: function(result) {
                            console.error('Payment error:', result);
                            alert('Payment failed. Please try again.');
                        },
                        onClose: function() {
                            console.log('Payment popup closed without completing transaction');
                        }
                    });
                } else {
                    console.error('Payment initialization failed:', data);
                    alert(data.message || 'Payment initialization failed');
                }
            } catch (error) {
                console.error('Payment initialization error:', error);
                alert('An error occurred. Please try again.');
            }
        });

        async function handleCallback(result) {
            try {
                const callbackResponse = await fetch('/payments/callback', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(result)
                });

                const callbackData = await callbackResponse.json();
                if (callbackData.status === 'success') {
                    window.location.reload();
                } else {
                    console.error('Callback failed:', callbackData);
                    alert(callbackData.message || 'Error processing payment');
                }
            } catch (error) {
                console.error('Callback processing error:', error);
                alert('Error processing payment. Please contact support.');
            }
        }
    }
</script>
@endif

@endsection



