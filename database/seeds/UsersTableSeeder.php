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
      \App\User::create([
      	'name'=> 'Rahmat Hidayat',
      	'username'=>'rahmatrh',
      	'password'=>bcrypt('password'),
      	'email'=>'rahmattrust@gmail.com'
      ]);
    }
}
