<?php

use Illuminate\Database\Seeder;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
          'username' => 'ピカチュウ',
          'mail' => 'pika@pika',
          'password' => bcrypt('pikapika'),
        ]);
    }
}
