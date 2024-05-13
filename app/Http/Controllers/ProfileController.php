<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Kecamatan;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::Where('user_id', $user_id)->first();
        $kecamatans = Kecamatan::all();
        return view ('users.index', compact('profile', 'kecamatans'));
    }

    /**
     * Update the user's profile information.
     */
    public function edit ()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::Where('user_id', $user_id)->first();
        $kecamatans = Kecamatan::all();
        return view ('users.edit', compact('profile', 'kecamatans'));
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;

        $validate_data = $request->validate([
            'name' => 'required',
            'nik' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'kecamatan_id' => 'required'
        ]);

        $nama = $request->name;
        $nik = $request->nik;
        $no_hp = $request->no_hp;
        $alamat = $request->alamat;
        $kecamatan_id = $request->kecamatan_id;



        $user = User::find($user_id);
        $user->name = $nama;
        
        $profile = Profile::where('user_id', $user_id)->first();
        $profile->nama = $nama;
        $profile->nik = $nik;
        $profile->no_hp = $no_hp;
        $profile->alamat = $alamat;
        $profile->kecamatan_id = $kecamatan_id;
        $user->save();
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Data profil berhasil diperbarui.');
    }

    /**
     * Delete the user's account.
     */

}
