<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index (){
        $user = Auth::user();
        $profile = Auth::user()->profile;
        $kecamatan_kita = $profile->kecamatan_id;
        $profile_lain = Profile::where('kecamatan_id',$kecamatan_kita)->where('id', '!=', $profile->id)->first();
        $id_lain = $profile_lain->id;

        return view('konsultasi.index', compact('profile_lain', 'id_lain', 'user'));
    }
    
    public function show ($id){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $chats_kita = Chat::where('from_id', $user_id)
                        ->where('to_id', $id)
                        ->orWhere('from_id', $id) 
                        ->where('to_id', $user_id)->get();
        return view('konsultasi.chat', compact('chats_kita', 'user'));
    }

    public function store (Request $request){
        $user = Auth::user()->roles_id;
        $id_kita = Auth::user()->id;
        $profile = Auth::user()->profile;
        $kecamatan_kita = $profile->kecamatan_id;
        $profile_lain = Profile::where('kecamatan_id',$kecamatan_kita)->where('id', '!=', $profile->id)->first();
        $id_lain = $profile_lain->id;


        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        $validatedData['from_id'] = $id_kita;
        $validatedData['to_id'] = $id_lain;
        
        Chat::create($validatedData);

        return redirect ('');
    }
}
