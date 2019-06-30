<?php

use App\Models\Team\Announcement;
use App\Models\Team\TeamEvent;
use Illuminate\Database\Seeder;

class TeamAdministrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Announcement::class, 5)->create();
        factory(TeamEvent::class, 5)->create();
    }

}
