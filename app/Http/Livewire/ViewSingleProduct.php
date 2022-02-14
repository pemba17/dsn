<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\MyProduct;

class ViewSingleProduct extends Component
{
    public $product_id;
    public function mount($id){
        $product=Product::findOrFail($id);
        if($product) $this->product_id=$id;
    }
    public function render()
    {
        $single_product=Product::find($this->product_id);

        $single_product_variation=ProductVariation::where('product_id',$this->product_id)->get();
        
        return view('livewire.view-single-product',compact('single_product','single_product_variation'));
    }

    public function addToMyProducts($product_id){
        $data=MyProduct::addToMyProducts($product_id);
        if($data){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Product Added To My Products');
        }
    }
}
