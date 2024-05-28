@extends('layouts.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan | Buat Aduan</title>

</head>

</head>
<body class="bg-[#F2FBFF] text-[#185141]">
    <div class="p-4 sm:ml-72 mt-16 mb-60">
        <h1 class="font-bold text-4xl border-b-2">Perbarui Aduan</h1>

        <div class="mt-10 flex w-full justify-center">
                <form class="space-y-4 md:space-y-6 w-2/3" method="post" action="/dashboard/pengaduan/{{ Crypt::encryptString($reports["id"]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="judul_laporan" class="block mb-2 text-md font-medium dark:text-white">Judul Aduan</label>
                    <input type="text" name="judul_laporan" id="judul_laporan" class="@error('judul_laporan') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="judul aduan"  value="{{ old('judul_laporan', $reports->judul_laporan) }}">
                    @error('judul_laporan')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="alamat" class="block mb-2 text-md font-medium dark:text-white">Alamat / Lokasi Sawah</label>
                    <input type="text" name="alamat" id="alamat" class="@error('alamat') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. alamat sawah" value="{{ old('alamat', $reports->alamat) }}" >
                    @error('alamat')
                        <div class=" text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="kecamatan" class="block mb-2 text-md font-medium dark:text-white">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan">
                        @foreach ($kecamatans as $kecamatan )
                        @if(old('kecamatan_id', $reports->kecamatan_id) == $kecamatan->id)
                            <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->name }}</option>
                        @else
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                        @endif 
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="image" class="form-label text-md font-medium">Foto Sawah</label>
                    <input type="hidden" name="oldImage" value="{{ $reports->foto_lokasi }}">
                    @if ($reports->foto_lokasi)
                        <img src="{{ asset('storage/'.$reports->foto_lokasi) }}" class="object-scale-down max-h-80 w-auto" id="frame" alt="">
                    @else    
                        <img class="object-scale-down max-h-80 w-auto" id="frame">
                    @endif
                    <input class="form-control @error('image') border-red-500 @enderror mt-3 border-gray-300 rounded-lg bg-gray-50 border w-full" type="file" id="image" name="image" onchange="preview()">
                    @error('image')
                        <div class=" text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="isi_aduan" class="form-label text-md font-medium">Isi Aduan</label>
                    <input id="isi_aduan" type="hidden" name="isi_aduan" class="" value="{{ old('isi_aduan', $reports->isi_aduan) }}">
                    <trix-editor input="isi_aduan" class="mt-3 bg-white"></trix-editor>
                    @error('isi_aduan')
                        <div class=" text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block mt-10 text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Perbarui Aduan
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin Perbarui aduan?</h3>
                                <button data-modal-hide="popup-modal" type="submit" class="mt-10 text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-10">
                                    Ya, Perbarui
                                </button>
                                <button data-modal-hide="popup-modal" type="button" class="mt-10 text-red-500 bg-white hover:border-2 hover:border-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-10">Batal</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <button type="submit" class="mt-10 text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">Simpan</button>
            </form>
        </div>
    </div>

    <script>
            function preview(){
                frame.src= URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>