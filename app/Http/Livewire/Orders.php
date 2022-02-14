<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Balance;
use App\Models\DeliveryCity;
use App\Models\DeliveryArea;
use App\Models\ProductVariation;
use App\Models\MyProduct;
use App\Models\Cart;
use App\Models\OrderProduct;
use Livewire\Component;


class Orders extends Component
{
    protected $listeners = [
        'sweetalert' => 'eventFire'
    ];

    public $search, $search_products,$product_id,$order,$users,$shipping_details,$quantity=1,$order_id,$customer_name,$cod=0,$prepaid_amount=0,$cities,$area,$delivery_instructions,$customer_contact_no,$delivery_charge,$cost_price,$selling_price;
    public $delivery_areas,$show_area=false;
    // for variations
    public $show_variations=false,$product_variations,$product_variations_details,$product_reduce_stock=0;
    // show cart
    public $show_cart=false;
    // after cart
    public $final_info=false;
    public $dsn_price,$sp,$net_profit;

    public function mount(){
        if(auth()->user()->role=='seller') {
            $my_products=MyProduct::where('user_id',auth()->user()->id)->count();
            if($my_products==0){
                session()->flash('error','Please Add Product To My Products For Orders');
                return redirect()->to('my-products');
            }
        }
    }

    public function updatedCities(){
        if($this->cities!=NULL || $this->cities!=""){
            $this->area='';
            $city=DeliveryCity::find($this->cities);
            if($city){
                if($city->inside_valley==1){
                    $this->delivery_charge=100;
                }else{
                    $this->delivery_charge=150;
                }
            }
        }else{
            $this->cities='';
            $this->delivery_charge=0;
        }
        $this->net_profit=$this->selling_price-$this->cost_price-$this->delivery_charge;
    }


    public function updatedPrepaidAmount(){
        if(is_numeric($this->prepaid_amount)){
            $this->cod=$this->cod-$this->prepaid_amount;
        }else{
            $this->cod=$this->COD();
        }
    }

    public function updatedProductId(){
        if($this->product_id!=NULL || $this->product_id!=""){
            $product=Product::find($this->product_id);
            if($product){
                // check if variations exits
                $pv=ProductVariation::where('product_id',$product->id)->get();
                if($product->has_variations==1 && $pv->isNotEmpty()){
                    $this->dsn_price=null;
                    $this->product_reduce_stock=0;
                    $this->show_variations=true;
                    $this->product_variations_details=$pv;
                }else{
                    $this->show_variations=false;
                    $this->product_variations_details=null;
                    $this->dsn_price=$product->cost_price;
                    $this->product_reduce_stock=$product->stock;
                }
            }
        }else{
            $this->dsn_price=null;
            $this->product_reduce_stock=0;
        }
    }

    public function updatedProductVariations(){
        if($this->product_variations==NULL || $this->product_variations!=""){
            $pv=ProductVariation::find($this->product_variations);
            if($pv){
                $this->dsn_price=$pv->price;
                $this->product_reduce_stock=$pv->stock;
            }
        }

        if($this->product_variations==""){
            $this->dsn_price=null;
            $this->product_reduce_stock=0;
        }
    }

    public function render()
    {
        $users=User::all();
        $products=Product::all();
        $myproducts=Product::select('*')->leftJoin('my_products','products.id','my_products.product_id')->where('my_products.user_id',auth()->user()->id)->get();
        $delivery_cities=DeliveryCity::orderBy('id','desc')->get();

        $my_carts=Cart::when(auth()->user()->role=="seller",function($q){
            $q->where('user_id',auth()->user()->id);
        })->get();

        return view('livewire.orders',compact('products','myproducts','delivery_cities','my_carts'));
    }

    public function eventFire(){
        // $total_balance=Balance::totalBalanceSeller();
        // $returned_sum=Balance::totalReturnedSeller();
        // $total_balance=$total_balance-$returned_sum;

        // if($total_balance<0 && auth()->user()->role=="seller"){
        //     $this->dispatchBrowserEvent('swal:error',[
        //         'type'=>'error',
        //         'title'=>'Error!',
        //         'text'=>'Your Balance is in negative.'
        //     ]);
        // }    
    }
    
