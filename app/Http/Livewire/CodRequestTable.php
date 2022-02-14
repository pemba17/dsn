<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CodRequest;

class CodRequestTable extends Component
{
    public function changeStatus($id){
        if($id){
            CodRequest::where('id',$id)->update(['status'=>1]);
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Moved To Done Successfully');
        }
    }
    public function render()
    {
        $cod_requests=CodRequest::with('user','bank')->where('status',0)->orderBy('id','desc')->paginate(20);
        return view('livewire.cod-request-table',compact('cod_requests'));
    }
}
