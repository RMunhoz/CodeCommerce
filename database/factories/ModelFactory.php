<?php

$factory->define(CodeCommerce\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeCommerce\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
    ];
});

$factory->define(CodeCommerce\Product::class, function (Faker\Generator $faker) {
    return [
    	'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomFloat(4,1,4),
        'featured' => $faker->boolean,
        'recommend' => $faker->boolean,
        'category_id' => $faker->numberBetween(1, 15),
    ];
});
