@extends('layouts.dashboard')
@section('title', 'Tutorial')


<body class="bg-[#F2FBFF]">
    <div class="sm:ml-72 mt-28 sm:mt-32 mb-64 flex justify-center">
        <div class="bg-white border-4 rounded-xl pb-12 mx-16 w-full">
            <div class="flex justify-center my-6 mx-32 flex-col">
                <h1 class="font-bold text-4xl text-center font-poppins">Cara Konsultasi<h1>
                <hr class="border-t-2 border-[#185141]">
                <div class="mx-4 mb-4 mt-8">1. </div>
                <img src="" class="m-8" alt="">
                <div class="m-4">2. Pilih Penyuluh yang tersedia di wilayah anda</div>
                <img src="{{asset('images/konsultasi_petani1.png')}}" class="m-8" alt="">
                <div class="m-4">3. Tulis Pesan yang ingin ditanyakan</div>
                <img src="{{asset('images/konsultasi_petani2.png')}}" class="m-8" alt="">
                <div class="m-4">4. Pesan yang dikirim dan diterima akan ditampilkan dilayar</div>
                <img src="{{asset('images/konsultasi_petani3.png')}}" class="m-8" alt="">
            </div>
        </div>
        <div class="flex justify-center mx-32">
            <img src="" alt="">
        </div>
        <div>
        </div>
    </div>
    </div>
</body>