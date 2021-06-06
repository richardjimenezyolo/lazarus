<?php

namespace Tests\Feature;

use App\Models\Avatar;
use App\Models\Item;
use App\Models\ItemOwnership;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AvatarTest extends TestCase
{
    protected const AVATAR_STRUCTURE = [
        "data" => [
            "id",
            "user_id",
            "health_points",
            "backpack" => [
                "id",
                "avatar_id",
                "created_at",
                "updated_at",
                "items" => [
                    '*' => [
                        "id",
                        "avatar_id",
                        "backpack_id",
                        "item_id",
                        "created_at",
                        "updated_at",
                        "item" => [
                            "id",
                            "name",
                            "description",
                            "hit_points",
                            "defensive_points",
                            "image",
                            "created_at",
                            "updated_at",
                        ]
                    ]
                ]
            ]
        ]
    ];
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAvatarBackpack()
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
            'backpack_id'   => $avatar->backpack->id,
            'item_id'       => $sword->id
        ]);

        Sanctum::actingAs($user);

        $response = $this->getJson("api/avatar/{$avatar->id}");
        $response->assertOk();
        $response->assertJsonStructure(self::AVATAR_STRUCTURE);
    }
}
