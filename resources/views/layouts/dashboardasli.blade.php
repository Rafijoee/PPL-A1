@extends('layouts.index')
@extends('layouts.navbar')
@extends('layouts.dashboard2')
@section('title', 'Dashboard')

<body class="bg-[#F2FBFF]">
    <div class="p-4 sm:ml-64 text-justify mt-20 sm:mr-5">
        <div id="default-carousel" class="relative w-full pl-20 pr-20 ml-5" data-carousel="slide">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                @if (Auth::user()->roles_id == 2 )
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="tutorial-petani/aduan">
                        <img src="{{asset('images/aduan_petani.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="tutorial-petani/tanggapan">
                        <img src="{{asset('images/aduan_penyuluhdanpetani.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="tutorial-petani/konsultasi">
                        <img src="{{asset('images/konsultasi.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                @elesif(Auth::user()->roles_id == 3)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="tutorial-penyuluh/aduan">
                        <img src="{{asset('images/aduan_penyuluh.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="tutorial-penyuluh/konsultasi">
                        <img src="{{asset('images/aduan_penyuluhdanpetani.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                @elseif (Auth::user()->roles_id == 4)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="tutorial-pemerintah/berita">
                        <img src="{{asset('images/aduan_penyuluh.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="tutorial-penyuluh/aduan">
                        <img src="{{asset('images/aduan_penyuluhdanpetani.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                @endif
            </div>


            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#40C6A1] dark:bg-gray-800/30 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#40C6A1] dark:bg-[#40C6A1] group-hover:bg-[#40C6A1] dark:group-[#40C6A1] group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <div class="pl-4 pr-4 xl:pr-12 m-3 sm:ml-20 mt-20 flex flex-row">
            <p class="font-bold text-2xl xl:text-5xl">Berita Terbaru</p>
            <div class="xl:ml-10 mt-7 mx-auto bg-gray-900 w-[72%] max-h-1"></div>
        </div>

        <div class="mt-10 sm:ml-10 flex justify-center mx-auto">
            <a href="dashboard/berita/{{$news[0]?->slug}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-11/12 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="md:w-full">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-96 md:w-full border  border-gray-400 md:rounded-none md:rounded-s-lg" src="{{ asset('storage/'.$news[0]?->image) }}" alt="">
                    <div class="text-balance whitespace-normal hyphens-auto">
                        <h5 class="absolute capitalize -mt-24 sm:-mt-32 xl:-mt-16 ml-3 mr-20 sm:mr-20 md:mr-80 mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">{{ $news[0]?->judul_berita }}</h5>
                    </div>
                    <h5 class="absolute -mt-96 xl:-mt-8 ml-3 mb-2 text-sm font-normal tracking-tight text-white dark:text-white">{{ $news[0]?->updated_at->translatedFormat('l, d F Y H: i') }}</h5>
                </div>
                <div class="flex flex-col justify-between p-8 md:p-10 md:w-72">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! $body !!}</p>
                </div>
            </a>
        </div>

        <div class="pl-4 pr-4 xl:pr-12 sm:ml-20 mt-10 flex flex-row">
            <p class="font-bold text-2xl xl:text-4xl">Viral</p>
            <!-- <div class="xl:ml-10 mt-7 mx-auto bg-gray-900 w-9/12 max-h-1"></div> -->
        </div>

        <div class="mt-5 mb-60 ml-[100px] mr-16 gap-2 grid justify-between grid-cols-4 max-[1500px]:grid-cols-2 max-[800px]:grid-cols-1">

            @foreach ($news->skip(1) as $berita)
            <div class="max-w-sm h-[380px] relative flex flex-col bg-white hover:bg-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="dashboard/berita/{{$berita->slug}}">
                    <img class="rounded-t-lg h-44 w-full mx-auto" src="{{ asset('storage/'.$berita->image) }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="dashboard/berita/{{$berita->slug}}">
                        <h5 class="mb-2 text-2xl capitalize font-bold tracking-tight text-gray-900 dark:text-white">{{ $berita->judul_berita }}</h5>
                    </a>
                    <!-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> -->
                    <div class="absolute top-80">
                        <p class="mb-3 mr-5 font-normal text-gray-400">Tanggal penulisan: {{ $berita->updated_at->format('D d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</body>