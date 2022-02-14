<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        
    <div class="lg:px-52 md:px-6 px-4 md:flex items-start">
        <div class="xl:w-96 md:w-80 flex flex-col flex-shrink-0">
          <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/shoe-main.png" alt="Image of a shoe" class="w-full" />
          <div class="flex items-center md:justify-between justify-center mt-7">
            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/front.png" alt="Image of a shoe" class="sm:w-1/2 w-40 pr-3" />
            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/back.png" alt="Image of a shoe" class="sm:w-1/2 w-40 pl-3" />
          </div>
          <div class="flex items-center justify-center mt-4">
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
        </div>
        </div>
        <div class="xl:ml-32 md:ml-6 md:mt-0 mt-10 lg:max-w-lg md:max-w-sm">
          <h1 class="lg:text-2xl md:text-xl text-lg font-medium lg:leading-6 md:leading-5 leading-5 text-gray-800">Bone Runner</h1>
          <p class="text-sm leading-normal text-gray-600 mt-4">Starting suspicious evaluated should, systems a there would half way. The and the right seemed line have in room. He a be was. To because two hand, palace lieutenant general antiquity pervasively.</p>
          <p class="lg:text-2xl font-medium lg:leading-6 text-lg leading-5 mt-8 text-gray-800">Rs 127</p>
          <div class="mt-12 lg:flex items-start">
            <p class="text-base leading-4 text-gray-800">Select Color</p>
            <div class="lg:ml-10 lg:mt-0 mt-6">
              <div class="flex items-center space-x-3">
                <div class="w-20 h-8">
                  <div class="flex items-center justify-center flex-1 h-full px-5 py-2 border border-gray-600">
                    <p class="text-sm leading-none text-gray-800">Brown</p>
                  </div>
                </div>
                <div class="w-20 h-8 cursor-pointer hover:border-gray-600 group border border-gray-300 flex items-center justify-center">
                  <p class="text-sm leading-none text-center text-gray-600 hover:text-gray-800">Black</p>
                </div>
                <div class="w-20 h-8 cursor-pointer hover:border-gray-600 group border border-gray-300 flex items-center justify-center">
                  <p class="text-sm leading-none text-center text-gray-600 hover:text-gray-800">Blue</p>
                </div>
                <div class="w-20 h-8 cursor-pointer hover:border-gray-600 group border border-gray-300 flex items-center justify-center">
                  <p class="text-sm leading-none text-center text-gray-600 hover:text-gray-800">Orange</p>
                </div>
              </div>
              <div class="flex items-center space-x-3 mt-4">
                <div class="w-20 h-8 cursor-pointer hover:border-gray-600 group border border-gray-300 flex items-center justify-center">
                  <p class="text-sm leading-none text-center text-gray-600 hover:text-gray-800">Red</p>
                </div>
                <div class="w-20 h-8 cursor-pointer hover:border-gray-600 group border border-gray-300 flex items-center justify-center">
                  <p class="text-sm leading-none text-center text-gray-600 hover:text-gray-800">White</p>
                </div>
                <div class="w-20 h-8 cursor-pointer hover:border-gray-600 group border border-gray-300 flex items-center justify-center">
                  <p class="text-sm leading-none text-center text-gray-600 hover:text-gray-800">Yellow</p>
                </div>
                <div class="w-20 h-8 cursor-pointer hover:border-gray-600 group border border-gray-300 flex items-center justify-center">
                  <p class="text-sm leading-none text-center text-gray-600 hover:text-gray-800">Grey</p>
                </div>
              </div>
            </div>
          </div>
          <div class="lg:flex items-start justify-between mt-12">
            <div class="lg:w-1/2 relative">
              <div onclick="selectNew()" class="h-10 px-4 border border-gray-600 text-white flex justify-between items-center w-full cursor-pointer">
                <p id="textClicked" class="text-base leading-none text-gray-600">Select Size</p>
  
                <svg id="ArrowSVG" class="transform" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.96967 5.21967C3.26256 4.92678 3.73744 4.92678 4.03033 5.21967L8 9.18934L11.9697 5.21967C12.2626 4.92678 12.7374 4.92678 13.0303 5.21967C13.3232 5.51256 13.3232 5.98744 13.0303 6.28033L8.53033 10.7803C8.23744 11.0732 7.76256 11.0732 7.46967 10.7803L2.96967 6.28033C2.67678 5.98744 2.67678 5.51256 2.96967 5.21967Z" fill="#4B5563" />
                </svg>
              </div>
              <ul id="list" class="hidden font-normal text-base leading-4 absolute w-full">
                <li onclick="selectedSmall()" class="py-3 px-4 text-gray-600 bg-white border border-gray-300 focus:outline-none hover:bg-gray-800 hover:text-white duration-100 cursor-pointer">12</li>
                <li onclick="selectedSmall()" class="py-3 px-4 text-gray-600 bg-white border border-gray-300 focus:outline-none hover:bg-gray-800 hover:text-white duration-100 cursor-pointer">13</li>
                <li onclick="selectedSmall()" class="py-3 px-4 text-gray-600 bg-white border border-gray-300 focus:outline-none hover:bg-gray-800 hover:text-white duration-100 cursor-pointer">14</li>
                <li onclick="selectedSmall()" class="py-3 px-4 text-gray-600 bg-white border border-gray-300 focus:outline-none hover:bg-gray-800 hover:text-white duration-100 cursor-pointer">15</li>
              </ul>
              <p class="text-sm leading-none text-gray-600 mt-2">Size not available?</p>
            </div>
            <div class="lg:w-1/2 lg:ml-4 lg:mt-0 mt-4">
              <button class="bg-gray-800 h-10 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-800 text-base leading-none text-white py-3 w-full px-2">Add to cart</button>
            </div>
          </div>
          <div class="xl:block hidden">
            <div id="mainHeading" class="flex justify-between items-center w-full border-t border-gray-300 mt-12 py-4">
              <div class="">
                <p class="text-base leading-4 text-gray-800">Product Care</p>
              </div>
              <button aria-label="toggler" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" data-menu>
                <svg class="transform text-gray-800" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.96967 5.21967C3.26256 4.92678 3.73744 4.92678 4.03033 5.21967L8 9.18934L11.9697 5.21967C12.2626 4.92678 12.7374 4.92678 13.0303 5.21967C13.3232 5.51256 13.3232 5.98744 13.0303 6.28033L8.53033 10.7803C8.23744 11.0732 7.76256 11.0732 7.46967 10.7803L2.96967 6.28033C2.67678 5.98744 2.67678 5.51256 2.96967 5.21967Z" fill="#4B5563" />
                </svg>
              </button>
            </div>
            <div id="menu" class="hidden mt-6 pb-4 w-full">
              <p class="text-base leading-6 text-gray-800 font-normal">product care description</p>
            </div>
            <div>
              <div id="mainHeading" class="flex justify-between items-center w-full border-t border-gray-300 py-4">
                <div class="">
                  <p class="text-base leading-4 text-gray-800">Shipping & Returns</p>
                </div>
                <button aria-label="toggler" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" data-menu>
                  <svg class="transform text-gray-800" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.96967 5.21967C3.26256 4.92678 3.73744 4.92678 4.03033 5.21967L8 9.18934L11.9697 5.21967C12.2626 4.92678 12.7374 4.92678 13.0303 5.21967C13.3232 5.51256 13.3232 5.98744 13.0303 6.28033L8.53033 10.7803C8.23744 11.0732 7.76256 11.0732 7.46967 10.7803L2.96967 6.28033C2.67678 5.98744 2.67678 5.51256 2.96967 5.21967Z" fill="#4B5563" />
                  </svg>
                </button>
              </div>
              <div id="menu" class="hidden mt-6 pb-4 w-full">
                <p class="text-base leading-6 text-gray-800 font-normal">Shipping & Returns description</p>
              </div>
            </div>
            <div class="mb-4 border-b border-gray-300">
              <div id="mainHeading" class="flex justify-between items-center w-full border-t border-gray-300 py-4">
                <div class="">
                  <p class="text-base leading-4 text-gray-800">Details & Care</p>
                </div>
                <button aria-label="toggler" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" data-menu>
                  <svg class="transform text-gray-800" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.96967 5.21967C3.26256 4.92678 3.73744 4.92678 4.03033 5.21967L8 9.18934L11.9697 5.21967C12.2626 4.92678 12.7374 4.92678 13.0303 5.21967C13.3232 5.51256 13.3232 5.98744 13.0303 6.28033L8.53033 10.7803C8.23744 11.0732 7.76256 11.0732 7.46967 10.7803L2.96967 6.28033C2.67678 5.98744 2.67678 5.51256 2.96967 5.21967Z" fill="#4B5563" />
                  </svg>
                </button>
              </div>
              <div id="menu" class="hidden mt-6 pb-4 w-full">
                <p class="text-base leading-6 text-gray-800 font-normal">Details & Care description</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="xl:hidden lg:px-20 md:px-6 px-4">
        <div id="mainHeading" class="flex justify-between items-center w-full border-t border-gray-300 mt-12 py-4">
          <div class="">
            <p class="text-base leading-4 text-gray-800">Product Care</p>
          </div>
          <button aria-label="toggler" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" data-menu>
            <svg class="transform text-gray-800" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.96967 5.21967C3.26256 4.92678 3.73744 4.92678 4.03033 5.21967L8 9.18934L11.9697 5.21967C12.2626 4.92678 12.7374 4.92678 13.0303 5.21967C13.3232 5.51256 13.3232 5.98744 13.0303 6.28033L8.53033 10.7803C8.23744 11.0732 7.76256 11.0732 7.46967 10.7803L2.96967 6.28033C2.67678 5.98744 2.67678 5.51256 2.96967 5.21967Z" fill="#4B5563" />
            </svg>
          </button>
        </div>
        <div id="menu" class="hidden mt-6 pb-4 w-full">
          <p class="text-base leading-6 text-gray-800 font-normal">product care description</p>
        </div>
        <div>
          <div id="mainHeading" class="flex justify-between items-center w-full border-t border-gray-300 py-4">
            <div class="">
              <p class="text-base leading-4 text-gray-800">Shipping & Returns</p>
            </div>
            <button aria-label="toggler" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" data-menu>
              <svg class="transform text-gray-800" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.96967 5.21967C3.26256 4.92678 3.73744 4.92678 4.03033 5.21967L8 9.18934L11.9697 5.21967C12.2626 4.92678 12.7374 4.92678 13.0303 5.21967C13.3232 5.51256 13.3232 5.98744 13.0303 6.28033L8.53033 10.7803C8.23744 11.0732 7.76256 11.0732 7.46967 10.7803L2.96967 6.28033C2.67678 5.98744 2.67678 5.51256 2.96967 5.21967Z" fill="#4B5563" />
              </svg>
            </button>
          </div>
          <div id="menu" class="hidden mt-6 pb-4 w-full">
            <p class="text-base leading-6 text-gray-800 font-normal">Shipping & Returns description</p>
          </div>
        </div>
        <div class="border-b border-gray-300 mb-4">
          <div id="mainHeading" class="flex justify-between items-center w-full border-t border-gray-300 py-4">
            <div class="">
              <p class="text-base leading-4 text-gray-800">Details & Care</p>
            </div>
            <button aria-label="toggler" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" data-menu>
              <svg class="transform text-gray-800" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.96967 5.21967C3.26256 4.92678 3.73744 4.92678 4.03033 5.21967L8 9.18934L11.9697 5.21967C12.2626 4.92678 12.7374 4.92678 13.0303 5.21967C13.3232 5.51256 13.3232 5.98744 13.0303 6.28033L8.53033 10.7803C8.23744 11.0732 7.76256 11.0732 7.46967 10.7803L2.96967 6.28033C2.67678 5.98744 2.67678 5.51256 2.96967 5.21967Z" fill="#4B5563" />
              </svg>
            </button>
          </div>
          <div id="menu" class="hidden mt-6 pb-4 w-full">
            <p class="text-base leading-6 text-gray-800 font-normal">Details & Care description</p>
          </div>
        </div>
      </div>
    </div>    
    
 <script>
     function selectNew() {
  var newL = document.getElementById("list");
  newL.classList.toggle("hidden");
}

function selectedSmall() {
  var text = event.target.innerText;
  var newL = document.getElementById("list");
  var newText = document.getElementById("textClicked");
  newL.classList.add("hidden");
  newText.innerText = text;
}

//   Question
let elements = document.querySelectorAll("[data-menu]");
for (let i = 0; i < elements.length; i++) {
  let main = elements[i];

  main.addEventListener("click", function () {
    let element = main.parentElement.parentElement;
    let indicators = main.querySelectorAll("svg");
    let child = element.querySelector("#menu");
    let h = element.querySelector("#mainHeading>div>p");

    child.classList.toggle("hidden");
    // console.log(indicators[0]);
    indicators[0].classList.toggle("rotate-180");
  });
}

</script>   
</x-app-layout>
