<div class="sm:px-6 w-full" x-data="{open:@entangle('open'),account_number:@entangle('account_number'), account_name:@entangle('account_name'),bank:@entangle('bank'),amount:@entangle('amount')}">
    @if(auth()->user()->role=='seller')
        <x-slot name="header">
            <div class="flex justify-end items-center">
                @livewire('title')
            </div>
        </x-slot>
    @endif    
    <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="lg:flex items-center justify-between">
            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Balances</p>
            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-lg lg:text-lg font-bold leading-normal text-gray-800">Confirmed Balance : Rs {{$total_confirmed_balance}} </p>
            @if($total_confirmed_balance>0)
                <a class="p-4 bg-indigo-600 text-white cursor-pointer rounded-lg" x-on:click="open=true"><div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                    <p>Cash Out</p></div>
                </a>
            @endif    
        </div>
    </div>

    <x-inputs.snack/>

    <div class="bg-white px-4 md:px-8 xl:px-10 overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <thead>
                <tr tabindex="0" class="focus:outline-none h-20 w-full text-sm leading-none text-gray-600">
                    <th class="font-normal text-left pl-4">#</th>
                    <th class="font-normal text-left pl-11">Product Name</th>
                    <th class="font-normal text-left pl-10">COD</th>
                    <th class="font-normal text-left">Prepaid</th>
                    <th class="font-normal text-left">Delivery Cost</th>
                    <th class="font-normal text-left">Cost Price</th>
                    <th class="font-normal text-left">Status</th>
                    <th class="font-normal text-left">Created At</th>
                    <th class="font-normal text-left">Net Balance</th>
                    <th class="font-normal text-left"> Payment Status</th>
                </tr>
            </thead>
            <tbody class="w-full">
                @forelse($balances as $key=>$row)
                    <tr tabindex="0" class="focus:outline-none  h-20 text-sm leading-none text-gray-700 border-b border-t border-gray-200 bg-white hover:bg-gray-100">
                        <td class="pl-4">{{++$key}}</td>
                        <td class="pl-11">
                            <div class="flex items-center">
                                {{$row->product_name}}
                            </div>
                        </td>
                        <td>
                            <p class="mr-16 pl-10">Rs {{$row->cod}}</p>
                        </td>
                        <td>
                            <p class="mr-16">Rs {{$row->prepaid_amount}}</p>
                        </td>
                        <td>
                            <p class="mr-16">Rs {{$row->delivery_charge}}</p>
                        </td>
                        <td>
                            <p class="mr-16">Rs {{$row->cost_price}}</p>
                        </td>
                        
                        <td>
                            <p class="mr-16">{{$row->order_status}}</p>
                        </td>

                        <td>
                            <p class="mr-16">{{$row->created_at->toDateString()}}</p>
                        </td>
                        <td>
                            <p class="mr-16">@if($row->order_status=='delivered' && $row->payment_status=='paid') Completed @elseif($row->order_status=='delivered' && $row->payment_status==NULL) Confirmed @else Pending @endif : Rs {{$row->balance}} </p>

                            @if($row->order_status=='returned')<br><p>Delivery Charge: -{{$row->delivery_charge}}</p>@endif
                        </td>
                        <td>
                            <p class="mr-16">@if($row->payment_status==NULL || $row->payment_status=='') Unpaid @else Paid @endif</p>
                        </td>
                    </tr>
                @empty  
                    <tr tabindex="0" class="focus:outline-none  h-20 text-sm leading-none text-gray-700 border-b border-t border-gray-200 bg-white"><td colspan="7" class="text-red-500">* No Records Found</td></tr>
                @endforelse
                
                <div class="mt-6">
                    <!-- Dialog (full screen) -->
                    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5); display: none" x-show="open">
                        <!-- A basic modal dialog with title, body and one button to close -->
                        <div class="py-12 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0">
                            <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                                <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                                    <div class="w-full flex justify-start text-gray-600 mb-3">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                            <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                        </svg>
                                    </div>
                                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Enter Account Details</h1>
                                    <label for="holder-name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Account Holder Name</label>
                                    <input id="holder-name" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" wire:model.lazy="account_name" type="text"/>
                                    @error('account_name')<div><span class="text-red-500">* {{$message}}</span></div>@enderror
                                    <label for="acc-number" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Account Number</label>
                                    <div class="relative mb-5 mt-2">
                                        <input id="acc-number" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" wire:model.lazy="account_number" type="number"/>
                                        @error('account_number')<div><span class="text-red-500">* {{$message}}</span></div>@enderror
                                    </div>
                                    <label for="bank" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Bank</label>
                                    <div class="relative mb-5 mt-2">
                                        <select id="amount" class="w-full" wire:model.lazy="bank">
                                            <option value="">Select Bank</option>
                                            @foreach($banks as $bk)
                                                <option value="{{$bk->id}}">{{$bk->name}}</option>
                                            @endforeach    
                                        </select>

                                        @error('bank')<div><span class="text-red-500">* {{$message}}</span></div>@enderror
                                    </div>
                                    <label for="amount" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Amount</label>
                                    <div class="relative mb-5 mt-2">
                                        <p id="amount" class="mb-8 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" x-text="amount"></p>
                                    </div>
                                    <div class="flex items-center justify-start w-full">
                                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm cursor-pointer" wire:click="save()">Submit</button>
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
            </tbody>
        </table>
    </div>
</div>
      
      
    