<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Lists') }}
            </h2>
            @if(auth()->user()->role=='seller')@livewire('title')@endif
        </div> 
    </x-slot>
    <div wire:loading wire:target="addToMyProducts()"><x-inputs.loading/></div>
    <x-inputs.snack/>
    <div class="py-12" x-data="{openFilter:@entangle('openFilter')}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="2xl:container 2xl:mx-auto">
                <div class="py-6 lg:px-20 md:px-6 px-4">
                    <p class="font-normal text-sm leading-3 text-gray-600 dark:text-gray-300">Home / Products</p>
                    <hr class="w-full bg-gray-200 my-6" />
                    @if(count($categories)>0)
                        <div class="flex justify-end items-center">
                            <div class="flex space-x-3 justify-center items-center text-gray-800 dark:text-white cursor-pointer" x-on:click="openFilter=true">
                                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-5-svg1.svg" alt="toggler">
                                <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-5-svg1dark.svg" alt="toggler">
                                <p class="font-normal text-base leading-4 text-gray-800 dark:text-white">Filter</p>
                            </div>
                        </div>
                        @foreach($categories as $category)
                            @if(count($category->product->when($prices,function($q,$prices){
                                return $q->whereBetween('cost_price',[$prices[0],$prices[1]]);
                            })->take(8))>0)
                                <div class="text-center w-full  flex justify-center items-center flex-col mt-10">
                                    <h1 class="text-xl md:text-2xl lg:text-4xl font-semibold leading-5 dark:text-white md:leading-6 lg:leading-9 text-gray-800 font-mono">{{$category->name}}</h1>
                                </div>
                            @endif    
                            <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-y-12 lg:gap-x-8 sm:gap-y-10 sm:gap-x-6 gap-y-6 lg:mt-12 mt-10">
                                @foreach($category->product->when($prices,function($q,$prices){
                                    return $q->whereBetween('cost_price',[$prices[0],$prices[1]]);
                                })->take(8) as $product)
                                    <div class="relative">
                                        <div class="relative group">
                                            <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                            @if($product->filename!=NULL || $product->filename!="")
                                                @php $img=explode(',',$product->filename); @endphp
                                                <img class="w-full" src="{{asset($img[0])}}" alt="{{$product->name}}" />
                                            @endif
                                            <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                                <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full" wire:click.prevent="addToMyProducts({{$product->id}})">Add To Products</button>
                                                <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white" onclick="window.location='{{ url('view-product/'.$product->id) }}'">Quick View</button>
                                            </div>
                                        </div> 
                                        <p class="text-gray-800 mt-4 font-normal">{{substr($product->name,0,40)}}..</p>
                                        <p class="text-center bg-black text-white p-2 @if(strlen($product->name)<25) mt-8 @else mt-2 @endif">DSN Price: {{$product->cost_price}}</p>
                                    </div>
                                @endforeach
                                <div x-data="{
                                    observe(){
                                        const observer= new IntersectionObserver((products)=>{
                                            products.forEach(product=>{
                                                if(product.isIntersecting){
                                                    @this.loadMore() 
                                                }
                                            })
                                        })
                                        observer.observe(this.$el)
                                    }
                                }" x-init="observe"></div>
                            </div>

                            @if(count($category->product->when($prices,function($q,$prices){
                                return $q->whereBetween('cost_price',[$prices[0],$prices[1]]);
                            })->take(8))>0)
                                <div class="flex justify-center items-center">
                                    <a class="hover:bg-orange-800 dark:text-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 bg-orange-600 py-5 md:px-16 md:w-auto w-full lg:mt-14 md:mt-14 my-10 text-white font-medium text-base leading-4 rounded-lg" href="{{url('category/'.$category->slug)}}">View More In {{$category->name
                                    }}</a>
                                </div>
                            @endif    
                            
                        @endforeach    
                        @else
                        <div class="flex justify-center mt-10"><img src="{{asset('front/images/no-record-found.png')}}" class="h-100 w-80"></div>
                        <div class="flex flex-col items-center mt-10 gap-4">   
                            <h4 class="font-bold text-lg"> No Results Found</h4>
                            <p>We're sorry. We cannot find any records for your search term.</p>
                        </div> 
                    @endif    
                </div>
            </div>
        </div>
        <div class="parentHome" x-show="openFilter" style="display: none">
            <div class="hide">
                <div class="overlay"></div>
                <form class="sidemenu" wire:submit.prevent="filter()">
                    <h1 class="text-xl font-mono p-4">Filters</h1>
                    {{-- <div class="p-4 text-lg">Size</div>
                    <div class="flex items-center p-4 gap-4">
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4 rounded-lg" id="">
                            <label for="">Red</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4 rounded-lg" id="">
                            <label for="">Blue</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4 rounded-lg" id="">
                            <label for="">Green</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4 rounded-lg" id="">
                            <label for="">Black</label>
                        </div>
                    </div> --}}
                    {{-- <div class="p-4 text-lg">Size</div>
                    <div class="flex items-center p-4 gap-8">
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">SM</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">L</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">XL</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">2XL</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">3XL</label>
                        </div>
                    </div> --}}

                    {{-- <div class="p-4 text-lg">Brands</div>
                    <div class="p-4 space-y-4 items-center">
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">Samsung</label>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">One Plus</label>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">Apple</label>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">Xioami</label>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" class="h-4 w-4" id="">
                            <label for="">Real Me</label>
                        </div>
                    </div> --}}

                    <div class="p-4 text-lg">Price</div>
                    <div class="p-4 flex space-x-4">
                        <input type="number" placeholder="From" class="w-1/2" wire:model.defer="min_price">
                        <input type="number" placeholder="To" class="w-1/2" wire:model.defer="max_price">
                    </div>

                    <div class="closeIcon p-4" x-on:click="openFilter=false">    
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="p-4"><button class="px-10 py-2 bg-gray-900 text-white">Filter</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
