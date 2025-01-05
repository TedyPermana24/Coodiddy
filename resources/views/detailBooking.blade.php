
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
                                <p class="font-semibold text-gray-800">{{ $pethotels->name }}</p>
                                <p class="text-sm text-gray-600">
                                    {{ $pethotels->address }}
                                </p>
                                <p class="text-sm text-gray-600">{{ $pethotels->phone }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Booking -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-sm font-bold uppercase mb-4 text-gray-600">
                            Booking
                        </h2>
                        <p class="text-sm text-gray-600 mb-4">
                            {{ $pethotels->description }}
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
                    <div class="border-t border-gray-300 py-4">
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Total</span>
                            <span>Rp. 0</span>
                        </div>
                    </div>
                    <button
                        class="mt-4 w-full px-4 py-2 bg-gray-200 text-sm text-gray-600 rounded-lg"
                    >
                        Pay
                    </button>
                </div>
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
                    <form action="{{ route('booking.store', ['id' => $pethotels->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            <!-- Bagian Pet -->
                            <h3 class="font-medium mb-4 text-lg">Pet</h3>
                            <div class="space-y-4">
                                <!-- Pet Type -->
                                {{-- <div class="flex items-start mb-4">
                                    <label class="block text-sm font-medium text-gray-700 w-32">Pet Image</label>
                                    <div class="border-2 border-dashed rounded-lg p-10 w-40 max-w-sm flex items-center justify-center">
                                        <div class="text-gray-400 text-center">
                                            <input type="file" name="pet_image" class="hidden" id="pet_image" accept="image/*">
                                            <label for="pet_image" class="cursor-pointer block">Upload Pet Image</label>
                                        </div>
                                    </div>
                                </div> --}}

                                
                    
                                <!-- Input Pet Name -->
                                <div class="flex items-center gap-4 mb-4">
                                    <label class="block text-sm font-medium text-gray-700 w-32">Pet Name</label>
                                    <select name="pet_id" class="w-full p-2 border rounded-lg text-gray-500" required>
                                        <option value="">Select your pet</option>
                                        @foreach($pets as $pet)
                                            <option value="{{ $pet->id }}">{{ $pet->pet_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label class="block text-sm font-medium text-gray-700 w-32">Pet Type</label>
                                    <select name="hotel_pricing_id" class="w-full p-2 border rounded-lg text-gray-500" required>
                                        <option value="">Select a pricing</option>
                                        @foreach($pethotels->hotelPricings as $hotelPricing)
                                            <option value="{{ $hotelPricing->id }}">
                                                {{ $hotelPricing->species }} - Rp.{{ number_format($hotelPricing->price_per_day ?? 0, 0, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                    
                                <!-- Phone Number -->
                                {{-- <div class="flex items-center gap-4">
                                    <label class="block text-sm font-medium text-gray-700 w-32">Phone Number</label>
                                    <input type="tel" name="phone_number" placeholder="Insert your phone number here" class="w-full p-2 border rounded-lg" required>
                                </div>
                     --}}
                                <!-- Alamat (Dropdown dari Contact) -->
                                <div class="flex items-center gap-4">
                                    <label class="block text-sm font-medium text-gray-700 w-32">Address</label>
                                    <select name="address_id" class="w-full p-2 border rounded-lg text-gray-500" required>
                                        <option value="">Choose an address</option>
                                        @foreach($contacts as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->city }} | {{ $contact->phone_number }} | {{ $contact->address }}</option>
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
                                        <input type="number" name="days" placeholder="Insert the number of days" class="w-full p-2 border rounded-lg" required>
                                    </div>
                    
                                    <!-- Pick-Up/Drop-Off -->
                                    <div class="flex items-center gap-4">
                                        <label class="block text-sm font-medium text-gray-700 w-32">Pick-Up/Drop-Off</label>
                                        <select name="pickup_dropoff" class="w-full p-2 border rounded-lg text-gray-500" required>
                                            <option value="">Choose pick-up or drop-off</option>
                                            <option value="Pick Up">Pick-up</option>
                                            <option value="Drop Off">Drop-off</option>
                                        </select>
                                    </div>
                    
                                    <!-- Additional Services -->
                                    <div>
                                        @if($pethotels->additionalServices->isNotEmpty())
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Additional Services</label>
                                        <div class="space-y-2 pl-4">
                                            @foreach($pethotels->additionalServices as $service)
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

{{-- <script>
        function openAddAddressModal() {
        document.getElementById('addAddressModal').classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    function closeAddAddressModal() {
        document.getElementById('addAddressModal').classList.add('hidden');
    }
</script> --}}

{{-- <script>
    // Menghitung harga total berdasarkan layanan yang dipilih
    function calculateTotal() {
        const services = document.querySelectorAll('input[name="services[]"]:checked');
        let totalPrice = 0;
        
        services.forEach(service => {
            const price = parseInt(service.getAttribute('data-price'), 10);
            totalPrice += price;
        });
        
        // Menampilkan total harga pada Payment Summary
        document.getElementById('totalAmount').innerText = `Rp. ${totalPrice.toLocaleString()}`;
        
        // Menyimpan total harga dalam hidden field untuk dikirim ke backend
        document.getElementById('total_price').value = totalPrice;
    }

    // Menangani submit form untuk memasukkan data Pet dan Services
    function submitForm() {
        const form = document.querySelector('form');
        const formData = new FormData(form);
        
        // Mengirim data ke backend untuk diproses
        fetch('{{ route("pet.save") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Booking submitted successfully!');
                closeModal();
            } else {
                alert('There was an error saving your data.');
            }
        });
    }

    // Menambahkan event listener untuk input checkbox
    document.querySelectorAll('input[name="services[]"]').forEach(input => {
        input.addEventListener('change', calculateTotal);
    });
</script> --}}
@endsection



