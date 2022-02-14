<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Product') }}
    </h2>
  </x-slot>  
  <x-inputs.snack/>
  <div class="py-12">
    <div class="lg:px-52 md:px-6 px-4 md:flex items-start">
      @if($single_product->filename!=NULL || $single_product->filename!="")
        @php $img=explode(',',$single_product->filename) @endphp
        @if(count($img)==1)
          <div class="xl:w-96 md:w-80 flex flex-col flex-shrink-0">
            <img src="{{asset($img[0])}}" alt="Image of a shoe" class="w-full" />
          </div>
        @else    
          <div class="xl:w-96 md:w-80 flex flex-col flex-shrink-0">
            @foreach($img as $index=>$photo)
              @if($index==0)
                <img src="{{asset($photo)}}" alt="Image of a shoe" class="w-full" />
              @endif  
            @endforeach  
            <div class="grid grid-cols-2 mt-7 gap-y-4 ">
              @foreach($img as $key=>$image)
                @if($key>0)
                  <img src="{{asset($image)}}" alt="Image of a shoe" class="pr-3 h-60 w-full" />
                @endif  
              @endforeach
            </div>
            {{-- <div class="flex items-center justify-center mt-4">
              <div class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.15533 13.0303C7.86244 13.3232 7.38756 13.3232 7.09467 13.0303L2.59467 8.53033C2.30178 8.23744 2.30178 7.76256 2.59467 7.46967L7.09467 2.96967C7.38756 2.67678 7.86244 2.67678 8.15533 2.96967C8.44822 3.26256 8.44822 3.73744 8.15533 4.03033L4.18566 8L8.15533 11.9697C8.44822 12.2626 8.44822 12.7374 8.15533 13.0303Z" fill="#9CA3AF"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.625 8C13.625 8.41421 13.2892 8.75 12.875 8.75L3.75 8.75C3.33579 8.75 3 8.41421 3 8C3 7.58579 3.33579 7.25 3.75 7.25L12.875 7.25C13.2892 7.25 13.625 7.58579 13.625 8Z" fill="#9CA3AF"/>
                </svg>      
              </div>
              <div class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer ml-4">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.84467 2.96967C8.13756 2.67678 8.61244 2.67678 8.90533 2.96967L13.4053 7.46967C13.6982 7.76256 13.6982 8.23744 13.4053 8.53033L8.90533 13.0303C8.61244 13.3232 8.13756 13.3232 7.84467 13.0303C7.55178 12.7374 7.55178 12.2626 7.84467 11.9697L11.8143 8L7.84467 4.03033C7.55178 3.73744 7.55178 3.26256 7.84467 2.96967Z" fill="#1F2937"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.375 8C2.375 7.58579 2.71079 7.25 3.125 7.25H12.25C12.6642 7.25 13 7.58579 13 8C13 8.41421 12.6642 8.75 12.25 8.75H3.125C2.71079 8.75 2.375 8.41421 2.375 8Z" fill="#1F2937"/>
                </svg>      
              </div>
            </div> --}}
          </div>
        @endif  
      @endif  
      <div class="xl:ml-32 md:ml-6 md:mt-0 mt-10 lg:max-w-lg md:max-w-sm">
        <h1 class="lg:text-2xl md:text-xl text-lg font-medium lg:leading-6 md:leading-5 leading-5 text-gray-800">{{$single_product->name}}</h1>
        <p class="text-sm leading-normal text-gray-600 mt-4">{{$single_product->description}}</p>
        <p class="lg:text-2xl font-medium lg:leading-6 text-lg leading-5 mt-8 text-gray-800">Cost Price: Rs {{$single_product->cost_price}}</p>
        @if($single_product_variation->isNotEmpty())
          <div class="mt-12 lg:flex items-start">
            <p class="text-basse leading-4 text-gray-800">Select Variations</p>
            <div class="lg:ml-10 lg:mt-0 mt-6">
              <div class="grid grid-cols-4 gap-6">
                @foreach($single_product_variation as $pv)
                  <div class="w-20 h-8 cursor-pointer hover:border-gray-600 group border border-gray-300 flex items-center justify-center">
                    <p class="text-sm leading-none text-center text-gray-600 hover:text-gray-800">{{$pv->name}}</p>
                  </div>
                @endforeach  
              </div>
            </div>
          </div>
        @endif  
        <div class="lg:flex items-start justify-left mt-12">
          <div>
            <button class="bg-gray-800 h-10 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-800 text-base leading-none text-white py-3 w-full px-2" wire:click.prevent="addToMyProducts({{$single_product->id}})">Add To My Products</button>
          </div>
        </div>
      </div>  
    </div>
  </div>             
</div>
