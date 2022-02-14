<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewProduct extends Component
{
    public function render()
    {
        return view('livewire.view-product')->layout('layouts.front');
    }
}
