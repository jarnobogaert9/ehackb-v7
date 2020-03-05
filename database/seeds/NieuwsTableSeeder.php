<?php

use Illuminate\Database\Seeder;

class NieuwsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Nieuws::class)->create([
            'title' => 'Delaware als sponsor confirmed!'
        ]);

        factory(App\Nieuws::class)->create([
            'title' => 'AC/DSteve treedt op op EhackB!'
        ]);

        factory(App\Nieuws::class)->create([
            'title' => 'Talk Mike Derycke over zijn liefde voor SAP'
        ]);

        factory(App\Nieuws::class)->create([
            'title' => 'Wedstrijd Geert zijn pc hacken'
        ]);

        factory(App\Nieuws::class, 3)->create();
    }
}
