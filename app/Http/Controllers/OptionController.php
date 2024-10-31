<?php

namespace App\Http\Controllers;
use App\models\Opsi;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index(){
        $opsiSurvei = Opsi::all();
        // return view()
    return view('show_option', ['opsi' => $opsiSurvei],compact('opsiSurvei'));

    }

}
