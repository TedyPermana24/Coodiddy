@extends('components.layout')

@section('content')
<main class="flex flex-col items-center py-60">
    <section class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);">
        <div class="p-16 flex flex-col items-center justify-center text-center">
            <!-- Success Icon -->
            <div class="mb-8">
                <svg class="w-24 h-24 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            
            <!-- Status Text -->
            <h2 class="text-4xl font-semibold text-green-500 mb-4">
                SUCCESS
            </h2>
            
            <!-- Message -->
            <p class="text-xl mb-3">
                Congratulations! Your registration has been approved.
            </p>
            <p class="text-lg text-gray-600 mb-6">
                Your vendor account has been successfully activated.
            </p>
            <p class="text-md text-gray-500">
                You can now access your vendor dashboard and start managing your services.
            </p>
            
            <!-- Go to Dashboard Button -->
            <div class="mt-12">
                <a href="{{ route('home') }}" class="px-8 py-3 bg-[#8B5E3C] text-white rounded-lg hover:bg-[#6B4423] transition duration-300">
                    Go to Dashboard
                </a>
            </div>
        </div>
    </section>
</main>
@endsection