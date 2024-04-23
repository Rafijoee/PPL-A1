@extends('layouts.dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | KONSULTASI</title>
</head>

<body class="ml-80 mt-20">
    @foreach ($chats_kita as $chat)
    @if ($chat->from_id == Auth::user()->id)
    <div class="flex flex-col space-y-4">
        <div class="flex justify-start items-center space-x-2">
            <div class="bg-gray-200 rounded-lg p-3">
                <p class="text-sm">{{$chat->body}}</p>

            </div>
        </div>
    </div>
    @elseif ($chat->to_id == Auth::user()->id)
    <div class="flex flex-col space-y-4">
        <div class="flex justify-end items-center space-x-2">
            <div class="bg-blue-200 rounded-lg p-3">
                <p class="text-sm">{{$chat->body}}</p>
            </div>
        </div>
    </div>
    @endif


    @endforeach
</body>

</html>