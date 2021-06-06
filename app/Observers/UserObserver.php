<?php

namespace App\Observers;

use App\Models\Avatar;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->avatars()->create([
            'user_id'   => $user->id,
        ]);

    }
}
