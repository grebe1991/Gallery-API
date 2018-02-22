<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    public function testRequiresEmailAndLogin()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.']
                ]
            ]);
    }

    public function testUserLoginsSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'grebenita@gmail.com',
            'password' => bcrypt('im2bad4u'),
        ]);
        $payload = ['email' => 'grebenita@gmail.com', 'password' => 'im2bad4u'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token'
                ]
            ]);
    }
}
