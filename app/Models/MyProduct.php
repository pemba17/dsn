<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class MyProduct extends Model
{
    protected $fillable=['product_id','user_id'];
    protected $table='my_products';
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class,'id','product_id');
    }

    public static function addToMyProducts($product_id){
        $data=MyProduct::updateOrCreate([
            'product_id'=>$product_id,
            'user_id'=>auth()->user()->id
        ],[
            'product_id'=>$product_id,
            'user_id'=>auth()->user()->id
        ]);

        return $data;
    }
}