    public function addToCart(){
        $this->validate([
            'product_id'=>['required','numeric'],
            'quantity'=>['required','numeric','min:1'],
            'sp'=>['required','numeric','min:1']
        ]);

        $cart=Cart::where('product_id',$this->product_id)->where('user_id',auth()->user()->id)->first();

        if($cart){
            $cart->update([
                'quantity'=>$cart->quantity+$this->quantity
            ]);
        }else{
            Cart::create([
                'product_id'=>$this->product_id,
                'quantity'=>$this->quantity,
                'selling_price'=>$this->sp,
                'user_id'=>auth()->user()->id,
                'product_variation_id'=>($this->product_variations!=NULL || $this->product_variations!="")?$this->product_variations:NULL,
                'price'=>$this->dsn_price
            ]);
        }

        $this->show_cart=true;
        $this->product_id=null;
        $this->quantity=1;
        $this->sp=null;
        $this->dsn_price=null;
        $this->details();
    }

    public function finalInfo(){

        $this->cod=$this->COD();
        $this->final_info=true;
        $this->details();
    }

    public function placeOrder(){
        $this->validate([
            'customer_name'=>['required','string','max:255'],
            'customer_contact_no'=>['required','numeric','digits_between:7,10'],
            'cities'=>['required','numeric'],
            'area'=>['nullable','string','max:255'],
            'prepaid_amount'=>['nullable','numeric','min:0']
        ]);

        // get order details from carts 

        $order_carts=Cart::when(auth()->user()->role=="seller",function($q){
            $q->where('user_id',auth()->user()->id);
        })->get();

        $order=Order::create([
            'customer_name'=>$this->customer_name,
            'customer_contact_no'=>$this->customer_contact_no,
            'cod'=>$this->cod,
            'prepaid_amount'=>($this->prepaid_amount)?$this->prepaid_amount:0,
            'cities'=>$this->cities,
            'area'=>$this->area,
            'delivery_instructions'=>$this->delivery_instructions,
            'delivery_charge'=>$this->delivery_charge,
            'confirmed_at'=>date('Y-m-d H:i:s'),
            'user_id'=>auth()->user()->id
        ]);

        foreach($order_carts as $oc){
            OrderProduct::create([
                'order_id'=>$order->id,
                'product_id'=>$oc->product_id,
                'product_variation_id'=>$oc->product_variation_id,
                'selling_price'=>$oc->selling_price,
                'quantity'=>$oc->quantity,
                'user_id'=>auth()->user()->id,
                'product_variation_id'=>$oc->product_variation_id
            ]);

            if($oc->product_variations!=NULL || $oc->product_variations!=""){
                $pv=ProductVariation::where('id',$oc->product_variations)->first();
                ProductVariation::where('id',$oc->product_variations)->update(['stock'=>($pv->stock==0)?0:$pv->stock-$oc->quantity]);
            }else{
                $product=Product::where('id',$oc->product_id)->first();
                Product::where('id',$oc->product_id)->update(['stock'=>($product->stock==0)?0:$product->stock-$oc->quantity]);
            }
        }

        // insert into balances

        // total cost price from carts table

      
        
        Balance::create([
            'cost_price'=>$this->cost_price,
            'selling_price'=>$this->selling_price,
            'order_id'=>$order->id,
            'user_id'=>auth()->user()->id,
            'net_profit'=>$this->net_profit,
            'balance'=>$this->cod-$this->cost_price-$this->delivery_charge
        ]);

        // delete the details of cart
        Cart::where('user_id',auth()->user()->id)->delete();
        $this->reset();
        $this->emit('message');
        $this->dispatchBrowserEvent('notify','Orders Created Successfully');
    }

    public function details(){
        $this->cost_price=Cart::where('user_id',auth()->user()->id)->sum(\DB::raw('price * quantity'));
        $this->selling_price=Cart::where('user_id',auth()->user()->id)->sum('selling_price'); // total selling price
        $this->net_profit=$this->selling_price-$this->cost_price-$this->delivery_charge;
    }

    public function removeCart($id){
        Cart::where('id',$id)->delete();
        $this->details();
    }

    public function COD(){
        return Cart::when(auth()->user()->role=="seller",function($q){
            $q->where('user_id',auth()->user()->id);
        })->sum('selling_price');
    }
}
