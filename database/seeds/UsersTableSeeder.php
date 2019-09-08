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
	DB::table('users')->insert([
		'name' => "Default User",
		'email' => "root@laravel.com",
		'password' => bcrypt('password'),
		'address' => "address",
		'zip_code' => "111111",
		'city_id' => 1,
		'state_id' => 1,	
	]);
    }
}
