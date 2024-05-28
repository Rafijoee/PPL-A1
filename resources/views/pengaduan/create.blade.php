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
    <div class="p-4 sm:ml-80 sm:mr-12 sm:mt-28 border-2 border-[#40C6A1] rounded-3xl mt-24 ml-2 mr-1 mb-10 bg-white ">
        <div class="">
            <h1 class="font-bold text-6xl uppercase text-center">Buat Aduan</h1>
            <!-- <hr class="mt-5"> -->
        </div>    
        
        <div class="mt-10 flex w-full justify-center">
                <form class="space-y-4 md:space-y-6 w-2/3" method="post" action="/dashboard/pengaduan" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="judul_laporan" class="block mb-2 text-3xl font-medium dark:text-white">Judul Aduan</label>
                    <input type="text" name="judul_laporan" id="judul_laporan" class="@error('judul_laporan') border-red-500 @enderror bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="judul aduan"  value="{{ old('judul_laporan') }}">
                    @error('judul_laporan')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="alamat" class="block mb-2 text-3xl font-medium dark:text-white">Alamat / Lokasi Sawah</label>
                    <input type="text" name="alamat" id="alamat" class="@error('alamat') border-red-500 @enderror bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. alamat sawah" value="{{ old('alamat') }}" >
                    @error('alamat')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="kecamatan" class="block mb-2 text-3xl font-medium dark:text-white">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan">
                        @foreach ($kecamatans as $kecamatan )
                        @if(old('kecamatan_id') == $kecamatan->id)
                            <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->name }}</option>
                        @else
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                        @endif 
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="image" class="form-label text-3xl font-medium">Foto Sawah</label>
                    <img class="object-scale-down max-h-80 w-auto" id="frame">
                    <input class="@error('image') border-red-500 @enderror form-control mt-3 border-gray-300 rounded-lg bg-gray-50 border w-full " type="file" id="image" name="image" onchange="preview()">
                    @error('image')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="isi_aduan" class="form-label text-3xl font-medium">Isi Aduan</label>
                    <input id="isi_aduan" type="hidden" name="isi_aduan" class="" value="{{ old('isi_aduan') }}">
                    <trix-editor input="isi_aduan" class="mt-3 bg-white @error('isi_aduan') border-red-500 @enderror"></trix-editor>
                    @error('isi_aduan')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="mt-10 text-white bg-[#037367] hover:bg-[#035367] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center sm:ml-[920px] ml-[273px] mb-2">Kirim</button>
                <button type="submit" class="mt-10 text-white bg-[#185141] hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">Kirim</button>
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