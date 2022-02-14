<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DeliveryCity;
use Livewire\WithPagination;

class ViewDeliveryCities extends Component
{
    use WithPagination;
    public $area;
    public function render()
    {
        $cities=DeliveryCity::when($this->area,function($q,$area){
            $q->where('city_name','LIKE','%'.$area.'%');
        })->orderBy('id','desc')->paginate(20);
        return view('livewire.view-delivery-cities',compact('cities'));
    }
}
