@extends('components.layout')

@section('content')
<main class="flex p-4">
            <aside
                class="w-1/4 bg-white p-4 rounded-lg shadow-md mt-20"
                style="height: 50%"
            >
                <div class="flex items-center space-x-4 mb-4 relative pb-4 after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-[1px] after:w-full after:bg-gray-300">
                    <img
                        alt="User profile picture"
                        class="rounded-full"
                        height="60"
                        src="https://storage.googleapis.com/a1aa/image/FKf0W74pUD2f9UsWv0ohlbNM4f9aQ33W2GckmMoWzc93JY8nA.jpg"
                        width="60"
                    />
                    <div >
                        <p class="font-semibold ">Tedy Sukma Permana</p>
                    </div>
                </div>
                <div class="flex items-center justify-between mb-4 relative pb-4 after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-[1px] after:w-full after:bg-gray-300">
                    <p class="font-semibold">Balance</p>
                    <p>Rp 1.234.000</p>
                </div>
                <div>
                    <p class="font-semibold">Payment</p>
                    <ul>
                        <li class="flex justify-between items-center mb-4">
                            <span> Waiting for payment </span>
                            <span
                                class="bg-[#A5724C] text-white rounded-full px-2"
                            >
                                1
                            </span>
                        </li>
                        <li>List of transactions</li>
                    </ul>
                </div>
            </aside>
            <section class="w-3/4 ml-4 mt-20">
                <div class="bg-white p-2 px-4 rounded-lg shadow-md flex justify-between items-center mb-4 space-x-4">
                    
                    <div id="button-group" class="flex space-x-4">
                        <button class="relative text-[#A5724C] h-10 after:content-[''] after:block after:h-[2px] after:w-full after:bg-[#A5724C] after:absolute after:bottom-0 after:left-0" onclick="setActive(this)">All</button>
                        <button class="text-black font-medium" onclick="setActive(this)">Haven’t Paid</button>
                        <button class="text-black font-medium" onclick="setActive(this)">Finished</button>
                    </div>
                

                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                        <input
                            class="p-2 outline-none text-gray-500 w-full"
                            placeholder="Search here"
                            type="text"
                        />
                        <button class="p-2 text-[#A5724C]">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <div
                    class="bg-white p-4 rounded-lg shadow-md mb-4"
                    style="max-height: 600px; overflow-y: auto"
                >
                    
                    <div class="space-y-4">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-2">
                                <p class="font-semibold">DayPet Care</p>
                                <p class="text-gray-500">Finished</p>
                            </div>
                            <div class="flex space-x-4">
                                <img
                                    alt="Pet shop image"
                                    class="w-24 h-24 rounded-lg"
                                    height="100"
                                    src="https://storage.googleapis.com/a1aa/image/Zo7u0SdtGQb5B5RwreTWnfcCZXpsuFB5LBgsAp6YNZo8EMenA.jpg"
                                    width="100"
                                />
                                <div class="flex flex-col gap-2">
                                    <p>
                                        Pet sitting, grooming, pedicure by
                                        DayPet Care
                                    </p>
                                    <p>Animal Type: Cat</p>
                                    <p>3 Day</p>
                                </div>
                                <div
                                    class="ml-auto text-right flex-grow text-right"
                                >
                                    <p>November 5, 2024</p>
                                    <p>Rp. 600.000</p>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <p class="font-semibold">
                                    Animal Returns: November 8, 2024
                                </p>
                                <div class="flex space-x-2">
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg hover:text-white hover:bg-[#A5724C] transition duration-100"
                                    >
                                        Extend
                                    </button>
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg hover:text-white hover:bg-[#A5724C] transition duration-100"
                                    >
                                        Chat
                                    </button>
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg hover:text-white hover:bg-[#A5724C] transition duration-100"
                                        onclick="confirmDelete(this)"
                                        >
                                        Finish
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-2">
                                <p class="font-semibold">DayPet Care</p>
                                <p class="text-gray-500">Finished</p>
                            </div>
                            <div class="flex space-x-4">
                                <img
                                    alt="Pet shop image"
                                    class="w-24 h-24 rounded-lg"
                                    height="100"
                                    src="https://storage.googleapis.com/a1aa/image/Zo7u0SdtGQb5B5RwreTWnfcCZXpsuFB5LBgsAp6YNZo8EMenA.jpg"
                                    width="100"
                                />
                                <div class="flex flex-col gap-2">
                                    <p>
                                        Pet sitting, grooming, pedicure by
                                        DayPet Care
                                    </p>
                                    <p>Animal Type: Cat</p>
                                    <p>3 Day</p>
                                </div>
                                <div
                                    class="ml-auto text-right flex-grow text-right"
                                >
                                    <p>November 5, 2024</p>
                                    <p>Rp. 600.000</p>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <p class="font-semibold">
                                    Animal Returns: November 8, 2024
                                </p>
                                <div class="flex space-x-2">
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg"
                                    >
                                        Extend
                                    </button>
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg"
                                    >
                                        Chat
                                    </button>
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg"
                                    >
                                        Finish
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-2">
                                <p class="font-semibold">DayPet Care</p>
                                <p class="text-gray-500">Finished</p>
                            </div>
                            <div class="flex space-x-4">
                                <img
                                    alt="Pet shop image"
                                    class="w-24 h-24 rounded-lg"
                                    height="100"
                                    src="https://storage.googleapis.com/a1aa/image/Zo7u0SdtGQb5B5RwreTWnfcCZXpsuFB5LBgsAp6YNZo8EMenA.jpg"
                                    width="100"
                                />
                                <div class="flex flex-col gap-2">
                                    <p>
                                        Pet sitting, grooming, pedicure by
                                        DayPet Care
                                    </p>
                                    <p>Animal Type: Dog</p>
                                    <p>3 Day</p>
                                </div>
                                <div
                                    class="ml-auto text-right flex-grow text-right"
                                >
                                    <p>November 5, 2024</p>
                                    <p>Rp. 600.000</p>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <p class="font-semibold">
                                    Animal Returns: November 8, 2024
                                </p>
                                <div class="flex space-x-2">
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg"
                                    >
                                        Extend
                                    </button>
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg"
                                    >
                                        Chat
                                    </button>
                                    <button
                                        class="bg-gray-200 px-4 py-2 rounded-lg"
                                    >
                                        Finish
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection