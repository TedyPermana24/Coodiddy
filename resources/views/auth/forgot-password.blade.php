<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#6b4423] to-[#c8a279] via-[#c8a279] font-poppins overscroll-none" style="font-family: 'Poppins', sans-serif;">
    <div class="flex w-full max-w-4xl bg-white rounded-3xl shadow-lg overflow-hidden">

        {{-- left section --}}
        <div class="w-1/2 h-full flex items-center justify-center p-4">
            <img src="{{ asset('img/cat-forgot-pass.jpg') }}" alt="Dog" class="w-full h-full object-cover scale-110">
        </div>

        <!-- right Section -->
        <div class="w-1/2 p-8 flex flex-col justify-between">
            <div class="flex justify-end">
                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 mr-2" id="backButton">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
            <h1 class="text-2xl font-bold text-center mb-4 mt-3" style="font-family: 'Poppins', sans-serif; font-size: 30px;">Forgot Password</h1>

            <div class="mb-4 text-sm text-gray-600 text-center">
                {{ __('Meow! Lost your access? Don’t worry, I’ve got your back. Just type in your email, and I’ll send you a magic link to get it back. Don’t forget to give me treats later, okay?.') }}
            </div>

            <!-- Session Status -->
            <div class="flex justify-center">
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div class="relative shadow-lg mx-auto w-80">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="E-mail" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring focus:ring-[#d4a573] focus:outline-none">
                    <img src="{{ asset('svg/envelope-regular.svg') }}" alt="Toggle Email" class="absolute right-3 top-3 w-6 h-6 cursor-pointer">
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="w-full py-3 bg-gradient-to-b from-[#d4a573] to-[#6b4423] text-white font-bold rounded-full flex justify-center mt-4 mx-auto" style="max-width: 200px; auto; margin-bottom: 16px;">
                        {{ __('SEND LINK') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
