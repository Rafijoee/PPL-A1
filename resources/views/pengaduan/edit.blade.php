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
<body>
    <div class="p-4 sm:ml-64 mt-16 mb-60">
        <h1 class="font-bold text-4xl border-b-2">Perbarui Aduan</h1>

        <div class="mt-10 flex w-full justify-center">
                <form class="space-y-4 md:space-y-6 w-2/3" method="post" action="/dashboard/pengaduan/{{ Crypt::encryptString($reports["id"]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="judul_laporan" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Judul Aduan</label>
                    <input type="text" name="judul_laporan" id="judul_laporan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="judul aduan"  value="{{ old('judul_laporan', $reports->judul_laporan) }}">
                </div>
                <div>
                    <label for="alamat" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Alamat / Lokasi Sawah</label>
                    <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. alamat sawah" value="{{ old('alamat', $reports->alamat) }}" >
                </div>
                <div>
                    <label for="kecamatan" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan">
                        @foreach ($kecamatans as $kecamatan )
                        @if(old('kecamatan_id', $reports->kecamatan_id) == $kecamatan->id)
                            <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->name }}</option>
                        @else
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                        @endif 
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="image" class="form-label text-md font-medium">Foto Sawah</label>
                    <input type="hidden" name="oldImage" value="{{ $reports->foto_lokasi }}">
                    @if ($reports->foto_lokasi)
                        <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" class="object-scale-down max-h-80 w-auto" id="frame" alt="">
                    @else    
                        <img class="object-scale-down max-h-80 w-auto" id="frame">
                    @endif
                    <input class="form-control mt-3 border-gray-300 rounded-lg bg-gray-50 border" type="file" id="image" name="image" onchange="preview()">
                </div>
                <div>
                    <label for="isi_aduan" class="form-label text-md font-medium">Isi Aduan</label>
                    <input id="isi_aduan" type="hidden" name="isi_aduan" class="" value="{{ old('isi_aduan', $reports->isi_aduan) }}">
                    <trix-editor input="isi_aduan" class="mt-3"></trix-editor>
                </div>
                <button type="submit" class="mt-10 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">Perbarui Aduan</button>
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