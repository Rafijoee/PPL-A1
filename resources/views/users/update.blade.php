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
                                <input type="text" name="name" id="name" class="form-control @error('name') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#40C6A1] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->nama}}">
                                @error('name')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control @error('nik') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#40C6A1] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->nik}}">
                                @error('nik')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#40C6A1] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->no_hp}}">
                                @error('no_hp')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea type="text" name="alamat" id="alamat" rows="4" class=" form-control @error('alamat') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#40C6A1] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$profile->alamat}}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="kecamatan" class="block mb-2 text-3xl font-medium dark:text-white">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach ($kecamatans as $kecamatan )
                                    @if(old('kecamatan_id', $profile->kecamatan_id) == $kecamatan->id)
                                    <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->name }}</option>
                                    @else
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="border-2 border-[#40c6A1] bg-[#40c6A1] text-white w-full h-10 py-1 rounded-md hover:bg-transparent hover:text-[#40c6A1] font-semibold">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>


</html>