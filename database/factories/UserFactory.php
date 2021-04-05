<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Admin Dinnerwalks",
            'email' => "admin@dinnerwalks.nl",
            'email_verified_at' => now(),
            'password' => Hash::make("dinnerpass"), // password
            'remember_token' => Str::random(10),
        ];
    }
}
