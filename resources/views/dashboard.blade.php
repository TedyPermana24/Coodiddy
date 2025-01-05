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
                <p><a href="welcome.php">Home</a>&gt;</p>
                <p><a href="">Vendor</a></p>
            </div>
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
                
                        <select name="species" class="border-2 border-gray-300 rounded-md pr-8 py-2 focus:border-[#B17F5B] focus:ring-0">
                            <option value="">Select Species</option>
                            @foreach ($speciesList as $sp)
                                <option value="{{ $sp }}" {{ old('species', $species) === $sp ? 'selected' : '' }}>
                                    {{ $sp }}
                                </option>
                            @endforeach
                        </select>
                >
                        <select name="price" class="border-2 border-gray-300 rounded-md pr-8 py-2 focus:border-[#B17F5B] focus:ring-0">
                            <option value="">Select Price</option>
                            <option value="low" {{ old('price', $price) === 'low' ? 'selected' : '' }}>Lowest Price</option>
                            <option value="high" {{ old('price', $price) === 'high' ? 'selected' : '' }}>Highest Price</option>
                        </select>
                
                        <button type="submit" class="bg-[#B17F5B] hover:bg-[#96684A] text-white px-4 py-2 rounded-md font-medium text-sm">
                            Apply Filters
                        </button>
                    </div>
            
                    <div class="flex items-center gap-4">
                        <input
                            type="text"
                            name="search"
                            placeholder="Search by name"
                            value="{{ old('search', $search ?? '') }}"
                            class="border-2 border-gray-300 rounded-md pr-8 py-2 focus:border-[#B17F5B] focus:ring-0"
                        />
                
                        <button type="submit" class="bg-[#B17F5B] hover:bg-[#96684A] text-white px-4 py-2 rounded-md font-medium text-sm">
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
        </div>
@endsection


   
