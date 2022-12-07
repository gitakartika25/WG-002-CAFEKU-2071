<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/beranda');

        $response->assertStatus(200);
    }

    public function test_register() {
        $response = $this->post('/register', [
            'name' => 'gitakartikaa',
            'email' => 'gitakartika1912@gmail.com',
            'password' => 'gitakartika123',
            'password_confirmation' => 'gitakartika123',
            'role_id' => 1,
        ]);
        $response->assertRedirect('/home');
    }

    public function test_login() {
        $response = $this->post('/login', [
           
            'email' => 'gitakartika1912@gmail.com',
            'password' => 'gitakartika123',
           
        ]);
        $response->assertRedirect('/home');
    }
}
