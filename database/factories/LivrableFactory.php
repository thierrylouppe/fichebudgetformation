<?php

namespace Database\Factories;

use App\Models\Etape;
use App\Models\Livrable;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivrableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livrable::class;

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
            'etape_id'=> $this->faker->numberBetween(1, count(Etape::all())),
        ];
    }
}
