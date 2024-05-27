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
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $profile = Profile::Where('user_id', $user_id)->first();
        $roles_id = Auth::user()->roles_id;
        $kecamatan = $profile?->kecamatan_id;
        $kecamatan = Kecamatan::where('id', $kecamatan)?->first();
        $kecamatans = Kecamatan::all();
        return view('users.index', compact('profile', 'kecamatans', 'roles_id', 'user','user_id', 'kecamatan'));
    }

    /**
     * Update the user's profile information.
     */
    public function edit()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::Where('user_id', $user_id)->first();
        $kecamatans = Kecamatan::all();
        $user = Auth::user();
        return view('users.edit', compact('profile', 'kecamatans', 'user'));
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $validated_data = $request->validate([
            'name' => 'required',
            'nik' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'kecamatan_id' => 'required'
        ]);

        $user = User::find($user_id);
        $user->name = $validated_data['name'];
        $user->save();

        $profile = Profile::where('user_id', $user_id)->first();
        $profile->nama = $validated_data['name']; // Pastikan Anda menggunakan key yang benar untuk memperbarui nama
        $profile->nik = $validated_data['nik'];
        $profile->no_hp = $validated_data['no_hp'];
        $profile->alamat = $validated_data['alamat'];
        $profile->kecamatan_id = $validated_data['kecamatan_id'];
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Data profil berhasil diperbarui.');
    }

    /**
     * Delete the user's account.
     */
}
