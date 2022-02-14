<div x-data="{open:false,info:''}" x-on:notify.window="info=$event.detail" x-show.transition.out.duration.1000ms="open" style="display: none"
    x-init="@this.on('message',()=>{
        setTimeout(()=>{open=false},2500);
        open=true;
    })"
    x-transition:enter="transition ease-out duration-1000" 
    x-transition:enter-start="opacity-0 transform scale-90" 
    x-transition:enter-end="opacity-100 transform scale-100" 
    x-transition:leave="transition ease-in duration-1000" 
    x-transition:leave-start="opacity-100 transform scale-100" 
    x-transition:leave-end="opacity-0 transform scale-90"

class="flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md py-5 pl-6 pr-8 sm:pr-6 bottom-0 right-0 fixed">
    <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
        <div class="text-green-500">
            <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="text-sm font-medium ml-3">Success.</div>
    </div>
    <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4"><p x-text="info"></p></div>
    <div class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer pl-2" x-on:click="open=false">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </div>
</div>
