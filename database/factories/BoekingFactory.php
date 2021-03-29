<?php

namespace Database\Factories;

use App\Models\Boeking;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class BoekingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Boeking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "datum" => $this->faker->dateTime($max = 'now', $timezone = null),
            "kortingscode" => "Bruinvis-1",
            "locatie" => $this->faker->randomElement($array = array("noordwijk", "katwijk")),
            "personen" => 2,
            "bedrag_betaald" => 3.50,
            "customer_id" => Customer::all()->random()->id,
        ];
    }
}
