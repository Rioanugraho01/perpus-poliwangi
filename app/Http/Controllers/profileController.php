<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        $user = User::all();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Sesuaikan dengan kebutuhan Anda
            ]);
            $file   = $request->file('image');
            $result = CloudinaryStorage::replace($user->image, $file->getRealPath(), $file->getClientOriginalName());
            $user->update([
                'image' => $result,
                'name' => $request->name,
                'prodi' => $request->prodi,
                'status' => $request->status,
                'alamat' => $request->alamat,
            ]);
        }else{
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Sesuaikan dengan kebutuhan Anda
            ]);    
            $user->update([
                
                'name' => $request->name,
                'prodi' => $request->prodi,
                'status' => $request->status,
                'alamat' => $request->alamat,
            ]);
        }
        return redirect()->route('profile')->with('success', 'Data Saved');
    }
}
