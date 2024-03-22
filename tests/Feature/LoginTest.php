<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    

    public function test_registration_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();
    

        $this->actingAs($user);
    
        $response = $this->get('/login');
    
        $response->assertStatus(200);
    }

}
