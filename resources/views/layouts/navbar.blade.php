@yield('navbar')
<nav class="fixed top-0 z-50 w-full bg-[#40C6A1] border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">

            <div class="flex items-center justify-start rtl:justify-end">

                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="/" class="flex ms-2 md:me-24">
                    <img src="{{asset('images/logo_dinas.png')}}" class="h-12 me-3" alt="FlowBite Logo" />
                </a>
            </div>
            <div class="flex items-center">


                <div class="flex items-center ms-3">


                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-[#40C6A1] hover:bg-blue-[#40C6A1] focus:ring-4 focus:outline-none focus:ring-[#40C6A1] font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-[#40C6A1] dark:focus:ring-[#40C6A1]" type="button">
                        <i class="fa-regular fa-bell fa-2xl " style="color: #727479;"></i>
                        <span class="sr-only">Notifications</span>
                        <div class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white mt-7 bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900 mr-[73px]">
                            <h1 class="text-[11px] flex items-center">{{auth()->user()->unreadNotifications->count()}}</h1>
                        </div>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 dark:bg-gray-700 ">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 " aria-labelledby="dropdownDefaultButton">
                            @foreach (auth()->user()->unreadNotifications as $notification)
                            <li>
                                <a href="#" id="" class="w-full max-w-xs text-gray-900 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-300" role="alert">
                                    <div class="flex items-center">
                                        <div class="ms-3 text-sm font-normal">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</div>
                                            <div class="text-sm font-normal">commented on your photo</div>
                                            <span class="text-xs font-medium text-blue-600 dark:text-blue-500">a few seconds ago</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{Auth::user()->name}}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{Auth::user()->email}}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>