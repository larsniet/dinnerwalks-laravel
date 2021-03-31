<?php

namespace Database\Factories;

use App\Models\Walk;
use App\Models\Boeking;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Walk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "locatie" => $this->faker->randomElement($array = array("noordwijk", "katwijk")),
            "beschrijving" => $this->faker->sentence,
        ];
    }
}
