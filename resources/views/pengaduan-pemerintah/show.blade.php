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
    <div class="p-4 sm:ml-72 mt-16 mb-60">
        <div class="border-b-4 border-[#185141]">
            <h1 class="font-bold text-7xl">Laporan Pengaduan</h1>
            <hr class="mt-5">
        </div>    

        <div class=" flex w-full justify-center">
            <form class=" w-2/3" method="post" action="/dashboard/pengaduan-pemerintah/{{ Crypt::encryptString($reports["id"]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <h1 class="font-bold text-4xl">Aduan Petani</h1>
                <p class="text-gray-300">{{ $namakecamatan->name }}, {{ $reports->created_at->format('D d M Y H:i:s') }}</p>
                
                <div class="border-b-4 space-y-4 mt-3 pb-5 border-gray-200">
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
                    <div class="bg-gray-100 text-justify px-5 py-3 rounded-xl">
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
                    <h1 class="font-bold text-4xl mb-3">Aduan Penyuluh</h1>
                </div>
                <div>
                <div>      
                    <label for="isi_aduan" class="form-label text-3xl font-medium">Isi Aduan Penyuluh</label>
                    </div>
                    <div class="bg-gray-100 text-justify px-5 py-3 mt-2 mb-3 rounded-xl">
                        <p>{!! $reports->isi_aduan_penyuluh !!}</p>
                    </div>
                
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
                    <label for="isi_aduan" class="form-label text-3xl font-medium">Tanggapan Penyuluh</label>
                    </div>
                    @if ($reports->tanggapan_penyuluh)
                    <div class="bg-gray-100 text-justify px-5 pb-3 mt-2 rounded-xl pt-2">
                        <p>{!! $reports->tanggapan_penyuluh !!}</p>
                    @else
                    <div class="bg-gray-100 text-justify px-5 pb-3 mt-2 rounded-xl pt-2">
                        <p>Belum ada tanggapan</p>        
                                     
                    @endif
                    
                </div>
                <div class="text-justify mt-3">
                    <label for="tanggapan_pemerintah" class="form-label text-3xl font-medium">Tanggapan Pemerintah</label>
                    @if ($reports->tanggapan_pemerintah)
                    <div class="bg-gray-100 text-justify px-5 pt-2 pb-3 mt-2 rounded-xl">
                        <p >{!! $reports->tanggapan_pemerintah !!}</p>
                    </div>
                    @else
                        <p class="bg-gray-100 text-justify px-5 pt-3 pb-3 mt-2 rounded-xl">Belum ada tanggapan</p>
                    @endif
                </div>

                @if ($reports->handling__statuses_id == 3)                    

                @else
                <div>
                    <label for="handling" class="form-label text-3xl font-bold">Status Penanganan</label>
                    <select name="handling_statuses_id"  class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($handlings as $handling)
                        @if (old('handling_statuses_id', $reports->handling__statuses_id) == $handling->id)
                            <option value="{{ $handling->id }}" selected>{{ $handling->name }}</option>
                        @else
                            <option value="{{$handling->id}}">{{$handling->name}}</option>
                        @endif
                            
                        @endforeach
                    </select>
                </div>
                @if ($reports->tanggapan_pemerintah)
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block w-full mt-10 text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Perbarui Tanggapan
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin perbarui tanggapan?</h3>
                                <button data-modal-hide="popup-modal" type="submit" class="mt-10 text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-10">
                                    Ya, perbarui
                                </button>
                                <button data-modal-hide="popup-modal" type="button" class="mt-10 text-red-500 bg-white hover:border-2 hover:border-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-5">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <button id="button" class="text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md  w-full py-2 px-2" onclick="hideShow()">Buat Tanggapan</button>
                @endif
                <div class="mt-5" id="tanggapan" style="display: none;">
                    @if ($reports->tanggapan_pemerintah)    
                    @else
                        <div>
                            <label for="isi_aduan_pemerintah" class="form-label text-md font-bold">Isi Tanggapan</label>
                            <input id="isi_aduan_pemerintah" type="hidden" name="isi_aduan_pemerintah" class="" value="{{ old('isi_aduan_pemerintah', $reports->tanggapan_pemerintah) }}">
                            <trix-editor input="isi_aduan_pemerintah" class="mt-3 bg-white"></trix-editor>
                            @error('isi_aduan_pemerintah')
                                <div class=" text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif

                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block w-full mt-10 text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Kirim Tanggapan
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin membuat tanggapan?</h3>
                                <button data-modal-hide="popup-modal" type="submit" class="mt-10 text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-10">
                                    Ya, Kirim
                                </button>
                                <button data-modal-hide="popup-modal" type="button" class="mt-10 text-red-500 bg-white hover:border-2 hover:border-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-5">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @endif
                
                
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