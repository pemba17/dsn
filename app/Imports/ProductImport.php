<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Product;

class ProductImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            Product::create([
                'name'=>$row['product_name'],
                'mrp_from'=>intval($row['minimum_mrp']),
                'mrp_to'=>intval($row['max_mrp']),
                'cost_price'=>intval($row['cost_price']),
                'stock'=>20,
                'user_id'=>1
            ]);
        }

        echo "done";
    }
}
