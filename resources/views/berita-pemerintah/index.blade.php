@extends('layouts.dashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
</head>
<body class="bg-[#F2FBFF] text-[#185141]">
    <div class="p-4 sm:ml-72 mt-16">
        <h1 class="font-bold text-4xl">Berita</h1>

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


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
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
                            Tanggal Aduan
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
                            <div class="max-[1500px]:w-28">
                                {{ $report->judul_laporan }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-[1500px]:w-28">
                                {{ $report->created_at }}
                            </div>
                        </td>
                        <td class="px-6 py-4">    
                            @if ($report->verification_statuses_id == 2)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-yellow-200 rounded-lg text-gray-900">
                                    sedang diverifikasi
                                </div>
                            @elseif ($report->verification_statuses_id == 3)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-24 bg-lime-300 rounded-lg text-gray-900">
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
                            <a href="/dashboard/berita-pemerintah/{{ Crypt::encryptString($report["id"]) }}" class="font-medium text-[#40C6A1] hover:underline">Lihat</a>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-10">
            <a href="/dashboard/berita-pemerintah/create" class="text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">Buat Berita</a>
        </div>

        <div class="mt-10 mb-60 gap-2 relative grid justify-between grid-cols-4 max-[1500px]:grid-cols-2 max-[800px]:grid-cols-1">
            @foreach ($news as $berita) 
            <div class="max-w-sm h-[450px] flex flex-col bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg h-44 mx-auto" src="{{ asset('storage/'.$berita->image) }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $berita->judul_berita }}</h5>
                    </a>
                    <!-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> -->
                    <p class="mb-3 font-normal text-gray-400">Tanggal penulisan: {{ $berita->updated_at->format('D d M Y H:i') }}</p>
                    <div class="absolute top-96">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                        <a href="/dashboard/berita-pemerintah/{{ $berita->slug }}/edit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Edit‎ ‎ ‎ 
                            <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</body>
</html>