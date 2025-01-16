@extends('components.layoutAdmin')

@section('title', 'Registration Detail')
@section('header', 'Registration Detail')

@section('content')
<div class="bg-gray-50 min-h-screen p-8">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-6xl mx-auto">
        <!-- Header -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Registration Detail</h2>

        <!-- User Information Section -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold text-gray-700 border-b pb-2 mb-4">User Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- User Details -->
                <div class="col-span-2">
                    <p class="text-gray-600 mb-2"><span class="font-bold">Name:</span> {{ $registration->user->name }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-bold">Email:</span> {{ $registration->user->email }}</p>
                </div>
                <!-- ID Photo and Face Photo Side by Side -->
                <div class="flex space-x-4 justify-center col-span-1">
                    <div class="flex flex-col items-center justify-center">
                        <p class="font-semibold text-gray-600 mb-2">ID Photo</p>
                        <img src="{{ Storage::url($registration->id_photo) }}" alt="ID Photo" class="w-32 h-32 rounded-full border">
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <p class="font-semibold text-gray-600 mb-2">Face Photo</p>
                        <img src="{{ Storage::url($registration->user_photo) }}" alt="Face Photo" class="w-32 h-32 rounded-full border">
                    </div>
                </div>
            </div>
        </section>

        <!-- Vendor (Hotel) Information Section -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold text-gray-700 border-b pb-2 mb-4">Hotel (Vendor) Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Hotel Details -->
                <div class="col-span-2">
                    <p class="text-gray-600 mb-2"><span class="font-bold">Name:</span> {{ $registration->petHotel->name }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-bold">Location:</span> {{ $registration->petHotel->location }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-bold">Address:</span> {{ $registration->petHotel->address }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-bold">Phone Number:</span> {{ $registration->petHotel->phone }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-bold">Description:</span> {{ $registration->petHotel->description }}</p>
                </div>
                
                <!-- Hotel Images -->
                <div class="grid grid-cols-2 gap-2">
                    <img src="{{ Storage::url($registration->petHotel->petHotelImages->first()->main_image) }}" alt="Main Image" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <img src="{{ Storage::url($registration->petHotel->petHotelImages->first()->image_1) }}" alt="Image 1" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <img src="{{ Storage::url($registration->petHotel->petHotelImages->first()->image_2) }}" alt="Image 2" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <img src="{{ Storage::url($registration->petHotel->petHotelImages->first()->image_3) }}" alt="Image 3" class="w-full h-40 object-cover rounded-lg shadow-md">
                </div>
            </div>
        </section>

        <!-- Hotel Pricing Section (Loop through all hotel pricings) -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold text-gray-700 border-b pb-2 mb-4">Hotel Pricing</h3>
            <div>
                @foreach($registration->petHotel->hotelPricings as $pricing)
                    <div class="mb-4">
                        <p class="text-gray-600 mb-2">
                            <span class="font-bold">Species:</span> 
                            <span class="inline-block px-4 py-1 text-xs font-semibold bg-blue-100 text-blue-600 rounded-full">{{ $pricing->species }}</span>
                        </p>
                        <p class="text-gray-600 mb-2"><span class="font-bold">Price Per Day:</span> 
                            Rp {{ number_format($pricing->price_per_day, 0, ',', '.') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
        
        <!-- Additional Services Section (Loop through all additional services) -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold text-gray-700 border-b pb-2 mb-4">Additional Services</h3>
            <div>
                @foreach($registration->petHotel->additionalServices as $service)
                    <div class="mb-4">
                        <p class="text-gray-600 mb-2">
                            <span class="font-bold">Service:</span> 
                            <span class="inline-block px-4 py-1 text-xs font-semibold bg-purple-100 text-purple-600 rounded-full">{{ $service->service_name }}</span>
                        </p>
                        <p class="text-gray-600 mb-2"><span class="font-bold">Price:</span> 
                            Rp {{ number_format($service->price, 0, ',', '.') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
        
        <!-- Registration Status -->
        <section class="mb-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Registration Status</h3>
            <span class="px-4 py-2 rounded-full text-sm font-semibold 
                {{ $registration->registration_status === 'accepted' ? 'bg-green-100 text-green-700' : ($registration->registration_status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                {{ ucfirst($registration->registration_status) }}
            </span>
        </section>

        <!-- Accept and Reject Buttons -->
        @if($registration->registration_status === 'pending')
        <div class="flex space-x-4 mt-8">
            <a href="{{ route('admin.registration.accept', $registration->id) }}" 
            class="inline-block px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 ease-in-out transform hover:scale-105">
                Accept
            </a>
            <a href="{{ route('admin.registration.reject', $registration->id) }}" 
            class="inline-block px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 ease-in-out transform hover:scale-105">
                Reject
            </a>
        </div>
        @endif


        <!-- Back Button -->
        <div class="text-right mt-8">
            <a href="{{ route('admin.registration') }}" class="inline-block px-6 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition duration-300 ease-in-out">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection
