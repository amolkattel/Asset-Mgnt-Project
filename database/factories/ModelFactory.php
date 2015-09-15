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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'is_admin' => 0,
        'status' => 1,
        'department_id' => factory('App\Department')->create()->id,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Department::class, function (Faker\Generator $faker) {
    return [
        'department_name' => $faker->company,
    ];
});

$factory->define(App\Asset::class, function (Faker\Generator $faker) {
    return [
        'asset_name' => $faker->name,
        'department_id' => factory('App\Department')->create()->id,
        'description' => $faker->paragraph,
        'location' => $faker->address,
    ];
});
