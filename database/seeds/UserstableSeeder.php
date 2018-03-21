<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'name' => 'admin',
          'password' => bcrypt('admin'),
          'email' => 'admin@forum.dev',
          'admin' => 1,
          'avatar' => '/avatars/avatar.png'
        ]);

        App\User::create([
          'name' => 'Iulian Dornianu',
          'password' => bcrypt('password'),
          'email' => 'iuliandornianu97@yahoo.com',
          'admin' => 1,
          'avatar' => '/avatars/avatar.png'
        ]);
    }
}
