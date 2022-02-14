<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Balance;

class Title extends Component
{
    protected $listeners=['message'=>'render'];
    public $total_balance,$returned_sum;
    public function render()
    {
        $this->total_balance=Balance::totalBalanceSeller();
        $this->returned_sum=Balance::totalReturnedSeller();
        $this->total_balance=$this->total_balance-$this->returned_sum;

        return view('livewire.title');
    }
}
