<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employees;
use App\Companies;
use Faker\Generator as Faker;

$factory->define(Employees::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company_id' => function() use ($faker) {
            if (Companies::count())
                return $faker->randomElement(Companies::pluck('id')->toArray());
            else return factory(Companies::class)->create()->id;
        },
        'email'=> $faker->unique()->safeEmail,
        'phone'=> $faker->e164PhoneNumber,
    ];
});
