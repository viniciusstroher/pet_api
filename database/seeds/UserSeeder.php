<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
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
	        'name' => 'admin',
	        'email' =>  'admin@admin.com',
	        'password' => Hash::make('admin'),
	        'api_token' => hash('sha256','admin'),
	        'created_at' => Carbon\Carbon::now(),
	    ]);

    }
}
