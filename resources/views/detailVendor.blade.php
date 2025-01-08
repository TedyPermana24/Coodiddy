@extends('components.layout')

@section('content')
<main class="max-w-6xl mx-auto p-4 my-40">
    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 ">
        <!-- Left Section (Image Gallery) -->
        <div class="bg-white p-4 rounded-lg shadow-md w-full md:w-1/2 h-auto">
            <img
                alt="Pet shop front view"
                class="w-full rounded-lg h-64 object-cover"
                src="{{ asset('img/IMG_1142-e1490899405898 2 (2).png') }}"
            />
            <div class="mt-4 flex space-x-4">
                <img
                    alt="Pet shop interior view 1"
                    class="w-1/3 h-24 object-cover rounded-lg"
                    src="{{ asset('img/kandang kucing 1.png') }}"
                />
                <img
                    alt="Pet shop interior view 2"
                    class="w-1/3 h-24 object-cover rounded-lg"
                    src="{{ asset('img/kandang kucing2 1.png') }}"
                />
                <img
                    alt="Pet shop interior view 3"
                    class="w-1/3 h-24 object-cover rounded-lg"
                    src="{{ asset('img/kandang kucing 1.png') }}"
                />
            </div>
        </div>

        <!-- Right Section (Details) -->
 
        <div class="bg-white p-4 rounded-lg shadow-md w-full md:w-1/2 h-auto flex flex-col">
            <div class="flex flex-col justify-between flex-grow">
                <div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-3xl font-bold">{{ $pethotels->name }}</h2>
                            <div class="flex items-center mt-4">
                                <div class="flex text-yellow-500">
                                    @php $averageRating = $pethotels->reviews_avg_rating ?? 0; @endphp
                                    @for ($i = 0; $i < floor($averageRating); $i++)
                                        <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="w-4 h-4">
                                    @endfor
                                    @if ($averageRating - floor($averageRating) >= 0.5)
                                        <img src="{{ asset('svg/star-half.svg') }}" alt="Half star" class="w-4 h-4">
                                    @endif
                                    @for ($i = 0; $i < (5 - ceil($averageRating)); $i++)
                                        <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="w-4 h-4">
                                    @endfor
                                </div>
                                @if($totalReviews > 0)
                                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $totalReviews }} reviews</span>
                                @else
                                    <span class="ml-2 text-sm font-medium text-gray-700">No reviews yet</span>
                                @endif
                            </div>
                        </div>
                        <i class="far fa-bookmark text-2xl cursor-pointer text-gray-500"></i>
                    </div>
                    <p class="mt-4 text-gray-700">
                        {{ $pethotels->description }}
                    </p>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex flex-col w-full">
                        @php
                            $speciesList = $pethotels->hotelPricings->pluck('species')->unique();
                        @endphp
        
                        @if ($speciesList->contains('Cat') && $speciesList->contains('Dog'))
                        <div class="flex items-center gap-2">
                            <div class="mb-4">
                                <label for="speciesDropdown" class="block text-sm font-medium text-gray-700 mb-1">Select Species</label>
                                <select id="speciesDropdown" class="rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#B17F5B] focus:border-[#B17F5B] appearance-none w-full">
                                    @foreach ($pethotels->hotelPricings as $pricing)
                                        <option value="{{ $pricing->price_per_day }}" data-species="{{ $pricing->species }}">
                                            {{ ucfirst($pricing->species) }}
                                        </option>
                                    @endforeach
                                </select>
        
                                <!-- Custom arrow icon for dropdown -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="flex items-center gap-2 mb-2">
                            <img src="{{ asset('svg/pet-icon.svg') }}" alt="Pet icon" class="w-5 h-5">
                            <span class="text-xl font-medium text-[#8B5E3C]">
                                {{ ucfirst($speciesList->first()) }}
                            </span>
                        </div>
                        @endif
        
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('svg/location-icon.svg') }}" alt="Location icon" class="w-5 h-5">
                            <span class="text-xl font-medium text-[#0071FF]">{{ $pethotels->location }}</span>
                        </div>
                        <div class="mt-2">
                            <p class="text-xl">
                                <span class="font-bold">Rp</span>
                                <span id="priceDisplay" class="font-bold">
                                    {{ number_format($pethotels->hotelPricings->first()->price_per_day ?? 0, 0, ',', '.') }}
                                </span>
                                <span class="text-gray-500">/day</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Tombol di bagian bawah -->
            <div class="flex justify-end mt-4 w-full">
                @if ($pethotels->owner_id === Auth::id())
                    <!-- Tombol Menuju Vendor -->
                    <a href="{{ route('vendor', ['id' => $pethotels->id]) }}" 
                       class="bg-[#B17F5B] text-white px-4 py-2 rounded-md font-bold text-lg">
                        Go Vendor
                    </a>
                @else
                    <!-- Tombol Book Now -->
                    <a href="{{ route('booking', ['id' => $pethotels->id]) }}" 
                       class="bg-[#B17F5B] text-white px-4 py-2 rounded-md font-bold text-lg">
                        Book Now
                    </a>
                @endif
            </div>
            
        </div>

    </div>

    @if ($totalReviews > 0)
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold">Reviews</h3>
                <span class="bg-[#A97142] text-white px-3 py-1 rounded-full">{{ $totalReviews }}</span>
            </div>
            <div class="mt-4">
                @foreach ($reviews as $review)
                <div class="flex items-start space-x-4 mb-4">
                    <img
                        alt="Reviewer avatar"
                        class="w-12 h-12 rounded-full object-cover"
                        src="https://ui-avatars.com/api/?name={{ urlencode($review['name']) }}"
                    />
                    <div class="flex-1">
                       
                            <div class="flex justify-between items-center">
                                <h4 class="font-bold">{{$review['name']}}</h4>
                                <span class="text-gray-500">{{$review['date']}}</span>
                            </div>
                            <div class="flex items-center mt-1 text-yellow-500">
                                @for ($i = 0; $i < floor($review['rating']); $i++)
                                    <img src="{{ asset('svg/star-filled.svg') }}" alt="Filled star" class="w-4 h-4">        
                                @endfor
                                @for ($i = 0; $i < (5 - ceil($review['rating'])); $i++)
                                    <img src="{{ asset('svg/star-empty.svg') }}" alt="Empty star" class="w-4 h-4">
                                @endfor
                            </div>
                   
                       

                        <p class="mt-2 text-gray-700">
                            {{ $review['review'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif

    
</main>


@endsection

@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const speciesDropdown = document.getElementById('speciesDropdown');
        const priceDisplay = document.getElementById('priceDisplay');

        speciesDropdown.addEventListener('change', function () {
            const selectedPrice = speciesDropdown.value;
            priceDisplay.textContent = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(selectedPrice);
        });
    });
</script>

@endsection
