<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Producer::class, function (Faker $faker) {
    return [
        'producer_name'=>$faker->name,
        'producer_image'=>$faker->imageUrl(),
        'producer_phone'=>random_int(10000,99999),
        'producer_email'=>$faker->email,
        'active'=> 1
    ];
});
