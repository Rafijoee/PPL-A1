@extends('layouts.dashboard')
@section('title', 'MONITOR | NOTIFIKASI')

<body class="bg-[#F2FBFF]">

    <div class="sm:ml-64 ml-8 mt-20 h-full w-[88%]">
        <div class=" sm:mx-20 mt-40 pb-10 bg-white rounded-2xl border-8">

            <h1 class="font-bold text-4xl m-7">Notifikasi</h1>

            @if (Auth::user()->roles_id == 2)
            @foreach ($notifs as $notif)
            <hr>
            <div class="flex items-center pb-2 mx-5 mb-5 mt-4 ">
                <div class="relative inline-block shrink-0">
                    <img class="w-[85,3px] h-12" src="{{asset('images/notifikasi.png')}}" />
                </div>
                <div class="ms-3 text-sm font-normal">
                    @if ($notif->user_id > 2 )
                    <p class="text-sm font-semibold text-gray-900 dark:text-white m-1">Penyuluh Telah Memberi Tanggapan pada Aduan Anda</p>
                    @elseif ($notif->user_id == 2)
                    <p class="text-sm font-semibold text-gray-900 dark:text-white m-1">Pemerintah Telah Memberi Tanggapan pada Aduan Anda</p>
                    @endif
                    <div class="ml-5 text-sm font-normal m-1 border-l-2">
                        <p class="ml-2">{{strip_tags($notif->title)}}</p>
                    </div>
                    <span class=" m-1 text-xs font-medium text-blue-600 dark:text-blue-500">{{ $notif->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @endforeach
            @endif
            @if (Auth::user()->roles_id == 3)

            @foreach ($notifs as $notif)
            <hr>
            <div class="flex items-center pb-2 mx-5 mb-5 mt-4 ">
                <div class="relative inline-block shrink-0">
                    <img class="w-[85,3px] h-12" src="{{asset('images/notifikasi.png')}}" />
                </div>
                <div class="ms-3 text-sm font-normal">
                    @if ($notif->user_id > 2 )
                    <p class="text-sm font-semibold text-gray-900 dark:text-white m-1">Petani Telah Aduan</p>
                    @elseif ($notif->user_id == 2)
                    <p class="text-sm font-semibold text-gray-900 dark:text-white m-1">Pemerintah Telah Memberi Tanggapan pada Aduan Anda</p>
                    @endif
                    <div class="ml-5 text-sm font-normal m-1 border-l-2">
                        <p class="ml-2">{{strip_tags($notif->title)}}</p>
                    </div>
                    <span class=" m-1 text-xs font-medium text-blue-600 dark:text-blue-500">{{ $notif->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @endforeach
            @endif
            @if (Auth::user()->roles_id == 4)

            @foreach ($notifs as $notif)
            <hr>
            <div class="flex items-center pb-2 mx-5 mb-5 mt-4 ">
                <div class="relative inline-block shrink-0">
                    <img class="w-[85,3px] h-12" src="{{asset('images/notifikasi.png')}}" />
                </div>
                <div class="ms-3 text-sm font-normal">
                    @if ($notif->user_id > 32 )
                    <p class="text-sm font-semibold text-gray-900 dark:text-white m-1">Petani Telah Aduan</p>
                    @elseif ($notif->user_id > 2 && $notif->user_id < 34 )
                    <p class="text-sm font-semibold text-gray-900 dark:text-white m-1">Penyuluh Telah Memberi Tanggapan pada Aduan Anda</p>
                    @endif
                    <div class="ml-5 text-sm font-normal m-1 border-l-2">
                        <p class="ml-2">{{strip_tags($notif->title)}}</p>
                    </div>
                    <span class=" m-1 text-xs font-medium text-blue-600 dark:text-blue-500">{{ $notif->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</body>