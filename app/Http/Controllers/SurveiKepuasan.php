<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SurveiResult;
use App\Models\User;

class SurveiKepuasan extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPoint = SurveiResult::all();

        return view('admin.kelolaUser.dashboardsurvei', compact('totalPoint'));
    }

    public function store(Request $request){

        $user_id = auth()->id();
        $responses = $request->input('opsi');

        $totalPoints = array_sum($responses);

        $currentTotalPoints = SurveiResult::where('user_id', $user_id)->value('total_points');

        $totalPoints = $currentTotalPoints + $totalPoints;
        // simpan
        $surveyResult = SurveiResult::updateOrCreate(
            ['user_id' => $user_id],
            ['total_points' => $totalPoints]
        );
        return redirect()->route('history.kunjungan');
        // dd($request->all());
        // $kuisioner = pertanyaan::create($request->validated() + ['user_id' => auth()->id()]);
        // $kuisioner->questions()->sync($request->input('questions', []));

        // return redirect()->route('admin.results.index')->with([
        //     'message' => 'successfully created !',
        //     'alert-type' => 'success'
        // ]);
        // $jawaban = jawaban::sum('total_points');
        // $jawaban = auth()->user()->userResults()->create([
        //     'total_points' => $jawaban->sum('points')
        // ]);


    //    $user_id = $request->opsi;
    //    foreach ($user_id as $id => $value) {
    //         jawaban::create([
    //             'user_id' => auth()->id(),
    //             'total_points' => $value,
    //             // 'komentar' =>$id
    //         ]);
    //    }
    }
}
