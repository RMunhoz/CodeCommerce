<?php

use Illuminate\Database\Seeder;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create(
        	[
        		'name' => 'Rogerio Munhoz',
    			'email' => 'rogerio_munhoz@hotmail.com.br',
    			'password' => Hash::make(123456)
        	]
        );
    	
    	factory('CodeCommerce\User',10)->create();
    }
}
