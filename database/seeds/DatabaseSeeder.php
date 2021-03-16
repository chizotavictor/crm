<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
   
        // \App\User::create([

        //     'name' => 'Admin Admin',

        //     'email' => 'admin@admin.com',

        //     'password' => bcrypt('pasword')

        // ]);
        
        for ($i=0; $i < 10; $i++) { 

	    	\App\Employee::create([
                'company_id' =>  1,
	            'name' => Str::random(8) . ' ' . Str::random(3),

	            'email' => Str::random(12).'@mail.com',

	            'phone_number' => '07041481364',

	        ]);

    	}
    }
}
