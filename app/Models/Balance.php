<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $guarded=[];
    use HasFactory;

    public static function totalBalanceSeller(){
        return Balance::leftJoin('orders','balances.order_id','orders.id')->whereNull('payment_status')->   
        when(auth()->user()->role=="seller",function($q){
            $q->where('balances.user_id',auth()->user()->id);
        })->whereNotIn('order_status',['cancelled','returned'])->sum('balance');
    }

    public static function totalReturnedSeller(){
        return Balance::leftJoin('orders','balances.order_id','orders.id')-> 
        when(auth()->user()->role=="seller",function($q){
            $q->where('balances.user_id',auth()->user()->id);
        })->where('order_status','returned')->sum('delivery_charge');
    }
}
