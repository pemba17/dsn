
<div>
    <x-inputs.snack/>
    <div wire:loading wire:target="filename">
        <x-inputs.loading/>
    </div>    
    <div class="bg-gray-200 min-h-screen pt-2">
        <div class="container mx-auto">
            <div class="inputs w-full max-w-2xl p-6 mx-auto">
                <h2 class="text-2xl text-gray-900">Save Product</h2>
                <form class="mt-6 border-t border-gray-400 pt-4" id="insertForm" wire:submit.prevent="save()">
                    <div class='flex flex-wrap -mx-3 mb-6'>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Product Name <span class="text-red-600">*</span></label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter Product Name'  wire:model.lazy="name" required>
                            @error('name')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6 '>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-2'>Cost Price <span class="text-red-600">*</span></label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-2' type='number' placeholder='Enter Cost Price'  wire:model.lazy="cost_price" required min="1">
                            @error('cost_price')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6 '>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-8'>Product Stock <span class="text-red-600">*</span></label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-8' type='number' placeholder='Enter Product Stock'  wire:model.lazy="stock" required min="1">
                            @error('stock')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-1/2 px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >MRP From <span class="text-red-600">*</span></label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' type='number' wire:model.lazy="mrp_from" placeholder="From" required>
                            @error('mrp_from')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>
                        <div class='w-full md:w-1/2 px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >MRP To <span class="text-red-600">*</span></label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' type='number' wire:model.lazy="mrp_to" placeholder="To" required>
                            @error('mrp_to')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6 '>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-3'>Description</label>
                            <textarea rows="6" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-3' type='text' placeholder='Enter Description' wire:model.lazy="description"></textarea>
                            @error('description')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Choose Category  <span class="text-red-600">*</span></label>
                            <div class="flex-shrink w-full inline-block relative">
                                <select class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded" wire:model.lazy="categoryId" required>
                                    <option value="">Choose ...</option>
                                     @foreach($categories as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                     @endforeach
                                </select>
                            </div>
                            @error('categoryId')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        @if($this->show_cat1==true)
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Sub Category 1 <span class="text-red-600">*</span></label>
                                <div class="flex-shrink w-full inline-block relative">
                                    <select class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded" wire:model.lazy="sub_cat1" required>
                                        <option value="">Choose ...</option>
                                        @foreach($sub_cat1_details  as $cat1)
                                            <option value="{{$cat1->id}}">{{$cat1->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('sub_cat1')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                            </div>
                        @endif    
                        
                        @if($this->show_cat2==true)
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Sub Category 2 <span class="text-red-600">*</span></label>
                                <div class="flex-shrink w-full inline-block relative">
                                    <select class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded" wire:model.lazy="sub_cat2" required>
                                        <option value="">Choose ...</option>
                                        @foreach($sub_cat2_details  as $cat2)
                                            <option value="{{$cat2->id}}">{{$cat2->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('sub_cat2')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                            </div>
                        @endif    

                        @if($old_product_images)
                            <div class='w-full md:w-full px-3 mb-6'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Existing Images </label>
                                    <div class="flex gap-4">
                                        @foreach($old_product_images as $key=>$img)
                                            <div class="relative ">
                                                <img src="{{asset($img)}}" class="h-32 w-32"/>
                                                @if(count($old_product_images)>1)
                                                    <span class="absolute top-0 right-0 -mt-4 -mr-4 px-3 py-1 bg-red-500 rounded-full text-white cursor-pointer" onclick="confirm('Are You Sure?')||event.stopImmediatePropagation()" wire:click.prevent="deleteImage({{$key}})">X</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                <input type="hidden" wire:model="old_product_images"/>
                            </div>
                        @endif

                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Images </label>
                            <input type="file" wire:model="filename" accept="image/*" multiple/>
                            @error('filename.*')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Tags </label>
                            @foreach($tags as $index=>$tag)
                                <label class="inline-flex items-center mt-3">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600 rounded-full" wire:model.lazy="tag.{{$index}}" value="{{$tag->id}}"><span class="ml-2 text-gray-700">{{$tag->name}}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="w-full md:w-full px-3 mb-6" x-data="{hasVariations:@entangle('has_variations')}">
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600" wire:model.defer="has_variations" x-on:click="hasVariations=!hasVariations"><span class="block ml-2 text-xs font-semibold text-gray-600 uppercase">Has Variations</span>
                            </label>
                            <div x-show="hasVariations">
                                <div x-data="variation_handler()"  x-init="oldData()">
                                    <template x-for="(field, index) in fields" :key="index">
                                        <div class="px-4 py-5 bg-white">
                                            <div class="grid grid-cols-4 gap-6">
                                                <div>
                                                    <label for="variation_name" class="block text-sm font-medium text-gray-700">Variation #<span x-text="index+1"></span> Name</label>
                                                    <input type="text" x-model.lazy='field.name' class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>
                                                </div>
                                                <div>
                                                    <label for="variation_price" class="block text-sm font-medium text-gray-700">Variation #<span x-text="index+1"></span> Price </label>
                                                    <input type="number" x-model.lazy='field.price' class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>
                                                </div>
                                                <div>
                                                    <label for="variation_stock" class="block text-sm font-medium text-gray-700">Variation #<span x-text="index+1"></span> Stock</label>
                                                    <input type="number" x-model.lazy='field.stock' class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>
                                                </div>
                                                @if(count($this->product_variations)>1)
                                                    <div>
                                                        <button type="button" class="text-red-500 mt-10" x-on:click="removeField(index)">&times;</button>
                                                    </div>
                                                @endif    
                                            </div>
                                        </div>
                                    </template>
                                    <button type="button" class="btn btn-info" x-on:click="addNewField()">+ Add variation</button>
                                </div>
                            </div>
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
        function variation_handler() {
            return{
                fields: @entangle('product_variations'),
                data:@entangle('edit_product_variations'),
                ids:@entangle('ids'),
                addNewField() {
                        this.fields.push({
                        name:'',
                        price:'',
                        stock:'',
                        id:0,
                    });
                },
                oldData(){
                    this.data.map((value)=>{
                        this.fields.push({
                            name:value.name,
                            price:value.price,
                            stock:value.stock,
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
