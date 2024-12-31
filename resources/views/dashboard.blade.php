@extends('components.layout')

@section('content')
<div class="relative text-center text-white mt-24">
    <img
        alt="Banner image with a dog"
        class="w-full h-[400px] object-cover mt-[-1rem]"
        src="{{ asset('img/doggy3 2.png') }}"
    />
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-gray-800">
        <h1 class="text-4xl font-bold text-[#4A3B32]">Vendor</h1>
        <p class="inline text-lg">
            <a href="welcome.php" class="font-normal hover:text-[#A5724C]">Home</a>&gt;
        </p>
        <p class="inline text-lg font-bold">
            <a href="" class="hover:text-[#A5724C]">Vendor</a>
        </p>
    </div>
</div>
<div class="bg-[#F8F0E3] mb-8 px-28 py-8">
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-4 w-1/4">
            <div class="flex gap-1 cursor-pointer">
                <span class="text-xl">&#x2699;</span>
                <p class="text-lg hover:text-[#A5724C]">Filter</p>
            </div>
            <div class="w-[3px] h-8 bg-[#4A3B32]"></div>
            <p class="text-lg">1-16 of 32 results</p>
        </div>
        <div class="flex items-center border border-[#4A3B32] p-1 bg-gray-100 w-96">
            
            <input class="flex-grow border-none outline-none text-base text-[#4A3B32] pl-2 bg-gray-100 placeholder-[#4A3B32] placeholder:font-bold border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-100" placeholder="Search" type="text" />
            <span class="text-lg text-gray-700">&#128269;</span>
        </div>
    </div>
</div>
<div
    class="flex flex-wrap gap-y-8 px-28"
>
    <!-- Card 1 -->
    <div class="bg-white rounded-lg shadow-md h-[27rem] mx-auto">
        <div class="w-full flex justify-center items-center">
            <img
                src="{{ asset('img/communication.jpg') }}"
                alt="Pet Shop"
                class="w-full h-auto max-h-60 object-cover rounded-t-xl"
            />
        </div>
        <div class="p-4">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-2xl font-bold">DayPet Care</h3>
              <div class="flex items-center gap-1">
                <!-- Rating stars -->
                @for ($i = 0; $i < 4; $i++)
                  <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="h-6 w-6">
                @endfor
                <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="h-6 w-6">
              </div>
            </div>
            <div class="flex items-center gap-2 mb-1">
              <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#8B5E3C]">All Pets</span>
            </div>
            <div class="flex items-center gap-2">
              <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#0071FF]">Bandung</span>
            </div>
            <div class="flex items-center justify-between mt-1">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500">day</span>
              </p>
              <a href="{{ route('vendor.detail') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
    </div>
    <!-- Card 1 -->
    <div class="bg-white rounded-lg shadow-md h-[27rem] mx-auto">
        <div class="w-full flex justify-center items-center">
            <img
                src="{{ asset('img/communication.jpg') }}"
                alt="Pet Shop"
                class="w-full h-auto max-h-60 object-cover rounded-t-xl"
            />
        </div>
        <div class="p-4">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-2xl font-bold">DayPet Care</h3>
              <div class="flex items-center gap-1">
                <!-- Rating stars -->
                @for ($i = 0; $i < 4; $i++)
                  <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="h-6 w-6">
                @endfor
                <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="h-6 w-6">
              </div>
            </div>
            <div class="flex items-center gap-2 mb-1">
              <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#8B5E3C]">All Pets</span>
            </div>
            <div class="flex items-center gap-2">
              <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#0071FF]">Bandung</span>
            </div>
            <div class="flex items-center justify-between mt-1">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500">day</span>
              </p>
              <a href="{{ route('vendor.detail') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
    </div>
    <!-- Card 1 -->
    <div class="bg-white rounded-lg shadow-md h-[27rem] mx-auto">
        <div class="w-full flex justify-center items-center">
            <img
                src="{{ asset('img/communication.jpg') }}"
                alt="Pet Shop"
                class="w-full h-auto max-h-60 object-cover rounded-t-xl"
            />
        </div>
        <div class="p-4">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-2xl font-bold">DayPet Care</h3>
              <div class="flex items-center gap-1">
                <!-- Rating stars -->
                @for ($i = 0; $i < 4; $i++)
                  <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="h-6 w-6">
                @endfor
                <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="h-6 w-6">
              </div>
            </div>
            <div class="flex items-center gap-2 mb-1">
              <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#8B5E3C]">All Pets</span>
            </div>
            <div class="flex items-center gap-2">
              <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#0071FF]">Bandung</span>
            </div>
            <div class="flex items-center justify-between mt-1">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500">day</span>
              </p>
              <a href="{{ route('vendor.detail') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
    </div>
    <!-- Card 1 -->
    <div class="bg-white rounded-lg shadow-md h-[27rem] mx-auto">
        <div class="w-full flex justify-center items-center">
            <img
                src="{{ asset('img/communication.jpg') }}"
                alt="Pet Shop"
                class="w-full h-auto max-h-60 object-cover rounded-t-xl"
            />
        </div>
        <div class="p-4">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-2xl font-bold">DayPet Care</h3>
              <div class="flex items-center gap-1">
                <!-- Rating stars -->
                @for ($i = 0; $i < 4; $i++)
                  <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="h-6 w-6">
                @endfor
                <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="h-6 w-6">
              </div>
            </div>
            <div class="flex items-center gap-2 mb-1">
              <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#8B5E3C]">All Pets</span>
            </div>
            <div class="flex items-center gap-2">
              <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="h-5 w-5">
              <span class="text-xl font-medium text-[#0071FF]">Bandung</span>
            </div>
            <div class="flex items-center justify-between mt-1">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500">day</span>
              </p>
              <a href="{{ route('vendor.detail') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
    </div>
    <!-- Tambahkan card lainnya dengan struktur yang sama -->
</div>




<div class="flex justify-center mt-8 mb-12">
    <button class="bg-[#B17F5B] text-white px-4 py-2 mx-1 rounded-md cursor-pointer">1</button>
    <button class="bg-gray-300 px-4 py-2 mx-1 rounded-md cursor-pointer text-[#B17F5B]">2</button>
    <button class="bg-gray-300 px-4 py-2 mx-1 rounded-md cursor-pointer text-[#B17F5B]">3</button>
    <button class="bg-gray-300 px-4 py-2 mx-1 rounded-md cursor-pointer text-[#B17F5B]">4</button>
    <button class="px-4 py-2 mx-1 rounded-md cursor-pointer text-[#B17F5B]">
        &#9654;
    </button>
</div>

@endsection


   
