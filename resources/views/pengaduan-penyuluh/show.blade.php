@extends('layouts.dashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | RIWAYAT ADUAN</title>
</head>
<body class="bg-[#F2FBFF] text-[#185141]">
    <div class="p-4 sm:ml-72 mt-16 mb-96 text-justify ">
        <h2 class="text-4xl font-bold">{{ $reports->judul_laporan }}</h2>
        <p>{{ $reports->updated_at->format('D d M Y H:i:s') }}</p>
        <br>
        <a href="/dashboard/pengaduan-penyuluh" class="text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Kembali</a>
        @if ($reports->handling__statuses_id == 1)
            @if ($reports->tanggapan_penyuluh)
                
            @else
                <a href="/dashboard/pengaduan-penyuluh/{{ Crypt::encryptString($reports["id"]) }}/edit" class="text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-1.5 text-center me-2 mb-28">Edit</a>
            @endif
        @else
        @endif
        <h2 class="text-2xl font-bold mt-5">Isi Aduan Petani</h2>
        <p class="text-right">{!! $reports->isi_aduan !!}</p>
        <br>
        <h2 class="text-2xl font-bold">Foto dari Petani</h2>
        <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" alt="" class="scale-75 max-h-[800px]">
        <div class="border-t-2 border-gray-200 mb-5">
            <h2 class="text-2xl font-bold mt-5 mb-3">Isi Aduan Penyuluh</h2>
            @if ($reports->isi_aduan_penyuluh)                
            <div class="bg-gray-100 text-justify px-5 pb-3 rounded-lg mb-5">
                <p>{!! $reports->isi_aduan_penyuluh !!}</p>
            </div>
            @else
            <div class="bg-gray-100 text-justify px-5 pb-3 rounded-lg mb-5">
                <p>Belum membuat aduan</p>
            </div>
            @endif
            <h2 class="text-2xl font-bold">Foto dari Penyuluh</h2>
            <img src="{{ asset('storage/'.$reports->foto_penyuluh) }}" alt="" class="scale-75 max-h-[800px]">
        </div>
        <button id="button" class="text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md  w-full py-2 px-2" onclick="hideShow()">Lihat Tanggapan</button>       
        <div class="mt-5" id="tanggapan" style="display: none;">
            <h2 class="text-2xl font-bold mt-5 border-t-2">Tanggapan Penyuluh</h2>
            @if ($reports->tanggapan_penyuluh)
                <h6 class="text-md text-gray-400">Penyuluh {{$namakecamatan->name}} - {{ $reports->updated_at->format('D d M Y') }}</h6>
            @endif
            <div class="text-justify mt-3 gap-10">
            @if ($reports->tanggapan_penyuluh)
                    <div class="bg-gray-100 text-justify px-5 pt-3 pb-3 rounded-xl mb-5">
                        <p >{!! $reports->tanggapan_penyuluh !!}</p>
                    </div>
                    @if ($reports->verification_statuses_id == 3)
                        
                    @else
                        @if ($reports->verification_statuses_id == 4)
                            
                        @else
                            <a href="/dashboard/pengaduan-penyuluh/edit/{{ Crypt::encryptString($reports["id"]) }}" class="text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md py-2 px-2">Perbarui Tanggapan</a>
                        @endif
                    @endif
                @else
                    <p class="bg-gray-100 text-justify px-5 pt-3 pb-3 rounded-xl mb-5">Belum ada tanggapan, Buatlah tanggapan</p>
                    <a href="/dashboard/pengaduan-penyuluh/edit/{{ Crypt::encryptString($reports["id"]) }}" class="text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md py-2 px-2">Buat Tanggapan</a>
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