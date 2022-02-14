<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;
    public $search_categories, $category;
    public $show_sub_cat = false, $parent_id, $cId;

    public $key1;
    public function render()
    {
        $categories=Category::when(auth()->user()->role=='vendor',function($q){
            $q->where('user_id',auth()->user()->id);
        })->orderBy('created_at','desc')->paginate(20);
        return view('livewire.category-table', compact('categories'));
    }
}



