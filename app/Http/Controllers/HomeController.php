<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topUsers = Pengunjung::select('user_id')->groupBy('user_id')->orderByRaw('COUNT(*) DESC')->take(3)->get();
        return view('home', compact('topUsers'));
    }
}
