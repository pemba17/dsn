<div>
    @if(auth()->user()->role=='seller')
        <x-slot name="header">
            <div class="flex justify-end items-center">
                @livewire('title')
            </div>
        </x-slot>
    @endif    

    <div class="2xl:mx-auto 2xl:container xl:px-20 md:px-12 px-4 py-12">
        <div>
            <p class="text-sm leading-none text-gray-600 dark:text-white">Home / Products / My Products</p>
            <h1 class="text-4xl font-semibold leading-9 text-gray-800 dark:text-white mt-2">My Products</h1>
        </div>
        <x-inputs.snack/>
        @if(count($details)>0)
            
            <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6 gap-8" >
                @foreach($details as $row)
                    <a href="{{ url('view-product/'.$row->id) }}">
                        @if($row->filename!=NULL || $row->filename!="")
                            @php $img=explode(',',$row->filename); @endphp
                            <div>
                                <img src="{{asset($img[0])}}" alt="{{$row->name}}" class="w-full" />
                            </div>
                        @endif
                        <div class="flex items-center justify-between mt-4">
                            <p class="text-sm leading-none text-gray-600 dark:text-white">{{$row->name}}</p>
                            <p class="text-xl font-semibold leading-5 text-gray-800 dark:text-white">Rs {{$row->cost_price}}</p>
                        </div>
                        <div class="flex items-center gap-x-3 mt-6">
                            <button class="grow text-gray-800 dark:bg-transparent dark:border-white dark:text-white hover:text-red-500 dark:hover:text-white w-1/2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700 py-3 border border-gray-800 dark:hover:bg-gray-700 "  wire:click.prevent="removeProduct({{$row->id}})">
                                <p class="text-sm font-medium leading-none dark:hover:bg-gray-700 dark:hover:text-white">Remove</p>
                            </button>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="flex justify-center mt-10"><img src="{{asset('front/images/no-record-found.png')}}" class="h-100 w-80"></div>
            <div class="flex flex-col items-center mt-10 gap-4">
                @if(session()->has('error'))<h4 class="font-bold text-lg text-red-600"> * {{session()->get('error')}}</h4>@enderror
                <h4 class="font-bold text-lg"> No Results Found</h4>
                <p>We're sorry. We cannot find any records for your search term.</p>
            </div>
        @endif
    </div>
</div>

