@extends('layouts.index')
@extends('layouts.navbar')
@extends('layouts.dashboard2')
@section('title', 'Dashboard')
<body class="bg-[#F2FBFF]">
    <div class="p-4 sm:ml-64 text-justify mt-20 sm:mr-5">
        <div id="default-carousel" class="relative w-full pl-20 pr-20 ml-5" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="#">
                        <img src="{{asset('images/logo_dinas.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="#">
                        <img src="{{asset('images/logo_dinas.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="#">
                        <img src="{{asset('images/logo_dinas.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="#">
                        <img src="{{asset('images/logo_dinas.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <!-- Item 5 -->
                <a href="#">
                    <img src="{{asset('images/logo_dinas.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </a>
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
    
        
        <div class="mt-10 flex justify-center mx-auto">
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-10/12 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="md:w-full">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-96 md:w-full md:rounded-none md:rounded-s-lg" src="{{ asset('storage/'.$news[0]->image) }}" alt="">
                    <h5 class="absolute -mt-16 ml-3 mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">{{ $news[0]->judul_berita }}</h5>
                    <h5 class="absolute -mt-8 ml-3 mb-2 text-sm font-normal tracking-tight text-white dark:text-white">{{ $news[0]->updated_at->format('D d M Y') }}</h5>
                </div>
                <div class="flex flex-col justify-between p-8 md:p-10 md:w-72">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $body }}</p>
                </div>
            </a>
        </div>
    
    </div>
</body>
