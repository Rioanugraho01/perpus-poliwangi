<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        //membuat user baru
        $user = new \App\Models\User([
            'name' => 'budi',
            'email'=> 'budi@gmail.com',
            'password'=>'budi1234'
        ]);

        //pergi kehalaman login dan login
        $user ->save();
        $response = $this->get('/login',[
            'email' => 'budi@gmail.com',
            'password' => 'budi123'
        ]);
        $response->assertStatus(200);
    }

        // logout
    public function test_logout(){
        $user = new \App\Models\User;
        $this->actingAs($user);
        $response = $this->post('/logout');

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->assertGuest();
    }
}
