<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\lessons;
use Faker\Generator as Faker;

$factory->define(lessons::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'parent_id' => $faker->randomDigitNotNull,
        'type_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
