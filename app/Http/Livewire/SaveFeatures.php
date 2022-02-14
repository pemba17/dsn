<?php

namespace App\Http\Livewire;

use App\Models\Features;
use Livewire\WithFileUploads;
use Livewire\Component;

class SaveFeatures extends Component
{
    use WithFileUploads;

    public $feature_id,$title,$description,$photo,$features;

    public function mount($id=null){
        if($id){
            $this->features=Features::findOrFail($id);
            $this->feature_id=$this->features->id;
            $this->title=$this->features->title;
            $this->description=$this->features->description;
        }
    }

    public function save(){
        $this->validate([
            'title'=>['required','string','max:255'],
            'description'=>['required','string'],
            'photo'=>($this->feature_id)?['nullable','image']:['required','image']
        ]);


        if($this->photo!="" || $this->photo!= NULL ){
            $imageName=$this->photo->store('images');
        }
        else {
            $imageName = $this->features->filename;
        }

        Features::updateOrCreate(['id'=>$this->feature_id],[
            'title'=>$this->title,
            'description'=>$this->description,
            'filename'=>$imageName
        ]);

        if($this->feature_id){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Updated Successfully');
        }else{
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Inserted Successfully');
            $this->reset();
        }
    }

    public function render()
    {
        $features_details=Features::where('id',$this->feature_id)->first();
        return view('livewire.save-features',compact('features_details'));
    }
}
