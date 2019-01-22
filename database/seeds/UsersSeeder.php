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
        factory('App\Models\Users\User', 25)->create();
        factory('App\Models\Users\Role', 4)->create();
    }
}
