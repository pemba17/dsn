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
            // $this->delivery_areas=DeliveryArea::where('city_id',$this->cities)->get();
            // if($this->delivery_areas->isNotEmpty()){
            //     $this->show_area=true;
            // }
        }else{
            // $this->show_area=false;
            $this->cities='';
            // $this->area='';
            $this->delivery_charge='';
        }
    }
    public function updatedCod(){
        if(is_numeric($this->cod)){
            $this->selling_price=$this->cod+$this->prepaid_amount;
        }
    }

    public function updatedPrepaidAmount(){
        if(is_numeric($this->prepaid_amount)){
            $this->selling_price=$this->cod+$this->prepaid_amount;
        }
    }

    public function updatedProductId(){
        if($this->product_id!=NULL || $this->product_id!=""){
            $product=Product::find($this->product_id);
            if($product){
                // check if variations exits
                $pv=ProductVariation::where('product_id',$product->id)->get();
                if($product->has_variations==1 && $pv->isNotEmpty()){
                    $this->cost_price=null;
                    $this->product_reduce_stock=0;
                    $this->show_variations=true;
                    $this->product_variations_details=$pv;
                }else{
                    $this->show_variations=false;
                    $this->product_variations_details=null;
                    $this->cost_price=$product->cost_price;
                    $this->product_reduce_stock=$product->stock;
                }
            }
        }else{
            $this->cost_price=null;
            $this->product_reduce_stock=0;
        }
    }

    public function updatedProductVariations(){
        if($this->product_variations==NULL || $this->product_variations!=""){
            $pv=ProductVariation::find($this->product_variations);
            if($pv){
                $this->cost_price=$pv->price;
                $this->product_reduce_stock=$pv->stock;
            }
        }

        if($this->product_variations==""){
            $this->cost_price=null;
            $this->product_reduce_stock=0;
        }
    }

    public function save(){
        $this->validate(
            [
                'product_id'=>['required','numeric'],
                'quantity'=>['required','numeric','min:1'],
                'customer_name'=>['required','string','max:255'],
                'customer_contact_no'=>['required','numeric','digits_between:7,10'],
                'cod'=>['required','numeric'],
                'cities'=>['required','numeric'],
                'area'=>['nullable','string','max:255'],
                'prepaid_amount'=>['nullable','numeric','min:0']
            ]
        );
        $order=Order::updateOrCreate(['id'=>$this->order_id],[
            'product_id'=>$this->product_id,
            'user_id'=>auth()->user()->id,
            'customer_name'=>$this->customer_name,
            'customer_contact_no'=>$this->customer_contact_no,
            'quantity'=>$this->quantity,
            'cod'=>$this->cod,
            'prepaid_amount'=>$this->prepaid_amount,
            'cities'=>$this->cities,
            'area'=>$this->area,
            'delivery_instructions'=>$this->delivery_instructions,
            'delivery_charge'=>$this->delivery_charge,
            'product_variation_id'=>($this->product_variations!=NULL || $this->product_variations!="")?$this->product_variations:NULL,
            'confirmed_at'=>date('Y-m-d H:i:s')
            ]
        );

        if(!$this->order_id){
            if($this->product_variations!=NULL || $this->product_variations!=""){
                $pv=ProductVariation::where('id',$this->product_variations)->first();
                ProductVariation::where('id',$this->product_variations)->update(['stock'=>($pv->stock==0)?0:$this->product_reduce_stock-$this->quantity]);
            }else{
                $product=Product::where('id',$this->product_id)->first();
                Product::where('id',$this->product_id)->update(['stock'=>($product->stock==0)?0:$this->product_reduce_stock-$this->quantity]);
            }
        }

        $balance=Balance::updateOrCreate(['order_id'=>$this->order_id],[
            'product_id'=>$order->product_id,
            'order_id'=>$order->id,
            'user_id'=>$order->user_id,
            'balance'=>$this->cod-$this->cost_price-$this->delivery_charge, // receivable amount without prepaid
            'total'=>$this->selling_price-$this->cost_price-$this->delivery_charge, // with prepaid
            'cost_price'=>$this->cost_price
        ]);

        $this->reset();
        $this->emit('message');
        $this->dispatchBrowserEvent('notify','Orders Created Successfully');
    }

    public function render()
    {
        $users=User::all();
        $products=Product::all();
        $myproducts=Product::select('*')->leftJoin('my_products','products.id','my_products.product_id')->where('my_products.user_id',auth()->user()->id)->get();
        $delivery_cities=DeliveryCity::orderBy('id','desc')->get();
        return view('livewire.orders',compact('products','myproducts','delivery_cities'));
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
}
