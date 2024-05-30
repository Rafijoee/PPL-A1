<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Profile;
use App\Models\Kecamatan;
use App\Models\Notifikasi;
use App\Models\VerificationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ReportPenyuluhController extends Controller
{
    public function edit2(Report $report, $id){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        $kecamatan_id = $reports->kecamatan_id;
        $kecamatans = Kecamatan::all();
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();

        $model = Report::findOrFail($decryptedID);
        $verifs = VerificationStatus::all();
        return view('pengaduan-penyuluh.edit', compact('reports', 'model', 'namakecamatan', 'verifs', 'user'));
    }

    public function update2(Request $request, Report $report, $id){
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);

        $validatedData = $request->validate([
            'tanggapan_penyuluh' => 'required|max:255'
        ]);

        $validatedData['tanggapan_penyuluh'] = $request->input('tanggapan_penyuluh');
        $verif_status =$request->input('verification_statuses_id') ;

        Report::where('id', $reports->id)
              ->update([
                'tanggapan_penyuluh' => $validatedData['tanggapan_penyuluh'],
                'verification_statuses_id' => $verif_status
              ]);

        return redirect('/dashboard/pengaduan-penyuluh')->with('success', 'Tanggapan berhasil dikirim!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $kecamatan_id = $profile->kecamatan_id;
        $reports = Report::latest()->where('kecamatan_id', $kecamatan_id)->get();

        return view('pengaduan-penyuluh.index', compact('reports', 'user'));
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
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report, $id)
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        
        $model = Report::findOrFail($decryptedID);
        $id_petanis = Report::where('id', $reports->id)->pluck('user_id');
        $kecamatan_petani = Profile::where('user_id', $id_petanis)->pluck('kecamatan_id')->first();
        // dd($model);
        $kecamatan_id = $reports->kecamatan_id;
        $kecamatans = Kecamatan::all();
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();

        return view('pengaduan-penyuluh.show', compact('model', 'reports', 'namakecamatan', 'user'));
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

        

        $model = Report::findOrFail($decryptedID);
        return view("pengaduan-penyuluh.create", compact('reports', 'model', 'namakecamatan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report, $id)
    {
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        if($request->oldImage2){
            $validatedData = $request->validate([
                'foto' => 'file|image|max:20480',
                'isi_aduan_penyuluh' => 'required|max:255'
            ]);
        }
        else{
            $validatedData = $request->validate([
                'foto' => 'required|file|image|max:20480',
                'isi_aduan_penyuluh' => 'required|max:255'
            ]);
        }

        if($request->file('foto')){
            if($request->oldImage2){
                Storage::delete($request->oldImage2);
            }
            $validatedData['foto'] = $request->file('foto')->store('post-images-penyuluh');
        }
        else{
            $validatedData['foto'] = $request->oldImage2;
        }
        $validatedData['isi_aduan_penyuluh'] = $request->input('isi_aduan_penyuluh');
        $verif = 3;

        Report::where('id', $reports->id)
              ->update([
                'foto_penyuluh' => $validatedData['foto'],
                'isi_aduan_penyuluh' => $validatedData['isi_aduan_penyuluh'],
                'verification_statuses_id' => $verif
              ]);
        $profile = Auth::user()->profile;
        $kecamatan_kita = $profile->kecamatan_id;
        $profile_lain = Profile::where('kecamatan_id',$kecamatan_kita)->where('id', '!=', $profile->id)->pluck('user_id')->first();
        $notifikasi = new Notifikasi();
        $notifikasi->user_id = Auth::user()->id;
        $notifikasi->to_id = Report::where('id', $reports->id)->pluck('user_id')->first();
        $notifikasi->report_id = $reports->id;
        $notifikasi->title = $validatedData['isi_aduan_penyuluh'];
        $notifikasi->save();
        
        $notifikasi1 = new Notifikasi();
        $notifikasi1->user_id = Auth::user()->id;
        $notifikasi1->to_id = 2;
        $notifikasi1->report_id = $reports->id;
        $notifikasi1->title = $validatedData['isi_aduan_penyuluh'];
        $notifikasi1->save();

        return redirect('/dashboard/pengaduan-penyuluh')->with('success', 'Aduan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }

}