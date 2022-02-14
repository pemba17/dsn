<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SaveCategory extends Component
{
    public $category_id, $parent_id, $name;
    public $show_sub_cat=false,$sub_cat_info,$sub_cat_id, $sub_categories;

    public function updatedParentId(){
        if($this->parent_id==null || $this->parent_id==''){
            $this->show_sub_cat=false;
            $this->sub_cat_id="";
        }else{
            $data=Category::where('parent_id',$this->parent_id)->get();
            if($data->isNotEmpty()){
                $this->sub_cat_id="";
                $this->show_sub_cat=true;
                $this->sub_cat_info=$data;
            }else{
                $this->show_sub_cat=false;
                $this->sub_cat_id="";
            }
        }
    }

    public function mount($id=null){
        if(isset($id)){
            $category=Category::findOrFail($id);
            $this->category_id=$category->id;
            $this->name=$category->name;
            $this->sub_categories=$category->sub_categories;

            $trace_sub_categories=array_filter(explode(',',$category->sub_categories));
            if(count($trace_sub_categories)==2){
                $parent=Category::where('id',$trace_sub_categories[0])->first(); // parent
                if($parent){
                    $this->parent_id=$trace_sub_categories[0];
                    $child=Category::where('parent_id',$trace_sub_categories[0])->get();
                    if($child){
                        $this->show_sub_cat=true;
                        $this->sub_cat_info=$child;
                        $this->sub_cat_id=$trace_sub_categories[1];
                    }
                }
            }elseif(count($trace_sub_categories)==1){
                $parent=Category::where('id',$trace_sub_categories[0])->first();
                if($parent) $this->parent_id=$trace_sub_categories[0];
            }else{
                $this->parent_id=$category->parent_id;
            }
        }
    }

    public function saveCategory()
    {
        $this->validate(
            [
                'name' => 'required',
            ]
        );
        if($this->parent_id!=null || $this->parent_id!=""){
            if($this->sub_cat_id!=null || $this->sub_cat_id!=""){
                $this->sub_categories=implode(',',[
                    $this->parent_id,($this->sub_cat_id)
                ]);
                $this->parent_id=$this->sub_cat_id;
            }else{
                $this->sub_categories=$this->parent_id;
            }
        }
        else{
            $this->sub_categories=NULL;
        }

        Category::updateOrCreate(['id' => $this->category_id], [
            'name' => $this->name,
            'parent_id' =>($this->parent_id==null || $this->parent_id=="")?null:$this->parent_id,
            'sub_categories'=>$this->sub_categories,
            'user_id'=>auth()->user()->id,
            'slug'=>SlugService::createSlug(Category::class, 'slug', $this->name),
        ]);

        if(isset($this->category_id)){
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
        $category=Category::find($this->category_id);
        $categories=Category::whereNull('parent_id')->when($category,function($q,$cat){
            $q->where('id','!=',$cat->id);
        })->get();

        return view('livewire.save-category', compact('categories') );
    }
}
