<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <form action="{{route('register')}}" method="POST">
        @method('POST')
        @csrf
        <section class="bg-gray-50 dark:bg-gray-900 mt-16">
            <div class="flex flex-col items-center justify-center px-6 pb-8 pt-0 mx-auto md:h-screen lg:py-0">
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                            <i class="fa-solid fa-user-plus mr-3"></i>Buat Akun
                        </h1>
                        <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">
                        <div class="space-y-4 md:space-y-6">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Anda...">
                                @error('name')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Email Anda...">
                                @error('email')
                                <div class="invalid-feedback text-red-500">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                                <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi Anda..." class="form-control @error('password') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('password')
                                <div class="invalid-feedback text-red-500 ">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Kata Sandi</label>
                                <input type="password" name="password_confirmation" id="password" placeholder="*********" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="border-2 border-indigo-700 bg-indigo-700 text-white w-full h-10 py-1 rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold">Buat Akun</button>
                            </div>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Sudah mempunyai akun? <a href="{{route('login')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Masuk</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>