<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text(300),
    ];
});


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::get()->random(1)[0]->id,
        'category_id' => \App\Category::get()->random(1)[0]->id,
        'title' => $faker->sentence(4),
        'description' => $faker->text(300),
    ];
});


$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::get()->random(1)[0]->id,
        'post_id' => \App\Post::get()->random(1)[0]->id,
        'post' => $faker->text(),
    ];
});


