<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\DeliveryCity;

class CityImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            DeliveryCity::create([
                'region_id'=>1,
                'city_name'=>$row['city_name'],
                'delivery_price'=>150,
                'inside_valley'=>2
            ]);
        }

        echo "Inserted";
    }
}
