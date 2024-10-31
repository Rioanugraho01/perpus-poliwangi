<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Pengunjung;
use App\Models\Koordinat;
use App\Models\survey;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $inputTanggal = $request->input('date');
        $now = Carbon::parse($inputTanggal);
        $year = $now->year;
        $month = $now->month;
        $pengguna = User::count();
        $hari = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->count();
        $bulan = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
        $tahun = Pengunjung::whereYear('created_at', $year)->count();

        //perbulan
        $jan = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 1)->count();
        $feb = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 2)->count();
        $mar = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 3)->count();
        $apr = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 4)->count();
        $may = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 5)->count();
        $jun = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 6)->count();
        $jul = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 7)->count();
        $ags = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 8)->count();
        $sep = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 9)->count();
        $oct = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 10)->count();
        $nov = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 11)->count();
        $des = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', 11)->count();

        $dosen = 'Dosen'; // cari dosen
        $dos = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('status', $dosen)->count();

        $mahasiswa = 'Mahasiswa'; // cari mahasiswa
        $mah = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('status', $mahasiswa)->count();

        $umum = 'Umum'; // cari umum
        $um = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('status', $umum)->count();

                $agribisnis = Pengunjung::count();  // Total jumlah pengunjung
        $agbb = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Agribisnis')->count();  // Jumlah pengunjung dengan nama tertentu

        $manajemen = Pengunjung::count();  // Total jumlah pengunjung
        $mbpp = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Manajemen Bisnis dan Pariwisata')->count();  // Jumlah pengunjung dengan nama tertentu

        $kapal = Pengunjung::count();  // Total jumlah pengunjung
        $tmkk = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Teknik Manufaktur Kapal')->count();  // Jumlah pengunjung dengan nama tertentu

        $ternak = Pengunjung::count();  // Total jumlah pengunjung
        $tphtt = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Teknologi Pengolahan Hasil Ternak')->count();  // Jumlah pengunjung dengan nama tertentu

        $komputer = Pengunjung::count();  // Total jumlah pengunjung
        $trkk = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Teknologi Rekayasa Komputer')->count();  // Jumlah pengunjung dengan nama tertentu

        $lunak = Pengunjung::count();  // Total jumlah pengunjung
        $trpll = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Teknologi Rekayasa Perangkat Lunak')->count();  // Jumlah pengunjung dengan nama tertentu

        $digital = Pengunjung::count();  // Total jumlah pengunjung
        $bdd = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Bisnis Digital')->count();  // Jumlah pengunjung dengan nama tertentu

        $manufaktur = Pengunjung::count();  // Total jumlah pengunjung
        $trmm = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Teknologi Rekayasa Manufaktur')->count();  // Jumlah pengunjung dengan nama tertentu

        $jembatan = Pengunjung::count();  // Total jumlah pengunjung
        $trkjj = Pengunjung::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $now)->where('prodi', 'Teknologi Rekayasa Konstruksi Jalan & Jembatan')->count();  // Jumlah pengunjung dengan nama tertentu
        return view('admin.dashboard', compact('pengguna','inputTanggal','agbb','mbpp','tmkk','tphtt','trkk','trpll','bdd','trmm','trkjj','hari','bulan','tahun','dos','mah','um','jan','feb','mar','apr','may','jun','jul','ags','sep','oct','nov','des'));
    }

    #Geolokasi
    public function lokasi(){
        $coordinat = Koordinat::all();

        $coordinat1 = Koordinat::pluck('koordinat1');
        $coordinat2 = Koordinat::pluck('koordinat2');
        $coordinat3 = Koordinat::pluck('koordinat3');
        $coordinat4 = Koordinat::pluck('koordinat4');

        $koordinat1 = str_replace(['["', '"]'], '', $coordinat1);
        $koordinat2 = str_replace(['["', '"]'], '', $coordinat2);
        $koordinat3 = str_replace(['["', '"]'], '', $coordinat3);
        $koordinat4 = str_replace(['["', '"]'], '', $coordinat4);
        return view('geolocation', compact('coordinat','koordinat1','koordinat2','koordinat3','koordinat4'));
    }

    public function post(Request $request){
    	Koordinat::create([
            'koordinat1' => $request->koordinat1,
            'koordinat2' => $request->koordinat2,
            'koordinat3' => $request->koordinat3,
            'koordinat4' => $request->koordinat4,
        ]);
        return redirect('geolocation');
    }

    public function destroy($id)
    {
        $coordinat = Koordinat::find($id);
        $coordinat->delete();
        return redirect('geolocation')->with('success', 'Data Deleted');
    }

    #Kelola User
    public function kelolaUser(){
        $user = User::all();
        return view('admin.manajemenpengunjung' , compact('user'));
    }

    #Pengunjung Perpustakaan
    public function pengunjung(){
        $pengunjung = Pengunjung::all();
        return view('admin.pengunjung', compact('pengunjung'));
    }

    // public function survey(){
    //     $survey = survey::all();
    //     return view('admin.kelolaUser.survey', compact('survey'));
    // }
}
