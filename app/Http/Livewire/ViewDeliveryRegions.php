<?php

namespace App\Http\Livewire;
use App\Models\DeliveryRegion;
use Livewire\WithPagination;

use Livewire\Component;

class ViewDeliveryRegions extends Component
{
    use WithPagination;
    public $region_name;
    public function render()
    {
        $delivery_regions = DeliveryRegion::orderBy('id','desc')->paginate(20);
        return view('livewire.view-delivery-regions',compact('delivery_regions'));
    }
}

