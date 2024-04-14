<?php

namespace App\Http\Controllers;

use App\Models\Handling_Status;
use App\Models\Report;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ReportPemerintahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::where('verification_statuses_id', 3)->get();
        
        return view('pengaduan-pemerintah.index', compact('reports'));
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
        $handlings = Handling_Status::all();

        $model = Report::findOrFail($decryptedID);
        return view("pengaduan-pemerintah.show", compact('reports', 'model', 'namakecamatan', 'handlings'));
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
