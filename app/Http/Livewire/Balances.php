<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Balance;
use App\Models\CodRequest;
use App\Models\Order;
use App\Models\Bank;

class Balances extends Component
{
    public $account_number,$account_name,$bank,$amount,$open=false,$error;

    public function mount(){
        if(auth()->user()->account_number!=NULL || auth()->user()->account_number!='') $this->account_number=auth()->user()->account_number;
        if(auth()->user()->account_name!=NULL || auth()->user()->account_name!='') $this->account_name=auth()->user()->account_name;
        if(auth()->user()->bank_id!=NULL || auth()->user()->bank_id!='') $this->bank=auth()->user()->bank_idco;
    }

    public function save(){
        $this->validate([
            'account_name'=>['required','string','max:255'],
            'account_number'=>['required','numeric'],
            'bank'=>['required'],
            'amount'=>['required','numeric','min:1']
        ]);
        CodRequest::create([
            'account_number'=>$this->account_number,
            'account_name'=>$this->account_name,
            'amount'=>$this->amount,
            'bank_id'=>$this->bank,
            'user_id'=>auth()->user()->id
        ]);

        // get delivered orders

        $delivered_order=Order::where('user_id',auth()->user()->id)->where('order_status','delivered')->get();
        foreach($delivered_order as $do){
            Balance::where('order_id',$do->id)
                    ->update(['payment_status'=>'paid']);
        }

        $this->reset();
        $this->emit('message');
        $this->dispatchBrowserEvent('notify','Cod Requested Successfully');
    }

    public function hide(){
        $this->reset();
        $this->resetErrorBag();
    }

    public function render()
    {
        $balances=Balance::select('*','balances.id as id','products.name as product_name','balances.cost_price as cost_price','balances.created_at as created_at')
        ->leftJoin('products','balances.product_id','products.id')
        ->leftJoin('orders','balances.order_id','orders.id')
        ->leftJoin('users','balances.user_id','users.id')
        ->when(auth()->user()->role=="seller",function($q){
            $q->where('balances.user_id',auth()->user()->id);
        })->get();     
        
        
        // get confirmed balance which is delivered

        $total_confirmed_balance=Balance::leftJoin('orders','balances.order_id','orders.id')->where('order_status','delivered')->where('balances.user_id',auth()->user()->id)->whereNull('payment_status')->sum('balance');

        // $returned_sum=Balance::leftJoin('orders','balances.order_id','orders.id')->where('order_status','returned')->where('balances.user_id',auth()->user()->id)->sum('delivery_charge');

        // $total_confirmed_balance=$total_confirmed_balance-$returned_sum;

        $this->amount=$total_confirmed_balance;

        $banks=Bank::where('status',0)->get();

        return view('livewire.balances',compact('balances','total_confirmed_balance','banks'));
    }
}
