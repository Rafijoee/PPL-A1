<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index(){
        $user = auth()->user();
        $profile = $user->profile;
        $kecamatanId = $profile->kecamatan_id;

        $penyuluh = User::where('roles_id', 3)->get();

        $matchingProfiles = [];
        foreach ($penyuluh as $user) {
            $kecamatanPenyuluh = $user->profile->kecamatan_id;

            if ($kecamatanId === $kecamatanPenyuluh) {
                $matchingProfiles[] = $user->profile;
            }
}     
        return view('konsultasi.index', compact('kecamatanId', 'matchingProfiles'));
    }
}
