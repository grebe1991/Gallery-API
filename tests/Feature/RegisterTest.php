<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testsRegistersSuccessfully()
    {
        $payload = [
            'first_name' => 'Vladin',
            'last_name' => 'Grebenita',
            'email' => 'grebenita@gmail.com',
            'password' => 'im2bad4u',
            'password_confirmation' => 'im2bad4u',
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);
        ;
    }

    public function testsRequiresPasswordEmailAndName()
    {
        $this->json('post', '/api/register')
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'first_name' => [
                        0 => 'The first name field is required.'
                    ],
                    'last_name' => [
                        0 => 'The last name field is required.'
                    ],
                    'email' => [
                        0 => 'The email field is required.'
                    ],
                    'password' => [
                        0 => 'The password field is required.'
                        ]
            ]
            ]);
    }

    public function testsRequirePasswordConfirmation()
    {
        $payload = [
            'first_name' => 'Vladin',
            'last_name' => 'Grebenita',
            'email' => 'grebenita@gmail.com',
            'password' => 'im2bad4u',
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'password' => [
                        0 => 'The password confirmation does not match.'
                    ],
                ]
            ]);
    }
}
