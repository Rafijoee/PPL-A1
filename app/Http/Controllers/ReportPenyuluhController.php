<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Profile;
use App\Models\Kecamatan;
use App\Models\VerificationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ReportPenyuluhController extends Controller
{
    public function edit2(Report $report, $id){
        $user_id = Auth::user()->id;
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        $kecamatan_id = $reports->kecamatan_id;
        $kecamatans = Kecamatan::all();
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();

        $model = Report::findOrFail($decryptedID);
        $verifs = VerificationStatus::all();
        return view('pengaduan-penyuluh.edit', compact('reports', 'model', 'namakecamatan', 'verifs'));
    }

    public function update2(Request $request, Report $report, $id){
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);

        $tanggapan_penyuluh = $request->input('tanggapan_penyuluh');
        $verif_status =$request->input('verification_statuses_id') ;

        Report::where('id', $reports->id)
              ->update([
                'tanggapan_penyuluh' => $tanggapan_penyuluh,
                'verification_statuses_id' => $verif_status
              ]);

        return redirect('/dashboard/pengaduan-penyuluh')->with('success', 'Aduan berhasil diperbarui!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $kecamatan_id = $profile->kecamatan_id;
        $reports = Report::where('kecamatan_id', $kecamatan_id)->get();

        return view('pengaduan-penyuluh.index', compact('reports'));
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
        $user_id = Auth::user()->id;
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);

        $model = Report::findOrFail($decryptedID);
        $kecamatan_id = $reports->kecamatan_id;
        $kecamatans = Kecamatan::all();
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();

        return view('pengaduan-penyuluh.show', compact('model', 'reports', 'namakecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report, $id)
    {
        $user_id = Auth::user()->id;
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        $kecamatan_id = $reports->kecamatan_id;
        $kecamatans = Kecamatan::all();
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();

        $model = Report::findOrFail($decryptedID);
        return view("pengaduan-penyuluh.create", compact('reports', 'model', 'namakecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report, $id)
    {
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);

        if($request->file('image2')){
            if($request->oldImage2){
                Storage::delete($request->oldImage2);
            }
            $foto_penyuluh = $request->file('image2')->store('post-images-penyuluh');
        }
        else{
            $foto_penyuluh = $request->oldImage2;
        }

        $isi_aduan_penyuluh = $request->input('isi_aduan_penyuluh');
        $verif = 3;

        Report::where('id', $reports->id)
              ->update([
                'foto_penyuluh' => $foto_penyuluh,
                'isi_aduan_penyuluh' => $isi_aduan_penyuluh,
                'verification_statuses_id' => $verif
              ]);

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