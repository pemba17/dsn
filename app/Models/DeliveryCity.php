<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryCity extends Model
{
    use HasFactory;
    protected $fillable = ['region_id','city_name','delivery_price','inside_valley'];

    public function region(){
        return $this->belongsTo(DeliveryRegion::class,'region_id');
    }
}
