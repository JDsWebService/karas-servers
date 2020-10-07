<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
|--------------------------------------------------------------------------
| Users Table Columns
|--------------------------------------------------------------------------
| str  $provider
| str  $provider_id
| str  $username
| str  $discriminator
| str  $fullusername
| str  $avatar
| str  $email
| bool  $email_verified
| str  $locale
| bool  $twofactor
|
*/

$factory->define(User::class, function (Faker $faker) {
    $username = $faker->userName;
    $discriminator = $faker->randomNumber(4, true);
    $fullusername = $username . "#" . $discriminator;
    return [
        'provider' => 'discord',
        'provider_id' => $faker->unique()->numerify('##################'),
        'username' => $username,
        'discriminator' => $discriminator,
        'fullusername' => $fullusername,
        'avatar' => $faker->imageURL(128, 128, 'cats'),
        'email' => $faker->unique()->freeEmail,
        'email_verified' => $faker->boolean,
        'locale' => $faker->locale,
        'twofactor' => $faker->boolean,
        'remember_token' => Str::random(60),
        'created_at' => $faker->dateTimeBetween('-30days', 'now'),
    ];
});
