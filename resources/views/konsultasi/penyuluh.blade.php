@extends('layouts.index')
@extends('layouts.navbar')
@extends('layouts.dashboard2')
@section('title', 'Konsultasi')
@extends('konsultasi.extends')

@section('content')
<form class="w-full text-justify mt-24" method="post" action="/konsultasi-penyuluh" enctype="multipart/form-data">
    @csrf
    <div class="bg-gray-100">
        <div class=" bg-white rounded-lg shadow-lg w-full">
            <!-- Chat Header -->
            <div class="bg-gray-200 px-4 py-2 rounded-r-lg flex items-center justify-between -mt-24">
                <div class="flex items-center">
                    <img class="w-8 h-8 rounded-full mr-2" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Sender">
                    <h1 class="text-lg font-bold">sasa</h1>
                </div>
            </div>
            <div class=" p-4 overflow-y-auto flex flex-col h-[78vh]" style=>
                <!-- Sender Message -->
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
                <!-- Chat Input -->
                <div class="bg-gray-200 px-4 flex py-2 mb-4 rounded-b-lg fixed bottom-0  -ml-4 w-[1250px] ">
                    <input type="text" name="body" id="body" class="flex flex-grow appearance-none rounded-full py-2 px-3 mr-2 focus:outline-none focus:shadow-outline" placeholder="Type your message...">
                    <button type="submit" class=" px-3 py-2 bg-[#40A1A1] text-white rounded-full hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Kirim</button>
                </div>
            </div>
        </div>
</form>
</div>
@endsection