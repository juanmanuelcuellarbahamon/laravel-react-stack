<?php

namespace Tests\Feature;

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class LocationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the DB::select query in the index method with the required header.
     */
    public function testIndexSelectQuery()
    {
        // Insert sample data into the database
        DB::table('locations')->insert([
            ['name' => 'Location 1', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Location 2', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Define the required header
        $headers = [
            'API-Key' => config('app.api_key'), 
        ];

        // Send a GET request with the header
        $response = $this->getJson('/api/locations', $headers);

        // Debug the response if it fails
        if (!$response->isSuccessful()) {
            dump($response->getContent());
        }

        // Assert the response structure
        $response->assertStatus(200)
            ->assertJsonCount(2)
            ->assertJsonFragment(['name' => 'Location 1'])
            ->assertJsonFragment(['name' => 'Location 2']);
    }
}