@extends('layouts.dashboard')
@section('title', 'RIWAYAT | '.ucwords($reports->judul_laporan).'')

<body class="bg-[#F2FBFF]">
    <div class="sm:ml-64 ml-8 mt-20 h-full w-[88%]">
        <div class=" sm:mx-20 mt-40 pb-10 bg-white rounded-2xl border-8">
            <h1 class="font-bold text-4xl m-7 text-center">Riwayat Aduan</h1>
            <hr>
            <div class="ml-20 mt-10">
                <ol class="relative border-s border-gray-200 dark:border-gray-700">                  
                    <li class="mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="ml-5 pt-1.5">
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Membuat Aduan dengan judul '{{ ucwords($reports->judul_laporan) }}'</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $reports->created_at->translatedFormat('l, d F Y H: i') }}</time>
                        </div>
                    </li>
                    @if ($reports->verification_statuses_id == 1)
                        
                    <li class="mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="ml-5 pt-1.5">
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Menunggu Verifikasi dari Penyuluh</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Aduan anda sedang diproses.</p>
                        </div>
                    </li>
                    @elseif ($reports->verification_statuses_id == 2)
                    <li class="mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-yellow-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="ml-5 pt-1.5">
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Sedang Diverifikasi oleh Penyuluh</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Aduan anda sedang diproses.</p>
                        </div>
                    </li>
                    @elseif ($reports->verification_statuses_id == 3)
                    <li class="mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-lime-200 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="ml-5 pt-1.5">
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Aduan Anda Sudah Diverifikasi oleh Penyuluh</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{ $reports->tanggapan_penyuluh }}</p>
                        </div>
                    </li>
                    <li class="pt-3 mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="ml-5 pt-1.5">
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Aduan Anda telah Diajukan Ke Pemerintah</h3>
                        </div>
                    </li>
                        @if ($reports->handling__statuses_id == 1)
                        <li class="pt-3 mb-10 ms-6">            
                            <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </span>
                            <div class="ml-5 pt-1.5">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Menunggu Pemrosesan dari Pemerintah</h3>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Aduan anda sedang diproses.</p>
                            </div>
                        </li>
                        @elseif ($reports->handling__statuses_id == 2)
                        <li class="pt-3 mb-10 ms-6">            
                            <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-yellow-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </span>
                            <div class="ml-5 pt-1.5">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Sedang Diproses oleh Pemerintah</h3>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{!! $reports->tanggapan_pemerintah !!}</p>
                            </div>
                        </li>
                        @else
                        <li class="pt-3 mb-10 ms-6">            
                            <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-lime-200 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </span>
                            <div class="ml-5 pt-1.5">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Aduan Anda Sudah Ditangani oleh Pemerintah</h3>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{!! $reports->tanggapan_pemerintah !!}</p>
                            </div>
                        </li>
                        <li class="pt-1 mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-lime-200 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="ml-5 pt-1.5">
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Aduan Anda Sudah Selesai</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $reports->updated_at->translatedFormat('l, d F Y H: i') }}</time>
                        </div>
                    </li>
                        @endif
                    @elseif ($reports->verification_statuses_id == 4)
                    <li class="mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-lime-200 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="ml-5 pt-1.5">
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Aduan Anda Sudah Diverifikasi oleh Penyuluh</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{!! $reports->tanggapan_penyuluh !!}</p>
                        </div>
                    </li>
                    <li class="mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-10 h-10 -ml-2 bg-red-300 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="ml-5 pt-1.5">
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Aduan Anda Ditolak oleh Penyuluh</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $reports->updated_at->translatedFormat('l, d F Y H: i') }}</time>
                        </div>
                    </li>
                    @endif
                
                </ol>
            </div>            


        </div>
    </div>
</body>