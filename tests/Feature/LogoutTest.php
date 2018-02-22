<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class LogoutTest extends TestCase
{
    public function testUserIsLoggedOutProperly()
    {
        // Simulating login
        $user = factory(User::class)->create(['email' => 'grebenita@gmail.com']);
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        // Testing if logged in
        $this->json('get', '/api/albums', [], $headers)->assertStatus(200);

        // Testing logging out
        $this->json('post', '/api/logout', [], $headers)->assertStatus(200);
        $user = User::find($user->id);
        $this->assertEquals(null, $user->api_token);
    }

    public function testUserWithNullToken()
    {
        // Simulating login
        $user = factory(User::class)->create(['email' => 'grebenita@gmail.com']);
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        // Simulating logout
        $user->api_token = null;
        $user->save();

        $this->json('get', '/api/albums', [], $headers)->assertStatus(401);
    }
}
