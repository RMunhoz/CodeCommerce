<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Product;
//use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('products')->truncate();
        factory('CodeCommerce\Product',40)->create();

        /*
        $faker = Faker::create();

        foreach(range(1,40) as $i)
        {
        	Product::create([
    			'name' => $faker->word,
		    	'description' => $faker->sentence,
		    	'price' => $faker->randomNumber(2),
		    	'featured' => $faker->boolean,
		    	'recommend' => $faker->boolean,
		        'category_id' => $faker->numberBetween(1,15),	
        	]);
        }
        */

    }

}
