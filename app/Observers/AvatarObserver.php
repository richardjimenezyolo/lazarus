<?php

namespace App\Observers;

use App\Models\Avatar;

class AvatarObserver
{
    public function created(Avatar $avatar)
    {
        $avatar->backpack()->create([
            'avatar_id' => $avatar->id
        ]);
    }
}
