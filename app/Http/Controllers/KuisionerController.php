<?php

namespace App\Http\Controllers;

use App\Models\jawaban;
use App\Models\Kuisioner;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\pertanyaan;
use App\Models\Opsi;



class KuisionerController extends Controller
{
    public function index(){
        // return view('surveikepuasan');
        $kuisioner = pertanyaan::all();
        return view('surveikepuasan', compact('kuisioner'));
    }

    public function option(){
        // return view()
    // return view('show_option',compact('opsiSurvei'));

    }


}
