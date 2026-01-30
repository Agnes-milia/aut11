<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_users(): void
    {
        $response = $this->withoutMiddleware()->get('/api/users');
        $response->assertStatus(200);
    }

    public function test_user_profile() : void {
            $user = User::factory()->create([
                'role' => 1,
            ]);
            $response = $this->actingAs($user)->get('/api/profile');
            $response->assertStatus(200);
        }

    public function test_user_post(): void
    {
        $data = User::factory()->raw();
        $this
        ->withoutMiddleware()
        ->postJson('/api/users', $data)
        ->assertCreated();
    }


    public function test_users_auth() : void {
            //$this->withoutExceptionHandling(); 
            // create rögzíti az adatbázisban a felh-t
            $admin = User::factory()->create([
                'role' => 0,
            ]);
            $response = $this->actingAs($admin)->getJson('/api/users');
            $response->assertStatus(200);
        }

    public function test_one_user_auth() : void {
            //$this->withoutExceptionHandling(); 
            // create rögzíti az adatbázisban a felh-t
            $admin = User::factory()->create([
                'role' => 0,
            ]);
            $response = $this->actingAs($admin)->getJson('/api/users/'.$admin->id);
            $response->assertStatus(200);
        }

        
        
}
