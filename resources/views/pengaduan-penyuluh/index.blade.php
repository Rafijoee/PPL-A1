@extends('layouts.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan</title>
</head>
<body>
    <div class="p-4 sm:ml-64 mt-16">
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

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                sedang diverifikasi
                            @elseif ($report->verification_statuses_id == 3)
                                sudah diverifikasi
                            @else
                                belum diverifikasi
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($report->handling__statuses_id == 2)
                                sedang ditindaklanjuti
                            @elseif ($report->handling__statuses_id == 3)
                                sudah ditindaklanjuti
                            @else
                                belum ditindaklanjuti
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="/dashboard/pengaduan-penyuluh/{{ Crypt::encryptString($report["id"]) }}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">View</a>
                            <a href="/dashboard/pengaduan-penyuluh/{{ Crypt::encryptString($report["id"]) }}/edit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 ml-3">Buat Aduan</a>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>