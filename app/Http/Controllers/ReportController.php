<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengaduan.index',[
            'reports' => Report::where('user_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_laporan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'isi_aduan' => 'required',
            'foto_lokasi' => 'image|file|max:20480'
        ]);
        
        $validatedData['foto_lokasi'] = $request->file('image')->store('post-images');
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['handling__statuses_id'] = 1;
        $validatedData['verification_statuses_id'] = 1;

        Report::create($validatedData);


        
        // $title = $request ->input("judul_laporan");
        // $content = $request->input("isi_aduan");
        // $alamat = $request->input("alamat");
        // $user = Auth::user()->id;
        // $foto = $request->file('image')->store('post-images');


        // Report::create([
        //     'user_id' => $user,
        //     'judul_laporan' => $title,
        //     'alamat' => $alamat,
        //     'isi_aduan' => $content,
        //     'handling__statuses_id' => 1,
        //     'verification_statuses_id' => 1,
        //     'foto_lokasi' => $foto
        // ]);
        // Report::create($validatedData);

        return redirect('/dashboard/pengaduan')->with('success', 'Aduan berhasil dikirimkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return $report;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
