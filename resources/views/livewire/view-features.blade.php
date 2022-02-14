<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
            {{ __('Features Table') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full sm:px-6">
                <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
                    <div class="sm:flex items-center justify-between">
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Features Table</p>
                        <div>
                            <a class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded" href="{{url('save-feature')}}">
                                <p class="text-sm font-medium leading-none text-white">New Feature</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800">
                                <th class="font-normal text-left pl-12">S.N</th>
                                <th class="font-normal text-left pl-12">Title</th>
                                <th class="font-normal text-left pl-12">Description</th>
                                <th class="font-normal text-left pl-20">Created Date</th>
                                <th class="font-normal text-left pl-20">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="w-full">
                            @forelse($features as $key=>$row)
                                <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100">
                                    <td class="pl-12"><p class="text-sm font-medium leading-none text-gray-800">{{++$key}}</p></td>
                                    <td class="pl-8 cursor-pointer">
                                        <div class="flex items-center">
                                            @if($row->filename!=NULL || $row->filename!="")
                                                <div class="w-10 h-10">
                                                  <img class="w-full h-full" src="{{asset($row->filename)}}" alt="{{$row->title}}" />
                                                </div>
                                            @endif
                                            <div class="pl-4">
                                                <p class="font-medium">{{$row->title}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pl-12">
                                        <p class="font-medium">{{$row->description}}</p>
                                    </td>
                                    <td class="pl-20">
                                        <p class="font-medium">{{$row->created_at->toDateString()}}</p>
                                    </td>

                                    <td class="px-7 2xl:px-0 text-center" x-data="{open:false}">
                                        <button x-on:click="open=!open" class="w-5 focus:ring-2 rounded-md focus:outline-none ml-7" role="button" aria-label="options">
                                        <img class="w-5" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/table_3-svg1.svg" alt="dropdown">
                                        </button>
                                        <div class="dropdown-content bg-white shadow w-24 absolute z-30 mr-6 mt-2" x-show="open">
                                            <div tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white" onclick="window.location='{{ url('save-feature/'.$row->id) }}'">
                                                <span>Edit</span>
                                            </div>
                                            {{-- <div tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                                <p>Delete</p>
                                            </div> --}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100"><td colspan="7" class="text-center text-red-500">* No Records Found</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="bg-white p-4">
                    {{$features->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
