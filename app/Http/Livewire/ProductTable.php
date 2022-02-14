<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;
    public $search_products;
    public function render()
    {
        $products=Product::orderBy('created_at','desc')->when(auth()->user()->role=='vendor',function($q){
            $q->where('user_id',auth()->user()->id);
        })->paginate(20);
        return view('livewire.product-table',compact('products'));
    }

}
