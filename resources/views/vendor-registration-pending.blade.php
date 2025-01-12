@extends('components.layout')

@section('content')
<main class="flex flex-col items-center py-60">
    <section class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);">
        <div class="p-16 flex flex-col items-center justify-center text-center">
            <!-- Clock Icon -->
            <div class="mb-8">
                <svg class="w-24 h-24 text-[#FFA500]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" stroke-width="2"/>
                    <path stroke-linecap="round" stroke-width="2" d="M12 6v6l4 2"/>
                </svg>
            </div>
            
            <!-- Status Text -->
            <h2 class="text-4xl font-semibold text-[#FFA500] mb-4">
                PENDING
            </h2>
            
            <!-- Message -->
            <p class="text-xl mb-3">
                Thank you for your registration.
            </p>
            <p class="text-lg text-gray-600 mb-6">
                We are currently reviewing the information and will get back to you shortly.
            </p>
            <p class="text-md text-gray-500">
                Shortly you will find a confirmation in your email.
            </p>
            
            <!-- Back to Home Button (Optional) -->
            <div class="mt-12">
                <a href="{{ route('home') }}" class="px-8 py-3 bg-[#8B5E3C] text-white rounded-lg hover:bg-[#6B4423] transition duration-300">
                    Back to Home
                </a>
            </div>
        </div>
    </section>
</main>
@endsection