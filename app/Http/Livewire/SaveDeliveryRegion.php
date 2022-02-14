<?php

namespace App\Http\Livewire;

use App\Models\DeliveryRegion;
use App\Models\DeliveryCity;
use Livewire\Component;

class SaveDeliveryRegion extends Component
{
    public $region_name,$titlePage,$region_id;
    public $inside_valley=[];

    public $cities=[];
    public $edit_cities=[];
    public $ids=[];

    public function mount($id=null)
    {
        if(isset($id)){
            $region = DeliveryRegion::findOrFail($id);
            $this->region_id = $region->id;
            $this->region_name = $region->region_name;
            $this->edit_cities=DeliveryCity::select('id','city_name','delivery_price','inside_valley')
                                            ->where('region_id',$this->region_id)
                                            ->get()
                                            ->toArray();
        }
    }
    public function render()
    {
        return view('livewire.save-delivery-region');
    }

    public function saveRegion(){
        $this->validate([
            'region_name'=>'required',
        ]);

        $data=DeliveryRegion::updateOrCreate(['id'=>$this->region_id],[
            'region_name'=>$this->region_name,
        ]);

        DeliveryCity::whereIn('id',$this->ids)
                        ->delete();

        foreach($this->cities as $row){
            DeliveryCity::updateOrCreate(['id'=>$row['id']],[
                'region_id'=>$data->id,
                'city_name'=>$row['city'],
                'delivery_price'=>$row['price'],
                'inside_valley'=>($row['inside_valley']==true)?1:2
            ]);
        }
        if(isset($this->region_id)){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Updated Successfully');
        }
        else{
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Inserted Successfully');
            $this->reset();
        }
    }
}
