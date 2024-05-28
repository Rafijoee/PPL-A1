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
        return view('admin.validasi.index', compact ('user'));
    }
}
