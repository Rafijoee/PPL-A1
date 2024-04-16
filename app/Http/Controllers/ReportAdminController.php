<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Handling_Status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ReportAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $reports = Report::all();
        
        return view('pengaduan-admin.index', compact('reports', 'user'));
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
    public function show(Report $report, $id)
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);
        $kecamatan_id = $reports->kecamatan_id;
        $kecamatans = Kecamatan::all();
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();
        $handlings = Handling_Status::all();
        

        $model = Report::findOrFail($decryptedID);
        return view("pengaduan-admin.show", compact('reports', 'model', 'namakecamatan', 'handlings', 'user'));
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
