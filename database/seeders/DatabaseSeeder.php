<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Walk;
use App\Models\Customer;
use App\Models\Booking;
use Database\Seeders\HorecaSeeder;
use Database\Seeders\WalkSeeder;
use Database\Seeders\DiscountCodeSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PodcastSeeder;
use Database\Seeders\UserRoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(20)->create();
        $this->call([
            LocationSeeder::class,
            DiscountCodeSeeder::class,
            WalkSeeder::class,
            UserSeeder::class,
            CateringSeeder::class,
            FaqSeeder::class,
            PodcastSeeder::class,
            RoleSeeder::class,
            UserRoleSeeder::class
        ]);

        $customers = Customer::factory()
            ->count(100)
            ->create();
        foreach ($customers as $key => $customer) {
            Booking::factory()
                ->count(1)
                ->for($customer)
                ->create();
        }

        $bookings = Booking::all();
        foreach ($bookings as $key => $booking) {
            $booking->discount_code = $booking->walk->discountcode->code . '-' . $booking->walk->id . $booking->customer->id;
            $booking->save();
        }
    }
}
