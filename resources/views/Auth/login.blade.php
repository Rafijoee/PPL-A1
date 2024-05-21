<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="relative">
        <img src="{{ asset('images/auth.png') }}" alt="Background Image" class="w-full">
        <div class="absolute inset-0">
            <!-- div card -->
            <div class="fixed top-0 right-0 w-[661px] bg-[#FFFFFF] bg-opacity-80 m-10 rounded-xl p-4 flex flex-col justify-center items-center">
                <!-- Card Content Lainnya -->
                <img src="{{ asset('images/logo_akun.png') }}" class="scale-75" alt="">
                <h1 class="mt-4 text-4xl font-poppins font-bold text-[#185141]">Masuk</h1>

                <div class="flex flex-col w-full mt-4">
                    <form action="{{url('login')}}" method="post" class="form-control">
                        @method('POST')
                        @csrf
                        @if (session()->has('error'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 text-center" role="alert">
                            {{session()->get('error')}}
                        </div>
                        @endif
                        <div class="m-12">
                            <label for="email" class="text-xl font-poppins font-bold text-[#185141]">Email</label>
                            <input type="email" name="email" id="email" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5" required="">
                            <hr class="border-t-2 border-[#185141]">
                        </div>
                        <div class="m-12">
                            <label for="password" class="text-xl font-poppins font-bold text-[#185141]">Kata Sandi</label>
                            <input type="password" name="password" id="password" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5" required="">
                            <hr class="border-t-2 border-[#185141]">
                        </div>
                        <div class="m-12">
                            <a href="#" class="flex justify-end text-sm underline text-[#185141] font-bold underline-offset-1 font-poppins">Lupa Password ?</a>
                        </div>
                        <div class="mt-5 flex justify-center">
                            <button type="submit" class="text-xl font-poppins font-bold border-2 bg-[#185141] text-white flex items-center py-2 px-10 rounded-md hover:bg-transparent hover:text-[#185141]">Masuk</button>
                        </div>
                        <div class="m-12">
                            <p class="flex justify-center text-sm  text-[#185141] font-bold  font-poppins">Belum Punya Akun? <a href="{{route('form_register')}}" class="underline">Buat Akun</a></p>
                        </div>
                    </form>
                </div>
            </div>

</body>

</html>