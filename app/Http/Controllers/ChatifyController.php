<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatifyController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('konsultasi.index', compact('user'));
    }
}
