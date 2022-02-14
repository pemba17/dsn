<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Features;
use Livewire\WithPagination;

class ViewFeatures extends Component
{

    public function render()
    {
        $features=Features::orderBy('created_at','desc')->paginate(20);
        return view('livewire.view-features',compact('features'));
    }
}
