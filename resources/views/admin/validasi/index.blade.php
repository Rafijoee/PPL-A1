@extends('layouts.dashboard')
@section('title', 'Validasi')

<body class="bg-[#F2FBFF] text-[#185141] flex flex-col sm:flex-row overflow-x-hidden">

    <a href="/dashboard" class="sm:ml-80 sm:mt-32 max-h-8 mt-20 ml-3">
        <svg class="w-[35px] h-[35px] text-[#185141] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14M5 12l4-4m-4 4 4 4" />
        </svg>
    </a>

    <div class="p-4 w-full sm:mt-28 border-2 border-[#40C6A1] rounded-3xl mt-4 sm:mb-10 sm:ml-10 text-justify bg-white sm:mr-32 flex flex-col items-center">
        <h1 class="text-4xl font-bold">Data Petani Belum Terveirifikasi</h1>
        <hr class="w-full border-2 border-[#40C6A1] my-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full my-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#40C6A1] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nomor Handphone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Verifikasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ $profile->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $profile->no_hp }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $profile->alamat }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($profile->status === null)
                                <p>Belum Terverifikasi</p>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('validasi.edit', $profile->id) }}" class="font-medium text-[#40C6A1] hover:underline">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>