<?php

use Illuminate\Database\Seeder;
use App\Models\Properties\Meets\Host;

class MeetPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Host::class, 10)->create();
    }
}
