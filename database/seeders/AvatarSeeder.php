<?php

namespace Database\Seeders;

use App\Models\Avatar;
use App\Models\Item;
use App\Models\ItemOwnership;
use App\Models\User;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Avatar $avatar */
        $avatar = $user->avatars()->first();

        /** @var Item $sword */

        $sword = Item::factory()->createOne([
            'name'  => 'excalibur',
        ]);

        ItemOwnership::query()->create([
            'avatar_id'     => $avatar->id,
            'backpack_id'   => $avatar->backpack_id,
            'item_id'       => $sword->id
        ]);
    }
}
