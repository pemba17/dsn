<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Orders') }}
            </h2>
            @if(auth()->user()->role=='seller')@livewire('title')@endif
        </div>
    </x-slot>
    <div class="bg-white container mx-auto dark:bg-gray-800 shadow rounded mt-5" style="width: 70%">
        <x-inputs.snack/>
        <div class=" border-b border-gray-300 dark:border-gray-700 py-5">
            <div class="flex items-center w-11/12 mx-auto">
                <h1 role="heading"  class="text-lg text-gray-800 dark:text-gray-100 font-bold">Order Details</h1>
            </div>
        </div>
        <form wire:submit.prevent="addToCart">
            <div class="mx-auto">
                <div class="container mx-auto">
                    <div class="my-8 mx-auto">
                        <div class="flex justify-center">
                            <div class="mb-6 flex flex-col items-center">
                                <label for="product_name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Product Name <span class="text-red-600">*</span></label>
                                <select wire:model="product_id" required >
                                    <option value="">Choose The Products..</option>
                                    @foreach ($myproducts as $myproduct)
                                        <option value="{{$myproduct->product_id}}">{{ $myproduct->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')<span class="text-red-400">* {{$message}}</span>@enderror
                            </div>
                        </div> 
                        
                        @if($this->show_variations==true)
                            <div class="flex justify-center">
                                <div class="mb-6 flex flex-col items-center">
                                    <label for="product_name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Product Variations <span class="text-red-600">*</span></label>
                                    <select wire:model="product_variations" required>
                                        <option value="">Choose Product Variations...</option>
                                        @foreach ($product_variations_details as $pv)
                                            <option value="{{$pv->id}}">{{ $pv->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')<span class="text-red-400">* {{$message}}</span>@enderror
                                </div>
                            </div>    
                        @endif
                        <div class="xl:flex lg:flex md:flex flex-wrap" style="justify-content: space-around">
                            <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                                <label for="quantity" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Quantity <span class="text-red-600">*</span></label>
                                <input tabindex="0" aria-label="Enter last name" type="number" id="quantity" name="quantity" required wire:model.defer="quantity"
                                class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="1" />
                                @error('quantity')<span class="text-red-400">* {{$message}}</span>@enderror
                            </div>
                            <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                                <label for="sp" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Selling Price <span class="text-red-600">*</span></label>
                                <input tabindex="0" aria-label="Enter last name" type="number" id="sp" name="sp" required wire:model="sp"
                                class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Selling Price" min="1"/>
                                @error('sp')<span class="text-red-400">* {{$message}}</span>@enderror
                            </div>
                        </div>

                        @if($dsn_price)
                            <div class="text-center mt-2">
                                <p>DSN Price : Rs {{$dsn_price}}</p>
                            </div>
                        @endif    
                    </div>
                </div>
            </div>
            <div class="w-full py-4 sm:px-12 px-4 dark:bg-gray-700 mt-2 flex justify-end rounded-bl rounded-br">
                <button role="button" aria-label="save form" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-8 py-2 text-sm focus:outline-none" type="submit">Add To Cart</button>
            </div>
        </form>
        @if($show_cart==true)    
            <div>
                <div class="w-full bg-white px-4 py-4">
                    <div class="border-2 rounded-lg border-gray-500">
                        <div class="py-4 md:py-6 pl-8">
                            <p tabindex="0" class="focus:outline-none text-base md:text-lg lg:text-xl font-bold leading-tight text-gray-800">Orders</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="bg-gray-400 h-16 w-full text-sm leading-none text-white">
                                        <th tabindex="0" class="focus:outline-none font-normal text-left pl-8">S.N</th>
                                        <th tabindex="0" class="focus:outline-none font-normal text-left px-10 lg:px-6 xl:px-0">Product Name</th>
                                        <th tabindex="0" class="focus:outline-none font-normal text-left px-10 lg:px-6 xl:px-0">Quantity</th>
                                        <th tabindex="0" class="focus:outline-none font-normal text-left px-10 lg:px-6 xl:px-0">Selling Price</th>
                                        <th tabindex="0" class="focus:outline-none font-normal text-left px-10 lg:px-6 xl:px-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                                    @foreach($my_carts as $key=>$row)
                                        <tr class="h-20 text-sm leading-none text-gray-800 border-b border-gray-100">
                                            <td tabindex="0" class="focus:outline-none pl-8">{{++$key}}</td>
                                            <td tabindex="0" class="focus:outline-none font-medium px-10 lg:px-6 xl:px-0">
                                                {{$row->product_id}}
                                            </td>
                                            <td tabindex="0" class="focus:outline-none px-10 lg:px-6 xl:px-0">{{$row->quantity}}</td>
                                            <td tabindex="0" class="focus:outline-none px-10 lg:px-6 xl:px-0">Rs {{$row->selling_price}}</td>
                                            <td class="text-red-500" class="cursor-pointer">
                                                <a wire:click="removeCart({{$row->id}})"> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </a>    
                                            </td>
                                        </tr>
                                    @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full py-4 sm:px-12 px-4 dark:bg-gray-700 mt-2 flex justify-end rounded-bl rounded-br">
                    <button role="button" aria-label="save form" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-8 py-2 text-sm focus:outline-none" wire:click="finalInfo()">Proceed</button>
                </div>
            </div> 
        @endif
            
        @if($final_info==true)
            <form wire:submit.prevent="placeOrder()">
                <div class="xl:flex lg:flex md:flex flex-wrap mt-10 mx-4" style="justify-content: space-between">
                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                        <label for="customer_name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Customer Name <span class="text-red-600">*</span></label>
                        <input tabindex="0" aria-label="Enter street address" type="text" id="customer_name" name="customer_name" required wire:model.defer="customer_name" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Customer Name" />
                        @error('customer_name')<span class="text-red-400">* {{$message}}</span>@enderror
                    </div>

                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                        <label for="customer_contact_no" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Contact Number <span class="text-red-600">*</span></label>
                        <input tabindex="0" aria-label="Enter street address" type="number" id="customer_contact_no" name="customer_contact_no" required wire:model.defer="customer_contact_no" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Contact Number" />
                        @error('customer_contact_no')<span class="text-red-400">* {{$message}}</span>@enderror
                    </div>

                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                        <label for="cod" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">COD</label>
                        <p id="cod" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">{{$cod}}</p>
                        @error('cod')<span class="text-red-400">* {{$message}}</span>@enderror
                    </div>

                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                        <label for="prepaid_amount" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Prepaid Amount</label>
                        <input tabindex="0" aria-label="Enter last name" type="number" id="prepaid_amount" name="prepaid_amount"  wire:model="prepaid_amount"
                        class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Prepaid Amount" min="0" />
                        @error('prepaid_amount')<span class="text-red-400">* {{$message}}</span>@enderror
                    </div>

                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                        <label for="cities" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">City <span class="text-red-600">*</span></label>
                        <select name="cities" id="" wire:model="cities">
                            <option value="">Choose..</option>
                            @foreach($delivery_cities as $city)
                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                        @error('cities')<span class="text-red-400">* {{$message}}</span>@enderror
                    </div> 

                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                        <label for="area" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Area</label>
                        <input tabindex="0" aria-label="Enter Area Name" type="text" id="area" wire:model.defer="area"
                        class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Enter Area Name"  />
                    </div>

                    <div class="xl:w-100 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                        <label for="delivery_instructions" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Delivery Instructions</label>
                        <textarea tabindex="0" aria-label="Enter last name" type="text" id="delivery_instructions" name="delivery_instructions" wire:model.defer="delivery_instructions"
                        class="w-100 border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Delivery Instruction"></textarea>
                    </div>
                </div>

                <div class="text-center">
                    @if($this->cost_price)<p class="font-weight-bold">Cost Price : Rs {{$this->cost_price}}</p>@endif
                    @if($this->selling_price)<p>Selling Price: Rs {{$this->selling_price}}</p>@endif
                    @if($this->delivery_charge)<p>Delivery Charge: Rs {{$this->delivery_charge}}</p>@endif
                    @if($this->net_profit)<p class="font-bold">Net Profit: Rs {{$this->net_profit}}</p>@endif
                </div>
                
                <div class="w-full py-4 px-4 dark:bg-gray-700 mt-2 flex justify-start rounded-bl rounded-br">
                    <button role="button" aria-label="save form" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-8 py-2 text-sm focus:outline-none" type="submit">Save</button>
                </div> 
            </form> 
        @endif       
    </div>
</div>
