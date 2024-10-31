<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class GeoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_geolokasi()
    {
        $response = $this->get('/login',[
            'email' => 'budi@gmail.com',
            'password' => 'budi123'
        ]);
        $response->assertStatus(200);
    }

    // Testing ini dapat dijalankan setelah Test Login sudah dijalankan
    public function test_Geolokasi_pengunjung(){
        $latitude = -8.303411;
        $longitude = 114.101453;
        $nama = 'budi';
        $prodi = 'tidak ada';
        $status = 'umum';

        // cari name untuk absensi berdasarkan nama
        $user = \App\Models\User::where('name', $nama)->first();
        $this->actingAs($user);

        $data = [
            'name' => $user->name,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'email' => $user->email,
            'prodi' => $prodi,
            'status' => $status,
            'keperluan' => 'ADMINISTRASI LAINNYA',
        ];
        $response = $this->post('/post', $data);
        $response->assertStatus(302);
    }
}
