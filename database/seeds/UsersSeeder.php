<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Users\Role::class, 4)->create();
        factory(\App\Models\Users\User::class, 25)->create();
    }
}
