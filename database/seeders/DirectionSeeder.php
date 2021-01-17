<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\Etape;
use App\Models\Livrable;
use App\Models\User;
use Database\Factories\EtapeFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Direction::factory()
        ->hasActions(3)
        ->create();

        User::factory()->count(10)->create();

        Etape::factory()->count(10)->create();

        Livrable::factory()->count(10)->create();
    }
}
