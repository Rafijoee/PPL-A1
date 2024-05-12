<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class NewsPemerintahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $reports = Report::where('handling__statuses_id', 3)->get();
        $reports = Report::where('jadi_berita', 0)->get();
        $reports = $reports->reverse();
        return view('berita-pemerintah.index', compact('user', 'reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('berita-pemerintah.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_berita' => 'required|max:255',
            'slug' => 'required|max:255',
            'image' => 'required|image|file|max:20480',
            'isi_berita' => 'required',
        ]);

        // @dd($request);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('cover-images');
        }
        $validatedData['user_id'] = Auth::user()->id;

        News::create($validatedData);
        return redirect('/dashboard/berita-pemerintah')->with('success', 'Aduan berhasil dikirimkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->judul_berita);
        return response()->json(['slug' => $slug]);
    }
}
