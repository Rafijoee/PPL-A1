<div class="mt-24 px-2 sm:ml-[31vh] text-justify flex flex-row w-auto">
    <div class="w-[30vh] bg-gray-200 rounded-l-lg ">
        <h1 class="text-lg font-bold ml-2 mt-2 border-b-2 border-gray-300 pb-2.5 flex justify-between">Chats <i class="fa-regular fa-comment-dots fa-xl mt-3.5 mr-2 justify-end" style="color: #8a9099"></i></h1>
        <div class="flex flex-col ml-2 mt-2">
            @foreach ($kontaks as $kontak)
            <a href="/konsultasi-penyuluh/{{$from_id}}" class="flex items-center hover:bg-gray-100 hover:border-gray-300 border rounded-lg p-2 transition duration-300">
                <img class="w-8 h-8 rounded-full mr-2" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
                <h1>{{$kontak}}</h1>
            </a>
            @endforeach

        </div>
    </div>
    @yield('content')
</div>