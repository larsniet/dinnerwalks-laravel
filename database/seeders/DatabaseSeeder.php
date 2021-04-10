<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Walk;
use App\Models\Customer;
use App\Models\Boeking;
use Database\Seeders\HorecaSeeder;
use Database\Seeders\WalkSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        Team::factory()->create();
        $this->call([
            WalkSeeder::class,
            HorecaSeeder::class,
            FaqSeeder::class
        ]);
        Customer::factory()->count(40)
                ->hasBoeking(1, function (array $attributes, Customer $customer) {
                    return ['customer_id' => $customer->id];
                })
                ->create();

    }
}
