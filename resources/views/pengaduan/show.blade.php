@extends('layouts.dashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | RIWAYAT ADUAN</title>
</head>
<body class="bg-[#F2FBFF] text-[#185141] flex flex-col sm:flex-row overflow-x-hidden">

    <a href="/dashboard/pengaduan" class="sm:ml-80 sm:mt-32 max-h-8 mt-20 ml-3">
        <svg class="w-[35px] h-[35px] text-[#185141] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
        </svg>
    </a>
    <div class="p-4 w-full sm:mt-28 border-2 border-[#40C6A1] rounded-3xl mt-4 sm:mb-10 sm:ml-10 text-justify bg-white sm:mr-32">
        <h2 class="text-4xl font-bold">{{ $reports->judul_laporan }}</h2>
        <p>{{ $reports->created_at->format('D d M Y H:i:s') }}</p>
        <br>
        <div class="flex gap-2 sm:gap-0">
            <a href="/dashboard/pengaduan-riwayat/{{ Crypt::encryptString($reports["id"]) }}" class="text-white bg-[#037367] hover:bg-[#035367] font-medium rounded-lg text-md sm:px-10 px-8 sm:w-60 py-1.5 text-center sm:ml-[1080px]">
                <div class="absolute sm:top-[222px] sm:left-[1527px] top-[237px] left-[21px]">
                    <svg class="w-[28px] h-[28px] text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
                Lihat Riwayat
            </a>
            @if ($reports->verification_statuses_id == 1)
            <a href="/dashboard/pengaduan/{{ Crypt::encryptString($reports["id"]) }}/edit" class="text-white bg-[#037367] hover:bg-[#035367] font-medium rounded-lg text-md sm:pl-12 sm:pr-10 px-8 py-1.5 text-center sm:ml-[20px]">
                <div class="absolute sm:left-[1770px] sm:top-[220px] left-[200px] top-[237px]">
                    <svg class="w-[28px] h-[28px] text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                    </svg>
                </div>
                Edit
            </a>
            @endif
        </div>
        <h2 class="text-2xl font-bold mt-5">Isi Aduan</h2>
        <div class="bg-gray-100 text-justify mt-2 px-5 pt-3 pb-3 rounded-xl ">
            <p class="">{!! $reports->isi_aduan !!}</p>
        </div>
        <br>
        <h2 class="text-2xl font-bold">Foto</h2>
        <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" alt="" class="max-h-[800px] my-3">
        <!-- <a href="#" id="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 ml-5 mr-5 mx-auto flex justify-center" onclick="hideShow()">Lihat Tanggapan</a> -->
        <button id="button" class="text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md  w-full py-2 px-2 mt-3" onclick="hideShow()">Lihat Tanggapan</button>       
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
