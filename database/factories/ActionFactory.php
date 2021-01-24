<?php

namespace Database\Factories;

use App\Models\Action;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Action::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'direction_id' => \App\Models\Direction::factory()->create(),
            'nom' => $this->faker->name(),
            'objectif' => $this->faker->sentence(2),
            'impact' => $this->faker->paragraph(),
            'responsable_id'=> $this->faker->numberBetween(1,count(User::all())),
        ]; 
    }
}
