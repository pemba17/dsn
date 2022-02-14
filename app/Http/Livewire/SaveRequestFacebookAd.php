<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RequestFacebookAd;

class SaveRequestFacebookAd extends Component
{
    public $from_age=18, $to_age=19,$gender="All",$page_link,$post_link,$dollar,$target_audience,$age_group,$request_id;

    public function save(){
        $age_group=[
            $this->from_age,
            $this->to_age
        ];

        $this->validate([
            'page_link'=>['required'],
            'post_link'=>['required'],
            'dollar'=>['required','numeric'],
            'target_audience'=>['required']
        ]);

       $data= RequestFacebookAd::updateOrCreate(['id'=>$this->request_id],[
           'page_link'=>$this->page_link,
           'post_link'=>$this->post_link,
           'dollar'=>$this->dollar,
           'target_audience'=>$this->target_audience,
           'age_group'=>implode('-',$age_group),
           'gender'=>$this->gender,
           'user_id'=>auth()->user()->id
       ]);

       if($this->request_id){
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
        for($i=18; $i<=65;$i++){
            $age[]=$i;
        }
        return view('livewire.save-request-facebook-ad',compact('age'));
    }
}
