<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Notifikasi;
use App\Models\Profile;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NotifikasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $notifs = Notifikasi::latest()->where('to_id', $user_id)->with('report')->get();
        $reports = Report::latest()->where('user_id', $user_id)->get();


        return view('notifikasi.index', compact('user', 'notifs', 'reports'));
    }

    public function show($id)
    {
        $user = Auth::user();

        $notif = Notifikasi::findOrFail($id);

        $id_report = $notif->report_id;
        $decryptedID = Crypt::decryptString($id_report);
        $report = Report::findOrFail($decryptedID);
        $kecamatan_id = $report->kecamatan_id;
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();

        return view('pengaduan.show', compact('report', 'namakecamatan', 'user'));
    }
}
