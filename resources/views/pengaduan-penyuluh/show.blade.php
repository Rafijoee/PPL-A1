@extends('layouts.dashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | RIWAYAT ADUAN</title>
</head>
<body>
    <div class="p-4 sm:ml-64 mt-16 mb-96 text-justify ">
        <h2 class="text-4xl font-bold">{{ $reports->judul_laporan }}</h2>
        <p>{{ $reports->updated_at->format('D d M Y H:i:s') }}</p>
        <br>
        <a href="/dashboard/pengaduan-penyuluh" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Kembali</a>
        <a href="/dashboard/pengaduan-penyuluh/{{ Crypt::encryptString($reports["id"]) }}/edit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Edit</a>
        <h2 class="text-2xl font-bold mt-5">Isi Aduan Petani</h2>
        <p class="text-right">{!! $reports->isi_aduan !!}</p>
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
        <a href="#" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 ml-5 mr-5 mx-auto flex justify-center">Lihat Tanggapan</a>
        <br>
    </div>
</body>
</html>