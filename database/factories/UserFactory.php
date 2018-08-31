<?php

use Faker\Generator as Faker;
use App\Products;
use App\ProductProperty;
use App\Media;
use App\ProductMedia;
use App\CategoryProperty;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Products::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'category_id' => rand(1, 5),
        'price' => $faker->randomFloat,
        'name' => $name,
        'title' => ucfirst($name),
        'description' => $faker->text,
        'created_at' => $faker->time('Y-m-d H:i:s')
    ];
});

$factory->define(ProductProperty::class, function (Faker $faker) {
    $category = CategoryProperty::all()->random(1)->first();
    return [
        'product_id' => rand(1, 50),
        'name' => $category->name,
        'title' => $category->title,
        'value' => $faker->sentence,
        'created_at' => $faker->time('Y-m-d H:i:s')
    ];
});

$factory->define(Media::class, function (Faker $faker) {
    return [
        'path' => $faker->imageUrl()
    ];
});

$factory->define(ProductMedia::class, function (Faker $faker) {
    return [
        'product_id' => rand(1, 50),
        'media_id' => $faker->unique()->numberBetween(1, 200),
        'type' => 'simple'
    ];
});
