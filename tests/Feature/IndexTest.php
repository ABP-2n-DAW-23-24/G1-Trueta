<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    

    public function test_registration_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();
    

        $this->actingAs($user);
    
        $response = $this->get('/');
    
        $response->assertStatus(200);
    }
    public function test_registration_screen_can_be_rendered_(): void
    {
        $user = User::factory()->create();
    

        $this->actingAs($user);
    
        $response = $this->get('/profile');
    
        $response->assertStatus(200);
    }
 
}
