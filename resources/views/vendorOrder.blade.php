@extends('components.layoutVendor')

@section('content')
    <!-- Main Content -->
        <!-- Main Dashboard -->
        <main class="flex-1 p-16 overflow-y-auto">
            <!-- Welcome Section -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-black mb-2">Welcome to Coodiddy</h1>
                <p class="text-xl font-normal text-black">Make the most comfortable home for the animals we all love.</p>
            </div>

            <!-- Orders Section -->
            <div class="pt-8 pl-8 pr-8 bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
                <h2 class="text-2xl font-bold text-[#a4724c] mb-6">Order</h2>

                <!-- Order Table -->
                <div class="flex flex-col justify-between items-start w-auto overflow-x-auto">
                    <!-- Order Header -->
                    <div class="flex justify-start items-center pl-6 pr-6 bg-[#a4724c] w-full gap-7 mb-4">
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Name Pet</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Pet Type</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Day Sitting</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Add. Services</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Pick Up/Drop Off</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white">
                            <h1 class="py-3 px-4 text-center text-sm">Status</h1>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-[160px] text-white mr-16 ml-16">
                            <h1 class="py-3 px-4 text-center text-sm">Action</h1>
                        </div>
                    </div>

                    @foreach ($booking as $b)
                        <!-- Card 1 -->
                    <div class=" w-full border-0 shadow-xl mb-9">
                        <div class="flex justify-between items-center w-full gap-7 bg-[#F8F0E3] p-4 pl-11 pr-11">
                            <div class="flex items-center justify-between gap-2 w-full text-black">
                                <div class="flex gap-6 items-center">
                                    <img src="{{ $b->user->images ? Storage::url($b->user->images) : asset('img/kucing-kosan-hendra.jpg')}}" alt="Avatar" class=" w-10 h-10 rounded-full object-cover">
                                    <p class="font-medium">{{$b->user->name}}</p>                                
                                </div>
                                
                                <p class="font-medium">No. {{$b->payments->order_id}}</p>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center pl-6 pr-6 w-full gap-7 pt-4 pb-4">
                            <div class="flex items-center justify-left gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">{{$b->pet->pet_name}}</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">{{$b->pet->pet_type}}</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">{{$b->days_difference}} day</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">
                                    @if (!empty($b->additional_services) && is_string($b->additional_services) && json_decode($b->additional_services, true))
                                        {{ implode(', ', json_decode($b->additional_services, true)) }}
                                    @else
                                        -
                                    @endif
                                </h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-black">
                                <h1 class="py-3 px-4 text-left font-medium">{{$b->delivery}}</h1>
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-yellow-500">
                                @if ($b->status === 'paid')
                                    <h1 class="py-3 px-4 text-left font-medium text-blue-500">Order Received</h1>
                                @elseif ($b->status === 'processed')
                                    <h1 class="py-3 px-4 text-left font-medium text-yellow-500">Processed</h1>
                                @elseif ($b->status === 'completed')
                                    <h1 class="py-3 px-4 text-left font-medium text-green-500">Completed</h1>
                                @elseif ($b->status === 'reviewed')
                                    <h1 class="py-3 px-4 text-left font-medium text-blue-500">Reviewed</h1>
                                @else
                                    <h1 class="py-3 px-4 text-left font-medium text-gray-500">Unknown Status</h1>
                                @endif
                            </div>
                            <div class="flex items-center justify-center gap-2 w-[160px] text-blue-500 mr-16 ml-16">
                                <a href="{{ route('dashboard.vendor.order.detail', ['id' => $b->id]) }}" class="py-3 px-4 text-center font-medium cursor-pointer hover:text-[#a4724c]">See Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    

                

                    <!-- mangga tambah card na -->
                    <!-- for each na ge pang set keun -->

                </div>
            </div>
        </main>
@endsection
