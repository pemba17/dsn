
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @if(auth()->user()->role=='seller')@livewire('title')@endif
    </div>
</x-slot>

<div>
    <div class="m-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <div class="text-sm text-gray-500">New Orders</div>
                    <div class="font-bold text-lg">{{$new_confirmed_orders}}</div>
                </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <div class="text-sm text-gray-500">Total Delivered Orders</div>
                    <div class="font-bold text-lg">{{$total_delivered_orders}}</div>
                </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <div class="text-sm text-gray-500">Returned Order</div>
                    <div class="font-bold text-lg">{{$total_returned_orders}}</div>
                </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <div class="text-sm text-gray-500">Total Confirmed Order Week</div>
                    <div class="font-bold text-lg">{{$total_confirmed_order_this_week}}</div>
                </div>
                </div>
            </div>
            </div>
    </div>
    <div class="m-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-amber-200 text-amber-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <div class="text-sm text-gray-500">All Orders</div>
                    <div class="font-bold text-lg">{{$total_orders}}</div>
                </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-pink-200 text-pink-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <div class="text-sm text-gray-500">Total Products</div>
                    <div class="font-bold text-lg">{{$my_products}}</div>
                </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-indigo-200 text-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <div class="text-sm text-gray-500">Confirmed To Delivered Order</div>
                    <div class="font-bold text-lg">{{$c2d}}%</div>
                </div>
                </div>
            </div>

            @if(auth()->user()->role=="seller")
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-indigo-200 text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Total Sales</div>
                        <div class="font-bold text-lg">Rs {{$total_sales}}</div>
                    </div>
                    </div>
                </div>
            @endif    
        </div>
    </div>
    <div class="grid grid-cols-2 mt-20">
        <div id="dailyOrdersPie" class="grid grid-cols-1">
            <canvas></canvas>
            <script>
                chart = new Chart($('#dailyOrdersPie').find('canvas'), {
                    type:'pie',
                    data:{
                        labels: [
                            'Confirmed',
                            'Dispatched',
                            'Delivered',
                            'Returned',
                            'Cancelled'
                        ],
                        datasets: [{
                            label: 'Daily Orders',
                            data: [<?=$daily_orders?>],
                            backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(154,205,50)',
                            'rgb(255,99,71)',
                            'rgb(127,255,212)'
                            ],
                            hoverOffset: 4
                        }],
                    },
                    options: {
                        responsive: true,
                    }   
                });
            </script>
        </div>

        <div id="dailyDeliveryCity" class="grid grid-cols-1">
            <canvas></canvas>
            <script>
                chart = new Chart($('#dailyDeliveryCity').find('canvas'), {
                    type:'line',
                    data:{
                        labels:[<?=$cities?>],
                        datasets: [{
                            label: 'Today Delivered By City',
                            data: [<?=$daily_delivery_city_count;?>],
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                    }   
                });
            </script>
        </div>
    </div>

    <div id="dailyDeliveredProducts" class="mt-20" style="width: 50%">
        <canvas></canvas>
        <script>
            chart = new Chart($('#dailyDeliveredProducts').find('canvas'), {
                type:'bar',
                data:{
                    labels:[<?=$products?>],
                    datasets: [{
                        label: 'Daily Delivered Products',
                        data: [<?=$daily_delivered_products_count;?>],
                        backgroundColor: [
                            <?=$colors;?>
                        ],
                        borderColor: [
                            <?=$colors;?>
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                }   
            });
        </script>
    </div>    
</div>


