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
    <div class="p-4 sm:ml-80 sm:mr-12 sm:mt-28 border-2 border-[#40C6A1] rounded-3xl mt-24 ml-2 mr-1 mb-10 bg-white">
        @if ($reports->isi_aduan_penyuluh)  
        <h1 class="font-bold text-6xl text-center">Perbarui Aduan</h1>
        @else
        <h1 class="font-bold text-6xl text-center">Buat Aduan</h1>
        @endif

        <div class="mt-10 flex w-full justify-center">
            <form class="space-y-4 md:space-y-6 w-2/3" method="post" action="/dashboard/pengaduan-penyuluh/{{ Crypt::encryptString($reports["id"]) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
                <div class="border-b-4 border-gray-200">
                    <div>
                        <h2 class="text-2xl font-bold mt-5">Nama Petani</h2>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="judul aduan"  value="{{ $username  }}" readonly>
                    </div>
                    <div>
                        <label for="judul_laporan" class="block mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Judul Aduan</label>
                        <input type="text" name="judul_laporan" id="judul_laporan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="judul aduan"  value="{{ $reports->judul_laporan }}" readonly>
                    </div>
                    <div>
                        <label for="alamat" class="block mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Alamat / Lokasi Sawah</label>
                        <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. alamat sawah" value="{{ $reports->alamat }}" readonly>
                    </div>
                    <div>
                        <label for="kecamatan" class="block mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Kecamatan</label>
                        <input type="text" value="{{ $namakecamatan->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                    </div>

                    <div>      
                        <label for="isi_aduan" class="form-label text-2xl font-semibold">Isi Aduan Petani</label>
                    </div>
                    <div class="bg-gray-100 text-justify px-5 pb-3 rounded-xl">
                        <p>{!! $reports->isi_aduan !!}</p>
                    </div>
                    <div class="mb-10 mt-3">
                        <label for="image" class="form-label text-2xl font-semibold">Foto Petani</label>
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
                    <label for="isi_aduan_penyuluh" class="form-label text-2xl font-semibold">Isi Aduan Penyuluh</label>
                    <input id="isi_aduan_penyuluh" type="hidden" name="isi_aduan_penyuluh" class="" value="{{ old('isi_aduan_penyuluh', $reports->isi_aduan_penyuluh) }}">
                    <trix-editor input="isi_aduan_penyuluh" class="mt-3 bg-white"></trix-editor>
                    @error('isi_aduan_penyuluh')
                        <div class=" text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="image" class="form-label text-2xl font-semibold">Foto Konfirmasi Penyuluh</label>
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
                <!-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block mt-10 text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full" type="button">
                Buat Aduan
                </button>
                <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin membuat aduan?</h3>
                                <button data-modal-hide="popup-modal" type="submit" class="mt-10 text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-10">
                                    Ya, Kirim
                                </button>
                                <button data-modal-hide="popup-modal" type="button" class="mt-10 text-red-500 bg-white hover:border-2 hover:border-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-5">Batal</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                @if ($reports->isi_aduan_pemerintah)
                <button type="submit" class="mt-10 text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 sm:ml-[920px] ml-[253px]">Perbarui</button>
                    
                @else
                <button type="submit" class="mt-10 text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 sm:ml-[920px] ml-[253px]">Kirim</button>
                    
                @endif
                
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