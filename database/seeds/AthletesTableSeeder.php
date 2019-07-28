<?php

use Illuminate\Database\Seeder;

class AthletesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Athlete', 100)->create();
    }
}
