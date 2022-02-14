<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;
use App\Models\OrderComment;

class OrderDetails extends Component
{
    public $order_id,$comment,$open=false;
    public function mount($id)
    {
        $this->order_id=$id;
    }
    public function render()
    {
        $order_comments=OrderComment::with('user')->where('order_id',$this->order_id)->get();

        $activities = Activity::select('*', 'activity_log.created_at AS activity_created_at')
            ->where('subject_id', $this->order_id)
            ->where('log_name', 'Order')
            ->orderBy('activity_log.id')
            ->get();
    
        $order = Order::where('id',$this->order_id)->first();
        $order_products = Order::where('orders.id',$this->order_id)
                        ->leftJoin('products','orders.product_id','products.id')
                        ->get();
        if($order){
            return view('livewire.order-details',compact('order','order_products','activities','order_comments'));
        }
        else{
            abort(404);
        }
    }

    public function orderComment(){

        $this->validate([
            'comment'=>['required']
        ]);
        
        OrderComment::create([
            'user_id'=>auth()->user()->id,
            'comment'=>$this->comment,
            'order_id'=>$this->order_id   
        ]);
        $this->emit('message');
        $this->dispatchBrowserEvent('notify','Orders Commented Successfully');
        $this->hide();
    }

    public function hide(){
        $this->open=false;
        $this->comment='';
        $this->resetErrorBag();
    }
}
