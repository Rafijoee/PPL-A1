<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-[#F2FBFF]">
    <div class="">
        @if (session()->has('success'))
        <div id="alert-border-3" class="flex items-center mt-5 p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif
    </div>

    <div class="relative my-20 mx-44">
        <img src="{{ asset('images/profile.png') }}" alt="Background Image" class="w-full">
        <div class="absolute inset-0 flex">
            <div class="w-2/5  flex justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('images/logo_akun.png') }}" class="scale-110	" alt="">
                    <h1 class="text-3xl font-poppins font-bold text-white mt-8"> {{$user->name}} </h1>
                    <h3 class="text-l font-poppins font-bold  text-center mt-4 text-white">{{$user->email}}</h3>
                    @if ($roles_id == 2)
                    <a href="/profile/update" class="bg-[#FFFFFF] bg-opacity-50 mt-4 border rounded-[40px] px-7 py-0.5 text-[#185141] font-bold font-poppins text-l">Edit profile </a>
                    @endif
                </div>
            </div>
            <div class="w-full bg-[#FFFFFF] bg-opacity-80">
                <div class="mx-14 my-8">
                    <div class="mx-12 my-8">
                        <label for="name" class="text-xl font-poppins font-bold text-[#185141]">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="mt-4 border-none bg-transparent focus:outline-none sm:text-sm block w-full" value="{{$user->name}}">
                        <hr class="border-t-2 border-[#185141]">
                        @error('name')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mx-12 my-8">
                        <label for="nik" class="text-xl font-poppins font-bold text-[#185141]">NIK</label>
                        <input type="text" name="nik" id="nik" class="mt-4 border-none bg-transparent focus:outline-none sm:text-sm block w-full " value="{{$profile->nik}}">
                        <hr class="border-t-2 border-[#185141]">
                        @error('nik')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mx-12 my-8">
                        <label for="no_hp" class="text-xl font-poppins font-bold text-[#185141]">No handphone</label>
                        <input name="no_hp" id="no_hp" class="mt-4 border-none bg-transparent focus:outline-none sm:text-sm block w-full" value="{{$profile->no_hp}}">
                        <hr class="border-t-2 border-[#185141]">
                        @error('alamat')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mx-12 my-8">
                        <label for="alamat" class="text-xl font-poppins font-bold text-[#185141]">Alamat</label>
                        <input name="alamat" id="alamat" rows="" class="mt-4 border-none bg-transparent focus:outline-none sm:text-sm block w-full" value="{{$profile->alamat}}">
                        <hr class="border-t-2 border-[#185141]">
                        @error('alamat')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mx-12 my-8">
                        <label for="kecamatan" class="block text-xl font-poppins font-bold text-[#185141]">Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan" class="mt-4 border-none bg-transparent focus:outline-none sm:text-sm block w-full">
                            @foreach ($kecamatans as $kecamatan)
                            @if(old('kecamatan_id', $profile->kecamatan_id) == $kecamatan->id)
                            <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->name }}</option>
                            @else
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        <hr class="border-t-2 border-[#185141]">
                    </div>
                </div>     
            </div>
        </div>        
    </div>

</body>


</html>