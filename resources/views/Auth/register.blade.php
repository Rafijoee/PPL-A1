@extends('layouts.index')
@section('title', 'Register')

<body>
    <div class="relative w-full h-full min-h-screen">
        <img src="{{ asset('images/auth.png') }}" alt="Background Image" class="sm:absolute sm:inset-0 sm:w-full sm:h-full sm:object-cover">
        <div class="absolute inset-0">
        <div class="absolute my-auto right-0 left-0 sm:w-[35vw] bg-[#FFFFFF] bg-opacity-80 sm:mr-20 sm:my-[10vh] rounded-xl sm:p-4 flex flex-col justify-center items-center m-4 sm:mx-auto h-full">
                <img src="{{ asset('images/logo_akun.png') }}" class="scale-75" alt="">
                <h1 class="sm:mt-4 text-4xl font-poppins font-bold text-[#185141]">Buat Akun</h1>

                <div class="flex flex-col sm:w-full mt-4 overflow-y-auto h-[500px]">
                    <form action="{{ url('register') }}" method="post" class="form-control" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="m-12">
                            <label for="name" class="text-xl font-poppins font-bold text-[#185141]">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5">
                            <hr class="border-t-2 border-[#185141]">
                            @error('name')
                            <div class="invalid-feedback text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="m-12">
                            <label for="nik" class="text-xl font-poppins font-bold text-[#185141]">NIK</label>
                            <input type="text" name="nik" id="nik" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5">
                            <hr class="border-t-2 border-[#185141]">
                            @error('nik')
                            <div class="invalid-feedback text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="m-12">
                            <label for="no_hp" class="text-xl font-poppins font-bold text-[#185141]">No Telepon</label>
                            <input type="text" name="no_hp" id="no_hp" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5">
                            <hr class="border-t-2 border-[#185141]">
                            @error('no_hp')
                            <div class="invalid-feedback text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="my-12">
                                <label for="alamat" class="text-xl font-poppins font-bold text-[#185141]">Alamat</label>
                                <textarea type="text" name="alamat" id="alamat" rows="4" class=" form-control @error('alamat') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#185141] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat Anda..."></textarea>
                                @error('alamat')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="my-12">
                                <label for="kecamatan" class="block text-xl font-poppins font-bold text-[#185141]">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach ($kecamatans as $kecamatan )
                                    @if(old('kecamatan_id') == $kecamatan->id)
                                    <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->name }}</option>
                                    @else
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-12">
                                <label for="email" class="text-xl font-poppins font-bold text-[#185141]">Email</label>
                                <input type="email" name="email" id="email" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5">
                                <hr class="border-t-2 border-[#185141]">
                                @error('email')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="y-12">
                                <label for="password" class="text-xl font-poppins font-bold text-[#185141]">Kata Sandi</label>
                                <input type="password" name="password" id="password" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5">
                                <hr class="border-t-2 border-[#185141]">
                                @error('password')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="my-12">
                                <label for="password" class="text-xl font-poppins font-bold text-[#185141]">Konfirmasi Kata Sandi</label>
                                <input type="password" name="password_confirmation" id="password" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5">
                                <hr class="border-t-2 border-[#185141]">
                            </div>
                            <div class="">
                                <a href="#" class="flex justify-end text-sm underline text-[#185141] font-bold underline-offset-1 font-poppins">Lupa Password ?</a>
                            </div>
                            <div class="mt-5 flex justify-center">
                                <button type="submit" class="text-xl font-poppins font-bold border-2 bg-[#185141] text-white flex items-center py-2 px-10 rounded-md hover:bg-transparent hover:text-[#185141]">Daftar</button>
                            </div>
                            <div class="m-12">
                                <p class="flex justify-center text-sm  text-[#185141] font-bold  font-poppins">Sudah Punya Akun? <a href="{{route('login')}}" class="underline">Masuk</a></p>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
