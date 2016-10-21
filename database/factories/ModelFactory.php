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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Addresses\Address::class, function(Faker\Generator $faker) {
    return [
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->locale,
        'postal_code' => $faker->postcode,
        'country' => $faker->country
    ];
});

$factory->define(App\Booths\Booth::class, function (Faker\Generator $faker) {
    return [
      'number' => $faker->randomDigit(),
      'cost' => $faker->numberBetween(),
      'latitude' => $faker->latitude,
      'longitude' => $faker->longitude,
      'width' => $faker->numberBetween(8, 40),
      'depth' => $faker->numberBetween(8, 40)
    ];
});

$factory->define(App\Locations\Location::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'map' => $faker->uuid,
    ];
});

$factory->define(App\Customers\Customer::class, function(Faker\Generator $faker) {
   return [
       'name' => $faker->name,
       'phone_number' => $faker->phoneNumber,
       'email' => $faker->email
   ];
});

$factory->define(App\Expos\Expo::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->paragraph,
        'start_date' => $faker->dateTimeBetween('now', '1 year'),
        'end_date' => $faker->dateTimeBetween('now', '1 year')
    ];
});