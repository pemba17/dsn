<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\DeliveryCity;
use App\Models\DeliveryArea;
use App\Models\User;
use App\Models\OrderProduct;

use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use HasFactory,LogsActivity;
    protected $guarded=[];

    public function o_city(){
        return $this->belongsTo(DeliveryCity::class,'cities');
    }

    public function o_creator()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public static function getDailyOrders($attributes){
        return Order::when(auth()->user()->role=="seller",function($q){
            $q->where('user_id',auth()->user()->id);
        })->whereDate($attributes,date('Y-m-d'))->count();
    }

    public function orderProduct(){
        return $this->hasMany(OrderProduct::class,'order_id','id');
    }

    protected static $logAttributes = ['id','order_status'];

    protected static $logName = "Order";

    protected static $logOnlyDirty = 'true';


}
