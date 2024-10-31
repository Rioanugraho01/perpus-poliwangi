<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pertanyaan;

class pertanyaanController extends Controller
{
    public function index(){
        $pertanyaan = pertanyaan::all();
        return view('admin.kelolaUser.survey', compact('pertanyaan'));
    }

    public function store(Request $request){
        // $request->validate([
        //     'pertanyaan' => 'required'
        // ]);

        // dd($request->input('addMoreInputFields'));

        $request->validate([
            'addMoreInputFields.*.pertanyaan' => 'required'
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            pertanyaan::create($value);
        }

        return back()->with('success', 'Pertanyaan berhasil dibuat.');
    }

    public function destroy($id)
    {
        $pertanyaan = pertanyaan::find($id);
        $pertanyaan->delete();
        return back()->with('success-hapus', 'Pertanyaan berhasil Dihapus.');

    }

}
