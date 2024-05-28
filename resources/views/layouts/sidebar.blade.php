@yield('sidebar')
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-[30vh] h-screen pt-20 transition-transform -translate-x-full bg-[#F2FBFF] border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 border-r-[3px]" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto dark:bg-gray-800">
        <ul id="sidebarMenu" class="space-y-2 font-medium">
            <li>
                <a href="/dashboard" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:bg-[#26826F] hover:text-[#D3D3D3] dark:hover:bg-gray-700 group {{ request()->is('dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3 text-xl">Dashboard</span>
                </a>
            </li>
            @if ($user->roles_id == 2)
            <li>
                <a href="/dashboard/pengaduan" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:bg-[#26826F] hover:text-[#D3D3D3] dark:hover:bg-gray-700 group {{ request()->is('dashboard/pengaduan') ? 'active' : '' }}">
                    <i class="fa-solid fa-seedling w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap text-xl">Pengaduan</span>
                </a>
            </li>
            @elseif ($user->roles_id == 3)
            <li>
                <a href="/dashboard/pengaduan-penyuluh" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:text-[#D3D3D3] hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('dashboard/pengaduan-penyuluh') ? 'active' : '' }}">
                    <i class="fa-solid fa-seedling w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap text-xl">Pengaduan</span>
                </a>
            </li>
            @elseif ($user->roles_id == 4)
            <li>
                <a href="/dashboard/pengaduan-pemerintah" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:bg-[#26826F] hover:text-[#D3D3D3] dark:hover:bg-gray-700 group {{ request()->is('dashboard/pengaduan-pemerintah') ? 'active' : '' }}">
                    <i class="fa-solid fa-seedling w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap text-xl">Pengaduan</span>
                </a>
            </li>
            @elseif ($user->roles_id == 1)
            <li>
                <a href="/dashboard/pengaduan-admin" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:bg-[#26826F] hover:text-[#D3D3D3] dark:hover:bg-gray-700 group {{ request()->is('dashboard/pengaduan-admin') ? 'active' : '' }}">
                    <i class="fa-solid fa-seedling w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap text-xl">Pengaduan</span>
                </a>
            </li>
            @endif
            @if ($user->roles_id == 3)
            <li>
                <a href="/konsultasi-penyuluh" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:bg-[#26826F] hover:text-[#D3D3D3] dark:hover:bg-gray-700 group {{ request()->is('konsultasi-penyuluh') ? 'active' : '' }}">
                    <i class="fa-solid fa-comments w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 text-xl whitespace-nowrap">Konsultasi</span>
                </a>
            </li>
            @elseif ($user->roles_id == 2)
            <li>
                <a href="/chat" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:bg-[#26826F] hover:text-[#D3D3D3] dark:hover:bg-gray-700 group {{ request()->is('chat') ? 'active' : '' }}">
                    <i class="fa-solid fa-comments w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 text-xl whitespace-nowrap">Konsultasi</span>
                </a>
            </li>
            @elseif ($user->roles_id == 4)
            <li>
                <a href="/dashboard/berita-pemerintah" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:bg-[#26826F] hover:text-[#D3D3D3] dark:hover:bg-gray-700 group {{ request()->is('dashboard/berita-pemerintah') ? 'active' : '' }}">
                    <i class="fa-solid fa-comments w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 text-xl whitespace-nowrap">Berita</span>
                </a>
            </li>
            @endif
            <li>
                <a href="/inbox" class="dashboard-link flex items-center p-2 text-[#185141] rounded-lg dark:text-white hover:bg-[#26826F] hover:text-[#D3D3D3] dark:hover:bg-gray-700 group {{ request()->is('inbox') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 text-xl whitespace-nowrap">Notifikasi</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
