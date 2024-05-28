@extends('layouts.dashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR | KONSULTASI</title>
</head>
<body class="bg-[#F2FBFF]">
    <div class="p-4 sm:ml-72 mt-16 mb-96 mx-10">
        <h1 class="font-bold text-4xl">Konsultasi</h1>
        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl mt-12 ">
            
            <img class="mx-3 object-cover w-full  h-96 md:h-auto md:w-48 md:rounded-md" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$profile_lain->nama}}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Saya adalah seorang penyuluh petani yang berkomitmen untuk meningkatkan kesejahteraan dan produktivitas petani melalui pendekatan yang berbasis pengetahuan dan praktik terbaik. Saya memiliki pengalaman yang luas dan pemahaman yang baik dalam pertanian</p>
                <a href="{{ 'chat/' . $profile_lain->user_id }}" class=" items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#185141] rounded-lg hover:bg-[#26826F] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[#26826F]  dark:hover:bg-[#26826F]">Konsultasi Sekarang !</a>
            </div>
        </div>
    </div>

</body>
</html>