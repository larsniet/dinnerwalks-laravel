<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Boeking;
use App\Models\Customer;
use App\Models\Walk;
use App\Models\Kortingscode;

class BoekingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Boeking::class;

    public function customerid()
    {
        return $this->state(function (array $attributes) {
            return [
                'customer_id' => $attributes,
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $personen = $this->faker->numberBetween($min = 1, $max = 2);
        if ($personen === 2) {
            $bedrag = 7;
        } else {
            $bedrag = 3.50;
        }

        $walk = Walk::all()->random();
        $walk->aantal_geboekt += 1;
        $walk->omzet += $bedrag;
        $walk->save();

        return [
            "datum" => $this->faker->dateTimeBetween($startDate = '-3 week', $endDate = '+3 week', $timezone = null),
            "kortingscode" => $walk->kortingscode,
            "unieke_code" => $this->generateRandomString(12),
            "status" => $this->faker->randomElement(['Betaald', 'Afgebroken']),
            "personen" => $personen,
            "prijs_boeking" => $bedrag,
            "walk_id" => $walk->id,
            "customer_id" => $this->customerid()
        ];
    }

    public function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
