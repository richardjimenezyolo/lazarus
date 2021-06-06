<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserTest extends TestCase
{

    protected function makeUser()
    {
        /** @var User $user */
        $user = User::factory()->createOne();
        return $user;
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserLogin()
    {
        /** @var User $user */
        $user = User::factory()->createOne();

        $response = $this->postJson('api/login', [
            'email'     => $user->email,
            'password'  => 'password',
            'device'    => 'test'
        ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'token'
        ]);
    }

    public function testUserShow()
    {
        $user = $this->makeUser();
        Sanctum::actingAs($user);
        $response = $this->getJson('api/user');
        $response->assertOk();
        $response->assertJsonFragment([
            'name'  => $user->name,
            'email' => $user->email,
        ]);
        $response->assertJsonCount(1, $response->json('avatars'));
    }
}
