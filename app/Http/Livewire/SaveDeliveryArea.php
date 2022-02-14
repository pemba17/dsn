<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DeliveryCity;
use App\Models\DeliveryArea;


class SaveDeliveryArea extends Component
{
    public $city_name,$areas=[],$edit_areas=[],$ids=[];
    public $city_id,$titlePage;
    public function mount($id=null){
        if($id){
            $this->city_id=$id;
            $city=DeliveryCity::findOrFail($this->city_id);
            $this->titlePage='Edit City';
            $this->edit_areas=DeliveryArea::select('id','area_name')
                                ->where('city_id',$this->city_id)
                                ->get()
                                ->toArray();

            $this->city_name=$city->city_name;
        }else{
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.save-delivery-area');
    }

    public function saveArea(){
        $this->validate([
            'city_name'=>['required','string','max:255']
        ]);

        $data=DeliveryCity::updateOrCreate(['id'=>$this->city_id],[
            'city_name'=>$this->city_name
        ]);

        DeliveryArea::whereIn('id',$this->ids)
                        ->delete();

        foreach($this->areas as $row){
            DeliveryArea::updateOrCreate(['id'=>$row['id']],[
                'area_name'=>$row['area'],
                'city_id'=>$this->city_id
            ]);
        }

        if(isset($this->city_id)){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Updated Successfully');
        }
        else{
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Inserted Successfully');
            $this->reset();
        }
        $this->ids=[];
    }
}
