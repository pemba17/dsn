<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\MyProduct;
use App\Models\Category;

class ProductLists extends Component
{
    public $numResults = 1;

    public $min_price,$max_price;

    public $openFilter=false;

    public function filter(){
        $this->openFilter=false;
    }

    public function loadMore()
    {
        $this->numResults = $this->numResults + 1;
    }
    public function render()
    {
        $categories=Category::has('product')->with('product')->get();

        if(($this->min_price!=NULL || $this->min_price!='') && ($this->max_price!=NULL || $this->max_price!='')){
            $prices=[
                $this->min_price,$this->max_price
            ];
        }else{
            $prices=null;
        }
        return view('livewire.product-lists',compact('categories','prices'));
    }

    public function addToMyProducts($product_id){
        $data=MyProduct::addToMyProducts($product_id);
        if($data){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Product Added To My Products');
        }  
    }
}
