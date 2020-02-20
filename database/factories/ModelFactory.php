<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        'published_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Block::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'order' => $faker->randomNumber(5),
        'post_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'data' => ['en' => $faker->sentence],
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Menu::class, function (Faker\Generator $faker) {
    return [
        'label' => $faker->sentence,
        'url' => $faker->sentence,
        'type' => $faker->sentence,
        'order' => $faker->randomNumber(5),
        'parent_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'published_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Hero::class, function (Faker\Generator $faker) {
    return [
        'template' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'post_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Slide::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'hero_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'fields' => ['en' => $faker->sentence],
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Meta::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'content' => $faker->sentence,
        'property' => $faker->sentence,
        'post_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Block::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'group' => $faker->sentence,
        'html' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'fields' => ['en' => $faker->sentence],
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Block::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'group' => $faker->sentence,
        'html' => $faker->text(),
        'order' => $faker->randomNumber(5),
        'post_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'fields' => ['en' => $faker->sentence],
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Slide::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'hero_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'html' => ['en' => $faker->sentence],
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Slide::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'hero_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'html' => $faker->text(),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Slide::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'hero_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'fields' => ['en' => $faker->sentence],
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Slide::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'fields' => $faker->text(),
        'hero_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Contact::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'company' => $faker->sentence,
        'project_details' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Setting::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'fields' => ['en' => $faker->sentence],
        
    ];
});

