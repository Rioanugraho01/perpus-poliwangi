<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $topUsers = Pengunjung::select('user_id')->groupBy('user_id')->orderByRaw('COUNT(*) DESC')->take(3)->get();
        return view('welcome', compact('topUsers'));
    }
}
