<?php

namespace App\Observers;

use App\Models\Avatar;

class AvatarObserver
{
    public function creating(Avatar $avatar)
    {
        $avatar->position = [
            'x' => 0,
            'y' => 0
        ];
    }
    public function created(Avatar $avatar)
    {
        $avatar->backpack()->create([
            'avatar_id' => $avatar->id
        ]);
    }
}
