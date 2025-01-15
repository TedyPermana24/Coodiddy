@extends('components.layout')

@section('content')
<div class="min-h-auto mb-20 mx-4 sm:mx-8 md:mx-16 lg:mx-32 xl:mx-64 mt-20 sm:mt-32 md:mt-40">
    <!-- Header -->
    <header class="bg-white shadow mx-4 sm:mx-8">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-bold text-lg sm:text-xl lg:text-2xl text-gray-800 leading-tight">
                <span id="page-title">Settings</span>
            </h2>
        </div>
    </header>

    <!-- Page Content -->
    <main class="py-8 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-col md:flex-row gap-6 lg:gap-10">
                <!-- Menu Sections -->
                <div class="p-4 sm:p-6 md:p-8 bg-white shadow sm:rounded-lg w-full h-full md:w-1/4">
                    <p class="w-full text-center text-gray-800 font-bold mb-4 border-b-2 p-2 border-black">Navigator</p>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="nav-link inline-block text-center text-gray-800 font-medium border-l-0 hover:scale-95 hover:text-[#d4a573] transition-all duration-100 pl-2" 
                               data-page="profile" onclick="switchPage('profile')">
                                Profile
                            </a>
                            <p class="mx-1 border-b-2"></p>
                        </li>
                        <li>
                            <a href="#" class="nav-link inline-block text-center text-gray-800 font-medium border-l-0 hover:scale-95 hover:text-[#d4a573] transition-all duration-100 pl-2"
                               data-page="contacts" onclick="switchPage('contacts')">
                                Contacts
                            </a>
                            <p class="mx-1 border-b-2"></p>
                        </li>
                        <li>
                            <a href="#" class="nav-link inline-block text-center text-gray-800 font-medium border-l-0 hover:scale-95 hover:text-[#d4a573] transition-all duration-100 pl-2"
                               data-page="pets" onclick="switchPage('pets')">
                                Pets
                            </a>
                            <p class="mx-1 border-b-2"></p>
                        </li>
                    </ul>
                </div>

                <!-- Content Sections -->
                <div class="w-full md:w-3/4 space-y-6">
                    <!-- Profile Section -->
                    <div id="profile-content" class="content-section">
                        <!-- Update Profile Section -->

                        <div class="p-4 sm:p-6 md:p-8 bg-white shadow sm:rounded-lg" id="profile-section">
                            <div class="flex justify-center mb-6">
                                <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800">Your Personal Profile</h3>
                            </div>
                            
                            <div class="flex justify-center mb-4">
                                <!-- Display profile image -->
                                <img id="profile-image-display" 
                                src="{{ $user->image ? asset(Storage::url($user->image)) : asset('img/kucing-kosan-hendra.jpg') }}" 
                                alt="User Image" 
                                class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full shadow">
                           
                                
                                <!-- Directly change image when selecting a file -->
                                <input id="profile-image-input" 
                                       name="image"
                                       type="file" 
                                       accept="image/*" 
                                       class="hidden" 
                                       onchange="previewImage(event)">
                            </div>
                        
                            <div class="flex justify-end mb-4">
                                <button id="edit-profile-btn" class="text-blue-600 hover:text-blue-800" onclick="toggleEditProfile()">
                                    <img src="{{ asset('svg/edit-pen.svg') }}" alt="Edit Icon" class="h-5 w-5">
                                </button>
                            </div>
                            
                            <!-- Display profile details -->
                            <div id="profile-display">
                                <p>Name</p>
                                <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">{{ $user->name }}</p>
                                <p>Email</p>
                                <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">{{ $user->email }}</p>
                            </div>
                            
                            <!-- Profile edit form, initially hidden -->
                            <div id="profile-edit" class="hidden">
                                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                        
                                    <!-- Editable name field -->
                                    <div class="mb-4">
                                        <label class="block text-sm sm:text-base font-medium text-gray-700">Name</label>
                                        <input name="name" type="text" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0">
                                    </div>
                                    
                                    <!-- Editable email field -->
                                    <div class="mb-4">
                                        <label class="block text-sm sm:text-base font-medium text-gray-700">Email</label>
                                        <input name="email" type="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0">
                                    </div>
                        
                                    <!-- Editable profile image field -->
                                    <div class="mb-4">
                                        <label class="block text-sm sm:text-base font-medium text-gray-700">Profile Image</label>
                                        <input type="file" name="image" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" onchange="previewImage(event)">
                                    </div>
                        
                                    <!-- Save changes button -->
                                    <button type="submit" class="mt-4 bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Save Changes</button>
                                </form>
                            </div>
                        </div>
                        
                    
                        <!-- Update Password Section -->
                        <form action="{{ route('profile.updatePassword') }}" method="POST">
                            @csrf
                            <div class="p-4 sm:p-6 md:p-8 bg-white shadow sm:rounded-lg mt-4">
                                <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800 mb-4">Update Password</h3>
                                <div>
                                    <div class="mb-4">
                                        <label class="block text-sm sm:text-base font-medium text-gray-700">Current Password</label>
                                        <input type="password" name="current_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm sm:text-base font-medium text-gray-700">New Password</label>
                                        <input type="password" name="new_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm sm:text-base font-medium text-gray-700">Confirm New Password</label>
                                        <input type="password" name="new_password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0" required>
                                    </div>
                                    <button type="submit" class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Update</button>
                                </div>
                            </div>
                        </form>
                        
                    
                        <div class="p-4 sm:p-6 md:p-8 bg-white shadow sm:rounded-lg mt-4">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold mb-4 text-red-600">Delete Account</h3>
                            <p class="text-gray-700 mb-4"><span class="text-red-600">Warning:</span> Deleting your account is irreversible. Please proceed with caution.</p>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700" onclick="openDeleteAccountModal()">Delete Account</button>
                        </div>                       
                    </div>

                    <!-- Contacts Section -->
                    <div id="contacts-content" class="content-section hidden">
                        <!-- Add Contact Section -->
                        <div class="p-2 sm:p-4 bg-white shadow sm:rounded-lg" id="contact-section">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-bold text-gray-800">Your Contacts</h3>
                                <button class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]" onclick="openAddContactModal()">+ Add Contact</button>
                            </div>
                        </div>
                    
                        <!-- Contact Cards -->
                        <div class="grid grid-cols-1 mt-4 gap-6">
                        @if($contacts->isEmpty())
                            <p>No data available.</p> 
                        @else
                            @foreach ($contacts as $contact)
                                <div class="bg-white shadow-lg rounded-lg p-4">
                                    <div class="flex m-3 gap-10 mb-0">
                                        <div class="w-full">
                                            <div class="flex justify-end -m-3">
                                                <button class="text-blue-600 hover:text-blue-800" onclick="toggleContactEdit(this)">
                                                    <img src="{{ asset('svg/edit-pen.svg') }}" alt="Edit Icon" class="h-5 w-5">
                                                </button>
                                                <button 
                                                class="text-red-600 hover:text-red-800 ml-2" 
                                                onclick="openDeleteContactModal({{ $contact->id }})"
                                                data-id="{{ $contact->id }}"
                                                >
                                                    <img src="{{ asset('svg/delete-bin.svg') }}" alt="Delete Icon" class="h-7 w-7">
                                                </button>
                                            </div>
                                            <div class="contact-display">
                                                <p>Phone Number</p>
                                                <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">{{ $contact->phone_number }}</p>
                                                <p>City</p>
                                                <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">{{ $contact->city }}</p>
                                                <p>Address</p>
                                                <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">{{ $contact->address }}</p>
                                            </div>
                                            <div class="contact-edit hidden">
                                                <div class="mb-4">
                                                    <label class="block text-m font-medium text-gray-700">Phone Number</label>
                                                    <input type="text" value="{{ $contact->phone_number }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-m font-medium text-gray-700">City</label>
                                                    <input type="text" value="{{ $contact->city }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-m font-medium text-gray-700">Address</label>
                                                    <input type="text" value="{{ $contact->address }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none">
                                                </div>
                                                <button class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    
                    <!-- Pets Section -->
                    <div id="pets-content" class="content-section hidden">
                        <!-- Add Pet Section -->
                        <div class="p-2 sm:p-4 bg-white shadow sm:rounded-lg" id="pet-section">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-bold text-gray-800">Your Pets</h3>
                                <button class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]" onclick="openAddPetModal()">+ Add Pet</button>
                            </div>
                        </div>
                    
                        <!-- Pet Cards -->
                        <div class="grid grid-cols-1 mt-4 gap-6">
                            @if($pets->isEmpty())
                                <p>No data available.</p> 
                            @else
                            @foreach ($pets as $pet)
                                <div class="bg-white shadow-lg rounded-lg p-4">
                                    <div class="flex m-3 gap-10 mb-0">
                                        <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->pet_name }}" class="w-64 h-64 object-cover rounded-md mb-4 border-2 border-[#6B4423]">
                                        <div class="w-full">
                                            <div class="flex justify-end -m-3">
                                                <button class="text-blue-600 hover:text-blue-800" onclick="togglePetEdit(this)">
                                                    <img src="{{ asset('svg/edit-pen.svg') }}" alt="Edit Icon" class="h-5 w-5">
                                                </button>
                                                <button 
                                                    class="text-red-600 hover:text-red-800 ml-2" 
                                                    onclick="openDeletePetModal({{ $pet->id }})"
                                                    data-id="{{ $pet->id }}"
                                                >
                                                    <img src="{{ asset('svg/delete-bin.svg') }}" alt="Delete Icon" class="h-7 w-7">
                                                </button>
                                            </div>
                                            <div class="pet-display">
                                                <p>Pet Name</p>
                                                <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">{{ $pet->pet_name }}</p>
                                                <p>Pet Type</p>
                                                <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">{{ $pet->pet_type }}</p>
                                                <p>Pet Breed</p>
                                                <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">{{ $pet->breed }}</p>
                                            </div>
                                            <div class="pet-edit hidden">
                                                <form action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    
                                                    <!-- Pet Name -->
                                                    <div class="mb-4">
                                                        <label class="block text-m font-medium text-gray-700">Pet Name</label>
                                                        <input 
                                                            type="text" 
                                                            name="pet_name" 
                                                            value="{{ $pet->pet_name }}" 
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none"
                                                        >
                                                    </div>
                                            
                                                    <!-- Pet Type -->
                                                    <div class="mb-4">
                                                        <label class="block text-m font-medium text-gray-700">Pet Type</label>
                                                        <select 
                                                            name="pet_type" 
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                                            <option value="Cat" {{ old('pet_type', $pet->pet_type) == 'Cat' ? 'selected' : '' }}>Cat</option>
                                                            <option value="Dog" {{ old('pet_type', $pet->pet_type) == 'Dog' ? 'selected' : '' }}>Dog</option>
                                                        </select>
                                                    </div>
                                            
                                                    <!-- Pet Breed -->
                                                    <div class="mb-4">
                                                        <label class="block text-m font-medium text-gray-700">Pet Breed</label>
                                                        <input 
                                                            type="text" 
                                                            name="breed" 
                                                            value="{{ $pet->breed }}" 
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-[#d4a573] focus:outline-none"
                                                        >
                                                    </div>
                                            
                                                    <!-- Pet Image (File Input) -->
                                                    <div class="mb-4">
                                                        <label class="block text-sm font-medium text-gray-700">Pet Image (Optional)</label>
                                                        <input 
                                                            type="file" 
                                                            name="image" 
                                                            accept="image/*" 
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                                        >
                                                    </div>
                                            
                                                    <button 
                                                        type="submit" 
                                                        class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]"
                                                    >
                                                        Save Changes
                                                    </button>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>
</div>

       <!-- Delete Account Modal -->
       <div id="deleteAccountModal" class="hidden fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to delete your account?</h2>
            <div class="flex justify-end gap-4">
                <button onclick="closeDeleteAccountModal()" class="bg-gray-400 text-white px-4 py-2 rounded-md">Cancel</button>
                <form action="{{ route('profile.deleteAccount') }}" method="POST" id="deleteAccountForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-800">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Pet Modal -->
    <div id="addPetModal" class="hidden fixed z-10 inset-0 bg-gray-800 bg-opacity-75 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-lg font-medium text-gray-800 mb-4 text-center">Add New Pet</h3>
                <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pet Image</label>
                        <input name="image" type="file" id="pet-img-input" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pet Name</label>
                        <input name="pet_name" type="text" id="pet-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pet Type</label>
                        <select id="pet-type" name="pet_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="Cat">Cat</option>
                            <option value="Dog">Dog</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Breed</label>
                        <input type="text" id="pet-breed" name="breed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button class="bg-gray-300 px-4 py-2 rounded-md hover:bg-gray-400" onclick="closeAddPetModal()">Cancel</button>
                        <button type="submit" class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    @if($pets->isNotEmpty())
    <!-- Modal Delete Pet -->
    <div id="deletePetModal" class="hidden fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to delete this pet?</h2>
            <div class="flex justify-end gap-4">
                <button onclick="closeDeletePetModal()" class="bg-gray-400 text-white px-4 py-2 rounded-md">Cancel</button>
                <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" id="deletePetForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-800">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- Add Contact Modal -->
    <div id="addContactModal" class="hidden fixed z-10 inset-0 bg-gray-800 bg-opacity-75 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-lg font-medium text-gray-800 mb-4 text-center">Add New Contact</h3>
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input name="phone_number" type="text" id="phone-number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">City</label>
                            <input name="city" type="text" id="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Address</label>
                            <input name="address" type="text" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" class="bg-gray-300 px-4 py-2 rounded-md hover:bg-gray-400" onclick="closeAddContactModal()">Cancel</button>
                            <button type="submit" class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete Contact -->
    @if( $contacts->isNotEmpty())
    <div id="deleteContactModal" class="hidden fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to delete this contact?</h2>
            <div class="flex justify-end gap-4">
                <button onclick="closeDeleteContactModal()" class="bg-gray-400 text-white px-4 py-2 rounded-md">Cancel</button>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" id="deleteContactForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-800">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endif
    


@if(session('status'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg" 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)">
        {{ session('status') }}
    </div>
@endif
@endsection

@section('script')
<script>
    // Variables for tracking state
    let isEditingImage = false;

    // Page switching functionality
    function switchPage(page) {
        const pageTitle = document.getElementById('page-title');
        pageTitle.textContent = page === 'profile' ? 'Settings' : (page === 'pets' ? 'Your Pets' : 'Your Contacts');

        // Hide all content sections
        const contentSections = document.querySelectorAll('.content-section');
        contentSections.forEach(section => section.classList.add('hidden'));

        // Show selected content section
        const selectedContent = document.getElementById(`${page}-content`);
        if (selectedContent) {
            selectedContent.classList.remove('hidden');
        }

        // Update active navigation link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            if (link.dataset.page === page) {
                link.classList.add('text-[#d4a573]');
            } else {
                link.classList.remove('text-[#d4a573]');
            }
        });
    }

        // Profile functionality
        function toggleEditProfile() {
        const editSection = document.getElementById('profile-edit');
        const displaySection = document.getElementById('profile-display');
        
        // Toggle antara hidden dan visible
        editSection.classList.toggle('hidden');
        displaySection.classList.toggle('hidden');
    }

    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById('profile-image-display').src = e.target.result;
        };
        
        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Contact functionality
    function toggleContactEdit(button) {
        const contactCard = button.closest('.bg-white');
        const displaySection = contactCard.querySelector('.contact-display');
        const editSection = contactCard.querySelector('.contact-edit');
        
        displaySection.classList.toggle('hidden');
        editSection.classList.toggle('hidden');
    }

    function openAddContactModal() {
        document.getElementById('addContactModal').classList.remove('hidden');
    }

    function closeAddContactModal() {
        document.getElementById('addContactModal').classList.add('hidden');
    }

    function openDeleteContactModal(contactId) {
    // Menampilkan modal
    const modal = document.getElementById('deleteContactModal');
    modal.classList.remove('hidden');
    modal.classList.add('block');

    // Mengatur ID contact dalam form untuk penghapusan
    const deleteForm = document.getElementById('deleteContactForm');
    deleteForm.action = '/contacts/' + contactId;  // Menambahkan ID contact ke URL form
    }

    // Close Delete Contact Modal
    function closeDeleteContactModal() {
        document.getElementById('deleteContactModal').classList.add('hidden');
}

    // Pet functionality
    document.getElementById('pet-img-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview-image');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
});

    // Toggle tampilan form edit pet
    // Fungsi untuk mengubah tampilan gambar yang dipilih pada input file
    document.getElementById('pet-img-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-image');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });

    // Toggle tampilan form edit pet
    function togglePetEdit(button) {
        const petCard = button.closest('.bg-white');
        const petDisplay = petCard.querySelector('.pet-display');
        const petEdit = petCard.querySelector('.pet-edit');

        petDisplay.classList.toggle('hidden');
        petEdit.classList.toggle('hidden');
    }


    function openAddPetModal() {
        document.getElementById('addPetModal').classList.remove('hidden');
    }

    function closeAddPetModal() {
        document.getElementById('addPetModal').classList.add('hidden');
    }

    function openDeletePetModal(petId) {
        // Menampilkan modal
        const modal = document.getElementById('deletePetModal');
        modal.classList.remove('hidden');
        modal.classList.add('block');

        // Mengatur ID pet dalam form untuk penghapusan
        const deleteForm = document.getElementById('deletePetForm');
        deleteForm.action = '/pets/' + petId;  // Menambahkan ID pet ke URL form
    }


    function closeDeletePetModal() {
        document.getElementById('deletePetModal').classList.add('hidden');
    }

    // Initialize event listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Set initial page
        switchPage('profile');

        // Add event listeners for navigation
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                switchPage(link.dataset.page);
            });
        });
    });

    function openDeleteAccountModal() {
        document.getElementById('deleteAccountModal').classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    function closeDeleteAccountModal() {
        document.getElementById('deleteAccountModal').classList.add('hidden');
    }
</script>
@endsection