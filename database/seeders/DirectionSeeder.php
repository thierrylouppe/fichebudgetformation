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
        User::factory()->count(10)->create();

        Direction::factory()->count(5)->create();

        Direction::factory()
        ->hasActions(20)
        ->create();

        

        Etape::factory()->count(10)->create();

        Livrable::factory()->count(10)->create();
    }
}
