@extends('components.layout')

@section('content')
        <main class="max-w-6xl mx-auto p-4 mt-20">
            <div
                class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4"
            >
                <div
                    class="bg-white p-4 rounded-lg shadow-md w-full md:w-1/2 h-auto"
                >
                    <img
                        alt="Pet shop front view"
                        class="w-full rounded-lg h-64 "
                        height="150"
                        src="{{ asset('img/IMG_1142-e1490899405898 2 (2).png') }}"
                        width="600"
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
                <div
                    class="bg-white p-4 rounded-lg shadow-md w-full md:w-1/2 h-auto flex flex-col justify-between"
                >
                    <div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-2xl font-bold">DayPet Care</h2>
                                <div class="flex items-center mt-2">
                                    <div class="flex text-yellow-500">
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                        <i
                                            class="fas fa-star star cursor-pointer"
                                        >
                                        </i>
                                    </div>
                                    <span class="ml-2 text-gray-600">
                                        440+ Visitors
                                    </span>
                                </div>
                            </div>
                            <i
                                class="far fa-heart heart text-2xl cursor-pointer"
                            >
                            </i>
                        </div>
                        <p class="mt-4 text-gray-700">
                            DayPet Care offers professional pet care services
                            with modern and comfortable facilities. We have an
                            experienced team ready to give your pet full
                            attention. Equipped with a spacious indoor play
                            area, a quality grooming station, and a 24/7
                            monitoring system to ensure the safety and comfort
                            of every animal we care for.
                        </p>
                    </div>
                    <div>
                        <p class="mt-4 text-xl font-bold">Bandung</p>
                        <p class="text-xl font-bold">Rp.200.000/day</p>
                        <div class="mt-4 flex space-x-4">
                            <button
                                class="bg-[#A97142] text-white px-4 py-2 rounded-lg"
                            >
                                Book Now
                            </button>
                            <button
                                class="bg-[#A97142] text-white px-4 py-2 rounded-lg"
                            >
                                Contact
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">Reviews</h3>
                    <span
                        class="bg-[#A97142] text-white px-3 py-1 rounded-full"
                    >
                        13
                    </span>
                </div>
                <div class="mt-4">
                    <div class="flex items-start">
                        <img
                            alt="Reviewer avatar"
                            class="w-12 h-12 rounded-full"
                            height="50"
                            src="https://storage.googleapis.com/a1aa/image/DMuf9NYWTfrcEULCyWvnejR2yEP4I0fvk8gYYF9q0Jw1CdyPB.jpg"
                            width="50"
                        />
                        <div class="ml-4 flex-1">
                            <div class="flex justify-between items-center">
                                <h4 class="font-bold">Tedy Sukma Permana</h4>
                                <span class="text-gray-500">
                                    November 3, 2024
                                </span>
                            </div>
                            <div class="flex items-center mt-1 text-yellow-500">
                                <i class="fas fa-star star cursor-pointer"> </i>
                                <i class="fas fa-star star cursor-pointer"> </i>
                                <i class="fas fa-star star cursor-pointer"> </i>
                                <i class="fas fa-star star cursor-pointer"> </i>
                                <i class="fas fa-star star cursor-pointer"> </i>
                            </div>
                            <p class="mt-2 text-gray-700">
                                The service was very satisfactory! The staff is
                                friendly and professional in handling my cat.
                                The facilities are clean and complete, with a
                                comfortable play area for pets. The price is
                                very much in line with the quality of the
                                service provided. Highly recommended for pet
                                owners who are looking for a trusted pet shop in
                                Bandung.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection

