<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;
    

    public function test_medication_panel_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();
    

        $this->actingAs($user);
    
        $response = $this->get('/medication-panel');
    
        $response->assertStatus(200);
    }
    public function test_index_screen_can_be_rendered_(): void
    {
        $user = User::factory()->create();
    

        $this->actingAs($user);
    
        $response = $this->get('/');
    
        $response->assertStatus(200);
    }
 
    public function test_admin_panel_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();
    
        $this->actingAs($user);
    
        $response = $this->get('/admin-panel');
    
        $response->assertStatus(200);
    }

    public function test_admin_panel_can_create_user(): void
    {
        $user = User::factory()->create();
    
        $response = $this->actingAs($user)->post('/adduser', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'pass' => 'password123',
            'isAdmin' => false,
            'isManager' => false,
        ]);
    
        $response->assertStatus(201);
        $response->assertJson([
            'message' => 'User added successfully',
            'user' => [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'pass' => 'password123',
                'isAdmin' => false,
                'isManager' => false,
            ]
        ]);
    }    
}