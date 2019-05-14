<?php

use App\Models\Users\Role;
use App\Models\Users\User;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    $name = $faker
        ->unique()
        ->randomElement($array = [
            'Viewer',
            'Athlete',
            'Coach',
            'Admin',
        ]);

    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});

$factory->define(User::class, function (Faker $faker) {
    $viewerSlug = Role::where('slug', 'viewer')->firstOrFail();

    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'user_role_id'      => $viewerSlug->id,
        'remember_token'    => str_random(10),
    ];
});
