<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mail' => $faker->email,
        'age' => mt_rand(5, 100) ,
        'created_at' => Carbon::today(),
    ];
});
