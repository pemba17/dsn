
<div>
    <x-inputs.snack/>
    <div class="bg-gray-200 min-h-screen pt-2">
        <div class="container mx-auto">
            <div class="inputs w-full max-w-2xl p-6 mx-auto">
                <h2 class="text-2xl text-gray-900">Save Category</h2>
                <form class="mt-6 border-t border-gray-400 pt-4" wire:submit.prevent="saveCategory()" >
                    <div class='flex flex-wrap -mx-3 mb-6'>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Parent Category </label>
                            <div class="flex-shrink w-full inline-block relative">
                                <select class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded" wire:model.lazy="parent_id">
                                    <option value="">Select Parent Category</option>
                                     @foreach($categories as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                     @endforeach
                                </select>
                            </div>
                            @error('category')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        @if($show_sub_cat==true)
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Sub Category </label>
                                <div class="flex-shrink w-full inline-block relative">
                                    <select class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded" wire:model.lazy="sub_cat_id">
                                        <option value="">Select Sub Category</option>
                                        @foreach($sub_cat_info as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('sub_cat_id')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                            </div>
                        @endif

                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Category Name</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter Category Name'  wire:model.lazy="name">
                            @error('name')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class="px-3">
                            <button class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
