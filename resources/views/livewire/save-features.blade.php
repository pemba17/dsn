
<div>
    <x-inputs.snack/>
    <div class="bg-gray-200 min-h-screen pt-2">
        <div class="container mx-auto">
            <div class="inputs w-full max-w-2xl p-6 mx-auto">
                <h2 class="text-2xl text-gray-900">Save Feature</h2>
                <form class="mt-6 border-t border-gray-400 pt-4" id="insertForm" wire:submit.prevent="save()">
                    <div class='flex flex-wrap -mx-3 mb-6'>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Title <span class="text-red-600">*</span></label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter Feature Title'  wire:model.lazy="title" required>
                            @error('title')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6 '>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-3'>Description</label>
                            <textarea rows="6" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-3' type='text' placeholder='Enter Description' wire:model.lazy="description"></textarea>
                            @error('description')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Image </label>
                            @if ($feature_id)
                                <img class="w-16 h-16 mb-3" src="{{asset($features_details->filename)}}" alt="{{$features_details->title}}" />
                            @endif
                            <input type="file" wire:model="photo" accept="image/*" />
                            @error('photo')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
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
