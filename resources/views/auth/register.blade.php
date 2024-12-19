<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#6b4423] to-[#c8a279] via-[#c8a279] font-poppins" style="font-family: 'Poppins', sans-serif;">
    <div class="flex w-full max-w-4xl bg-white rounded-3xl shadow-lg overflow-hidden">

        {{-- right section --}}
        <div class="w-1/2 h-full flex items-center justify-center p-4">
            <img src="{{ asset('img/dog-register.jpg') }}" alt="Cat" class="w-full h-full object-cover scale-110">
        </div>

        <!-- Left Section -->
        <div class="w-1/2 p-8 flex flex-col justify-between">
            <div class="flex justify-end">
                <button type="button" onclick="if (document.referrer) { window.location.href='{{ url()->previous() }}'; }" class="text-gray-500 hover:text-gray-700 mr-2" id="backButton">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <h1 class="text-2xl font-bold text-center mb-4 mt-3" style="font-family: 'Poppins', sans-serif; font-size: 30px;">Create account</h1>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Social Media Buttons -->
                <div class="flex justify-center space-x-4" style="margin-top: 0;">
                    <button class="w-10 h-10 rounded-full flex items-center justify-center">
                        <img src="{{ asset('svg/facebook.svg') }}" alt="Facebook" class="w-full h-full object-contain">
                    </button>
                    <button class="w-10 h-10 rounded-full flex items-center justify-center">
                        <img src="{{ asset('svg/google.svg') }}" alt="Google" class="w-full h-full object-contain">
                    </button>
                    <button class="w-10 h-10 rounded-full flex items-center justify-center">
                        <img src="{{ asset('svg/instagram.svg') }}" alt="Instagram" class="w-full h-full object-contain">
                    </button>
                </div>
                <p class="text-center text-sm text-[#d4a573] mt-1 mb-0">or use your email for registration</p>

                <!-- Name -->
                <div class="relative shadow-lg mx-auto w-80">
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring focus:ring-[#d4a573] focus:outline-none">
                    <img src="{{ asset('svg/user-regular.svg') }}" alt="Toggle Email" class="absolute right-3 top-3 w-6 h-6 cursor-pointer">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="relative shadow-lg mx-auto w-80 mt-4">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="E-mail" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring focus:ring-[#d4a573] focus:outline-none">
                    <img src="{{ asset('svg/envelope-regular.svg') }}" alt="Toggle Email" class="absolute right-3 top-3 w-6 h-6 cursor-pointer">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative shadow-lg mx-auto w-80 mt-4">
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring focus:ring-[#d4a573] focus:outline-none">
                    <img src="{{ asset('svg/eye-solid.svg') }}" alt="Toggle Password" class="absolute right-3 top-3 w-6 h-6 cursor-pointer" onclick="togglePasswordVisibility()">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-2">
                    <button type="submit" class="w-full py-3 bg-gradient-to-b from-[#d4a573] to-[#6b4423] text-white font-bold rounded-full flex justify-center mt-4 mx-auto" style="max-width: 200px; auto; margin-bottom: 16px;">SIGN UP</button>
                </div>
                <p class="text-sm text-center text-gray-500" style="margin-top: 0;">Already have an account? <a href="{{ route('login') }}" class="text-[#d4a573] font-bold">Log in</a></p>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backButton = document.getElementById('backButton');
            if (!document.referrer) {
                backButton.style.pointerEvents = 'none'; // Menonaktifkan interaksi
                backButton.classList.add('opacity-50', 'cursor-not-allowed'); // Menambahkan kelas untuk tampilan non-aktif
            }
        });

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.querySelector('img[alt="Toggle Password"]');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.src = '{{ asset('svg/eye-slash-solid.svg') }}'; // Ganti dengan ikon mata tertutup
            } else {
                passwordInput.type = 'password';
                passwordIcon.src = '{{ asset('svg/eye-solid.svg') }}'; // Kembali ke ikon mata terbuka
            }
        }
    </script>
</body>
</html>
