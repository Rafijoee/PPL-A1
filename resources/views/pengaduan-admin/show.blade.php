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
            <h1 class="font-bold text-7xl">Laporan Pengaduan</h1>
            <hr class="mt-5">
        </div>    

        <div class=" flex w-full justify-center">
            <form class="space-y-4 md:space-y-6 w-2/3" method="post" action="/dashboard/pengaduan-pemerintah/{{ Crypt::encryptString($reports["id"]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <h1 class="font-bold text-4xl">Aduan Petani</h1>
                <div class="border-b-4 border-gray-200">
                    <div>
                        <label for="judul_laporan" class="block mb-2 text-3xl font-medium dark:text-white">Judul Aduan</label>
                        <input type="text" name="judul_laporan" id="judul_laporan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="judul aduan"  value="{{ $reports->judul_laporan }}" readonly>
                    </div>
                    <div>
                        <label for="alamat" class="block mb-2 text-3xl font-medium dark:text-white">Alamat / Lokasi Sawah</label>
                        <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. alamat sawah" value="{{ $reports->alamat }}" readonly>
                    </div>
                    <div>
                        <label for="kecamatan" class="block mb-2 text-3xl font-medium dark:text-white">Kecamatan</label>
                        <input type="text" value="{{ $namakecamatan->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                    </div>

                    <div>      
                        <label for="isi_aduan" class="form-label text-3xl font-medium">Isi Aduan Petani</label>
                    </div>
                    <div class="bg-gray-100 text-justify px-5 pb-3 rounded-xl">
                        <p>{!! $reports->isi_aduan !!}</p>
                    </div>
                    <div class="mb-10 mt-3">
                        <label for="image" class="form-label text-3xl font-medium">Foto Petani</label>
                        <div class="flex justify-center mt-6">
                            <input type="hidden" name="oldImage" value="{{ $reports->foto_lokasi }}">
                            @if ($reports->foto_lokasi)
                                <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" class="object-scale-down max-h-[800px] w-auto" id="frame" alt="">
                            @else    
                                <img class="object-scale-down max-h-[800px] w-auto" id="frame">
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="font-bold text-4xl ">Aduan Penyuluh</h1>
                </div>
                <div>
                <div>      
                    <label for="isi_aduan" class="form-label text-3xl font-medium">Isi Aduan Penyuluh</label>
                    </div>
                    @if ($reports->isi_aduan_penyuluh)
                    <div class="bg-gray-100 text-justify px-5 py-2 mt-2 rounded-xl">
                        <p>{!! $reports->isi_aduan_penyuluh !!}</p>
                    </div>
                    @else
                    <div class="bg-gray-100 text-justify px-5 py-2 mt-2 rounded-xl">
                        <p>Belum ada tanggapan</p>
                    </div>
                    @endif
                
                    <div>
                        <label for="image" class="form-label text-3xl font-medium">Foto Konfirmasi Penyuluh</label>
                        <div class="flex justify-center mt-6">
                            <input type="hidden" name="oldImage2" value="{{ $reports->foto_penyuluh }}">
                            @if ($reports->foto_penyuluh)
                                <img src="{{ asset('storage/'.$reports->foto_penyuluh) }}" alt="" class="scale-75 max-h-[800px]" id="frame2">
                            @else
                                <img class="object-scale-down max-h-[800px] w-auto" id="frame2">
                            @endif
                        </div>
                    
                    </div>
                    <div class="border-t-4">
                        <label for="isi_aduan" class="form-label text-3xl font-medium">Tanggapan Penyuluh</label>
                        </div>
                        @if ($reports->tanggapan_penyuluh)
                        <div class="bg-gray-100 text-justify px-5 pb-3 rounded-xl pt-2">
                            <p>{!! $reports->tanggapan_penyuluh !!}</p>
                        @else
                        <div class="bg-gray-100 text-justify px-5 pb-3 rounded-xl pt-2">
                            <p>Belum ada tanggapan</p>        
                                        
                        @endif
                    </div>
                    
                </div>
                <div class="text-justify mt-3">
                    <label for="tanggapan_pemerintah" class="form-label text-3xl font-medium">Tanggapan Pemerintah</label>
                    @if ($reports->tanggapan_pemerintah)
                    <div class="bg-gray-100 text-justify px-5 pt-2 pb-3 rounded-xl mt-3">
                        <p >{!! $reports->tanggapan_pemerintah !!}</p>
                    </div>
                    @else
                        <p class="bg-gray-100 text-justify px-5 pt-3 pb-3 rounded-xl mt-3">Belum ada tanggapan</p>
                    @endif
                </div>

                <div>
                    <label for="tanggapan_pemerintah" class="form-label text-3xl font-medium">Status Penanganan</label>
                    @if ( $reports->handling__statuses_id ==1)
                    <div class="bg-gray-100 text-justify px-5 pt-2 pb-3 rounded-xl mt-3">
                            <p >Belum ditindaklanjuti</p>
                    </div>
                    @elseif ( $reports->handling__statuses_id == 2 )
                    <div class="bg-gray-100 text-justify px-5 pt-2 pb-3 rounded-xl mt-3">
                            <p >Sedang ditindaklanjuti</p>
                    </div>
                    
                    @else
                    <div class="bg-gray-100 text-justify px-5 pt-2 pb-3 rounded-xl mt-3">
                            <p >Sudah ditindaklanjuti</p>
                    </div>
                        
                    @endif
                </div>
                
                
            </form>
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

            function preview(){
                frame.src= URL.createObjectURL(event.target.files[0]);
            }
            function preview2(){
                frame2.src= URL.createObjectURL(event.target.files[0]);
            }
    </script>
</body>
</html>