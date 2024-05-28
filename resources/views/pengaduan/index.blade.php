@extends('layouts.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | PENGADUAN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Demo styles -->
    <style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }

      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* border-radius: 20px; */

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    </style>
</head>
</body>
</html>
<body class="bg-[#F2FBFF]">
    <div class="p-4 sm:ml-72 mt-16">
        <h1 class="font-bold text-4xl">Pengaduan</h1>

        @if (session()->has('success'))
        <div id="alert-border-3" class="flex items-center mt-5 p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif

        <!-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#40C6A1] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul Aduan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Verifikasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Handling
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)                  
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $report->judul_laporan }}
                        </td>
                        <td class="px-6 py-4">    
                            @if ($report->verification_statuses_id == 2)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-yellow-200 rounded-lg text-gray-900">
                                    sedang diverifikasi
                                </div>
                            @elseif ($report->verification_statuses_id == 3)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-lime-300 rounded-lg text-gray-900">
                                sudah diverifikasi
                                </div>
                            @elseif ($report->verification_statuses_id == 4)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-red-300 rounded-lg text-gray-900">
                                Aduan ditolak
                                </div>
                            @else
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-sky-300 rounded-lg text-gray-900">
                                belum diverifikasi
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            
                            @if ($report->handling__statuses_id == 2)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-yellow-200 rounded-lg text-gray-900">
                                sedang ditindaklanjuti
                                </div>
                            @elseif ($report->handling__statuses_id == 3)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-lime-300 rounded-lg text-gray-900">
                                sudah ditindaklanjuti
                                </div>
                            @else
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-sky-300 rounded-lg text-gray-900">
                                belum ditindaklanjuti
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="/dashboard/pengaduan/{{ Crypt::encryptString($report["id"]) }}" class="font-medium text-[#40C6A1] hover:underline">Lihat</a>
                            <a href="/dashboard/pengaduan-riwayat/{{ Crypt::encryptString($report["id"]) }}" class="font-medium text-[#40C6A1] hover:underline ml-5">Riwayat</a>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div> -->

            <!-- Swiper -->
        <div class="swiper mySwiper mt-16 border-[#40C6A1]">
            <div class="swiper-wrapper">
                <div class="swiper-slide h-96 rounded-xl bg-[#037367] hover:bg-[#035367]">
                    <a href="/dashboard/pengaduan/create" class="rounded-xl w-full">
                        <div class="h-[450px] rounded-xl flex flex-col items-center justify-center focus:ring-4 border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                            <svg class="w-16 h-16 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
                            </svg>
                            <p class="font-bold text-2xl text-white">Buat Aduan</p>
                        </div>
                    </a>
                </div>
                @foreach ($reports as $report )
                    <div class="swiper-slide h-96 relative rounded-xl border border-[#40C6A1]">
                            <div class="mx-5 ">
                                <p>{{ $report->judul_laporan }}</p>
                            </div>
                            <div>
                                <div class="">
                                    @if ($report->handling__statuses_id == 2)
                                        <div class="absolute top-2 left-2 text-sm w-[38%] bg-yellow-200 rounded-lg text-gray-900">
                                        sedang ditindaklanjuti
                                        </div>
                                    @elseif ($report->handling__statuses_id == 3)
                                        <div class="absolute top-2 left-2 text-sm w-[38%] bg-lime-300 rounded-lg text-gray-900">
                                        sudah ditindaklanjuti
                                        </div>
                                    @else
                                        <div class="absolute top-2 left-2 text-sm w-[38%] bg-sky-300 rounded-lg text-gray-900">
                                        belum ditindaklanjuti
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="badge">
                            @if ($report->verification_statuses_id == 2)
                                <div class="absolute top-2 right-2 text-sm w-1/3 bg-yellow-200 rounded-lg text-gray-900">
                                    sedang diverifikasi
                                </div>
                            @elseif ($report->verification_statuses_id == 3)
                                <div class="absolute top-2 right-2 text-sm w-1/3 bg-lime-300 rounded-lg text-gray-900">
                                sudah diverifikasi
                                </div>
                            @elseif ($report->verification_statuses_id == 4)
                                <div class="absolute top-2 right-2 px-0.5 text-sm w-1/3 bg-red-300 rounded-lg text-gray-900">
                                Aduan ditolak
                                </div>
                            @else
                                <div class=" absolute top-2 right-2 text-sm w-1/3 bg-sky-300 rounded-lg text-gray-900">
                                belum diverifikasi
                                </div>
                            @endif
                            </div>
                            <div class="absolute bottom-10">
                                <a href="/dashboard/pengaduan/{{ Crypt::encryptString($report["id"]) }}" class="bg-[#037367] hover:bg-[#035367] py-0.5 px-5 rounded-md text-white">lihat</a>
                            </div>
                            <!-- <div class="absolute bottom-6 mt-3">
                                <a href="/dashboard/pengaduan-riwayat/{{ Crypt::encryptString($report["id"]) }}" class="py-1 px-3.5 rounded-md text-gray-500 hover:text-gray-300">Riwayat</a>
                            </div> -->
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next text-[#40A1A1]"></div>
            <div class="swiper-button-prev  text-[#40A1A1]"></div>
            <div class="swiper-pagination "></div>
        </div>
        

    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 5,
        spaceBetween: 30,
        slidesPerGroup: 5,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
</body>
</html>