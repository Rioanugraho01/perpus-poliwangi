<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     //pergi kehalaman regitrasi
    public function test_registrasi()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Sign up');
    }
    // 200 oke
    //300 ke halaman lain
    //400 kesalahan di client
    //500 kesalahan di server

    // membuat akun pengunjung
    public function test_pendaftaran_pengujung() {
        $data = [
            'name' =>'Doni',
            'email' =>'doni@gmail.com',
            'password'=>'donidoni123',
            'password_confirmation'=>'donidoni123'
            // 'status'=>'mahasiswa',
            // 'prodi'=>'Teknik Informatika'
        ];

        $response = $this->post('/register', $data);
        $response->assertStatus(302);
        $response->assertRedirect('home');
    }
}
