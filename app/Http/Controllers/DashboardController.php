<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Report;
use App\Models\Notifikasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $roles = $user->roles_id;
        $news = News::latest()->paginate(5);
        $body = $news[0]?->isi_berita;
        $body = Str::limit(strip_tags($body), 200);
        return view('layouts.dashboardasli', compact('user', 'news', 'body', 'roles'));
    }
    public function show(News $news, $id)
    {
        $berita = News::where('slug', $id)->first();
        $user = Auth::user();
        return view('berita.show', compact('user', 'berita'));
    }

    public function riwayat(Report $report, $id)
    {
        $user = Auth::user();
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        
        return view('pengaduan.riwayat', compact('user', 'reports'));
    }

    public function index2(){
        $user = Auth::user();

        return view('dashboard2');
    }
}

