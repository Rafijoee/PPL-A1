<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatifyController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('konsultasi.index');
    }
}
