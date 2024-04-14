@extends('layouts.dashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | RIWAYAT ADUAN</title>
</head>
<body class="bg-[#F2FBFF] text-[#185141]">
    <div class="p-4 sm:ml-64 mt-16 mb-96 text-justify mx-10">
        <h2 class="text-4xl font-bold">{{ $reports->judul_laporan }}</h2>
        <p>{{ $reports->created_at->format('D d M Y H:i:s') }}</p>
        <br>
        <a href="/dashboard/pengaduan" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Kembali</a>
        @if ($reports->verification_statuses_id == 1)
            <a href="/dashboard/pengaduan/{{ Crypt::encryptString($reports["id"]) }}/edit" class="text-white bg-yellow-200 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Edit</a>
        @endif
        <h2 class="text-2xl font-bold mt-5">Isi Aduan</h2>
        <div class="bg-gray-100 text-justify px-5 rounded-xl pb-5">
            <p class="">{!! $reports->isi_aduan !!}</p>
        </div>
        <br>
        <h2 class="text-2xl font-bold">Foto</h2>
        <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" alt="" class="scale-75">
        <!-- <a href="#" id="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 ml-5 mr-5 mx-auto flex justify-center" onclick="hideShow()">Lihat Tanggapan</a> -->
        <button id="button" class="text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md  w-full py-2 px-2" onclick="hideShow()">Lihat Tanggapan</button>       
        <div class="mt-5" id="tanggapan" style="display: none;">
            <h2 class="text-2xl font-bold mt-5 border-t-2">Tanggapan Penyuluh</h2>
            @if ($reports->tanggapan_penyuluh)
                <h6 class="text-md text-gray-400">Penyuluh {{$namakecamatan->name}} - {{ $reports->updated_at->format('D d M Y') }}</h6>
            @endif
            <div class="text-justify mt-3">
            @if ($reports->tanggapan_penyuluh)
                    <div class="bg-gray-100 text-justify px-5 pt-3 pb-3 rounded-xl">
                        <p >{!! $reports->tanggapan_penyuluh !!}</p>
                    </div>
                @else
                    <p class="bg-gray-100 text-justify px-5 pt-3 pb-3 rounded-xl">Belum ada tanggapan</p>
                @endif
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
    </div>
    <script>
        var div = document.getElementById("tanggapan");
        var button = document.getElementById("button");
        var display = 1;

        function hideShow(){
        if (display == 1){
            div.style.display = 'block';
            display = 0;
            button.remove();
            }
        else{
            div.style.display = 'none';
            display = 1;
            }
        }
    </script>
</body>
</html>