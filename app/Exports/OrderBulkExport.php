<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderBulkExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $selectedOrder;
    public function __construct($selectedOrder)
    {
        $this->selectedOrder = $selectedOrder;
    }

    public function collection()
    {
        DB::statement('SET @count:=0');
        return Order::select(
            DB::raw('@count:=@count+1  AS serial_number'),
            'orders.id',
            'orders.customer_name',
            'orders.order_from',
            'delivery_cities.city_name',
            'orders.area',
            'orders.customer_contact_no',
            'customer_contact_no2',
            'products.name',
            'orders.cod',
            'orders.delivery_instructions'

        )
        ->leftJoin('delivery_cities', 'delivery_cities.id', '=', 'orders.cities')
        ->leftJoin('products','products.id','=','orders.product_id')
        ->whereIn('orders.id',$this->selectedOrder)
        ->get();
    }

    public function headings(): array
    {
        return [
            'SN',
            'Vendor Ref ID',
            'Name',
            'FROM',
            'TO',
            'Address',
            'Phone',
            'Phone2',
            'Package',
            'COD',
            'Delivery Instruction'
        ];
    }
}
