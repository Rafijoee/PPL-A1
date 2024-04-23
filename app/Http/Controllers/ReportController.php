<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Handling_Status;
use App\Models\Kecamatan;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Illuminate\Contracts\Encryption\DecryptException;   

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $reports = Report::where('user_id', $user_id)->get();
        
        // $handling = Handling_Status::where('id', $reports->handling__statuses_id)->get();
        // @dd($reports->judul_laporan);
        
        return view('pengaduan.index', compact('reports', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('pengaduan.create',[
            'kecamatans' => Kecamatan::all()
        ], compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_laporan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kecamatan_id' => 'required',
            'image' => 'required|image|file|max:20480',
            'isi_aduan' => 'required',
        ]);

        if($request->file('image')){
            $validatedData['foto_lokasi'] = $request->file('image')->store('post-images');
        }

        
        // $validatedData['foto_lokasi'] = $request->file('image')->store('post-images');
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
    public function show(Report $report, $id)
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);

        $model = Report::findOrFail($decryptedID);

        $kecamatan_id = $reports->kecamatan_id;
        $namakecamatan = Kecamatan::where('id', $kecamatan_id)->first();
        

        return view("pengaduan.show", compact('model','reports', 'namakecamatan', 'user'));

        // return view("pengaduan.show",[
        //     'report'=> $report
        // ]);
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

        $model = Report::findOrFail($decryptedID);
        $kecamatans = Kecamatan::all();
        return view("pengaduan.edit", compact('reports', 'model', 'kecamatans', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report, $id)
    {
        $decryptedID = Crypt::decryptString($id);
        $reports = Report::find($decryptedID);

        $validatedData = $request->validate([
            'judul_laporan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'isi_aduan' => 'required',
            'image' => 'image|file|max:20480'
        ]);

        // if($request->file('image')){
        //     $validatedData['foto_lokasi'] = $request->file('image')->store('post-images');
        // }
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['foto_lokasi'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['handling__statuses_id'] = 1;
        $validatedData['verification_statuses_id'] = 1;
        $validatedData['kecamatan_id'] = $request->input('kecamatan_id');

        Report::where('id', $reports->id)
              ->update($validatedData);
        
        return redirect('/dashboard/pengaduan')->with('success', 'Aduan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
