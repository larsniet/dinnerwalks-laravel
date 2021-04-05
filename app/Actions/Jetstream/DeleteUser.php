<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\DB;
use App\Models\Horeca;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        Horeca::where('id', $user->horeca_id)->delete();
        DB::transaction(function () use ($user) {
            $user->delete();
        });
    }
}
