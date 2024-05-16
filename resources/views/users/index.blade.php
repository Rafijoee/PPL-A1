<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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
    <form action="{{route('profile.update')}}" method="POST">
        @method('patch')
        @csrf
        <section class="bg-gray-100 ">
            <div class="mx-auto my-auto py-10 grid justify-items-center ">
                <div class=" bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700 w-[750px]">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8 ">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center ">
                            <i class="fa-solid fa-user-plus mr-3"></i>PROFILE
                        </h1>
                        <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">
                        <div class="space-y-4 md:space-y-6">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                <input type="text" id="disabled-input" aria-label="disabled input" class="form-control @error('name') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#40C6A1] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->nama}} " disabled>
                                @error('name')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                <input type="text" id="disabled-input" aria-label="disabled input" class="form-control @error('nik') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#40C6A1] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->nik}}" disabled>
                                @error('nik')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#40C6A1] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->no_hp}}" disabled>
                                @error('no_hp')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea type="text" id="disabled-input" aria-label="disabled input" rows="4" class=" form-control @error('alamat') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#40C6A1] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>{{$profile->alamat}} </textarea>
                                @error('alamat')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-3xl font-medium dark:text-white">Kecamatan</label>
                                <select name="kecamatan_id" id="disabled-input" aria-label="disabled input" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" disabled>
                                    @foreach ($kecamatans as $kecamatan )
                                    @if(old('kecamatan_id', $profile->kecamatan_id) == $kecamatan->id)
                                    <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->name }}</option>
                                    @else
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @if ($roles_id == 2 )
                                <div class="mt-2">
                                    <a href="/profile/update" type="" class="border-2 border-[#40c6A1] bg-[#40c6A1] text-white  h-10 py-1 px-[330px] rounded-md hover:bg-transparent hover:text-[#40c6A1] font-semibold">Edit</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>


</html>