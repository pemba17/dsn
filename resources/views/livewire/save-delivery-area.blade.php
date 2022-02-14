<div>
    <x-slot name="header">
        <a class="font-semibold text-xl text-gray-800 leading-tight cursor-pointer" href="#">
            {{ __('Save Delivery Area') }}
        </a>
    </x-slot>

    <x-inputs.snack/>
    <div class="bg-gray-200 min-h-screen pt-2">
        <div class="container mx-auto">
            <div class="inputs w-full max-w-5xl p-6 mx-auto">
                <h2 class="text-2xl text-gray-900">Save Delivery Area</h2>
                <form class="mt-6 border-t border-gray-400 pt-4" wire:submit.prevent="saveArea()" >
                    <div class='flex flex-wrap -mx-3 mb-6'>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>City Name</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' wire:model.lazy="city_name">
                            @error('city_name')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6' x-data="handler()" x-init="oldData()">
                            <div class="flex justify-end">
                                <button type="button" class="flex justify-end bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" @click="addNewField()">+ Add Area</button>
                            </div>
                            <template x-for="(field, index) in fields" :key="index">
                                <div class="flex flex-row gap-5 text-center p-6	">
                                    <strong class="mt-1.5" x-text="'Area'+' '+(index+1)"></strong>
                                    <input class="shadow appearance-none border rounded w-50 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" x-model.lazy="field.area"  placeholder="Enter Area Name" required>
                                    {{-- <div class="mt-1.5">
                                        <input type="checkbox" x-model="field.inside_valley">
                                        <label>
                                            Inside Valley
                                        </label>
                                    </div> --}}
                                    <a class="mt-1.5" @click="removeField(index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                      </svg>
                                    </a>
                                </div>
                            </template>
                        </div>

                        <div class="px-3">
                            <button class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function handler() {
            return{
                fields: @entangle('areas'),
                data:@entangle('edit_areas'),
                ids:@entangle('ids'),
                addNewField() {
                        this.fields.push({
                        area:'',
                        id:0,
                    });
                },
                oldData(){
                    this.data.map((value)=>{
                        this.fields.push({
                            area:value.area_name,
                            id:value.id,
                        });
                    })
                },
                removeField(index) {
                    this.ids.push(this.fields[index].id);
                    this.fields.splice(index, 1);
                }
            }
        }
    </script>
</div>
