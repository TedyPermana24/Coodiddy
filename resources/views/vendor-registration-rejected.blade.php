@extends('components.layout')

@section('content')
<main class="flex flex-col items-center py-60">
    <section class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);">
        <div class="p-16 flex flex-col items-center justify-center text-center">
            <!-- Rejected Icon -->
            <div class="mb-8">
                <svg class="w-24 h-24 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            
            <!-- Status Text -->
            <h2 class="text-4xl font-semibold text-red-500 mb-4">
                REJECTED
            </h2>
            
            <!-- Message -->
            <p class="text-xl mb-3">
                We apologize, but your registration has been rejected.
            </p>
            <p class="text-lg text-gray-600 mb-6">
                Reason: Your application does not meet our current requirements.
            </p>
            <p class="text-md text-gray-500 mb-6">
                Please review our vendor guidelines and consider submitting a new application.
            </p>
            
            <!-- Actions -->
            <div class="mt-8 flex flex-col gap-4">
                <a href="" class="px-8 py-3 border border-[#8B5E3C] text-[#8B5E3C] rounded-lg hover:bg-gray-50 transition duration-300">
                    Contact Support
                </a>
            </div>
        </div>
    </section>
</main>
@endsection