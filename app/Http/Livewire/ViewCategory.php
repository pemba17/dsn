<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class ViewCategory extends Component
{
    public $category_id,$categories;
    public function mount($slug){
        $this->categories=Category::with('product')->where('slug',$slug)->first();
        if(!$this->categories)  abort(404);

    }
    public function render()
    {
        return view('livewire.view-category');
    }
}
