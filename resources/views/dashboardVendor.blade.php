@extends('components.layoutVendor')

@section('content')


        <!-- Main Dashboard -->
        <main class="flex-1 p-16">
            <!-- Welcome Section -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold font-['Poppins'] text-black mb-2">Welcome to Coodiddy</h1>
                <p class="text-xl font-normal font-['Poppins'] text-black">Make the most comfortable home for the animals we all love.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 gap-5 mb-6 h-auto">
                <!-- Vendors Viewed -->
                <div class="px-5 py-6 bg-white rounded-2xl">
                    <h3 class="text-2xl font-normal font-['Poppins'] text-black mb-1">Vendors Viewed</h3>
                    <div class="text-4xl font-normal font-['Poppins'] text-black mb-1">102</div>
                    <div>
                        <span class="text-[#15ff00] text-base font-normal font-['Poppins']">+100</span>
                        <span class="text-black text-base font-normal font-['Poppins']"> from the last 30 days</span>
                    </div>
                </div>
                <!-- In Process -->
                <div class="px-5 py-6 bg-white rounded-2xl">
                    <h3 class="text-2xl font-normal font-['Poppins'] text-black mb-1">In the process</h3>
                    <div class="text-4xl font-normal font-['Poppins'] text-black mb-1">1</div>
                    <div>
                        <span class="text-[#15ff00] text-base font-normal font-['Poppins']">+100</span>
                        <span class="text-black text-base font-normal font-['Poppins']"> from the last 30 days</span>
                    </div>
                </div>
            </div>

            <!-- Revenue Chart -->
            <div class="p-8 bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] h-auto">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <div class="text-[#a6a6a6] text-2xl font-medium font-['Poppins'] mb-2">Total Revenue</div>
                        <div class="text-black text-4xl font-medium font-['Poppins']">Rp 5.000.000</div>
                    </div>
                    <button class="px-4 py-2 bg-[#f8f0e3] rounded-md shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] text-[#a4724c] text-xs font-medium font-['Roboto']">
                        THIS YEAR
                    </button>
                </div>

                <div id="revenue-chart" class="h-96 relative">
                    <!-- Chart will be populated by JavaScript -->
                </div>
            </div>
        </main>
@endsection

@section('script')
    <script>
        // Monthly revenue data
        const monthlyData = [
            { month: 'Jan', revenue: 30, previous: 25 },
            { month: 'Feb', revenue: 45, previous: 35 },
            { month: 'Mar', revenue: 60, previous: 50 },
            { month: 'Apr', revenue: 40, previous: 30 },
            { month: 'May', revenue: 75, previous: 65 },
            { month: 'Jun', revenue: 55, previous: 45 },
            { month: 'Jul', revenue: 45, previous: 35 },
            { month: 'Aug', revenue: 35, previous: 25 },
            { month: 'Sep', revenue: 50, previous: 40 },
            { month: 'Oct', revenue: 30, previous: 20 },
            { month: 'Nov', revenue: 25, previous: 15 },
            { month: 'Dec', revenue: 20, previous: 10 }
        ];

        // Create chart
        const chartContainer = document.getElementById('revenue-chart');
        
        // Create chart HTML
        const chartHTML = `
            <div class="flex items-end justify-between h-80">
                ${monthlyData.map(item => `
                    <div class="flex items-end gap-1">
                        <div class="w-7 bg-[#ededed] rounded-t-xl transition-all duration-300" style="height: ${item.previous * 2}px"></div>
                        <div class="w-7 bg-[#a4724c] rounded-t-xl transition-all duration-300" style="height: ${item.revenue * 2}px"></div>
                    </div>
                `).join('')}
            </div>
            <div class="flex justify-between mt-4">
                ${monthlyData.map(item => `
                    <div class="text-[#a6a6a6] text-xl font-medium font-['Roboto']">${item.month}</div>
                `).join('')}
            </div>
        `;

        chartContainer.innerHTML = chartHTML;
    </script>
@endsection