<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        } else {
            return redirect('login')->with('error', 'Email atau Kata sandi salah !');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus autentikasi pengguna saat ini

        $request->session()->invalidate(); // Mematikan sesi pengguna

        $request->session()->regenerateToken(); // Menghasilkan token sesi baru

        return redirect('/')->with('status', 'You have been logged out successfully.'); // Redirect ke halaman utama dengan pesan sukses
    }

    public function form_register()
    {
        $kecamatans = Kecamatan::get();

        return view('auth.register', compact('kecamatans'));
    }

    public function register(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'nik' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'kecamatan_id' => 'required'
        ]);
        $validate_data['roles_id'] = '2';
        
        $user = new User();
        $user->email = $validate_data['email'];
        $user->name = $validate_data['name'];
        $user->password = bcrypt($validate_data['password']);
        $user->save();

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->nama = $validate_data['name'];
        $profile->no_hp = $validate_data['no_hp'];
        $profile->nik = $validate_data['nik'];
        $profile->alamat = $validate_data['alamat'];
        $profile->kecamatan_id = $validate_data['kecamatan_id'];
        $profile->save();
        
        Auth::login($user);
        return redirect('/dashboard');
    }
}
