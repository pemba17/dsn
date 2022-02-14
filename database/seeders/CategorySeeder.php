<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'Electronics',
            'Fashion',
            'Clothing',
            'Digital',
            'Stationery'
        ];

        foreach($data as $row){
            Category::create([
                'name'=>$row,
                'user_id'=>1,
                'slug'=>lcfirst($row)
            ]);
        }
    }
}
