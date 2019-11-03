<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'role_id'        => rand(1, 3),
        'is_active'      => rand(0, 1),
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(\Illuminate\Support\Str::random(10)),
        'remember_token' => \Illuminate\Support\Str::random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => $faker->numberBetween(1, 20),
        'category_id' => $faker->numberBetween(1, 3),
        'photo_id'    => $faker->numberBetween(1, 10),
        'title'       => $faker->sentence(7, 11),
        'content'     => $faker->paragraphs(rand(10, 15), true),
        'slug'        => $faker->slug
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['admin','author', 'subscriber ','fucker', 'asshole', 'unicorn'])
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['love', 'women', 'blond', 'brunette', 'redhead', 'cats', 'dogs'])
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id'   => $faker->numberBetween(1, 10),
        'is_active' => $faker->numberBetween(0, 1),
        'author'    => $faker->name(),
        'email'     => $faker->safeEmail(),
        'text'      => $faker->paragraph(2),
    ];
});

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        'comment_id' => $faker->numberBetween(1, 10),
        'is_active'  => $faker->numberBetween(0, 1),
        'author'     => $faker->name(),
        'email'      => $faker->safeEmail(),
        'text'       => $faker->sentence(5, 10),
    ];
});

