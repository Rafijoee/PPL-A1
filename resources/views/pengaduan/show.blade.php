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
        <a href="/dashboard/pengaduan" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Kembali</a>
        <a href="#" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Edit</a>
        <h2 class="text-2xl font-bold mt-5">Isi Aduan</h2>
        <p class="text-right">{!! $reports->isi_aduan !!}</p>
        <br>
        <h2 class="text-2xl font-bold">Foto</h2>
        <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" alt="" class="scale-75">
        <a href="#" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 ml-5 mr-5 mx-auto flex justify-center">Lihat Tanggapan</a>
    </div>
</body>
</html>