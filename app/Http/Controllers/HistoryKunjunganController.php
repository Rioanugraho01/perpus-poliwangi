<?php

namespace App\Http\Controllers;

use App\Models\HistoryKunjungan;
use App\Models\Pengunjung;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryKunjunganController extends Controller
{
    public function index(){
        $history = Pengunjung::where('user_id', auth()->id());
        return view('historyKunjungan', compact('history'));
    }

    // public function store(Request $request, $keperluan){
    //     $mytime = Carbon::now();
    //     $time = $mytime;
    //     if (auth()->check()){
    //         HistoryKunjungan::create([
    //             'user_id'=>auth()->id(),
    //             'keperluan'=>$keperluan,
    //             'tanggal'=>Carbon::now(),
    //         ]);
    //         // return view('historyKunjungan', ['activity' => $activity]);
    //     }
    //     return redirect()->route('login')->with('error', 'Anda harus login untuk melihat halaman ini.');

    // }
    public function setButtonClicked(Request $request)
    {
        // Set flag ke dalam session
        $request->session()->put('buttonClicked', true);

        // Beri respons sesuai kebutuhan (opsional)
        return response()->json(['message' => 'Button clicked flag set successfully']);
    }
}
