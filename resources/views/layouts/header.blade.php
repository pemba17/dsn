<header class="lg:px-4 dark:from-gray-900 dark:to-gray-900 bg-gradient-to-b from-indigo-100 to-white" >
  <div class="2xl:mx-auto 2xl:container w-full">
    <div class="hidden md:flex justify-between items-center pt-8 px-10 lg:px-0">
      <div>
        <a class="text-gray-800 dark:text-white" href="{{url('/')}}">
          <img src="{{url('front/images/Logo.png')}}" alt="logo" />
        </a>
      </div>
      <div>
        <ul class="flex flex-row space-x-8">
          <li class="@if(request()->routeIs('home'))border-b-2 border-gray-900 @endif dark:border-gray-100 hover:text-gray-600 text-base text-gray-900">
              <a class="focus:outline-none dark:text-white focus:text-blue-800" href="{{url('/')}}">Home</a>
          </li>
          <li class="@if(request()->routeIs('view-product'))border-b-2 border-gray-900 @endif text-base text-gray-900 hover:text-gray-600">
            <a class="focus:outline-none dark:text-white focus:text-blue-800" href="{{url('view-product')}}">Products</a>
          </li>
          @if(Auth::check())
            <li class="@if(request()->routeIs('dashboard'))border-b-2 border-gray-900 @endif text-base text-gray-900 hover:text-gray-600">
              <a class="focus:outline-none dark:text-white focus:text-blue-800" href="{{url('dashboard')}}">Dashboard</a>
            </li>
          @endif 
        </ul>
      </div>
      @if(!Auth::check())
        <div>
            <a class="bg-indigo-100 text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-800 hover:opacity-75 py-2.5 px-5 rounded-sm" href="{{url('login')}}">Login</a>
        </div>
      @else
        <div>
          <a class="bg-indigo-100 text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-800 hover:opacity-75 py-2.5 px-5 rounded-sm cursor-pointer" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout</a>
          <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
          </form>
        </div>
      @endif 
    </div>

    <div class="dark:from-gray-900 dark:to-gray-900 bg-gradient-to-b from-indigo-100 to-whit text-gray-800 relative z-20 px-6 md:hidden">
		  <div class="h-20 py-4 container mx-auto flex items-center justify-center">
			  <div x-data="{ open: false }" class="z-10 flex-1">
				  <div :class="{ 'flex' : open, 'hidden' : open === false }" class="fixed md:relative top-0 left-0 w-full md:w-auto h-screen md:h-auto md:flex flex-col md:flex-row items-center justify-center md:justify-start z-40 bg-gray-200 md:bg-transparent leading-loose font-sans uppercase text-gray-800 text-base md:text-xs tracking-wider gap-8 hidden">
						<a href="{{url('/')}}">Home</a>
						<a href="{{url('view-product')}}">Products</a>
					</div>
          <div class="flex justify-between">
              <a class="text-gray-800 dark:text-white h-16 w-16" href="{{url('/')}}">
                <img src="{{url('front/images/Logo2.png')}}" alt="logo"  />
              </a>
				  	<button @click="open = true" type="button" :class="{ 'hidden' : open, 'block' : !open }" class="block md:hidden text-4xl font-thin float-right"><img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/hero_5_Svg5.svg" alt="menu" /></button>
          </div>
					<button @click="open = false" type="button" :class="{ 'block' : open, 'hidden' : !open }" class="md:hidden absolute top-0 right-0 leading-none p-8 text-xl z-50 hidden"><img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/hero_5_Svg3.svg" alt="cross" /></button>
				</div>
			</div>
	  </div>
</header>
