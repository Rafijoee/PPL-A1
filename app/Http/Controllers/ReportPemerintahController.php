<?php

namespace App\Http\Controllers;


use App\Models\Handling_Status;
use App\Models\Report;
use App\Models\Kecamatan;
use App\Models\Notifikasi;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Jobs\CreateDatabaseAfterTenDays;
use App\Models\Complaint;

class ReportPemerintahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $reports = Report::where('verification_statuses_id', 3)->get();
        
        return view('pengaduan-pemerintah.index', compact('reports', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report, $id)
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        $kecamatan_id = $reports->kecamatan_id;
        $kecamatans = Kecamatan::all();
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();
        $handlings = Handling_Status::all();
        $petani = $reports->user_id;
        $username = User::where('id', $petani)->first();
        $username = $username->name;
        $model = Report::findOrFail($decryptedID);
        return view("pengaduan-pemerintah.show", compact('reports', 'model', 'namakecamatan', 'handlings', 'user', 'username'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report, $id)
    {


        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        $handling_status = $request->input('handling_statuses_id');

        if($request->input('isi_aduan_pemerintah')){
            $tanggapan_pemerintah = $request->input('isi_aduan_pemerintah');
        }
        else{
            $tanggapan_pemerintah = $reports->tanggapan_pemerintah;
        }

        Report::where('id', $reports->id)
        ->update([
            'tanggapan_pemerintah' => $tanggapan_pemerintah,
            'handling__statuses_id' => $handling_status
        ]);
        $id_petani = Report::where('id', $reports->id)->pluck('user_id')->first();
        $kecamatan_petani = Profile::where('user_id', $id_petani)->pluck('kecamatan_id')->first();
        $id_penyuluh = Profile::where('kecamatan_id', $kecamatan_petani)->where('id', '!=', $id_petani)->pluck('user_id')->first();

        $notifikasi = new Notifikasi();
        $notifikasi->user_id = Auth::user()->id;
        $notifikasi->to_id = $id_penyuluh;
        $notifikasi->report_id = $reports->id;
        $notifikasi->title = $tanggapan_pemerintah;
        $notifikasi->save();

        $notifikasi = new Notifikasi();
        $notifikasi->user_id = Auth::user()->id;
        $notifikasi->to_id = Report::where('id', $reports->id)->pluck('user_id')->first();
        $notifikasi->report_id = $reports->id;
        $notifikasi->title = $tanggapan_pemerintah;
        $notifikasi->save();



// Ketika pengaduan dibuat
        // $complaint = Complaint::create([
        //     'description' => 'Haloo, bagaimana kabar anda? Apakah sawah anda sudah membaik ?',
        // ]);

// Menjadwalkan job untuk dijalankan setelah 10 hari
        // CreateDatabaseAfterTenDays::dispatch($complaint->id)->delay(now()->addDays(10));


        return redirect('/dashboard/pengaduan-pemerintah')->with('success', 'tanggapan berhasil dikirim!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
