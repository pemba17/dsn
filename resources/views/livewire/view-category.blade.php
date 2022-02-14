<div>
    <div class="w-full mt-10">
       <div class="flex justify-center">
            <h1 class="text-2xl font-mono font-bold">Electronics</h1>
       </div>
    </div>
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        @if($categories->product->isNotEmpty()) 
            <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                @foreach($categories->product as $cat)  
                    <div class="overflow-hidden transition-shadow duration-300 bg-white rounded shadow-sm cursor-pointer" onclick="window.location='{{ url('view-product/'.$cat->id) }}'">
                        @if($cat->filename!=NULL || $cat->filename!="")
                            @php $img=explode(',',$cat->filename) @endphp
                            <img src="{{asset($img[0])}}" class="object-cover w-full h-64" alt="" />
                        @endif    
                        <div class="p-5 border border-t-0">
                            <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                                <a class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700" aria-label="Category" title="traveling">{{$categories->name}}</a>
                            </p>
                            <a aria-label="Category" title="Visit the East" class="inline-block mb-3 text-2xl font-bold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">{{$cat->name}}</a>
                            <p class="mb-2 text-gray-700">
                                {{-- Sed ut perspiciatis unde omnis iste natus error sit sed quia consequuntur magni voluptatem doloremque. --}}
                            </p>
                            <p class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800 text-xl">Rs 2000</p>
                        </div>
                    </div>
                @endforeach
            </div>    
        @else
            <div class="flex justify-center mt-10"><img src="{{asset('front/images/no-record-found.png')}}" class="h-100 w-80"></div>
            <div class="flex flex-col items-center mt-10 gap-4">   
                <h4 class="font-bold text-lg"> No Results Found</h4>
                <p>We're sorry. We cannot find any records for your search term.</p>
            </div> 
        @endif        
    </div>
</div>
