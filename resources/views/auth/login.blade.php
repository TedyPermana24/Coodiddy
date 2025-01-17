<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#c8a279] to-[#6b4423] via-[#c8a279] font-poppins overscroll-none" style="font-family: 'Poppins', sans-serif;">
    <div class="flex w-full max-w-4xl bg-white rounded-3xl shadow-lg overflow-hidden">
        <!-- Left Section -->
        <div class="w-1/2 p-8 flex flex-col justify-between">
            <div>
                {{-- X Button --}}
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700 mr-2" id="backButton">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-center mb-4 mt-3" style="font-family: 'Poppins', sans-serif; font-size: 30px;">Sign in</h1>
                <div class="flex justify-center space-x-4 mb-10">
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
                <p class="text-center text-sm text-[#d4a573] mb-4">or use your account</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div class="relative shadow-lg mx-auto w-80">
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="E-mail" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring focus:ring-[#d4a573] focus:outline-none">
                        <img src="{{ asset('svg/envelope-regular.svg') }}" alt="Toggle Email" class="absolute right-3 top-3 w-6 h-6 cursor-pointer">
                        <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
                    </div>

                    <!-- Password -->
                    <div class="relative shadow-lg mx-auto w-80">
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring focus:ring-[#d4a573] focus:outline-none">
                        <img src="{{ asset('svg/eye-solid.svg') }}" alt="Toggle Password" class="absolute right-3 top-3 w-6 h-6 cursor-pointer" onclick="togglePasswordVisibility()">
                        <!-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> -->
                    </div>

                    <!-- Remember Me -->
                    {{-- <div class="block mt-4 mb-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}

                    <a href="{{ route('password.request') }}" class="text-sm text-[#d4a573] text-center cursor-pointer block">Forget your password?</a>
                    <button type="submit" class="w-full py-3 bg-gradient-to-b from-[#d4a573] to-[#6b4423] text-white font-bold rounded-full flex justify-center mt-4 mx-auto" style="max-width: 200px; auto; margin-bottom: 16px;">SIGN IN</button>
                </form>
            </div>
            <p class="text-sm text-center text-gray-500">Haven’t own an account yet? <a href="{{ route('register') }}" class="text-[#d4a573] font-bold">Register</a></p>
        </div>

        <!-- Right Section -->
        <div class="w-1/2 h-full flex items-center justify-center p-4">
            <img src="{{ asset('img/cat-login-long.jpg') }}" alt="Cat" class="w-full h-full object-cover scale-110">
        </div>
    </div>

    <script>
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
