<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'  => 'Product1',
                'price' =>  40.55
            ],
            [
                'name'  => 'Product2',
                'price' =>  80.00
            ]
        ];
        Product::insert($data);
    }
}
