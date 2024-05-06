@extends('layouts.index')
@extends('layouts.navbar')
@extends('layouts.dashboard2')
@section('title', 'Konsultasi')
@extends('konsultasi.extends')

@section('content')

<form class="w-full" method="post" action="/chat" enctype="multipart/form-data">
    @csrf
    <div class="bg-gray-100">
        <div class=" bg-white rounded-lg shadow-lg w-full">
            <!-- Chat Header -->
            <div class="bg-gray-200 px-4 py-6 rounded-r-lg flex items-center justify-between">

            </div>
            <div class="-mb-4  flex flex-col h-[78vh]" style=>
                <img class="h-full scale-130" src="{{ asset('images/konsultasi_baru.png') }}" alt="Deskripsi Gambar">

            </div>
            <!-- Chat Input -->
        
        </div>
    </div>
</form>
@endsection