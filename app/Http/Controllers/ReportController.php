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
        return view('pengaduan.index');
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
        // $validatedData = $request->validate([
        //     'judul_laporan' => 'required|max:255',
        //     'alamat' => 'required|max:255',
        //     'isi_laporan' => 'required'
        // ]);

        $request['user_id'] = auth()->user()->id;
        
        // Report::create($request);

        // return $request;

        // $validatedData['user_id'] = auth()->user()->id;
        
        $title = $request ->input("judul_laporan");
        $content = $request->input("isi_aduan");
        $alamat = $request->input("alamat");
        $user = Auth::user()->id;

        Report::create([
            'user_id' -> $user,
            'judul_laporan' => $title,
            'alamat' => $alamat,
            'isi_aduan' => $content,
        ]);
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
