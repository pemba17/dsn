<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'Hot Deals',
            'Brand New',
            'New Arrival',
            'Below 100'
        ];

        foreach($data as $row){
            Tag::create([
                'name'=>$row
            ]);
        }
    }
}
