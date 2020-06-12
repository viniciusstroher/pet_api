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
	        // 'api_token' => hash('sha256','admin'),
            'api_token' => '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918',
	        'created_at' => Carbon\Carbon::now(),
	    ]);

    }
}
