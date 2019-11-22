<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 2)->create();
        factory(App\Team::class, 2)->create(['user_id' => 3]);
    }
}
