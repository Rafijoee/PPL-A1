<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-[#F2FBFF]">
    <form action="{{route('profile.update')}}" method="POST">
        @method('patch')
        @csrf
        <div class="relative my-8 mx-4 sm:my-20 sm:mx-44">
            <img src="{{ asset('images/profile.png') }}" alt="Background Image" class="w-full h-auto sm:h-full object-cover">
            <div class="absolute inset-0 flex flex-col sm:flex-row">
                <div class="absolute top-6 left-6 bg-white bg-opacity-40 rounded-full p-2">
                    <a href="/profile"><i class="fa-solid fa-arrow-left fa-xl" style="color: #ffffff;"></i></a>
                </div>
                <div class="w-full sm:w-2/5 flex justify-center items-center bg-black bg-opacity-50 sm:bg-transparent">
                    <div class="flex flex-col justify-center items-center p-4">
                        <img src="{{ asset('images/logo_akun.png') }}" class="scale-75 sm:scale-110" alt="">
                        <h1 class="text-2xl sm:text-3xl font-poppins font-bold text-white mt-4 sm:mt-8"> {{$user->name}} </h1>
                        <h3 class="text-sm sm:text-lg font-poppins font-bold text-center mt-2 sm:mt-4 text-white">{{$user->email}}</h3>
                    </div>
                </div>
                <div class="w-full bg-white bg-opacity-90 sm:bg-opacity-80">
                    <div class="p-4 sm:mx-14 sm:my-8">
                        <div class="mb-6 sm:mb-8">
                            <label for="name" class="text-lg sm:text-xl font-poppins font-bold text-[#185141]">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="mt-2 sm:mt-4 border-none bg-transparent focus:outline-none text-sm sm:text-base block w-full" value="{{$user->name}}">
                            <hr class="border-t-2 border-[#185141]">
                            @error('name')
                            <div class="invalid-feedback text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6 sm:mb-8">
                            <label for="nik" class="text-lg sm:text-xl font-poppins font-bold text-[#185141]">NIK</label>
                            <input type="text" name="nik" id="nik" class="mt-2 sm:mt-4 border-none bg-transparent focus:outline-none text-sm sm:text-base block w-full" value="{{$profile->nik}}">
                            <hr class="border-t-2 border-[#185141]">
                            @error('nik')
                            <div class="invalid-feedback text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6 sm:mb-8">
                            <label for="no_hp" class="text-lg sm:text-xl font-poppins font-bold text-[#185141]">No handphone</label>
                            <input name="no_hp" id="no_hp" class="mt-2 sm:mt-4 border-none bg-transparent focus:outline-none text-sm sm:text-base block w-full" value="{{$profile->no_hp}}">
                            <hr class="border-t-2 border-[#185141]">
                            @error('no_hp')
                            <div class="invalid-feedback text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6 sm:mb-8">
                            <label for="alamat" class="text-lg sm:text-xl font-poppins font-bold text-[#185141]">Alamat</label>
                            <input name="alamat" id="alamat" class="mt-2 sm:mt-4 border-none bg-transparent focus:outline-none text-sm sm:text-base block w-full" value="{{$profile->alamat}}">
                            <hr class="border-t-2 border-[#185141]">
                            @error('alamat')
                            <div class="invalid-feedback text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-6 sm:mb-8">
                            <label for="kecamatan" class="block text-lg sm:text-xl font-poppins font-bold text-[#185141]">Kecamatan</label>
                            <select name="kecamatan_id" id="kecamatan" class="mt-2 sm:mt-4 border-none bg-transparent focus:outline-none text-sm sm:text-base block w-full">
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
                        <div class="flex justify-end">
                            <button class="border-none bg-[#185141] text-white font-bold py-2.5 px-7 rounded-[40px] focus:outline-none">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>



</html>