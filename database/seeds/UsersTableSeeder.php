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

        factory(App\User::class)->create([
            'username' => 'kassabeheerder',
            'first_name' => 'Test',
            'last_name' => 'kassabeheerder',
            'email' => 'test.kassa@student.ehb.be',
            'password' => Hash::make('Azerty123'),
            'role' => 1
        ]);

        factory(App\User::class)->create([
            'username' => 'admin',
            'first_name' => 'Test',
            'last_name' => 'Admin',
            'email' => 'test.admin@student.ehb.be',
            'password' => Hash::make('Azerty123'),
            'role' => 2
        ]);

        factory(App\User::class)->create([
            'username' => 'superadmin',
            'first_name' => 'Test',
            'last_name' => 'Superadmin',
            'email' => 'test.superadmin@student.ehb.be',
            'password' => Hash::make('Azerty123'),
            'role' => 3
        ]);
    }
}
