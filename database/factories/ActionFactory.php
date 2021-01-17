<?php

namespace Database\Factories;

use App\Models\Action;
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
            'budget' => $this->faker->randomNumber(5, false),
            'date_debut' => $this->faker->dateTime(),
            'date_fin' => $this->faker->dateTime(),
            'impact' => $this->faker->paragraph()
        ];
    }
}
