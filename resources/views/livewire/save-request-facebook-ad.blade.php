<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Request Facebook Ad') }}
            </h2>
            @if(auth()->user()->role=='seller')@livewire('title')@endif
        </div>
    </x-slot>
    <x-inputs.snack/>
    <div class="p-6 bg-gray-100 flex items-center justify-center">
        <div class="container mx-auto">
            <div>
                <form class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6" wire:submit.prevent="save()">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                        <p class="font-medium text-lg">Page Details</p>
                        <p>Please fill out all the fields.</p>
                        </div>
                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-4">
                                <label for="page_link">Page Link</label>
                                <input type="text" id="page_link" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" wire:model.lazy="page_link" />
                                @error('page_link')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                                </div>
                
                                <div class="md:col-span-4">
                                <label for="post_link">Post Link to Start Campaign</label>
                                <input type="text" id="post_link" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" wire:model.lazy="post_link" />
                                @error('post_link')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                                </div>
                
                                <div class="md:col-span-2">
                                <label for="dollar">Dollar Spending per day</label>
                                <input type="number" id="dollar" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" wire:model.lazy="dollar"/>
                                @error('dollar')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3 mt-10">
                        <div class="text-gray-600">
                        <p class="font-medium text-lg">Other Information</p>
                        <p>Please fill out all the fields.</p>
                        </div>
                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-4">
                                <label for="target">Target Audience Location: </label>
                                <input type="text" id="target" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" wire:model.lazy="target_audience" />
                                @error('target_audience')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                                </div>
                
                                <div class="md:col-span-4">
                                    <label for="email">Age Group</label>
                                    <div class="flex gap-4 mt-4">
                                        <div>
                                            <select wire:model="from_age">
                                                @foreach($age as $a)
                                                    <option value="{{$a}}">{{$a}}</option>
                                                @endforeach    
                                            </select>
                                        </div>
                                        <div>
                                            <select wire:model="to_age">
                                                @foreach($age as $ag)
                                                    <option value="{{$ag}}">{{$ag}}</option>
                                                @endforeach  
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:col-span-3">
                                    <label>Gender</label>
                                    <div class="flex gap-4">
                                        <label class="inline-flex items-center mt-3">
                                            <input type="radio" class="form-radio h-5 w-5 text-green-600" wire:model="gender" value="All"><span class="ml-2 text-gray-700">All</span>
                                        </label>
                                        
                                        <label class="inline-flex items-center mt-3">
                                            <input type="radio" class="form-radio h-5 w-5 text-indigo-600" wire:model="gender" value="Men"><span class="ml-2 text-gray-700">Men</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="radio" class="form-radio h-5 w-5 text-pink-600" wire:model="gender" value="Women"><span class="ml-2 text-gray-700">Women</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>