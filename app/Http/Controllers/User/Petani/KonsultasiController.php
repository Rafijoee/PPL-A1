<?php

namespace App\Http\Controllers\User\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('tutorial.petani.konsultasi', compact('user'));
    }

}
