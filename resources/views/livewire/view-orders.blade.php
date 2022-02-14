<div>
    <x-inputs.snack/>
    <div class="bg-white rounded-lg shadow mt-10 mx-20">
        <div class="border rounded-lg border-gray-100">
            <div class=" p-5 overflow-x-auto">
                <div class="sm:px-6 w-full">
                    <div class="px-4 md:px-10 py-4 md:py-7">
                        <div class="text-left flex justify-between">
                            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading">My Order</p>
                        </div>
                    </div>
                    <div class="px-4 md:px-10 w-full flex justify-end">
                        <a class="px-4 py-3 bg-green-600 text-white rounded-lg" href="{{route('save-order')}}">Add Order
                        </a>
                    </div>
                    <form wire:submit.prevent="filterData()" class="mt-2">
                       <div class="grid grid-cols-6 gap-4">
                            <div class="grid grid-cols-1">
                                <small>Search</small>
                                <input wire:model.defer='search_name' type="text" placeholder="Search">
                            </div>

                            <div class="grid grid-cols-1">
                                <small>Products</small>  
                                <select wire:model.defer='search_product_id'>
                                    <option value="">Choose...</option>
                                    @foreach ($myproducts as $products)
                                        <option value="{{ $products->product_id }}">{{$products->name}}</option>
                                    @endforeach
                                </select>
                            </div>    
                            
                            <div class="grid grid-cols-1">
                                <small>Start Date</small>     
                                <input type="date" wire:model.defer="start_date">
                            </div>    
                        
                            <div class="grid grid-cols-1"> 
                                <small>End Date</small> 
                                <input type="date" wire:model.defer="end_date">
                            </div>
                            
                            <div class="grid grid-cols-1"> 
                                <small>Location</small> 
                                <select wire:model.defer='location'>
                                    <option value="">Choose...</option>
                                    @foreach ($delivery_cities as $dc)
                                        <option value="{{ $dc->id }}">{{$dc->city_name}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            
                            <div class="grid grid-cols-1 mt-4">
                                <button class="bg-white transition duration-150 ease-in-out hover:bg-gray-100 hover:text-indigo-600 rounded border border-indigo-700 text-indigo-700 px-6 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-indigo-700">Filter</button>
                            </div>   
                       </div>
                    </form>
                    <div class="bg-white px-4 md:px-8 xl:px-10 overflow-x-auto" x-data="{selectedOrder:@entangle('selectedOrder'),selectAll:@entangle('selectAll')}">
                        <div class="mx-auto pt-5 container flex w-full">
                            <ul class="w-full hidden md:flex space-x-4 mb-2">
                                {{-- <li class="focus:outline-none @if ($this->selected_order_status==='confirmed') text-white @endif focus:ring-2 focus:ring-offset-2   focus:ring-indigo-700 ml-1 py-2 px-5 bg-green-400    cursor-pointer  bg-transparent  ease-in duration-150 rounded text-xs xl:text-sm leading-none" wire:click.prevent='changeSeletedStatus("confirmed")'>Confirmed</li>
                                <li class="focus:outline-none @if ($this->selected_order_status==='dispatched') text-white @endif focus:ring-2 focus:ring-offset-2   focus:ring-indigo-700 py-2 px-5 bg-blue-500  cursor-pointer  bg-transparent  ease-in duration-150 rounded text-xs xl:text-sm leading-none" wire:click.prevent='changeSeletedStatus("dispatched")'>Dispatched</li>
                                <li class="focus:outline-none @if ($this->selected_order_status==='delivered') text-white @endif focus:ring-2 focus:ring-offset-2   focus:ring-indigo-700 py-2 px-5 bg-green-400  cursor-pointer  bg-transparent  ease-in duration-150 rounded text-xs xl:text-sm leading-none" wire:click.prevent='changeSeletedStatus("delivered")'>Delivered</li>
                                <li class="focus:outline-none @if ($this->selected_order_status==='returned') text-white @endif focus:ring-2 focus:ring-offset-2   focus:ring-indigo-700 py-2 px-5  bg-orange-500 cursor-pointer  bg-transparent  ease-in duration-150 rounded text-xs xl:text-sm leading-none" wire:click.prevent='changeSeletedStatus("returned")'>Returned</li>
                                <li class="focus:outline-none @if ($this->selected_order_status==='cancelled') text-white @endif focus:ring-2 focus:ring-offset-2   focus:ring-indigo-700 py-2 px-5 bg-red-400 cursor-pointer  bg-transparent  ease-in duration-150 rounded text-xs xl:text-sm leading-none" wire:click.prevent='changeSeletedStatus("cancelled")'>Cancelled</li> --}}

                                <li class="font-bold cursor-pointer @if ($this->selected_order_status==='confirmed') bg-green-500 text-white px-4 @endif" wire:click.prevent="changeSeletedStatus('confirmed')">Confirmed</li>
                                <li class="font-bold cursor-pointer @if ($this->selected_order_status==='dispatched') bg-green-500 text-white px-4 @endif" wire:click.prevent="changeSeletedStatus('dispatched')">Dispatched</li>
                                <li class="font-bold cursor-pointer @if ($this->selected_order_status==='delivered') bg-green-500 text-white px-4 @endif" wire:click.prevent="changeSeletedStatus('delivered')">Delivered</li>
                                <li class="font-bold cursor-pointer @if ($this->selected_order_status==='returned') bg-green-500 text-white px-4 @endif" wire:click.prevent="changeSeletedStatus('returned')">Returned</li>
                                <li class="font-bold cursor-pointer @if ($this->selected_order_status==='cancelled') bg-green-500 text-white px-4 @endif" wire:click.prevent="changeSeletedStatus('cancelled')">Cancelled</li>
                            </ul>

                            @if(auth()->user()->role=='superadmin')
                                <div>
                                    <button wire:click.prevent="exportOrders()" x-on:click="selectedOrder=[], selectAll=[]" class="border-2 border-transparent bg-indigo-500 ml-3 py-2 px-4 font-bold uppercase text-white rounded transition-all hover:border-indigo-500 hover:bg-transparent hover:text-indigo-500">Export</button>
                                </div>
                            @endif    
                        </div>
                        <table class="w-full">
                            <thead>
                                <tr class="focus:outline-none h-20 w-full text-center text-sm leading-none text-gray-600">
                                    @if (count($orders)>0 && auth()->user()->role=="superadmin")
                                        <th class="font-normal">
                                            <input type="checkbox" wire:model="selectAll" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white" />
                                        #</th>
                                     @endif
                                    <th class="font-bold text-black">S.N</th>
                                    <th class="font-bold text-black">Order ID</th>
                                    <th class="font-bold text-black"> Date</th>
                                    <th class="font-bold text-black"> Product Name</th>
                                    <th class="font-bold text-black"> Customer Name</th>
                                    <th class="font-bold text-black"> Contact Number</th>
                                    <th class="font-bold text-black"> Quantity</th>
                                    <th class="font-bold text-black"> COD</th>
                                    <th class="font-bold text-black"> Prepaid Amount</th>
                                    <th class="font-bold text-black"> Cities</th>
                                    <th class="font-bold text-black"> Status</th>
                                    <th class="font-bold text-black">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="w-full">
                                @if (count($orders)>0)
                                    @forelse ($orders as $key => $order)
                                        @if ($this->selected_order_status===$order->order_status)
                                            <tr class="focus:outline-none  h-20 text-center text-sm leading-none text-gray-700 border-b border-t border-gray-200 bg-white hover:bg-gray-100">
                                                @if(auth()->user()->role=="superadmin")
                                                    <td>
                                                        <input type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white" wire:model="selectedOrder"  value="{{$order->o_id}}" />
                                                    </td>
                                                @endif   
                                                
                                                <td>
                                                    {{++$key}}
                                                </td>

                                                <td>
                                                    {{$order->o_id}}
                                                </td>
                                                <td>
                                                    {{ date("M j, Y",strtotime($order->o_date)) }}
                                                </td>
                                                <td>
                                                    {{$order->product->name}}
                                                </td>
                                                <td>
                                                    {{$order->customer_name}}
                                                </td>
                                                <td>
                                                    {{$order->customer_contact_no}}
                                                </td>
                                                <td>
                                                    {{$order->quantity}}
                                                </td>
                                                <td>
                                                    {{$order->cod}}
                                                </td>
                                                <td>
                                                    {{$order->prepaid_amount}}
                                                </td>
                                                <td>
                                                    {{$order->o_city->city_name}}
                                                </td>
                                                <td class="flex items-center justify-center py-7">
                                                    <div class="w-20 h-6 flex items-center justify-center bg-blue-50 rounded-full">
                                                        <p class="text-xs capitalize leading-3 text-blue-700">{{$order->order_status}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex item-center justify-center">
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a href="{{ url('view-order-details/'.$order->o_id) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </a>    
                                                        </div>
                                                    </div>  
                                                </td>
                                            </tr>
                                        @endif
                                        @empty
                                        <tr>
                                            <td class="mt-5">No Data Found.</td>
                                        </tr>
                                    @endforelse
                                @else
                                <tr>
                                    <td colspan="10" class="text-center text-xl">
                                    <strong class="text-red-500">* No Data Found </strong>
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    @if (auth()->user()->role == "superadmin")
                        <div class="bg-white px-4 py-4 md:px-8 xl:px-10 overflow-x-auto flex" >
                            @if($this->selected_order_status=="confirmed")
                                <select aria-label="select" class="focus:text-indigo-600 capitalize text-sm leading-4 text-gray-500 border-0 focus:outline-none" wire:model.lazy="assigned_delivery">
                                    <option value="">Delivery Agencies</option>
                                    <option value="ncm">NCM</option>
                                    <option value="fast">Fast Movers</option>
                                    <option value="daraz">Daraz</option>
                                </select>
                            @endif    
                            @if ($this->selected_order_status=="confirmed" || $this->selected_order_status=="returned")
                                <button wire:click="updateOrderStatus('dispatched')" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex ml-1.5 px-8 py-3 bg-blue-700 hover:bg-indigo-600 focus:outline-none rounded" type="submit">
                                    <p class="text-sm font-medium leading-none text-white">Dispatch</p>
                                </button>
                            @endif
                            @if ($this->selected_order_status=="dispatched" || $this->selected_order_status=="cancelled" || $this->selected_order_status=="returned")
                                <button wire:click="updateOrderStatus('delivered')" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex ml-1.5 px-8 py-3 bg-green-700 hover:bg-green-600 focus:outline-none rounded" type="submit">
                                    <p class="text-sm font-medium leading-none text-white">Deliver</p>
                                </button>
                            @endif
                            @if ($this->selected_order_status=="delivered" || $this->selected_order_status=="dispatched")
                                <button wire:click="updateOrderStatus('returned')" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex ml-1.5 px-8 py-3 bg-yellow-700 hover:bg-yellow-600 focus:outline-none rounded" type="submit">
                                    <p class="text-sm font-medium leading-none text-white">Return</p>
                                </button>
                            @endif
                            @if($this->selected_order_status=="dispatched" || $this->selected_order_status=="confirmed")
                                <button  wire:click="updateOrderStatus('cancelled')" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex ml-1.5 items-start justify-start px-8 py-3 bg-red-700 hover:bg-red-600 focus:outline-none rounded" wire:click="updateOrderStatus('cancel')">
                                    <p class="text-sm font-medium leading-none text-white">Cancel</p>
                                </button>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
