<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jawaban;
use App\Models\SurveiResult;

class ResultController extends Controller
{
    public function index(){
        $totalPoint = SurveiResult::all();
        return view('admin.kelolaUser.dashboardsurvei',compact('totalPoint'));
    }

    public function store(){

        // $surveyTotal = jawaban::sum('total_points'); // Gantilah 'survey_column' dengan nama kolom yang sesuai pada tabel user

        // // Simpan hasil penjumlahan ke tabel baru
        // SurveiResult::create([
        //     'total_value' => $surveyTotal,
        // ]);
    }
}
