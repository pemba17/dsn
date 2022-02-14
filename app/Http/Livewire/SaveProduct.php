<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Livewire\WithFileUploads;
use App\Models\ProductVariation;

class SaveProduct extends Component
{
    use WithFileUploads;
    public $product_id,$name,$cost_price,$mrp_from,$mrp_to,$description,$categoryId,$filename,$tag,$stock;
    // get old images
    public $old_product_images;

    // for sub categories
    public $sub_cat1,$sub_cat2,$show_cat1=false,$show_cat2=false,$sub_cat1_details,$sub_cat2_details;

    public $product_variations=[],$edit_product_variations=[],$ids=[];
    public $has_variations=false;

    public function updatedCategoryId(){
        if($this->categoryId==''){
            $this->sub_cat1='';
            $this->sub_cat2='';
            $this->show_cat1=false;
            $this->show_cat2=false;
        }else{
            $data=Category::where('parent_id',$this->categoryId)->get();
            if($data->isNotEmpty()){
                $this->show_cat1=true;
                $this->sub_cat1_details=$data;
            }else{
                $this->sub_cat1='';
                $this->sub_cat2='';
                $this->show_cat1=false;
                $this->show_cat2=false;
            }
        }
    }

    public function updatedSubCat1(){
        if($this->sub_cat1=='')  {
            $this->sub_cat2='';
            $this->show_cat2=false;
        }
        else{
            $data=Category::where('parent_id',$this->sub_cat1)->get();
            if($data->isNotEmpty()){
                $this->show_cat2=true;
                $this->sub_cat2_details=$data;
            }else{
                $this->sub_cat2='';
                $this->show_cat2=false;
            }
        }
    }

    public function mount($id=null){
        if($id){
            $product=Product::findOrFail($id);
            $this->product_id=$product->id;
            $this->name=$product->name;
            $this->cost_price=$product->cost_price;
            $this->mrp_from=$product->mrp_from;
            $this->mrp_to=$product->mrp_to;
            $this->description=$product->description;
            $this->categoryId=$product->category_id;
            $this->stock=$product->stock;

            $this->edit_product_variations=ProductVariation::select('id','name','price','stock')->where('product_id',$product->id)->get()->toArray();

            if(count($this->edit_product_variations)>0 && $product->has_variations==1) $this->has_variations=true;
            else $this->has_variations=false;

            if($product->tags!=NULL || $product->tags!="") $this->tag=explode(',',$product->tags);
            if($product->filename!=NULL || $product->filename!="") $this->old_product_images=explode(',',$product->filename);

            //sub categories
            $categories_id=explode(',',$product->sub_categories);
            if(count($categories_id)==3){
                $this->categoryId=$categories_id[0];

                $this->show_cat1=true;
                $this->sub_cat1=$categories_id[1];
                $this->sub_cat1_details=Category::where('parent_id',$this->categoryId)->get();

                $this->show_cat2=true;
                $this->sub_cat2=$categories_id[2];
                $this->sub_cat2_details=Category::where('parent_id',$this->sub_cat1)->get();
            }

            elseif(count($categories_id)==2){
                $this->categoryId=$categories_id[0];
                $this->show_cat1=true;
                $this->sub_cat1=$categories_id[1];
                $this->sub_cat1_details=Category::where('parent_id',$this->categoryId)->get();
            }
            else $this->categoryId=$categories_id[0];
        }
    }
    public function render()
    {
        $categories=Category::whereNull('parent_id')->get();
        $tags=Tag::all();
        return view('livewire.save-product',compact('categories','tags'));
    }

    public function save(){
        $this->validate([
            'name'=>['required','string','max:255'],
            'cost_price'=>['required','numeric'],
            'mrp_from'=>['required','numeric'],
            'mrp_to'=>['required','numeric'],
            'categoryId'=>['required','numeric'],
            'sub_cat1'=>(($this->categoryId!=null || $this->categoryId!="") && $this->show_cat1==true)?['required','numeric']:[],
            'sub_cat2'=>(($this->sub_cat1!=null || $this->sub_cat1!="") && $this->show_cat2==true)?['required','numeric']:[],
            'description'=>['nullable','string'],
            'filename.*'=>['nullable','image'],
            'stock'=>['required','numeric','min:1']
        ]);

        if($this->sub_cat2!=null || $this->sub_cat2!='') $cat_id=$this->sub_cat2;
        elseif($this->sub_cat1!=null || $this->sub_cat1!='') $cat_id=$this->sub_cat1;
        else $cat_id=$this->categoryId;

        $sub_categories=implode(',',array_filter([$this->categoryId,$this->sub_cat1,$this->sub_cat2]));

        if($this->tag && array_filter($this->tag)){
            $tags=implode(',',$this->tag);
        }else{
            $tags=null;
        }

        // get old images data

        if($this->old_product_images){
            if($this->filename){
                foreach($this->filename as $photo){
                    $images[]=$photo->store('images');
                }
                $images=implode(',',$images).','.implode(',',$this->old_product_images);
            }else{
                $images=implode(',',$this->old_product_images);
            }
        }else{
            if($this->filename){
                foreach($this->filename as $photo){
                    $images[]=$photo->store('images');
                }
                $images=implode(',',$images);
            }else{
                $images=null;
            }
        }

        $product=Product::updateOrCreate(['id'=>$this->product_id],[
            'name'=>$this->name,
            'cost_price'=>$this->cost_price,
            'mrp_from'=>$this->mrp_from,
            'mrp_to'=>$this->mrp_to,
            'description'=>$this->description,
            'category_id'=>$cat_id,
            'tags'=>$tags,
            'filename'=>$images,
            'sub_categories'=>($sub_categories!=null || $sub_categories!="")?$sub_categories:NULL,
            'has_variations'=>($this->has_variations==true)?1:0,
            'stock'=>$this->stock,
            'user_id'=>auth()->user()->id
        ]);

        ProductVariation::whereIn('id',$this->ids)
                        ->delete();

        if($product->has_variations==1 && $this->product_variations){
            foreach($this->product_variations as $row){
                ProductVariation::updateOrCreate(['id'=>$row['id']],[
                    'name'=>$row['name'],
                    'product_id'=>$product->id,
                    'price'=>$row['price'],
                    'stock'=>$row['stock']
                ]);
            }
        }

        if($this->product_id){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Updated Successfully');
            if($product->filename!=NULL || $product->filename!="") $this->old_product_images=explode(',',$product->filename);
            $this->filename=null;

        }else{
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Inserted Successfully');
            $this->reset();
        }
    }

    public function deleteImage($index){
        $product=Product::find($this->product_id);
        if($product){
            if(file_exists(public_path().'/'.$this->old_product_images[$index])){
                unlink(public_path().'/'.$this->old_product_images[$index]);
            }
            unset($this->old_product_images[$index]);
            $product->update([
                'filename'=>implode(',',$this->old_product_images)
            ]);
        }
        if($product->filename!=NULL || $product->filename!="") $this->old_product_images=explode(',',$product->filename);
    }


}
