<div>

    <div class="py-12 2xl:container flex-col 2xl:mx-auto px-4 md:px-6 lg:px-20 space-y-6 md:space-y-12 w-full flex justify-center items-center">
        <div class="text-center w-full  flex justify-center items-center flex-col space-y-3 md:space-y-5">
            <h1 class="text-xl md:text-2xl lg:text-4xl font-semibold leading-5 dark:text-white md:leading-6 lg:leading-9 text-gray-800">Women Wear</h1>
            <p class="text-base leading-4 dark:text-gray-200 text-gray-600">Home > Shop > <span class="font-medium">Women Wear</span></p>
        </div>

        <div class="flex relative w-full justify-start items-start lg:space-x-1 xl:space-x-10">
            <div id="menu4" class="hidden top-24 absolute md:right-0 lg:static z-10 w-full bg-white dark:bg-gray-900 shadow-md lg:shadow-none rounded-md lg:rounded-none md:w-96  lg:flex justify-start items-start flex-col " style="padding:50px;">
                <div class="flex flex-col lg:flex-row justify-between items-center w-full">
                    <div class="flex justify-between lg:justify-center items-center w-full lg:w-auto">
                    <p class="text-lg font-medium dark:text-white leading-none text-gray-800">Filters </p>
                    <button onclick="show('menu4')" class="lg:hidden">
                       <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product_grid_7-svg-1.svg" alt="filter icon">
                       <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product_grid_7-svg-1-dark.svg" alt="filter icon">
                    </button>
                    </div>
                    <button class="text-base font-medium dark:text-gray-200 leading-4 text-gray-600">
                        Clear All
                    </button>
                </div>
                <hr class="w-full my-8"/>
                <div class="flex justify-start space-y-6 w-full items-start flex-col">
                    <div class="flex w-full justify-between items-center">
                        <p class="text-xl font-semibold dark:text-white leading-5 text-gray-800">Categories</p>
                        <button onclick="show('menu1')">
                                <img id="menu1Icon" class="transform dark:hidden " src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product_grid_7-svg-2.svg" alt="dropdown">
                                <img id="menu1IconDark" class="transform hidden dark:block " src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product_grid_7-svg-2-dark.svg" alt="dropdown">
                        </button>
                    </div>
                    <div id="menu1" class="flex justify-start items-start flex-col space-y-5 ">
                        <div class="flex justify-start items-center space-x-4">
                          <button data aria-label="Checkbox" class=" flex justify-center items-center shadow-inner w-5 h-5 border border-gray-400">
                            <svg class="text-white dark:text-gray-900" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9707 3.93572L6.03408 13.0062L2.02832 9.00039L3.00059 8.02812L5.9671 10.9946L12.9359 3.03027L13.9707 3.93572Z" fill="currentColor"/>
                                </svg>
                          </button>
                          <p class="text-base dark:text-gray-200 leading-4 text-gray-600">Dresses</p>
                        </div>
                        <div class="flex justify-start items-center space-x-4">
                           <input type="checkbox" name="" id="" class="focus:outline-none">
                            <p class="text-base dark:text-gray-200 leading-4 text-gray-600">Jackets</p>
                          </div>
                          <div class="flex justify-start items-center space-x-4">
                           <input type="checkbox" name="" id="" class="focus:outline-none">
                            <p class="text-base dark:text-gray-200 leading-4 text-gray-600">Shoes</p>
                          </div>
                          <div class="flex justify-start items-center space-x-4">
                           <input type="checkbox" name="" id="" class="focus:outline-none">
                            <p class="text-base dark:text-gray-200 leading-4 text-gray-600">Bags</p>
                          </div>
                          <div class="flex justify-start items-center space-x-4">
                           <input type="checkbox" name="" id="" class="focus:outline-none">
                            <p class="text-base dark:text-gray-200 leading-4 text-gray-600">Jeans</p>
                          </div>
                    </div>
                </div>
                <hr class="w-full my-8"/>
                <div class="flex justify-start space-y-6 w-full items-start flex-col">
                    <div class="flex w-full justify-between items-center">
                        <p class="text-lg font-medium leading-none dark:text-white text-gray-800">By Color</p>
                        <button onclick="show('menu2')">
                            <img id="menu2Icon" class="transform dark:hidden " src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product_grid_7-svg-2.svg" alt="dropdown">
                            <img id="menu2IconDark" class="transform hidden dark:block " src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product_grid_7-svg-2-dark.svg" alt="dropdown">
                        </button>
                    </div>
                    <div id="menu2" class="flex justify-start items-start space-x-4">
                        <button class="focus:ring-1 focus:ring-offset-2 focus:ring-gray-800 p-3 bg-gray-500">
                        </button>
                        <button class="focus:ring-1 focus:ring-offset-2 focus:ring-gray-800 p-3 bg-yellow-900">
                        </button>
                        <button class="focus:ring-1 focus:ring-offset-2 focus:ring-gray-800 p-3 bg-green-800">
                        </button>
                        <button class="focus:ring-1 focus:ring-offset-2 focus:ring-gray-800 p-3 bg-blue-500">
                        </button>
                        <button class="focus:ring-1 focus:ring-offset-2 focus:ring-gray-800 p-3 bg-black">
                        </button>
                    </div>
                </div>
                <hr class="w-full my-8"/>
                <div class="flex justify-start space-y-6 w-full items-start flex-col">
                    <div class="flex w-full justify-between items-center">
                        <p class="text-lg font-medium leading-none dark:text-white text-gray-800">Size</p>
                        <button onclick="show('menu3')">
                            <img id="menu3Icon" class="transform dark:hidden " src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product_grid_7-svg-2.svg" alt="dropdown">
                            <img id="menu3IconDark" class="transform hiddend dark:block " src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product_grid_7-svg-2-dark.svg" alt="dropdown">
                        </button>
                    </div>
                    <div id="menu3" class="flex justify-start items-start flex-col space-y-5 ">
                        <div class="flex justify-start items-center space-x-4">
                        <input type="checkbox" name="\" id="">
                          <p class="text-base dark:text-gray-200 leading-4 text-gray-600">XS</p>
                        </div>
                        <div class="flex justify-start items-center space-x-4">
                           <input type="checkbox" name="" id="" class="focus:outline-none">
                            <p class="text-base dark:text-gray-200 leading-4 text-gray-600">S</p>
                          </div>
                          <div class="flex justify-start items-center space-x-4">
                           <input type="checkbox" name="" id="" class="focus:outline-none">
                            <p class="text-base dark:text-gray-200 leading-4 text-gray-600">M</p>
                          </div>
                          <div class="flex justify-start items-center space-x-4">
                           <input type="checkbox" name="" id="" class="focus:outline-none">
                            <p class="text-base dark:text-gray-200 leading-4 text-gray-600">L</p>
                          </div>
                          <div class="flex justify-start items-center space-x-4">
                           <input type="checkbox" name="" id="" class="focus:outline-none">
                            <p class="text-base dark:text-gray-200 leading-4 text-gray-600">XL</p>
                          </div>
                    </div>
                </div>
                <hr class="w-full my-8"/>
                <div class="flex justify-start flex-col items-start">
                    <p class="text-lg font-medium dark:text-white leading-none text-gray-800">Price</p><br/>
                    <p class="text-sm w-24 leading-none dark:text-gray-200 text-gray-600">Price Range</p>

                    <div class="flex justify-start items-center space-x-4 mt-3">
                        <input class="border w-24 focus:outline-none text-sm font-medium leading-4 placeholder-gray-600 text-gray-600 border-gray-300 py-3 text-center" placeholder="$0" type="text" name="" id="">
                        <div class="border border-gray-600 w-2">

                        </div>
                        <input class="border w-24 focus:outline-none text-sm font-medium leading-4 placeholder-gray-600 text-gray-600 border-gray-300 py-3 text-center" placeholder="$250" type="text" name="" id="">
                    </div>
                </div>
            </div>
            <div class="flex justify-start items-start w-full flex-col">
            <div class="2xl:container">
                    <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-y-12 lg:gap-x-8 sm:gap-y-10 sm:gap-x-6 gap-y-6 lg:mt-12 mt-10">
                        <div class="relative">
                            <div class="absolute top-0 left-0 py-2 px-4 bg-white bg-opacity-50"><p class="text-xs leading-3 text-gray-800">New</p></div>
                            <div class="relative group">
                                <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                <img class="w-full" src="https://i.ibb.co/HqmJYgW/gs-Kd-Pc-Iye-Gg.png" alt="A girl Posing Image" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>
                                    <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
                                </div>
                            </div>
                            <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4">Wilfred Alana Dress</p>
                            <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">$1550</p>
                            <p class="font-normal dark:text-gray-300 text-base leading-4 text-gray-600 mt-4">2 colours</p>
                        </div>
                        <div class="relative">
                            <div class="bg-white bg-opacity-50 absolute top-0 right-0 px-2 py-1"><p class="text-white fonr-normal text-base leading-4">XS , S , M , L</p></div>
                            <div class="relative group">
                                <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                <img class="w-full" src="https://i.ibb.co/m6V0MzR/gs-Kd-Pc-Iye-Gg-1.png" alt="A girl wearing white suit and googgles" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>
                                    <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
                                </div>
                            </div>
                            <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4">Wilfred Alana Dress</p>
                            <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">$1800</p>
                        </div>
                        <div>
                            <div class="relative group">
                                <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                <img class="w-full" src="https://i.ibb.co/6g1KhhF/pexels-django-li-2956641-1.png" alt="A girl wearing dark blue suit and posing" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>
                                    <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
                                </div>
                            </div>
                            <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4">Wilfred Alana Dress</p>
                            <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">$1550</p>
                            <p class="font-normal dark:text-gray-300 text-base leading-4 text-gray-600 mt-4">2 colours</p>
                        </div>
                        <div>
                            <div class="relative group">
                                <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                <img class="w-full" src="https://i.ibb.co/KLDN7Vt/gbarkz-vq-Knu-G8-Ga-Qc-unsplash.png" alt="A girl posing and wearing white suit" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>
                                    <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
                                </div>
                            </div>

                            <p class="font-normal text-xl dark:text-white leading-5 text-gray-800 md:mt-6 mt-4">Flared Cotton Tank Top</p>
                            <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">$1800</p>
                        </div>
                        <div>
                            <div class="relative group">
                                <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                <img class="w-full" src="https://i.ibb.co/5vxgf7V/pexels-quang-anh-ha-nguyen-884979-1.png" alt="Girl posing for an Image" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>
                                    <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
                                </div>
                            </div>

                            <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4">Flared Cotton Tank Top</p>
                            <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">$1800</p>
                        </div>
                        <div>
                            <div class="relative group">
                                <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                <img class="w-full" src="https://i.ibb.co/HKFXSrQ/pietra-schwarzler-l-SLq-x-Qd-FNI-unsplash.png" alt="A blonde girl posing" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>
                                    <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
                                </div>
                            </div>

                            <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4">Wilfred Alana Dress</p>
                            <p class="font-semibold text-xl leading-5 text-gray-800 mt-4">$1550</p>
                            <p class="font-normal dark:text-gray-300 text-base leading-4 text-gray-600 mt-4">2 colours</p>
                        </div>
                        <div>
                            <div class="relative group">
                                <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                <img class="w-full" src="https://i.ibb.co/BKsqym2/tracey-hocking-ve-Zp-XKU71c-unsplash.png" alt="A girl wearing white suit posing in desert" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>
                                    <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
                                </div>
                            </div>

                            <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4">Flared Cotton Tank Top</p>
                            <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">$1800</p>
                        </div>
                        <div>
                            <div class="relative group">
                                <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
                                <img class="w-full" src="https://i.ibb.co/mbrk1DK/pexels-h-i-nguy-n-4034532.png" alt="Girl wearing pink suit posing" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>
                                    <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
                                </div>
                            </div>

                            <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4">Flared Cotton Tank Top</p>
                            <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">$1800</p>
                        </div>
                    </div>

                    <div class="flex justify-center items-center">
                        <button class="hover:bg-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 bg-gray-800 py-5 md:px-16 md:w-auto w-full lg:mt-28 md:mt-12 mt-10 text-white font-medium text-base leading-4">Load More</button>
                    </div>
                </div>
            </div>

            </div>
            </div>
        </div>
    </div>
</div>
