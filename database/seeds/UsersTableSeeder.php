<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
        factory(App\User::class, 5)->create()->each(function ($user){
            $user->subscribed_talks()->attach([1, 2, 3]);
            $user->teams()->attach(1);
        });
        factory(App\User::class, 3)->create()->each(function ($user){
            $user->subscribed_talks()->attach([5, 6, 7]);
            $user->teams()->attach([3, 4]);
        });
    }
}
