@extends('layouts.app2')
@section('title', 'Dashboard')
@section('content')

<div class="container">
    <div class="w-screen h-full overflow-x-clip flex flex-col sm:flex-row bg-[#F2FBFF]">
        <div class="gambar-bulet w-1/2 sm:ml-20 sm:mt-5">
            <div class="text-sm text-[#185141] font-bold bg-white bg-opacity-80 absolute w-62 px-5 py-3 left-80 top-52 z-20 rounded-lg border sm:left-[480px]">
                <p>Bolak-balik ke penyuluh untuk <br> membuat aduan?</p>
            </div>
            <div class="text-sm text-[#185141] font-bold bg-white bg-opacity-80 absolute w-62 px-5 py-3 left-10 top-[470px] z-20 rounded-lg border sm:left-32 sm:top-[500px]">
                <p>ribet dan mahal?</p>
            </div>
            <div class="w-[450px] sm:w-[500px] h-[450px] sm:h-[500px] border-4 border-[#40C6A1] absolute rounded-full ml-16 sm:ml-20 mt-32 sm:mt-28">
            </div>
            <img src="{{asset('images/Ellipse 75.png')}}" class="scale-150 mt-52 sm:mt-10 ml-40 sm:ml-5 sm:scale-75" alt="">
        </div>
        <div class="text mt-40 mb-12 sm:ml-40 text-center sm:text-left text-[#274C5B]">
            <p class="font-semibold italic sm:text-2xl">Monitoring aduan anda secara realtime</p>
            <p class="font-extrabold text-4xl my-2 sm:my-6 sm:text-5xl">Selamat Datang di Monitor!</p>
            <p class="font-bold text-2xl sm:text-5xl sm:pr-40">Lindungi Hak Petani, Tingkatkan Kualitas Pertanian</p>
            <p class="text-[#185141] mt-5 mb-5 sm:text-xl">Laporkan keluhan Anda kepada penyuluh dan dinas terkait untuk <br> mendapatkan solusi dan bantuan.</p>
            <div class="sm:flex sm:flex-row sm:mr-20 sm:-ml-10">
                <img src="{{asset('images/icon.svg')}}" alt="" class="ml-10">
                <p class="-mt-8 ml-8 mb-5 font-medium sm:mt-10">Bermitra dengan penyuluh pertanian sewilyah Jember</p>
                <img src="{{asset('images/icon (1).svg')}}" alt="" class="ml-10">
                <p class="-mt-8 ml-8 font-medium mb-10 sm:mt-10">Bermitra dengan Dinas Ketahanan Pangan Jember</p>
            </div>
            <div class="sm:mt-5 mt-3">
                @if (Auth::check())
                <a href="{{ route('dashboard') }}" class="font-bold text-[#efefef] bg-[#1A6E57] hover:text-[#1A6E57] hover:bg-[#F2FBFF] hover:border-[#1A6E57] hover:border-2 py-2 px-10 rounded-xl sm:py-3.5 sm:px-20 sm:text-xl">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="font-bold text-[#efefef] bg-[#1A6E57] hover:text-[#1A6E57] hover:bg-[#F2FBFF] hover:border-[#1A6E57] hover:border-2 py-2 px-10 rounded-xl sm:py-3.5 sm:px-20 sm:text-xl">Masuk</a>
                @endif
            </div>
        </div>
    </div>
    <div class="w-screen relative flex flex-col items-center text-[#185141] bg-[#F2FBFF]">
        <img src="{{ asset('images/tani.png') }}" alt="" class="w-full">
        <div class="bg-white bg-opacity-85  sm:w-2/3 w-full absolute sm:top-[615px] top-60 sm:rounded-xl shadow-md  p-10">
            <p>tentang kami</p>
            <p class="text-5xl font-bold my-4">Apa itu Monitor</p>
            <p class="text-justify">Monitor adalah platform digital yang menghubungkan petani dengan penyuluh dan Dinas Ketahanan Pangan Kabupaten Jember . Platform kami hadir untuk mempermudah pengaduan dan mempercepat penyelesaian masalah yang dialami oleh petani di Kabupaten Jember.</p>
        </div>
        <p class="text-5xl font-bold mt-72 sm:mt-20">Layanan</p>
        <p class="mt-3 text-lg mb-10">layanan yang tersedia di Monitor</p>
    </div>
    <div class="w-screen flex flex-col sm:flex-row items-center gap-7 sm:gap-0 sm:pb-52 pb-20 bg-[#F2FBFF] text-white">
        <div class="kotak-kiri bg-[#185141] rounded-xl w-2/3 sm:w-1/2 sm:mr-20 sm:ml-96 sm:pb-[23px] flex flex-col justify-center">
            <img src="{{ asset('images/lp.png') }}" alt="" class="ml-[135px] sm:ml-48 -mt-5 sm:mt-5 scale-50 max-w-40 flex justify-center">
            <p class="text-3xl font-bold text-center -mt-8">Pengaduan</p>
            <p class="text-lg text-center px-10 my-2">Membuat Aduan Lebih Mudah</p>
            <p class="text-sm text-center mx-5 pb-5 sm:mx-8">Adukan masalah terkait pertanian yang sedang dialami. Penyuluh dan pemerintah akan memverifikasi aduan anda dengan segera.</p>
        </div>
        <div class="kotak-kanan bg-[#185141] rounded-xl w-2/3 sm:mr-96 sm:w-1/2 sm:ml-0 sm:pt-3 sm:pb-5 flex flex-col justify-center">
            <img src="{{ asset('images/ks.png') }}" alt="" class="ml-[135px] sm:ml-48 sm:mt-9 scale-75 max-w-40">
            <p class="text-3xl font-bold text-center">Konsultasi</p>
            <p class="text-lg text-center px-10 my-2">Konsultasi dengan Penyuluh Online</p>
            <p class="text-sm text-center mx-5 pb-5">Hubungi penyuluh yang berada di lokasi sekitar anda untuk memberikan jawaban atas pertanyaan terkait pertanian.</p>
        </div>
    </div>
    <div class="w-screen relative">
        <img src="{{ asset('images/sawah.png') }}" alt="" class="max-h-[1000px]">
        <div class="text-[#185141] w-screen sm:w-1/2 h-[644px] bg-white bg-opacity-80 sm:bg-opacity-95 sm:rounded-3xl top-0 sm:top-44 sm:right-20 absolute z-10">
            <p class="text-center sm:text-left pl-16 text-5xl font-bold mt-16">Benefit <br> yang didapatkan : </p>
            <div>
                <p class="mt-10 text-center sm:text-left pl-16 text-xl sm:text-2xl font-semibold">Pengaduan Cepat dan Murah</p>
                <p class="mx-12 pl-4 sm:text-xl">Mempermudah petani dalam melakukan pengaduan masalah pertanian dengan cepat dan efisien.</p>
                <p class="mt-5 text-center sm:text-left pl-16 text-xl sm:text-2xl font-semibold">Media Konsultasi Online</p>
                <p class="mx-12 pl-4 sm:text-xl">Memudahkan petani untuk konsultasi secara langsung pada penyuluh tanpa harus bertemu secara offline.</p>
                <p class="mt-5 text-center sm:text-left pl-16 text-xl sm:text-2xl font-semibold">Penyelesaian Masalah Lebih Cepat</p>
                <p class="mx-12 pl-4 sm:text-xl">Membantu menanggapi aduan pertanian dengan cepat dan tepat.</p>
                <p class="mt-5 text-center sm:text-left pl-16 text-xl sm:text-2xl font-semibold">Memberikan Informasi Terbaru</p>
                <p class="mx-12 pl-4 sm:text-xl">Memberikan informasi terkait permasalahan pertanian yang telah ditangani oleh pemerintah.</p>
            </div>
        </div>
    </div>
    <div class="w-screen h-20 sm:h-40 bg-[#F2FBFF]">

    </div>
    <div class="mt-10">
        <div class="w-screen flex items-center justify-center mb-20 bg-[#185141] py-5">
            <p class="text-center font-extrabold text-4xl text-white">Berita Terbaru</p>
        </div>
    </div>
    <div class="w-screen mb-20">
        <div class="grid sm:grid-cols-4 justify-center gap-5 sm:gap-y-10 sm:ml-20 sm:mx-auto">
            @foreach ($news as $berita)
            <div class="max-w-sm h-[380px] relative flex flex-col bg-white shadow hover:bg-gray-100 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <a href="dashboard/berita/{{$berita->slug}}">
                    <img class="rounded-t-lg h-44 w-full mx-auto" src="{{ asset('storage/'.$berita->image) }}" alt="" />
                </a>
                <div class="pt-5 pl-2">
                    <a href="dashboard/berita/{{$berita->slug}}">
                        <h5 class="mb-2 text-2xl capitalize font-bold tracking-tight text-gray-900 dark:text-white">{{ $berita->judul_berita }}</h5>
                    </a>
                    <!-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> -->
                    <div class="absolute top-80">
                        <p class="mb-3 mr-5 font-normal text-gray-400">{{ $berita->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="w-screen flex bg-[#F2FBFF]">
            <div class="flex flex-row m-10 w-6/12">
                <div class="w-full border-r-4">
                    <div class="flex text-end my-6 flex-col mx-10">
                        <h1 class="font-semibold text-4xl font-poppins text-[#185141]">Hubungi Kami</h1>
                        <div class="mt-10">
                            <h2 class="font-medium text-[#185141]">Email</h2>
                            <h3 class="font-light text-[#525C60]">email@email.com</h3>
                        </div>
                        <div class="mt-10">
                            <h2 class="font-medium text-[#185141]">Nomor</h2>
                            <h3 class="font-light text-[#525C60]">666 888 888</h3>
                        </div>
                        <div class="mt-10">
                            <h2 class="font-medium text-[#185141]">Alamat Dinas Ketahanan Pangan</h2>
                            <h3 class="font-light text-[#525C60]">Jl. kita masih panjang</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col m-10 w-7/12">
                <div class="mx-40">
                    <img class="w-40" src="{{ asset('images/logo1.png') }}" alt="" />
                </div>
                <img class="w-80 mx-20 my-10" src="{{ asset('images/sosmed_footer.png') }}" alt="" />
            </div>
        </div>
        <div class="w-screen bg-[#F2FBFF] flex-col items-center">
            <hr class="sm:mx-auto border-y-2" />
            <span class="block p-4 text-sm text-gray-500 sm:text-center dark:text-gray-400">Copyright © <strong>Monitor</strong></span>
        </div>
    </div>
</div>

@endsection