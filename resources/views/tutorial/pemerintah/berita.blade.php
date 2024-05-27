@extends('layouts.dashboard')
@section('title', 'Tutorial')


<body class="bg-[#F2FBFF]">
    <div class="sm:ml-72 mt-28 sm:mt-32 mb-64 flex justify-center">
        <div class="bg-white border-4 rounded-xl pb-12 mx-16 w-full">
            <div class="flex justify-center my-6 mx-32 flex-col">
                <h1 class="font-extrabold text-4xl text-center font-poppins text-[#185141]">Tutorial Membuat Berita </h1>
                <hr class="border-t-2 border-[#185141]">
                <ol class="list-decimal list-inside mx-4 text-[#185141] mt-8 space-y-4 font-semibold">
                    <li>Klik “Berita”</li>
                    <li>Klik “Buat berita”</li>
                    <img src="{{asset('images/pemerintah_berita1.png')}}" class="mx-8 my-4" alt="">
                    <li>Isi semua data di formulir dan upload foto lampiran</li>
                    <li>Pastikan format dokuman benar dan semua data terisi. Klik “Simpan”</li>
                    <img src="{{asset('images/pemerintah_berita2.png')}}" class="mx-8 my-4" alt="">
                </ol>
            </div>
        </div>
        <div class="flex justify-center mx-32">
            <img src="" alt="">
        </div>
        <div>
        </div>
    </div>
</body>