<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatifyController extends Controller
{
    public function index(){
        return view('konsultasi.index');
    }
}
