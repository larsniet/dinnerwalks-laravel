<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Walk;
use App\Models\DiscountCode;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    // public function customerid()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'customer_id' => $attributes,
    //         ];
    //     });
    // }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $personen = $this->faker->numberBetween($min = 1, $max = 4);
        if ($personen === 2) {
            $bedrag = 7;
        } else if ($personen === 1) {
            $bedrag = 3.50;
        } else if ($personen === 3) {
            $bedrag = 10.50;
        } else if ($personen === 4) {
            $bedrag = 14.00;
        }

        $walk = Walk::all()->random();
        $walk->amount_booked += 1;
        $walk->revenue += $bedrag;
        $walk->save();

        return [
            "walk_id" => $walk->id,
            "date" => $this->faker->dateTimeBetween($startDate = '-3 week', $endDate = '+3 week', $timezone = null),
            "unique_code" => $this->generateRandomString(12),
            "amount_persons" => $personen,
            "price" => $bedrag,
            "status" => $this->faker->randomElement(['Betaald', 'Afgebroken']),
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
