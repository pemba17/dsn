<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\MyProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use DB;
use App\Models\DeliveryCity;

class Dashboard extends Component
{
    public function mount(){
        if(auth()->user()->role=='vendor') return redirect()->to('view-products');
    }
    public function render()
    {
        //today's new confirmed orders
        $new_confirmed_orders = Order::whereDate('created_at',date('Y-m-d'))->where('order_status','confirmed')->
        when(auth()->user()->role=='seller',function($q){
            $q->where('user_id',auth()->user()->id);
        })->count();
        //all time confirmed orders
        $total_confirmed_orders = Order::where('order_status','confirmed')->when(auth()->user()->role=='seller',function($q){
            $q->where('user_id',auth()->user()->id);
        })->count();
        //all time delivered orders
        $total_delivered_orders = Order::where('order_status','delivered')->when(auth()->user()->role=='seller',function($q){
            $q->where('user_id',auth()->user()->id);
        })->count();
        //all time returned orders
        $total_returned_orders = Order::where('order_status','returned')->when(auth()->user()->role=='seller',function($q){
            $q->where('user_id',auth()->user()->id);
        })->count();
        //total confirmed order this week
        $total_confirmed_order_this_week = Order::where('order_status','confirmed')->when(auth()->user()->role=='seller',function($q){
            $q->where('user_id',auth()->user()->id);
        })->where('created_at', '>', Carbon::now()->startOfWeek())
        ->where('created_at', '<', Carbon::now()->endOfWeek())->count();
        //all time orders
        $total_orders = Order::when(auth()->user()->role=='seller',function($q){
            $q->where('user_id',auth()->user()->id);
        })->count();
        //total my products

        if(auth()->user()->role=='seller'){
            $my_products = MyProduct::where('user_id',auth()->user()->id)->count();
        }    
        else{
            $my_products = Product::count();
        }    
        //confirmed to delivered in percentage
        // $c2d = ($total_confirmed_orders / $total_delivered_orders) * 100;

        $c2d=0;

        $total_sales=Order::when(auth()->user()->role=='seller',function($q){
            $q->where('user_id',auth()->user()->id);      
        })->sum(\DB::raw('cod + prepaid_amount'));

        $daily_orders=[
            Order::getDailyOrders('confirmed_at'),
            Order::getDailyOrders('dispatched_at'),
            Order::getDailyOrders('delivered_at'),
            Order::getDailyOrders('returned_at'),
            Order::getDailyOrders('cancelled_at')
        ];

        $daily_orders="'" . implode("','", $daily_orders) . "'";

        $daily_delivery_by_city=Order::select(DB::raw("COUNT(*) as count"), DB::raw("cities"))
        ->when(auth()->user()->role=="seller",function($q){
            $q->where('user_id',auth()->user()->id);
        })->whereDate('created_at',date('Y-m-d'))->groupBy('cities')->get()->toArray();

        if(count($daily_delivery_by_city)>0){
            $daily_delivery_city_count=array_column($daily_delivery_by_city,'count');
            $daily_delivery_city_count="'" . implode("','", $daily_delivery_city_count) . "'";
            
            $cities=array_column($daily_delivery_by_city,'cities');
            $cities=DeliveryCity::whereIn('id',$cities)->pluck('city_name')->toArray();
            $cities="'" . implode("','", $cities) . "'";
        }else{
            $daily_delivery_city_count=null;
            $cities=null;
        }

        $daily_products_delivered=Order::select(DB::raw("COUNT(*) as count"), DB::raw("product_id"))
        ->when(auth()->user()->role=="seller",function($q){
            $q->where('user_id',auth()->user()->id);
        })->whereDate('created_at',date('Y-m-d'))->groupBy('product_id')->get()->toArray();

        if(count($daily_products_delivered)>0){
            $daily_delivered_products_count=array_column($daily_products_delivered,'count');
            $daily_delivered_products_count="'" . implode("','", $daily_delivered_products_count) . "'";
            
            $products=array_column($daily_products_delivered,'product_id');
            $products=Product::whereIn('id',$products)->pluck('name')->toArray();


            foreach($products as $p){
                $colors[]= ("#".substr(md5(rand()), 0, 6))."";
            }
            
            $colors="'" . implode("','", $colors) . "'";
            $products="'" . implode("','", $products) . "'";

        }else{
            $daily_delivered_products_count=null;
            $products=null;
            $colors=null;
        }

        
        return view('livewire.dashboard',
        compact('new_confirmed_orders','total_delivered_orders','total_returned_orders','total_confirmed_order_this_week',
        'total_orders','my_products', 'c2d','total_sales','daily_orders','daily_delivery_city_count','cities',
        'daily_delivered_products_count','products','colors'
    ));
    }
}
