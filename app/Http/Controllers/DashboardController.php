<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function form_pengaduan()
    {
        return view('layouts.dashboard');
    }
}
