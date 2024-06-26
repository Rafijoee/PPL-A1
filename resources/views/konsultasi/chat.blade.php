@extends('layouts.dashboard')
@extends('layouts.index')
@section('title', 'Konsultasi')
    <div class="p-4 sm:ml-64 text-justify mt-12">
        <form class="space-y-4 md:space-y-6" method="post" action="/chat" enctype="multipart/form-data">
            @csrf
            <div class="bg-white">
                
                    <!-- Chat Header -->
                    <div class="bg-gray-200 px-4 py-2 rounded-t-lg flex items-center justify-between sm:ml-20">
                        <div class="flex items-center ">
                            <img class="w-8 h-8 rounded-full mr-2" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Sender">
                            <h1 class="text-lg font-bold">{{$profile_lain->nama}}</h1>
                        </div>
                    </div>
                    <div class=" p-4 sm:min-h-[85vh] flex flex-col sm:ml-20 bg-gray-100" style=>
                        @foreach ($chats_kita as $chat)
                        <!-- Sender Message -->
                        @if ($chat->to_id == Auth::user()->id)
                        <div class="flex items-start mb-4 ">
                            <div class="flex-shrink-0 ">
                                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Sender">
                            </div>
                            <div class="ml-3 ">
                                <div class="bg-blue-100 px-4 py-2 rounded-lg">
                                    <p class=" text-sm text-gray-700">{{$chat->body}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Receiver Message -->
                        @elseif ($chat->from_id == Auth::user()->id)
                        <div class="flex items-start justify-end mb-4 ">
                            <div class="mr-3">
                                <div class="bg-green-100 px-4 py-2 rounded-lg">
                                    <p class="text-sm text-gray-700">{{$chat->body}}</p>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ">
                                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Receiver">
                            </div>
                        </div>
                        <!-- Add more messages here -->
                        @endif
                        @endforeach
                    </div>
                    <!-- Chat Input -->
                    <div class="bg-gray-200 px-4 py-2 rounded-b-lg fixed bottom-0 sm:w-[80vw] sm:ml-20 flex justify-end items-center space-x-2">
                        <input type="text" name="body" id="body" class="w-[70vw] flex-1 appearance-none rounded-full py-2 px-3 focus:outline-none focus:shadow-outline" placeholder="Type your message...">
                        <button type="submit" class="px-3 py-2 bg-[#185141] text-white rounded-full focus:outline-none focus:bg-blue-600">Kirim</button>
                    </div>
            </div>
        </form>
    </div>