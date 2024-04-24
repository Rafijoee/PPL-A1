<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | KONSULTASI</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">
    @foreach ($chats_kita as $chat)
    @if ($chat->from_id == Auth::user()->id)
    <div class="flex flex-col space-y-4">
        <div class="flex justify-end items-center space-x-2">
            <div class="bg-gray-200 rounded-lg p-3">
                <p class="text-sm">{{$chat->body}}</p>
            </div>
        </div>
    </div>
    @elseif ($chat->to_id == Auth::user()->id)
    <div class="flex flex-col space-y-4">
        <div class="flex justify-start items-center space-x-2">
            <div class="bg-blue-200 rounded-lg p-3">
                <p class="text-sm">{{$chat->body}}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg w-full">
        <div class="px-4 py-2 bg-gray-200 w-full">
            <form action="/chat" method="POST">
                @csrf
                <div class="flex items-center w-full">
                    <input type="text" name="body" id="body" class=" flex-1 appearance-none rounded-full py-2 px-4 mr-2 focus:outline-none focus:shadow-outline" placeholder="Type your message...">
                    <button type="submit" class=" px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Send</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>