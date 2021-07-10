<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        for ($i=0; $i < count($users); $i++) { 
            if (($users[$i]->email !== 'admin@dinnerwalks.nl')) {
                DB::table('user_roles')->insert([
                    'user_id' => $users[$i]->id,
                    'role_id' => Role::where('name', 'catering')->first()->id
                ]);
            } else {
                DB::table('user_roles')->insert([
                    'user_id' => User::where('email', 'admin@dinnerwalks.nl')->first()->id,
                    'role_id' => Role::where('name', 'admin')->first()->id
                ]);
            }
        }
    }
}
