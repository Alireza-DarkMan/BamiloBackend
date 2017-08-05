<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function(Faker\Generator $faker) {
	return [
		'title' => $faker->unique()->name,
		'desc' => $faker->sentence
	];
});

$factory->define(App\Models\Attribute::class, function(Faker\Generator $faker) {
	return [
		'title' => $faker->unique()->name,
		'desc' => $faker->sentence
	];
});

$factory->define(App\Models\Product::class, function(Faker\Generator $faker) {
	$img = $faker->image(storage_path('app/public/images'), 500, 600, null, false);

	return [
		'category_id' => function () {
	            return factory(App\Models\Category::class)->create()->id;
	      },
		'title' => $faker->unique()->name,
		'model' => $faker->sentence(3),
		'img_url' => $img,
		'desc' => $faker->text,
		'price' => $faker->numberBetween(1000, 100000),
		'quantity' => $faker->numberBetween(0, 100),
		'status' => ['NOT_AVAILABLE', 'AVAILABLE', 'COMMING_SOON'][$faker->numberBetween(0, 2)]
	];
});