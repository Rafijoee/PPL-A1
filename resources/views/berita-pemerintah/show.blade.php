<?php

use Carbon\Carbon;

Carbon::setLocale('id');
?>

@extends('layouts.dashboard')
@section('title', 'Berita | '.$berita->judul_berita.'')



<body class="bg-[#F2FBFF]">
    <div class="sm:ml-72 mt-28 sm:mt-32 mb-64 flex justify-center">
        <div class="bg-white border-4 rounded-xl pb-12 mx-16 w-full">
            <div class="flex justify-center my-6 mx-32">
                <h1 class="font-bold text-4xl text-center">{{ $berita->judul_berita }}</h1>
            </div>
            <div class="flex justify-center text-gray-400">
                <h5>{{ $berita->updated_at->translatedFormat('l, d F Y H: i') }}</h5>
            </div>
            <div class="flex justify-center mx-32">
                <img src="{{asset('storage/'.$berita->image)}}" alt="">
            </div>
            <div>
                <h2 class="text-justify mt-10 mx-10">{!! $berita->isi_berita !!}</h2>
            </div>
        </div>
    </div>
</body>