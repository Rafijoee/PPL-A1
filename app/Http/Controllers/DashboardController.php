<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
<<<<<<< HEAD
=======
        // $notifs = DB::table('notifications')->where('notifiable_id', $user_id)->pluck('data');
        // foreach ($notifs as $notif)
        // $userArray = json_decode($notif, true);
        // $messages = $userArray['messages'];
        // $judul = $userArray['title'];
        
        // dd($messages);

>>>>>>> b87bd2772ce98881a87cfc099336096d3cfc56cc
        return view('layouts.dashboard', compact('user'));
    }
}
