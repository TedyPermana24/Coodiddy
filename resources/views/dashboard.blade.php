@extends('components.layout')

@section('content')
<div class="relative text-center text-white mt-24">
    <img
        alt="Banner image with a dog"
        class="w-full h-[400px] object-cover mt-[-1rem]"
        src="{{ asset('img/doggy3 2.png') }}"
    />
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[#4A3B32]">
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
                <img src="{{ asset('svg/filter.svg') }}" alt="Empty star" class="h-8 w-6 mr-2">
                <p class="text-lg hover:text-[#A5724C]">Filter</p>
            </div>
            <div class="w-[3px] h-8 bg-[#4A3B32]"></div>
            <p class="text-lg">1-16 of 32 results</p>
        </div>
        <div class="flex items-center border border-[#4A3B32] p-1 rounded-2xl bg-gray-100 w-96">
            <input class="flex-grow border-none outline-none text-base text-[#4A3B32] pl-2 bg-gray-100 placeholder-[#4A3B32] placeholder:font-bold border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-100" placeholder="Search" type="text" />
            <img src="{{ asset('svg/search.svg') }}" alt="Empty star" class="h-8 w-6 mr-2">
        </div>
    </div>
</div>
<div class="p-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Card 1 -->
    <div class="bg-white rounded-lg shadow-md h-[27rem] mx-auto">
        <div class="w-full flex justify-center items-center">
            <img
                src="{{ asset('img/communication.jpg') }}"
                alt="Pet Shop"
                class="w-full h-auto max-h-60 object-cover rounded-t-xl"
            />
        </div>
        <div class="content">
            <div class="container-filter">
                <form action="{{ route('vendor') }}" method="GET" class="mb-4 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <select name="location" class="border border-gray-300 rounded-md pr-8 py-2">
                            <option value="">Select Location</option>
                            @foreach ($locationList as $loc)
                                <option value="{{ $loc }}" {{ old('location', $location) === $loc ? 'selected' : '' }}>
                                    {{ $loc }}
                                </option>
                            @endforeach
                        </select>
                
                        <select name="species" class="border border-gray-300 rounded-md pr-8 py-2">
                            <option value="">Select Species</option>
                            @foreach ($speciesList as $sp)
                                <option value="{{ $sp }}" {{ old('species', $species) === $sp ? 'selected' : '' }}>
                                    {{ $sp }}
                                </option>
                            @endforeach
                        </select>
                >
                        <select name="price" class="border border-gray-300 rounded-md pr-8 py-2">
                            <option value="">Select Price</option>
                            <option value="low" {{ old('price', $price) === 'low' ? 'selected' : '' }}>Lowest Price</option>
                            <option value="high" {{ old('price', $price) === 'high' ? 'selected' : '' }}>Highest Price</option>
                        </select>
                
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            Apply Filters
                        </button>
                    </div>
            
                    <div class="flex items-center gap-4">
                        <input
                            type="text"
                            name="search"
                            placeholder="Search by name"
                            value="{{ old('search', $search ?? '') }}"
                            class="border border-gray-300 rounded-md px-4 py-2"
                        />
                
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            Search
                        </button>
                    </div>
                </form>
                
            </div>
            
            <div class="mx-auto px-6 max-w-7xl"> 
                <div class="flex flex-wrap gap-6"> 
                    <!-- Card -->
                    @foreach ($pethotels as $p)
                        <div class="w-[calc(25%-18px)] min-w-[250px] overflow-hidden rounded-lg border border-gray-200 bg-white shadow">
                            <div class="relative w-full h-0" style="padding-bottom: 75%;">
                                <img src="{{ asset('img\petShop.png') }}" alt="Pet Shop"
                                    class="absolute inset-0 w-full h-full object-cover rounded-t-lg">
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-6">
                                    <p class="text-md font-bold text-gray-800">{{ $p->name }}</p>
                                    <div class="flex gap-1">
                                        @for ($i = 0; $i < floor($p->reviews_avg_rating); $i++)
                                        <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="w-4 h-4">
                                        @endfor
                                    
                                        @if ($p->reviews_avg_rating - floor($p->reviews_avg_rating) >= 0.5)
                                            <img src="{{ asset('svg/star-half.svg') }}" alt="Half star" class="w-4 h-4">
                                        @endif
                                    
                                        @for ($i = 0; $i < (5 - ceil($p->reviews_avg_rating)); $i++)
                                            <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="w-4 h-4">
                                        @endfor
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-2">
                                    <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="w-5 h-5">
                                    <span class="text-sm font-medium text-[#8B5E3C]">{{ $p->species }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="w-5 h-5">
                                    <span class="text-sm font-medium text-[#0071FF]">{{ $p->location }}</span>
                                </div>
                                <div class="flex items-center justify-between mt-2">
                                    <p class="text-sm">
                                        <span class="font-bold">Rp{{ number_format($p->min_price, 0, ',', '.') }}/</span>
                                        <span class="font-bold text-gray-500">day</span>
                                    </p>
                                    <a href="{{ route('vendor.detail', ['id' => $p->id]) }}" 
                                        class="bg-[#B17F5B] hover:bg-[#96684A] text-white px-3 py-1 rounded-md font-medium text-sm">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <!-- Ulangi card yang sama 3 kali lagi -->
                </div>
            </div>
            
            <div class="pagination">
                {{-- <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>
                    <i class="uil uil-angle-right-b"></i>
                </button> --}}
            </div>
            <div class="flex items-center justify-between mt-1 gap-2">
              <p class="text-xl">
                <span class="font-bold">Rp 200.000/</span>
                <span class="font-bold text-gray-500 text-base" >day</span>
              </p>
              <a href="{{ route('vendor.detail') }}" class="bg-[#B17F5B] text-white px-8 py-2 rounded-md font-bold text-lg -mt-8">
                Contact
              </a>
            </div>
          </div>
    </div>
    <div class="bg-white rounded-lg shadow-md h-[27rem] mx-auto">
        <div class="w-full flex justify-center items-center">
            <img
                src="{{ asset('img/communication.jpg') }}"
                alt="Pet Shop"
                class="w-full h-auto max-h-60 object-cover rounded-t-xl"
            />
        </div>
    </div>
    <!-- Card 1 -->
    
    <!-- Tambahkan card lainnya dengan struktur yang sama -->
</div>




<div class="flex justify-center mt-4 mb-12">
            <button class="bg-[#B17F5B] text-white py-2 px-4 rounded-full">
                Show more vendor
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" fill="none" class="inline-block">
                  <path d="M6 7.6998L0 1.6998L1.4 0.299805L6 4.8998L10.6 0.299805L12 1.6998L6 7.6998Z" fill="white"/>
                </svg>
            </button>
        </div>

@endsection


   
