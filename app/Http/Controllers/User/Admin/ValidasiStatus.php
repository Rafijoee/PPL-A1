<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidasiStatus extends Controller
{
    public function index(){
        $user = Auth::user();
        $profiles = Profile::whereNull('status')->get();
        return view('admin.validasi.index', compact ('user', 'profiles'));
    }

    public function edit($id)
    {   
        $user = Auth::user();
        $profile = Profile::findOrFail($id);
        return view ('admin.validasi.update', compact('profile', 'user'));
    } 

    public function update (Request $request, string $id)
    {
        $user = Auth::user();
        $profile = Profile::findOrFail($id);
        Profile::where('id', $id)->update([
            'status' => $request->status,
        ]);
        return redirect()->route('validasi.index')->with('success', 'Data Petani ' . $profile->nama . ' telah diubah.');
    }
}
