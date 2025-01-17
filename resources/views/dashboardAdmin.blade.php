@extends('components.layoutAdmin')

@section('title', 'Registration Detail')
@section('header', 'Registration Detail')

@section('content')


    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
      <h2 class="text-xl font-bold text-gray-800 mb-4">Data Table</h2>

      <!-- Table -->
      <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full text-left border-collapse">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 border-b border-gray-700">#</th>
                    <th class="px-6 py-3 border-b border-gray-700">Name</th>
                    <th class="px-6 py-3 border-b border-gray-700">Hotel</th>
                    <th class="px-6 py-3 border-b border-gray-700">Location</th>
                    <th class="px-6 py-3 border-b border-gray-700">Status</th>
                    <th class="px-6 py-3 border-b border-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registration as $index => $r)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 border-b text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 border-b text-gray-700">{{ $r->user->name }}</td>
                        <td class="px-6 py-4 border-b text-gray-700">{{ $r->petHotel->name }}</td>
                        <td class="px-6 py-4 border-b text-gray-700">{{ $r->petHotel->location }}</td>
                        <td class="px-6 py-4 border-b text-gray-700">
                            <span 
                            class="px-3 py-1 rounded-full text-sm 
                            {{ $r->registration_status === 'accepted' ? 'bg-green-100 text-green-600' : 
                            ($r->registration_status === 'rejected' ? 'bg-red-100 text-red-600' : 'bg-yellow-100 text-yellow-600') }}"
                            >
                                {{ ucfirst($r->registration_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 border-b">
                            <a 
                                href="{{ route('admin.registration.detail', ['id' => $r->id]) }}"
                                class="text-blue-600 hover:underline font-semibold">
                                View Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            No registrations found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    

@endsection