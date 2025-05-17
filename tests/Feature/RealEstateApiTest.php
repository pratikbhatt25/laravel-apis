<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\RealEstate; 
use Tests\TestCase;

class RealEstateApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_real_estates()
    {
        $response = $this->getJson('/api/real-estates');
        $response->assertStatus(200)->assertJsonStructure([
            '*' => ['id', 'name', 'real_state_type', 'city', 'country']
        ]);
    }

    public function test_can_create_real_estate()
    {
        $data = RealEstate::factory()->make()->toArray();
        $response = $this->postJson('/api/real-estates', $data);
        $response->assertStatus(201)->assertJsonFragment(['name' => $data['name']]);
    }

    public function test_can_show_real_estate()
    {
        $estate = RealEstate::factory()->create();
        $this->getJson("/api/real-estates/{$estate->id}")
            ->assertStatus(200)
            ->assertJsonFragment(['id' => $estate->id]);
    }

    // public function test_can_update_real_estate()
    // {
    //     $estate = RealEstate::factory()->create();
    
    //     $response = $this->putJson("/api/real-estates/4", [
    //         'name' => 'Updated Name',
    //         'real_state_type' => $estate->real_state_type,
    //         'street' => $estate->street,
    //         'external_number' => $estate->external_number,
    //         'internal_number' => $estate->internal_number,
    //         'neighborhood' => $estate->neighborhood,
    //         'city' => $estate->city,
    //         'country' => $estate->country,
    //         'rooms' => $estate->rooms,
    //         'bathrooms' => $estate->bathrooms,
    //     ]);
        
    
    //     $response->assertStatus(200)
    //              ->assertJsonFragment(['name' => 'Updated Name']); // ✅ check if update worked
    // }

    public function test_can_soft_delete_real_estate()
    {
        $estate = RealEstate::factory()->create();
        $this->deleteJson("/api/real-estates/{$estate->id}")
            ->assertStatus(200)
            ->assertJsonFragment(['id' => $estate->id]);

        $this->assertSoftDeleted('real_estates', ['id' => $estate->id]);
    }
}
