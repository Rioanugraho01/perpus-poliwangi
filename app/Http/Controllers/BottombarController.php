<?php

namespace App\Http\Controllers;

use App\Models\HistoryKunjungan;
use App\Models\Koordinat;
use Illuminate\Http\Request;
use Carbon\Carbon;
use app\Models\User;
use App\Models\Pengunjung;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class BottombarController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    #mulainya presensi
    public function index()
    {
        return view('presensi');
    }

    public function geolokasi() {
        $coordinat1 = Koordinat::pluck('koordinat1');
        $coordinat2 = Koordinat::pluck('koordinat2');
        $coordinat3 = Koordinat::pluck('koordinat3');
        $coordinat4 = Koordinat::pluck('koordinat4');

        $koordinat1 = str_replace(['["', '"]'], '', $coordinat1);
        $koordinat2 = str_replace(['["', '"]'], '', $coordinat2);
        $koordinat3 = str_replace(['["', '"]'], '', $coordinat3);
        $koordinat4 = str_replace(['["', '"]'], '', $coordinat4);
        return view('geolokasi', compact('koordinat1','koordinat2','koordinat3','koordinat4'));
    }
    public function post(Request $request){
        $mytime = Carbon::now();
        $time = $mytime;
    	Pengunjung::create([
            'user_id' =>Auth::user()->id,
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'status' => $request->status,
            'keperluan' => $request->keperluan,
            'time' => $time
        ]);
        // HistoryKunjungan::create([
        //     'user_id' =>Auth::user()->id,
        //     'keperluan' => $request->keperluan,
        //     'tanggal' => $time
        // ]);
        return redirect()->route('history.kunjungan')->with('success', 'Data berhasil disimpan.');
        // app(HistoryKunjunganController::class)->store(request());
        // return redirect('history');
    }


    public function facescan(){
        return view('facescan');
    }
    # akhirnya presensi

    public function history(){
        $pengunjung = Pengunjung::all();
        return view('historyKunjungan', compact('pengunjung'));
    }

}
