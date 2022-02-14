<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Request Facebook Ads') }}
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
                  <th class="px-4 py-3">Target Audience</th>
                  <th class="px-4 py-3">Age Group</th>
                  <th class="px-4 py-3">Gender</th>
                  <th class="px-4 py-3">Created Date</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                  @forelse($fb_ads as $key=>$fb) 
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm border">{{++$key}}</td>
                        <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold text-black">{{$fb->user->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-ms font-semibold border">{{$fb->target_audience}}</td>
                        <td class="px-4 py-3 text-xs border">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{$fb->age_group}} </span>
                        </td>
                        <td class="px-4 py-3 text-sm border">{{$fb->gender}}</td>
                        <td class="px-4 py-3 text-sm border">{{date("j M,Y   ",strtotime ($fb->created_at))}}</td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="p-4 text-center text-red-500">* No Records Found</td></tr>
                @endforelse    
              </tbody>
            </table>
            <div class="p-2">{{$fb_ads->links()}}</div>
          </div>
        </div>
    </section>
</div>
