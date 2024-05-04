<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index(){
        $user = Auth::user();
        $id = Auth::user()->id;
        $notifs = Notifikasi::where('to_id', $id)->pluck('title');
        // dd($notifs);
        return view ('notifikasi.index', compact('user'));
    }
}
