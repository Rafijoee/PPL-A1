@extends('layouts.dashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | RIWAYAT ADUAN</title>
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display:none;
        }
    </style>
</head>
<body class="bg-[#F2FBFF] text-[#185141]">
    <div class="p-4 sm:ml-64 mt-16 mb-96 text-justify ">
        <form method="post" action="/dashboard/pengaduan-penyuluh/edit/{{ Crypt::encryptString($reports["id"]) }}">
            @method('put')
            @csrf
            <h2 class="text-4xl font-bold">{{ $reports->judul_laporan }}</h2>
            <p>{{ $reports->updated_at->format('D d M Y H:i:s') }}</p>
            <br>
            <a href="/dashboard/pengaduan-penyuluh" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Kembali</a>
            @if ($reports->handling__statuses_id == 3)
            @else
                <a href="/dashboard/pengaduan-penyuluh/{{ Crypt::encryptString($reports["id"]) }}/edit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Edit</a>
            @endif
            <h2 class="text-2xl font-bold mt-5">Isi Aduan Petani</h2>
            <div class="bg-gray-100 py-2 text-justify mt-3 px-2 rounded-lg">
                <p class="">{!! $reports->isi_aduan !!}</p>
            </div>
            <br>
            <h2 class="text-2xl font-bold">Foto dari Petani</h2>
            <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" alt="" class="scale-75">
            <div class="border-t-2 border-gray-200 mb-5">
                <h2 class="text-2xl font-bold mt-5 mb-3">Isi Aduan Penyuluh</h2>
                <div class="bg-gray-100 text-justify px-5 pb-3 rounded-lg mb-5">
                    <p>{!! $reports->isi_aduan_penyuluh !!}</p>
                </div>
                <h2 class="text-2xl font-bold">Foto dari Penyuluh</h2>
                <img src="{{ asset('storage/'.$reports->foto_penyuluh) }}" alt="" class="scale-75 max-h-[800px]">
            </div>
            
            <div class="mt-5" id="tanggapan" style="display: block;">
                <h2 class="text-2xl font-bold mt-5 border-t-2">Tanggapan Penyuluh</h2>
                <div>
                    <label for="verification_statuses_id" class="form-label text-md font-bold">Status Verifikasi</label>
                    <select name="verification_statuses_id"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($verifs as $verif)
                        @if (old('verification_statuses_id', $reports->verification_statuses_id) == $verif->id)
                            <option value="{{ $verif->id }}" selected>{{ $verif->name }}</option>
                        @else
                            <option value="{{$verif->id}}">{{$verif->name}}</option>
                        @endif
                            
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="isi_aduan_penyuluh" class="form-label text-md font-medium">Isi Tanggapan Penyuluh</label>
                    <input id="tanggapan_penyuluh" type="hidden" name="tanggapan_penyuluh" class="" value="{{ old('tanggapan_penyuluh', $reports->tanggapan_penyuluh) }}">
                    <trix-editor input="tanggapan_penyuluh" class="mt-3 bg-white"></trix-editor>
                </div>
                <h2 class="text-2xl font-bold mt-5">Tanggapan Pemerintah</h2>
                <div class="text-justify mt-3">
                    @if ($reports->tanggapan_pemerintah)
                    <div class="bg-gray-100 text-justify px-5 pt-3 pb-3 rounded-xl">
                        <p >{!! $reports->tanggapan_pemerintah !!}</p>
                    </div>
                    @else
                    <p class="bg-gray-100 text-justify px-5 pt-3 pb-3 rounded-xl">Belum ada tanggapan</p>
                    @endif
                </div>
            </div>
            <button type="submit" class="text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md  w-full py-2 px-2 mt-10">Perbarui Tanggapan</button>
        </form>
    </div>

</body>
</html>