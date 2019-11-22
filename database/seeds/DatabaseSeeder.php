<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SponsorsTableSeeder::class,
            GamesTableSeeder::class,
            TalksTableSeeder::class,
            TeamsTableSeeder::class,
            UsersTableSeeder::class,
            TeamrequestsTableSeeder::class
        ]);
    }
}
