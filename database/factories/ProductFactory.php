<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    $categories = \App\Category::all()->pluck('id')->toArray();
   
    return [
        'name' => $title,
        'slug' => Str::slug($title, '-'),
        'img' => 'https://loremflickr.com/320/240',
        'price' => $faker->randomFloat(2, 0, 1000),
        'description' => $faker->paragraphs(3, true),
        'recommended' => $faker->randomFloat(0, 0, 1),       
        'category_id' => $faker->shuffle($categories)[0],
    ];
});

