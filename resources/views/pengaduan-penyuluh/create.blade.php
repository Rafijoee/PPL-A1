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
        <h1 class="font-bold text-4xl border-b-2">Buat Aduan</h1>

        <div class="mt-10 flex w-full justify-center">
            <form class="space-y-4 md:space-y-6 w-2/3" method="post" action="/dashboard/pengaduan-penyuluh/{{ Crypt::encryptString($reports["id"]) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
                <div class="border-b-4 border-gray-200">
                    <div>
                        <label for="judul_laporan" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Judul Aduan</label>
                        <input type="text" name="judul_laporan" id="judul_laporan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="judul aduan"  value="{{ $reports->judul_laporan }}" readonly>
                    </div>
                    <div>
                        <label for="alamat" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Alamat / Lokasi Sawah</label>
                        <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. alamat sawah" value="{{ $reports->alamat }}" readonly>
                    </div>
                    <div>
                        <label for="kecamatan" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kecamatan</label>
                        <input type="text" value="{{ $namakecamatan->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                    </div>

                    <div>      
                        <label for="isi_aduan" class="form-label text-md font-medium">Isi Aduan Petani</label>
                    </div>
                    <div class="bg-gray-100 text-justify px-5 pb-3 rounded-xl">
                        <p>{!! $reports->isi_aduan !!}</p>
                    </div>
                    <div class="mb-10 mt-3">
                        <label for="image" class="form-label text-md font-medium">Foto Petani</label>
                        <input type="hidden" name="oldImage" value="{{ $reports->foto_lokasi }}">
                        @if ($reports->foto_lokasi)
                            <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" class="object-scale-down max-h-[800px] w-auto" id="frame" alt="">
                        @else    
                            <img class="object-scale-down max-h-[800px] w-auto" id="frame">
                        @endif
                    </div>
                </div>
                <div>
                    <h1 class="font-bold text-4xl ">Aduan Penyuluh</h1>
                </div>
                <div>
                    <label for="isi_aduan_penyuluh" class="form-label text-md font-medium">Isi Aduan Penyuluh</label>
                    <input id="isi_aduan_penyuluh" type="hidden" name="isi_aduan_penyuluh" class="" value="{{ old('isi_aduan_penyuluh', $reports->isi_aduan_penyuluh) }}">
                    <trix-editor input="isi_aduan_penyuluh" class="mt-3 bg-white"></trix-editor>
                    @error('isi_aduan_penyuluh')
                        <div class=" text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="image" class="form-label text-md font-medium">Foto Konfirmasi Penyuluh</label>
                    <input type="hidden" name="oldImage2" value="{{ $reports->foto_penyuluh }}">
                    @if ($reports->foto_penyuluh)
                        <img src="{{ asset('storage/'.$reports->foto_penyuluh) }}" alt="" class="scale-75 max-h-[800px]" id="frame2">
                    @else
                        <img class="object-scale-down max-h-[800px] w-auto" id="frame2">
                    @endif
                    <input class="form-control mt-3 border-gray-300 rounded-lg bg-gray-50 border w-full" type="file" name="foto" onchange="preview2()">
                    @error('foto')
                        <div class=" text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="mt-10 text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 w-full">Buat Aduan</button>
            </form>
        </div>
    </div>

    <script>
            function preview(){
                frame.src= URL.createObjectURL(event.target.files[0]);
        }
            function preview2(){
                frame2.src= URL.createObjectURL(event.target.files[0]);
            }
    </script>
</body>
</html>