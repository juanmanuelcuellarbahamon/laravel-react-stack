<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidateApiKeyTest extends TestCase
{
    /**
     * Test access with a valid API key.
     */
    public function test_access_with_valid_api_key()
    {
        $response = $this->withHeaders([
            'API-Key' => config('app.api_key'),
        ])->getJson('/api/locations');


        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => [
                'code',
                'name',
                'image',
                'created_at',
                'updated_at',
                'creationDate',
            ],
        ]);
    }

    /**
     * Test access with a missing API key.
     */
    public function test_access_with_missing_api_key()
    {
        $response = $this->getJson('/api/locations');

        $response->assertStatus(400)
            ->assertJson([
                'error' => 'Missing API Key',
                'message' => 'The API-Key header is required.',
            ]);
    }

    /**
     * Test access with an invalid API key.
     */
    public function test_access_with_invalid_api_key()
    {
        $response = $this->withHeaders([
            'API-Key' => 'wrong-api-key',
        ])->getJson('/api/locations');

        $response->assertStatus(401)
                 ->assertJson([
                     'error' => 'Invalid API Key',
                     'message' => 'The provided API key is incorrect. Check your credentials.',
                 ]);
    }
}