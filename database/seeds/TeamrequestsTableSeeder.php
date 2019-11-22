<?php

use Illuminate\Database\Seeder;

class TeamrequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 3; $i < 8; $i++){
            factory(App\Teamrequest::class)->create(['team_id' => 2, 'user_id' => $i]);
        }
    }
}
