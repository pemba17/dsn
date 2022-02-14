<?php

namespace App\Http\Livewire;

use App\Models\Balance;
use App\Models\MyProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Excel;
use App\Exports\OrderBulkExport;
use App\Models\DeliveryCity;

class ViewOrders extends Component
{
    public $order_id,$selected_order_status="confirmed",$start_date,$end_date,$search_product_id,$search_name;
    public $selectedOrder=[];
    public $selectAll=false;
    public $showfilter = false;
    public $assigned_delivery;
    public $location;

    public function changeSeletedStatus($status){
        $this->selected_order_status=$status;
    }

    public function updatedSelectAll($value)
    {
        $this->selectedOrder = $value ?
            $this->orders->pluck('o_id')->map(fn($id) => (string) $id)
        : [];
    }

    public function updateOrderStatus($status){
        if($this->selectedOrder== null){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Please Select Order');
        }

        elseif($this->selected_order_status=="confirmed" && ($this->assigned_delivery== null || $this->assigned_delivery=='') && $status=='dispatched'){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Please Select Delivery');
        }

        else{
            foreach($this->selectedOrder as $row){
                $order= Order::where('id',$row)->first();
                $order->update([
                    "order_status"=>$status,
                    "assigned_delivery"=>$this->assigned_delivery
                ]);

                if($status=="dispatched") $order->update(['dispatched_at'=>date('Y-m-d H:i:s')]);
                if($status=="delivered") $order->update(['delivered_at'=>date('Y-m-d H:i:s')]);
                if($status=="returned") $order->update(['returned_at'=>date('Y-m-d H:i:s')]);
                if($status=="cancelled") $order->update(['cancelled_at'=>date('Y-m-d H:i:s')]);

                $this->emit('message');
                $this->dispatchBrowserEvent('notify','Order Moved To '. $status. ' Successfully');
            }
            $this->selectedOrder=[];
            $this->selectAll='';
            $this->assigned_delivery='';
        }  
    }

    public function getOrdersProperty()
    {
        return Order::has('o_city','orderProduct')->with('o_city','orderProduct')->select('*','orders.id as o_id','orders.created_at as o_date')
        ->when(auth()->user()->role=='seller',function($q){ 
            return $q->where('orders.user_id',auth()->user()->id);
        })
        ->when($this->search_product_id,function($q){
            return $q->where('products.id',$this->search_product_id);
        })
        ->when($this->search_name,function($q){
            return $q->where('products.name', 'like', '%'.$this->search_name.'%')
            ->orWhere('orders.customer_name', 'like', '%'.$this->search_name.'%');
        })
        ->when($this->location,function($q){
            return $q->where('orders.cities',$this->location);
        })
        ->when($this->start_date,function($q){
            $q->when($this->end_date,function($k){
                return $k->whereBetween(DB::raw('DATE(orders.created_at)'),array($this->start_date,$this->end_date));
        });
       
        })->where('order_status',$this->selected_order_status)->get();
    }

    public function exportOrders(){
        if($this->selectedOrder==null){
            $this->emit('message');
            $this->dispatchBrowserEvent('notify','Please Select An Order');
        }
        else{
            return Excel::download(new OrderBulkExport($this->selectedOrder), 'orders.xlsx');
        }
    }

    public function filterData(){

    }
    public function render()
    {
        dd($this->orders);

        $myproducts=Product::leftJoin('my_products','products.id','my_products.product_id')->where('my_products.user_id',auth()->user()->id)->get();

        $delivery_cities=DeliveryCity::orderBy('id','desc')->get();

        return view('livewire.view-orders',['orders'=>$this->orders,'myproducts'=>$myproducts,'delivery_cities'=>$delivery_cities]);
    }


}
