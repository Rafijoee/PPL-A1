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
    <div class="p-4 sm:ml-72 mt-16 mb-96 text-justify ">
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
            <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" alt="" class="scale-75 max-h-[800px]">
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
                    @if ($reports->tanggapan_penyuluh)
                        <div class="bg-gray-100 px-3 py-2 rounded-lg">
                            <p>{!! $reports->tanggapan_penyuluh !!}</p>
                        </div>
                    @else
                        <trix-editor input="tanggapan_penyuluh" class="mt-3 bg-white"></trix-editor>
                        @error('tanggapan_penyuluh')
                        <div class=" text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
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
            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block w-full mt-10 text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                perbarui Aduan
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin memperbarui tanggapan?</h3>
                                <button data-modal-hide="popup-modal" type="submit" class="mt-10 text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-10">
                                    Ya, perbarui
                                </button>
                                <button data-modal-hide="popup-modal" type="button" class="mt-10 text-red-500 bg-white hover:border-2 hover:border-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-5">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- <button type="submit" class="text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md  w-full py-2 px-2 mt-10">Perbarui Tanggapan</button> -->
        </form>
    </div>

</body>
</html>