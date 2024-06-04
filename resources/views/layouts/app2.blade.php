<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/logo1.png') }}" type="image/png">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>

<body class="overflow-x-hidden">
    <header style="position: fixed; top: 0; width: 100%; z-index: 100000000">
        <nav class="fixed w-full z-20 top-0 left-0 bg-gradient-to-b from-[#000000B2] to-transparent addBlur border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:border-gray-200 dark:bg-gray-900 p-0 m-0 mb-5 navbar-solid-bg" ;>
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{asset('images/logo_dinas.png')}}" class="h-8" alt="Dinas Pertanian dan Ketahanan Pangan" style="height: 50px" />
                </a>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    @if(Auth::check())
                    <a href="{{route('logout')}}" type="button" class="text-white border-indigo-700 bg-[#1A6E57] hover:text-white hover:bg-[#1A5F57] hover:border hover:border-[#1A6E57] focus:ring-4 font-medium rounded-lg text-sm px-4 py-2 text-center mr-10">logout</a>
                    @else
                    <a href="{{url('/login')}}" type="button" class="text-white border-indigo-700 bg-[#1A6E57] hover:text-white hover:bg-[#1A5F57] hover:border hover:border-[#1A6E57] focus:ring-4 font-medium rounded-lg text-sm px-4 py-2 text-center mr-10">Masuk</a>
                    @endif
                </div>
                <div class=" items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                    <ul class="flex font-medium text-white space-x-8 items-center text-sm">
                        <li>
                            <a href="#" class="block py-0 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#tentang" class="block p-0 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="#layanan" class="block p-0 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 d:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Layanan</a>
                        </li>
                        <li>
                            <a href="#benefit" class="block p-0 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Benefit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <div class="container">
        @yield('content')

    </div>

</body>

</html>