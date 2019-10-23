<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
	        [   
	        	'name' => 'Elshat',
	        	'email' => 'elshat90@mail.ru',
	        	'password' => bcrypt('123456789'),
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'role' => '1'
	        ]
    	]);
    }
}
