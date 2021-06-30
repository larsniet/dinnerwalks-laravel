<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use Str;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'DinnerAdmin',
            'email' => "admin@dinnerwalks.nl",
            'email_verified_at' => now(),
            'password' => Hash::make("dinnerpass"),
            'remember_token' => Str::random(10),
        ]);
    }
}
