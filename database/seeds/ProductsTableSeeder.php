<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class)->create([
            'id' => 0,
            'name' => 'Geld opladen',
            'photo' => '324_money.jpg',
            'price' => 0
        ]);

        factory(App\Product::class, 10)->create();
    }
}
