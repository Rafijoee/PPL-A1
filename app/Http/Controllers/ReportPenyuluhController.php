<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Profile;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ReportPenyuluhController extends Controller
{
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

        $foto_penyuluh = $request->file('image2')->store('post-images-penyuluh');
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