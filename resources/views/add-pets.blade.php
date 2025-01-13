@extends('components.layout')

@section('content')
<div class="min-h-auto mb-20 mx-64 mt-40">

    <!-- Header 2 -->
    <header class="bg-white shadow mx-20">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                Your Pets
            </h2>
        </div>
    </header>

    <!-- Page Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex gap-10">

                <!-- Menu Sections -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-1/4 h-full">
                    <p class="w-full text-center text-gray-800 font-bold mb-4 border-b-2 p-2 border-black">Navigator</p>
                    <ul class="space-y-4">
                        <li class="space-y-4">
                            <a href="#" class="inline-block text-center text-gray-800 font-medium border-l-0 hover:border-l-4 hover:border-blue-600 transition-all duration-300 pl-2
                                {{ request()->routeIs('profile') ? 'border-l-4 border-blue-600' : '' }}">
                                Profile
                            </a>
                            <p class="mx-1 border-b-2 "></p>
                        </li>
                        <li class="space-y-4">
                            <a href="#" class="inline-block text-center text-gray-800 font-medium border-l-0 hover:border-l-4 hover:border-blue-600 transition-all duration-300 pl-2
                                {{ request()->routeIs('contacts') ? 'border-l-4 border-blue-600' : '' }}">
                                Contacts
                            </a>
                            <p class="mx-1 border-b-2 "></p>
                        </li>
                        <li class="space-y-4">
                            <a href="#" class="inline-block text-center text-gray-800 font-medium border-l-0 hover:border-l-4 hover:border-blue-600 transition-all duration-300 pl-2
                                {{ request()->routeIs('pets') ? 'border-l-4 border-blue-600' : '' }}">
                                Pets
                            </a>
                            <p class="mx-1 border-b-2 "></p>
                        </li>
                    </ul>
                </div>

                <!-- Content Sections -->
                <div class="w-3/4 space-y-6">

                    <!-- Add Pet Section -->
                    <div class="p-2 sm:p-4 bg-white shadow sm:rounded-lg" id="pet-section">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold text-gray-800">Your Pets</h3>
                            <button class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]" onclick="openAddPetModal()">+ Add Pet</button>
                        </div>
                    </div>

                    <!-- Pet Cards Section -->
                    <div class="grid grid-cols-1 gap-6">
                        {{-- card --}}
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <div class="flex justify-end mb-2">   
                            </div>
                            <div class="flex m-3 gap-10 mb-0">
                                <img src="{{ asset('img/cat-login.jpg') }}" alt="Pet Image" class="w-64 h-64 object-cover rounded-md mb-4 border-2 border-[#6B4423]">
                                <div class="w-full">
                                    <div class="flex justify-end -m-3">
                                        <button id="edit-profile-btn" class="text-blue-600 hover:text-blue-800" onclick="toggleEditProfile()">
                                            <img src="{{ asset('svg/edit-pen.svg') }}" alt="Edit Icon" class="h-5 w-5">
                                        </button>
                                        <button class="text-red-600 hover:text-red-800 ml-2" onclick="openDeletePetModal">
                                            <img src="{{ asset('svg/delete-bin.svg') }}" alt="Delete Icon" class="h-7 w-7">
                                        </button>
                                    </div>
                                    <div class="relative">
                                        <div id="profile-display" class="w-full">
                                            <p>Pet Name</p>
                                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">current_pet_name</p>
                                            <p>Pet Type</p>
                                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">current_pet_type</p>
                                            <p>Pet Breed</p>
                                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">current_pet_breed</p>
                                        </div>
                                    
                                        <!-- input profile edit -->
                                        <div id="profile-edit" class="hidden w-full">
                                            <div class="mb-4">
                                                <label class="block text-m font-medium text-gray-700">Pet Name</label>
                                                <input type="text" value="current_pet_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                            </div>
                                            <div class="mb-4">
                                                <label class="block text-m font-medium text-gray-700">Pet Type</label>
                                                <input type="email" value="current_pet_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                            </div>
                                            <div class="mb-4">
                                                <label class="block text-m font-medium text-gray-700">Pet Breed</label>
                                                <input type="tel" value="current_pet_breed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                            </div>
                                            <button class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Save Changes</button>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                  
                        </div>

                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <div class="flex justify-end mb-2">   
                            </div>
                            <div class="flex m-3 gap-10 mb-0">
                                <img src="{{ asset('img/cat-login.jpg') }}" alt="Pet Image" class="w-64 h-64 object-cover rounded-md mb-4 border-2 border-[#6B4423]">
                                <div class="w-full">
                                    <div class="flex justify-end -m-3">
                                        <button id="edit-profile-btn" class="text-blue-600 hover:text-blue-800" onclick="toggleEditProfile()">
                                            <img src="{{ asset('svg/edit-pen.svg') }}" alt="Edit Icon" class="h-5 w-5">
                                        </button>
                                        <button class="text-red-600 hover:text-red-800 ml-2" onclick="openDeletePetModal">
                                            <img src="{{ asset('svg/delete-bin.svg') }}" alt="Delete Icon" class="h-7 w-7">
                                        </button>
                                    </div>
                                    <div class="relative">
                                        <div id="profile-display" class="w-full">
                                            <p>Pet Name</p>
                                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">current_pet_name</p>
                                            <p>Pet Type</p>
                                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">current_pet_type</p>
                                            <p>Pet Breed</p>
                                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">current_pet_breed</p>
                                        </div>
                                    
                                        <!-- input profile edit -->
                                        <div id="profile-edit" class="hidden w-full">
                                            <div class="mb-4">
                                                <label class="block text-m font-medium text-gray-700">Pet Name</label>
                                                <input type="text" value="current_pet_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                            </div>
                                            <div class="mb-4">
                                                <label class="block text-m font-medium text-gray-700">Pet Type</label>
                                                <input type="email" value="current_pet_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                            </div>
                                            <div class="mb-4">
                                                <label class="block text-m font-medium text-gray-700">Pet Breed</label>
                                                <input type="tel" value="current_pet_breed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                            </div>
                                            <button class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Save Changes</button>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                  
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>
</div>



<!-- Modal for Add Pet -->
<div id="addPetModal" class="hidden fixed z-10 inset-0 bg-gray-800 bg-opacity-75 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-medium text-gray-800 mb-4 text-center">Add New Pet</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pet Image</label>
                    <input type="file" id="pet-img-input" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pet Name</label>
                    <input type="text" id="pet-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pet Type</label>
                    <select id="pet-type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="Cat">Cat</option>
                        <option value="Dog">Dog</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Breed</label>
                    <input type="text" id="pet-breed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="flex justify-end space-x-4">
                    <button class="bg-gray-300 px-4 py-2 rounded-md hover:bg-gray-400" onclick="closeAddPetModal()">Cancel</button>
                    <button class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]" onclick="savePet()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>

    // Fungsi untuk toggle tampilan profil antara edit dan display
    function toggleEditProfile() {
        const display = document.getElementById('profile-display');
        const edit = document.getElementById('profile-edit');

        // Debug log untuk memastikan fungsi dipanggil
        console.log('toggleEditProfile called');
        console.log('profile-display:', display);
        console.log('profile-edit:', edit);

        // Toggle class hidden
        display.classList.toggle('hidden');
        edit.classList.toggle('hidden');
    }



    function openAddPetModal() {
        document.getElementById('addPetModal').classList.remove('hidden');
    }

    function closeAddPetModal() {
        document.getElementById('addPetModal').classList.add('hidden');
    }

    function openDeletePetModal(petId) {
        // Open delete confirmation modal
    }

</script>
@endsection
