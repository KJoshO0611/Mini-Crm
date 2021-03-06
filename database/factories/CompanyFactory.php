<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Companies;
use Faker\Generator as Faker;

$factory->define(Companies::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'logo'=> 'noimage.jpg',
        'website'=> 'FakeCompany.com',
    ];
});
