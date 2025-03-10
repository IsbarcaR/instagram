<?php

namespace App\Policies;

use App\Models\Foto;
use App\Models\User;

class FotoPolicy
{
    /**
     * Create a new policy instance.
     */

    public function esSuya(User $user, Foto $foto)
    {
        return $user->id === $foto->user_id;
    }
}
