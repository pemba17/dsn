<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\MyProduct;

class MyProducts extends Component
{
    public function render()
    {
        $details=Product::select('*','products.id as id')->leftJoin('my_products','products.id','my_products.product_id')->where('my_products.user_id',auth()->user()->id)->orderBy('my_products.id','desc')->get();
        return view('livewire.my-products',compact('details'));
    }

    public function removeProduct($id){
        MyProduct::where('id',$id)->delete();
        $this->emit('message');
        $this->dispatchBrowserEvent('notify','Removed Successfully');
    }
}
