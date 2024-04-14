@extends('layouts.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan | Buat Aduan</title>

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display:none;
        }
    </style>
</head>

</head>
<body class="bg-[#F2FBFF] text-[#185141]">
    <div class="p-4 sm:ml-64 mt-16 mb-60">
    <div class="border-b-4 border-[#185141]">
        <h1 class="font-bold text-7xl">Buat Aduan</h1>
        <hr class="mt-5">
    </div>    
        
        <div class="mt-10 flex w-full justify-center">
                <form class="space-y-4 md:space-y-6 w-2/3" method="post" action="/dashboard/pengaduan" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="judul_laporan" class="block mb-2 text-3xl font-medium dark:text-white">Judul Aduan</label>
                    <input type="text" name="judul_laporan" id="judul_laporan" class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="judul aduan"  value="{{ old('judul_laporan') }}">
                </div>
                <div>
                    <label for="alamat" class="block mb-2 text-3xl font-medium dark:text-white">Alamat / Lokasi Sawah</label>
                    <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. alamat sawah" value="{{ old('alamat') }}" >
                </div>
                <div>
                    <label for="kecamatan" class="block mb-2 text-3xl font-medium dark:text-white">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan">
                        @foreach ($kecamatans as $kecamatan )
                        @if(old('kecamatan_id') == $kecamatan->id)
                            <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->name }}</option>
                        @else
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                        @endif 
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="image" class="form-label text-3xl font-medium">Foto Sawah</label>
                    <img class="object-scale-down max-h-80 w-auto" id="frame">
                    <input class="form-control mt-3 border-gray-300 rounded-lg bg-gray-50 border w-full " type="file" id="image" name="image" onchange="preview()">
                </div>
                <div>
                    <label for="isi_aduan" class="form-label text-3xl font-medium">Isi Aduan</label>
                    <input id="isi_aduan" type="hidden" name="isi_aduan" class="" value="{{ old('isi_aduan') }}">
                    <trix-editor input="isi_aduan" class="mt-3 bg-white"></trix-editor>
                </div>
                <button type="submit" class="mt-10 text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">Buat Aduan</button>
            </form>
        </div>
    </div>

    <script>
            function preview(){
                frame.src= URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>