<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Jam;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->define(Jam::class, function (Faker $faker) {
    return [
        'jam' => $faker->jam,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
