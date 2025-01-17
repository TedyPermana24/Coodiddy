@extends('components.layout')

@section('content')
<div class="min-h-auto mb-20 mx-4 sm:mx-8 md:mx-16 lg:mx-32 xl:mx-64 mt-20 sm:mt-32 md:mt-40">

    <!-- Header 2 -->
    <header class="bg-white shadow mx-4 sm:mx-8">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-bold text-lg sm:text-xl lg:text-2xl text-gray-800 leading-tight">
                Settings
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
                            <a href="#" class="inline-block text-center text-gray-800 font-medium border-l-0 hover:scale-95 hover:text-[#d4a573] transition-all duration-100 pl-2
                                {{ request()->routeIs('profile') ? 'border-l-4 border-blue-600' : '' }}">
                                Profile
                            </a>
                            <p class="mx-1 border-b-2"></p>
                        </li>
                        <li>
                            <a href="#" class="inline-block text-center text-gray-800 font-medium border-l-0 hover:scale-95 hover:text-[#d4a573] transition-all duration-300 pl-2
                                {{ request()->routeIs('contacts') ? 'border-l-4 border-blue-600' : '' }}">
                                Contacts
                            </a>
                            <p class="mx-1 border-b-2"></p>
                        </li>
                        <li>
                            <a href="#" class="inline-block text-center text-gray-800 font-medium border-l-0 hover:scale-95 hover:text-[#d4a573] transition-all duration-300 pl-2
                                {{ request()->routeIs('pets') ? 'border-l-4 border-blue-600' : '' }}">
                                Pets
                            </a>
                            <p class="mx-1 border-b-2"></p>
                        </li>
                    </ul>
                </div>

                <!-- Content Sections -->
                <div class="w-full md:w-3/4 space-y-6">
                    <!-- Update Profile Section -->
                    <div class="p-4 sm:p-6 md:p-8 bg-white shadow sm:rounded-lg" id="profile-section">
                        <div class="flex justify-center mb-6">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800">Your Personal Profile</h3>
                        </div>                        
                        <div class="flex justify-center mb-4">
                            <img id="profile-image-display" src="https://via.placeholder.com/150" alt="User Image" class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full shadow cursor-pointer" onclick="triggerFileInput()">
                            <input id="profile-image-input" type="file" accept="image/*" class="hidden" onchange="previewImage(event)">
                        </div>
                        <div class="flex justify-end mb-4">
                            <button id="edit-profile-btn" class="text-blue-600 hover:text-blue-800" onclick="toggleEditProfile()">
                                <img src="{{ asset('svg/edit-pen.svg') }}" alt="Edit Icon" class="h-5 w-5">
                            </button>
                        </div>
                        <div id="profile-display">
                            <p>Username</p>
                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">current_username</p>
                            <p>Email</p>
                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">current_email@example.com</p>
                            <p>Phone Number</p>
                            <p class="box-border border-2 mt-1 mb-4 rounded-md p-2">123-456-7890</p>
                        </div>
                        <!-- input profile edit -->
                        <div id="profile-edit" class="hidden">
                            <div class="mb-4">
                                <label class="block text-sm sm:text-base font-medium text-gray-700">Username</label>
                                <input type="text" value="current_username" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm sm:text-base font-medium text-gray-700">Email</label>
                                <input type="email" value="current_email@example.com" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm sm:text-base font-medium text-gray-700">Phone Number</label>
                                <input type="tel" value="123-456-7890" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0">
                            </div>
                            <button class="mt-4 bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Save Changes</button>
                        </div>
                    </div>

                    <!-- Update Password Section -->
                    <div class="p-4 sm:p-6 md:p-8 bg-white shadow sm:rounded-lg">
                        <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800 mb-4">Update Password</h3>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm sm:text-base font-medium text-gray-700">New Password</label>
                                <input type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm sm:text-base font-medium text-gray-700">Confirm Password</label>
                                <input type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#d4a573] focus:ring-0">
                            </div>
                            <button class="bg-[#8B5E3C] text-white px-4 py-2 rounded-md hover:bg-[#6B4423]">Update</button>
                        </div>
                    </div>

                    <!-- Delete Account Section -->
                    <div class="p-4 sm:p-6 md:p-8 bg-white shadow sm:rounded-lg">
                        <h3 class="text-base sm:text-lg lg:text-xl font-bold mb-4 text-red-600">Delete Account</h3>
                        <p class="text-gray-700 mb-4"><span class="text-red-600">Warning:</span> Deleting your account is irreversible. Please proceed with caution.</p>
                        <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700" onclick="openModal()">Delete Account</button>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<!-- Modal for Delete Confirmation -->
<div id="deleteModal" class="hidden fixed z-10 inset-0 bg-gray-800 bg-opacity-75 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 sm:w-96">
            <h3 class="text-base sm:text-lg lg:text-xl font-medium text-gray-800 mb-4 text-center">Confirm Account Deletion</h3>
            <p class="text-gray-700 mb-6 text-center">Are you sure you want to delete your account? This action cannot be undone.</p>
            <div class="flex justify-end space-x-4">
                <button class="bg-gray-300 px-4 py-2 rounded-md hover:bg-gray-400" onclick="closeModal()">Cancel</button>
                <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    let isEditingImage = false;

    // Fungsi untuk toggle tampilan profil antara edit dan display
    function toggleEditProfile() {
        const display = document.getElementById('profile-display');
        const edit = document.getElementById('profile-edit');
        display.classList.toggle('hidden');
        edit.classList.toggle('hidden');
    }

    // Fungsi untuk trigger input file hanya ketika ikon edit diklik
    function triggerFileInput() {
        if (isEditingImage) {
            document.getElementById('profile-image-input').click();
        }
    }

    // Fungsi untuk mengaktifkan mode edit gambar saat tombol edit diklik
    function enableImageEdit() {
        isEditingImage = true;
    }

    // Fungsi untuk memperlihatkan pratinjau gambar saat mengganti gambar profil
    function previewImage(event) {
        const image = document.getElementById('profile-image-display');
        image.src = URL.createObjectURL(event.target.files[0]);
        // Setelah gambar diganti, matikan mode edit gambar
        isEditingImage = false;
    }

    // Menambahkan event listener pada tombol edit gambar
    document.getElementById('edit-profile-btn').addEventListener('click', enableImageEdit);

    function openModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

@endsection
