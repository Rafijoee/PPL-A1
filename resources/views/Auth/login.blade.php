@extends('layouts.index')
@section('title', 'login')
<body>
    <div class="relative w-full h-full min-h-screen">
        <img src="{{ asset('images/auth.png') }}" alt="Background Image" class="sm:absolute sm:inset-0 sm:w-full sm:h-full sm:object-cover">
        <div class="absolute inset-1">
            <!-- div card -->
            <div class="absolute my-auto right-0 left-0 sm:w-[35vw] bg-[#FFFFFF] bg-opacity-80 sm:mr-20 sm:my-[10vh] rounded-xl sm:p-4 flex flex-col justify-center items-center m-4 sm:mx-auto">
                <!-- Card Content Lainnya -->
                <img src="{{ asset('images/logo_akun.png') }}" class="scale-75" alt="">
                <h1 class="sm:mt-4 text-4xl font-poppins font-bold text-[#185141]">Masuk</h1>

                <div class="flex flex-col sm:w-full sm:mt-4 m-92">
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
                            <input type="email" name="email" id="email" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5">
                            <hr class="border-t-2 border-[#185141]">
                        </div>
                        <div class="m-12">
                            <label for="password" class="text-xl font-poppins font-bold text-[#185141]">Kata Sandi</label>
                            <input type="password" name="password" id="password" class="mt-6 border-none bg-transparent focus:outline-none sm:text-sm block w-full p-2.5">
                            <hr class="border-t-2 border-[#185141]">
                        </div>
                        <div class="m-12">
                            <a href="#" class="flex justify-end text-sm underline text-[#185141] font-bold underline-offset-1 font-poppins">Lupa Password ?</a>
                        </div>
                        <div class="mt-5 flex justify-center">
                            <button type="submit" class="text-xl font-poppins font-bold border-2 bg-[#185141] text-white flex items-center py-2 px-10 rounded-md hover:bg-transparent hover:text-[#185141]">Masuk</button>
                        </div>
                        <div class="m-12">
                            <p class="flex justify-center text-sm  text-[#185141] font-bold  font-poppins">Belum Punya Akun? <a href="{{route('form_register')}}" class="underline">Daftar</a></p>
                        </div>
                    </form>
                </div>
            </div>

</body>

</html>