<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cod Requests') }}
            </h2>
        </div>
    </x-slot>
    <x-inputs.snack/>    
    <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="w-full">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">S.N</th> 
                  <th class="px-4 py-3">Seller Name</th>
                  <th class="px-4 py-3">Account Holder Name</th>
                  <th class="px-4 py-3">Account Number</th>
                  <th class="px-4 py-3">Bank</th>
                  <th class="px-4 py-3">Balance</th>
                  <th class="px-4 py-3">Requested Date</th>
                  <th class="px-4 py-3">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                  @forelse($cod_requests as $key=>$cr) 
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm border">{{++$key}}</td>
                        <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold text-black">{{$cr->user->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-ms font-semibold border">{{$cr->account_name}}</td>
                        <td class="px-4 py-3 text-xs border">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{$cr->account_number}} </span>
                        </td>
                        <td class="px-4 py-3 text-sm border">{{$cr->bank->name}}</td>
                        <td class="px-4 py-3 text-sm border">Rs {{$cr->amount}}</td>
                        <td class="px-4 py-3 text-sm border">{{date("j M,Y   ",strtotime ($cr->created_at))}}</td>
                        <td class="px-4 py-3 text-sm border cursor-pointer"><a class="bg-green-500 px-2 py-2 text-white" wire:click="changeStatus({{$cr->id}})">Done</a></td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="p-4 text-center text-red-500">* No Records Found</td></tr>
                @endforelse    
              </tbody>
            </table>
            <div class="p-2">{{$cod_requests->links()}}</div>
          </div>
        </div>
    </section>
</div>
