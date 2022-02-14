<div>
    <x-inputs.snack/>
    <div class="bg-white rounded-lg shadow mt-10 mx-20">
        <div class="border rounded-lg border-gray-100">
            <div class=" p-5 overflow-x-auto">
                <div class="flex w-full">
                    <div class="w-full rounded shadow bg-white dark:bg-gray-800">
                        <h4 class="card-title p-1">#{{$order->id}}</h4>
                        <div class="p-1 flex">
                            <strong>Order Status: </strong>
                            <p class="capitalize">{{$order->order_status}}</p>
                        </div>
                        <div class="p-1">
                            <strong>Customer Name: </strong>
                            {{$order->customer_name}}
                        </div>
                        <div class="p-1">
                            <strong>Contact: </strong>
                            {{$order->customer_contact_no}}
                        </div>
                        <div class="p-1">
                            <strong>Delivery Address: </strong>
                            @if(isset($order->o_city->city_name)) {{$order->o_city->city_name}}@endif
                            @if(isset($order->area)),{{$order->area}}@endif
                        </div>
                        @if($order->o_creator)
                        <div class="p-1">
                            <strong>Order Taken By: </strong>
                            {{$order->o_creator->name}}
                        </div>
                        @endif
                    </div>
                    <div class="w-full ml-3 rounded shadow bg-white dark:bg-gray-800">
                        <h4 class="card-title p-1 font-semibold uppercase">Product</h4>
                        @foreach ( $order_products as $order_product )
                            <div class="flex">
                                <?php $product_images = explode(',',$order_product->filename) ?>
                                <img src="{{asset($product_images[0])}}" width="150" class="p-1" alt="...">
                                <div class=" ml-4">
                                    <h6 class="card-title">{{$order_product->name}}</h6>
                                    <span>Rs. {{$order_product->cost_price}}</span></p>
                                    <span>QTY:</span>
                                    <span>{{$order_product->quantity}}</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                    <div class="grid gap-6 row-gap-10 lg:grid-cols-2">
                        <div class="lg:py-6 lg:pr-16">
                            @php $sn=1;@endphp
                            @foreach($activities as $key => $row)
                                <?php $properties=json_decode($row->properties,true);
                                ?>
                                @if(isset($properties['attributes']['order_status']))
                                    <div class="flex">
                                        <div class="flex flex-col items-center mr-4">
                                        <div>
                                            <div class="flex items-center justify-center w-10 h-10 border rounded-full">
                                            <svg class="w-4 text-gray-600" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <line fill="none" stroke-miterlimit="10" x1="12" y1="2" x2="12" y2="22"></line>
                                                <polyline fill="none" stroke-miterlimit="10" points="19,15 12,22 5,15"></polyline>
                                            </svg>
                                            </div>
                                        </div>
                                        <div class="w-px h-full bg-gray-300"></div>
                                    </div>
                                    <div class="pt-1 pb-8">
                                        <p class="mb-2 text-lg font-bold">Step {{$sn}}</p>
                                        <div class="flex">
                                            <strong> Order Status: </strong>
                                            {{-- @if (isset($properties['old']['order_status']))
                                                <p class="text-gray-700 capitalize"> {{$properties['old']['order_status']}} To &nbsp; </p>
                                            @endif --}}
                                            <p class="text-gray-700 capitalize">  {{$properties['attributes']['order_status']}} </p>
                                        </div>
                                            <div>{{date("M j, Y, g:i a",strtotime($row->activity_created_at))}}</div>
                                        </div>
                                    </div>
                                    @php $sn++; @endphp  
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="text-left" x-data="{open:@entangle('open')}">
                    <h1 class="text-lg font-bold uppercase">Order Comments | <a class="cursor-pointer" x-on:click="open=true">Add New Comments</a></h1>
                    <div class="mt-6">
                        <!-- Dialog (full screen) -->
                        <div class="fixed top-0 left-0 bottom-0 right-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5); display:none" x-show="open" >
                            <!-- A basic modal dialog with title, body and one button to close -->
                            <div class="py-12 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0">
                                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                                    <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                                        <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Order Comments</h1>
                                        <label for="holder-name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Comment</label>
                                        <textarea class="w-full rounded-lg mt-4" rows="10" wire:model.lazy="comment"></textarea>
                                        @error('comment')<div><span class="text-red-500">* {{$message}}</span></div>@enderror
                                        <div class="flex items-center justify-start w-full mt-4">
                                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm cursor-pointer" wire:click="orderComment()">Submit</button>
                                        </div>
                                        <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" aria-label="close modal" role="button" wire:click="hide()">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($order_comments as $oc)
                    <div class="w-full border-solid border-2 border-gray-200 px-4 py-4">
                        <div class="flex justify-between">
                            <p class="font-bold">{{$oc->user->name}}</p>
                            <p>{{date("j M,Y   ",strtotime ($oc->created_at))}}</p>
                        </div>    
                        <p class="mt-3 md:mt-4 xl:mt-5  w-full md:w-3/4 xl:w-full text-base leading-normal text-gray-600 dark:text-gray-200">{{$oc->comment}}</p> 
                    </div>
                @endforeach    
            </div>
        </div>
    </div>
</div>
