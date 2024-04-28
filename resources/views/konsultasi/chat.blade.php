@extends('layouts.navbar')
@extends('layouts.dashboard2')
@extends('layouts.index')
@section('title', 'Konsultasi')
    <div class="p-4 sm:ml-64 text-justify mt-12">
        <form class="space-y-4 md:space-y-6" method="post" action="/chat" enctype="multipart/form-data">
            @csrf
            <div class="bg-gray-100">
                <div class="max-w-full bg-white rounded-lg shadow-lg w-full">
                    <!-- Chat Header -->
                    <div class="bg-gray-200 px-4 py-2 rounded-t-lg flex items-center justify-between mt-0">
                        <div class="flex items-center ">
                            <img class="w-8 h-8 rounded-full mr-2" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Sender">
                            <h1 class="text-lg font-bold">{{$profile_lain->nama}}</h1>
                        </div>
                    </div>
                    <div class=" p-4 overflow-y-auto flex flex-col" style=>
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
                    <div class="bg-gray-200 px-4 py-2 rounded-b-lg fixed bottom-0 w-full justify-content-end">
                        <input type="text" name="body" id="body" class="w-[1160px] flex-1 appearance-none rounded-full py-2 px-3 mr-2 focus:outline-none focus:shadow-outline" placeholder="Type your message...">
                        <button type="submit" class=" px-3 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Send</button>
                    </div>
                </div>
            </div>
        </form>
    </div>