<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KelolaUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Read_admin()
    {
        $nama = 'admin';
        $user = \App\Models\User::where('name', $nama)->first();
        $this->actingAs($user);
        $response = $this->get('/login',[
            'email' => 'admin@gmail.com',
            'password' => 'admin123'
        ]);
        // // $response = $this->get('/');

        $response->assertStatus(300);
        $response = $this->get('user.show');
        $response->assertSee('Tambah Akun');

    }
    public function test_create_data(){
        // $response->assertStatus('300');
        $nama = 'admin';

        $user = \App\Models\User::where('name', $nama)->first();
        $this->actingAs($user);

        $prodi = 'tidak ada';
        $status = 'umum';
        $alamat = 'poliwangi';
        $password = 'fitri1234';
        $data = [
            'name' => 'fitri',
            'email' => 'fitri@gmail.com',
            'prodi'=> $prodi,
            'status'=> $status,
            'alamat' => $alamat,
            'password'=> $password,
        ];
        // $response = $this->get('user.show');
        // $response->assertSee('Gambar');
        $response = $this->post('user.create', $data);
        $response->assertStatus(302);
    }
}
