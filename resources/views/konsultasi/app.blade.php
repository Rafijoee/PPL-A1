@extends('layouts.index')
@extends('layouts.navbar')
@extends('layouts.dashboard2')
@section('title', 'Konsultasi')

<div class="mt-24 px-2 sm:ml-[31vh] text-justify flex flex-row w-auto">
    <div class="w-[30vh] bg-gray-200 rounded-l-lg ">
        <h1 class="text-lg font-bold ml-2 mt-2 border-b-2 border-gray-300 pb-2.5 flex justify-between">Chats <i class="fa-regular fa-comment-dots fa-xl mt-3.5 mr-2 justify-end" style="color: #8a9099"></i></h1>
        <div class="flex flex-col ml-2 mt-2">
            @foreach ($kontaks as $kontak)
            <a href="/konsultasi-penyuluh/{{$to_id}}" class="flex items-center hover:bg-gray-100 hover:border-gray-300 border rounded-lg p-2 transition duration-300">
                <img class="w-8 h-8 rounded-full mr-2" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
                <h1>{{$kontak}}</h1>
            </a>
            @endforeach

        </div>
    </div>
    <form class="w-full" method="post" action="/chat" enctype="multipart/form-data">
        @csrf
        <div class="bg-gray-100">
            <div class=" bg-white rounded-lg shadow-lg w-full">
                <!-- Chat Header -->
                <div class="bg-gray-200 px-4 py-6 rounded-r-lg flex items-center justify-between">

                </div>
                <div class=" p-4 overflow-y-auto flex flex-col h-[78vh]" style=>
                    <img class="h-full scale-150" src="{{ asset('images/konsultasi_baru.png') }}" alt="Deskripsi Gambar">

                </div>
                <!-- Chat Input -->
                <div class="bg-gray-200 px-4 flex py-6 rounded-b-lg fixed bottom-0  w-[72vw] ">
                        <!-- <input type="text" name="body" id="body" class="flex flex-grow appearance-none rounded-full py-2 px-3 mr-2 focus:outline-none focus:shadow-outline" placeholder="Type your message...">
                        <button type="submit" class=" px-3 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Send</button> -->
                </div>
            </div>
        </div>
    </form>
</div>