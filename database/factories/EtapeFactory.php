<?php

namespace Database\Factories;

use App\Models\Action;
use App\Models\Etape;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtapeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etape::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'libelle' => $this->faker->sentence(1),
            'action_id'=> $this->faker->numberBetween(1, count(Action::all())),
            'responsable_id'=> $this->faker->numberBetween(1,count(Action::all())),
        ];
    }
}
