@extends('components.layout')

@section('content')
    <main class="flex flex-col items-center bg-[#F7F8FA] pt-40 pb-20">

        <!-- Main Section -->
        <div class="w-full max-w-6xl flex space-x-6">
            <!-- Sidebar -->
            <aside class="w-1/4 bg-white rounded-lg shadow-md p-6" style="height: 400px; overflow-y: auto;">
                <div class="mb-4">
                    <img
                        alt="User profile picture"
                        class="rounded-full w-16 h-16 mx-auto mb-4"
                        src="{{ Auth::user()->image ? asset(Storage::url(Auth::user()->image)) : asset('img/kucing-kosan-hendra.jpg') }}" 
                    />
                    <p class="text-center font-regular text-lg">{{ Auth::user()->name }}</p>
                    <p class="text-center font-regular text-sm">Balance : Rp {{ number_format(Auth::user()->balance, 0, ',', '.') }}</p>
                </div>
                <div class="mb-5">
                    <p class="w-full text-center text-gray-800 font-bold mb-4 border-b-2 p-2 border-black">Payment</p>
                    <p class="text-gray-700 hover:scale-95 hover:text-[#d4a573] transition-all duration-100 pl-2">
                        <a href="{{ route('list', ['status' => 'all']) }}" 
                           class="{{ request('status') == 'all' ? 'font-bold text-[#d4a573]' : '' }}">
                           All Transactions
                        </a>
                        <p class="mx-1 border-b-2 mb-2"></p>
                    </p>
                    <p class="text-gray-700 hover:scale-95 hover:text-[#d4a573] transition-all duration-100 pl-2">
                        <a href="{{ route('list', ['status' => 'pending']) }}" 
                            class="{{ request('status') == 'pending' ? 'font-bold text-[#d4a573]' : '' }}">
                             Waiting for Payment
                             @if($pendingCount > 0)
                                <span class="bg-[#A97142] text-white text-sm ml-2 px-2 rounded-full">
                                    {{ $pendingCount }} <!-- Tampilkan jumlah booking yang statusnya 'pending' -->
                                </span>
                             @endif
                         </a>
                         <p class="mx-1 border-b-2 mb-2"></p>
                    </p>
                    <p class="text-gray-700 hover:scale-95 hover:text-[#d4a573] transition-all duration-100 pl-2">
                        <a href="{{ route('list', ['status' => 'processed']) }}" 
                           class="{{ request('status') == 'processed' ? 'font-bold text-[#d4a573]' : '' }}">
                           On Process
                        </a>
                        <p class="mx-1 border-b-2 mb-2"></p>
                    </p>
                    <p class="text-gray-700 hover:scale-95 hover:text-[#d4a573] transition-all duration-100 pl-2">
                        <a href="{{ route('list', ['status' => 'completed']) }}" 
                           class="{{ request('status') == 'completed' ? 'font-bold text-[#d4a573]' : '' }}">
                           Finished
                        </a>
                        <p class="mx-1 border-b-2 mb-2"></p>
                    </p>
                </div>
            </aside>

            <!-- Content Section -->
            <section class="w-3/4">
                <!-- Filter & Search -->
                <div class="flex justify-between items-center bg-white rounded-lg shadow-md py-4 px-6 mb-6">
                    <div class="flex space-x-6">
                        <p class="font-medium text-[#A5724C]">List Transaction</p>
                    </div>
                    <form action="{{ route('list') }}" method="GET" class="flex items-center">
                        <!-- Pertahankan filter jika ada -->
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                            <input
                                class="p-2 border-none text-gray-500 w-full focus:border-[#B17F5B] focus:ring-0"
                                type="text"
                                name="search"
                                placeholder="Search here"
                                value="{{ request('search') }}"
                            />
                            <button type="submit" class="p-2 text-[#A5724C] rounded-r-lg">
                                <img src="{{ asset('svg/search.svg') }}" alt="search icon" class="w-5 h-5"/>
                            </button>
                        </div>
                    </form>                    
                </div>

                <!-- Transaction List -->
                <div
                    class="bg-white p-4 rounded-lg shadow-md"
                    style="max-height: 600px; overflow-y: auto"
                >
                    <div class="space-y-4">
                        @if($bookings->isEmpty())
                            <p class="text-center text-gray-500 font-semibold">No bookings</p>
                        @else
                            @foreach($bookings as $booking)
                                <div class="bg-white p-4 rounded-lg shadow-md">
                                    <div class="flex justify-between items-center mb-2">
                                        <p class="font-semibold">{{ $booking['name'] }}</p>
                                        <p class="text-gray-500">
                                            @if($booking['status'] == 'paid')
                                                Already Paid
                                            @elseif($booking['status'] == 'processed')
                                                On Process
                                            @elseif($booking['status'] == 'pending')
                                                Waiting for Payment
                                            @elseif($booking['status'] == 'completed')
                                                Finished
                                            @elseif($booking['status'] == 'cancelled')
                                                Cancelled
                                            @elseif($booking['status'] == 'reviewed')
                                                Reviewed
                                            @else
                                                Unknown Status
                                            @endif
                                        </p>
                                    </div>
                                    <div class="flex space-x-4">
                                        <img
                                            alt="Pet shop image"
                                            class="w-24 h-24 rounded-lg"
                                            src="{{Storage::url($booking['images'])}}"
                                        />
                                        <div class="flex flex-col gap-2">
                                            <p>
                                                Pet sitting,
                                                {{ !empty($booking['additional_service']) ? implode(', ', $booking['additional_service']) : '' }} 
                                                by {{ !empty($booking['name']) ? $booking['name'] : 'Unknown' }}
                                            </p>
                                            <p>Animal Type: {{ $booking['pet_type'] }}</p>
                                            <p>{{ $booking['duration'] }} Day</p>
                                        </div>
                                        <div class="ml-auto text-right flex-grow">
                                            <p>{{ $booking['check_in_date'] }}</p>
                                            <p>Rp. {{ $booking['total_price'] }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex justify-between items-center">
                                        <p class="font-semibold">Animal Returns: {{ $booking['check_out_date'] }}</p>
                                        <div class="flex space-x-2">
                                            @if($booking['status'] == 'paid')
                                                <form action="{{ route('booking.cancel', ['id' => $booking['booking_id']]) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <button 
                                                        type="submit" 
                                                        class="bg-red-600 px-4 py-2 rounded-lg text-white hover:bg-red-700 transition duration-100">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @elseif($booking['status'] == 'processed')
                                                <form action="{{ route('booking.finish', ['id' => $booking['booking_id']]) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <button 
                                                        type="submit" 
                                                        class="bg-[#B17F5B] px-6 py-2 rounded-lg text-white hover:bg-[#96684A] transition duration-100">
                                                        Finish
                                                    </button>
                                                </form>
                                            @elseif($booking['status'] == 'pending')
                                                <a class="bg-[#B17F5B] px-8 py-2 rounded-lg text-white hover:bg-[#96684A] transition duration-100" href="{{ route('booking', ['id' => $booking['hotel_id']]) }}">
                                                    Pay
                                                </a>
                                            @elseif($booking['status'] == 'completed')
                                                <button class="bg-[#B17F5B] px-4 py-2 rounded-lg text-white hover:bg-[#96684A] transition duration-100"
                                                data-id="{{ $booking['booking_id'] }}" 
                                                data-hotel="{{ $booking['name'] }}" 
                                                onclick="openReviewModal(this)">
                                                    Review
                                                </button>
                                            @else
                                                <p class="text-gray-500">No actions available</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                
                </div>
            </section>
        </div>
    </main>

    <div id="reviewModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-md w-1/3 relative">
            <!-- Close Button -->
            <button 
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800"
                onclick="closeReviewModal()">
                &times;
            </button>
            <form action="{{ route('booking.review') }}" method="POST">
                @csrf
                <input type="hidden" name="booking_id" id="reviewBookingId">
                <h2 class="text-xl font-bold mb-4 text-center">Review for <span id="reviewHotelName"></span></h2>
                
                <!-- Star Rating (Centered) -->
                <div class="flex justify-center mb-4">
                    <div id="starRating" class="flex space-x-1">
                        @for($i = 1; $i <= 5; $i++)
                            <svg 
                                class="star cursor-pointer w-10 h-10 text-gray-300" 
                                data-value="{{ $i }}" 
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" 
                                fill="currentColor">
                                <path d="M12 .587l3.668 7.431L23.236 9.5l-5.656 5.51L18.9 22.9 12 19.54 5.1 22.9l1.32-7.89L.764 9.5l7.568-1.482L12 .587z"/>
                            </svg>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="ratingValue" required>
                </div>

                <!-- Review Text -->
                <label for="review" class="block font-regular">Review</label>
                <textarea name="review" id="review" rows="4" class="border border-gray-300 rounded-lg p-2 w-full mb-4 focus:border-[#d4a573] focus:ring-0" required></textarea>
                
                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4">
                    <button type="button" class="bg-gray-300 px-4 py-2 rounded-lg" onclick="closeReviewModal()">Cancel</button>
                    <button type="submit" class="bg-[#B17F5B] px-4 py-2 rounded-lg text-white hover:bg-[#96684A] transition duration-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
    let selectedRating = 0;

    function openReviewModal(button) {
        const bookingId = button.getAttribute('data-id');
        const hotelName = button.getAttribute('data-hotel');
        document.getElementById('reviewBookingId').value = bookingId;
        document.getElementById('reviewHotelName').textContent = hotelName;
        document.getElementById('reviewModal').classList.remove('hidden');
    }

    function closeReviewModal() {
        document.getElementById('reviewModal').classList.add('hidden');
    }

    document.querySelectorAll('#starRating .star').forEach(star => {
        star.addEventListener('mouseover', function () {
            const value = this.getAttribute('data-value');
            fillStars(value);
        });

        star.addEventListener('mouseout', function () {
            fillStars(selectedRating);
        });

        star.addEventListener('click', function () {
            selectedRating = this.getAttribute('data-value');
            document.getElementById('ratingValue').value = selectedRating;
        });
    });

    function fillStars(value) {
        document.querySelectorAll('#starRating .star').forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('text-yellow-400');
                star.classList.remove('text-gray-300');
            } else {
                star.classList.add('text-gray-300');
                star.classList.remove('text-yellow-400');
            }
        });
    }
</script>
@endsection