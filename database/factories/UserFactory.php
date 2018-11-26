<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username'=>$faker->userName,
        'email' => $faker->unique()->safeEmail,
        'phoneNo'=>'123456789',
        'bio'=>$faker->text(80),
        'status'=>'1',
        'confirmed'=>'1',
        'avatar'=>$faker->imageUrl(100, 100),
        'password' => bcrypt('123456'), // secret
        'remember_token' => str_random(10),
    ];
});
