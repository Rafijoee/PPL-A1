<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index(){
        $user = Auth::user();
        $id = Auth::user()->id;
        $notifs = Notifikasi::latest()->where('to_id', $id)->get();
        
        return view ('notifikasi.index', compact('user', 'notifs'));
    }
}
