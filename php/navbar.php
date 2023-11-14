<div>
  <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
    <!-- Loading screen -->
    <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
      Loading.....
    </div>

    <!-- Sidebar backdrop -->
    <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>

    <!-- Sidebar -->
    <aside x-transition:enter="transition transform duration-300" x-transition:enter-start="-translate-x-full opacity-30 ease-in" x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0 opacity-100 ease-out" x-transition:leave-end="-translate-x-full opacity-0 ease-in" class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none" :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">
      <!-- sidebar header -->
      <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
        <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
          Panel-<span :class="{'lg:hidden': !isSidebarOpen}">Principal</span>
        </span>
        <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
          <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Sidebar links -->
      <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="p-2 overflow-hidden">
          <li>
            <a href="militantesList.php" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{'justify-center': !isSidebarOpen}">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                </svg>
              </span>
              <span :class="{ 'lg:hidden': !isSidebarOpen }">Militantes</span>
            </a>
          </li>
          <li>
            <a href="adminUserList.php" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{'justify-center': !isSidebarOpen}">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
              </span>
              <span :class="{ 'lg:hidden': !isSidebarOpen }">Administradores</span>
            </a>
          </li>
          <li>
            <a href="" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{'justify-center': !isSidebarOpen}">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                </svg>
              </span>
              <span :class="{ 'lg:hidden': !isSidebarOpen }">Envío de mensajes</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- Sidebar footer -->
      <div class="flex-shrink-0 p-2 border-t max-h-14">
        <button class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
          <a href="php/auth-logout.php">
            <span>
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}">Cerrar Sesión</span>
          </a>
        </button>
      </div>
    </aside>

    <div class="flex flex-col flex-1 h-full overflow-hidden">
      <!-- Navbar -->
      <header class="flex-shrink-0 border-b">
        <div class="flex items-center justify-between p-2">
          <!-- Navbar left -->
          <div class="flex items-center space-x-3">
            <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">Dashboard Principal</span>
            <!-- Toggle sidebar button -->
            <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
              <svg class="w-4 h-4 text-gray-600" :class="{'transform transition-transform -rotate-180': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
              </svg>
            </button>
          </div>

          <!-- Mobile search box -->

          <!-- Navbar right -->
          <div class="relative flex items-center space-x-3">
            <!-- Search button -->
            <button @click="isSearchBoxOpen = true" class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200">
              <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
            <div class="items-center hidden space-x-3 md:flex">
              <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                  <img class="object-cover w-8 h-8 rounded-full" src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png" alt="Ahmed Kamel" />
                </button>
                <!-- green dot -->
                <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
                <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>
                <!-- Dropdown card -->
                <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max">
                  <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                    <span class="text-gray-800">Administrador</span>
                  </div>
                  <div class="flex items-center justify-center p-4 text-blue-700">
                    <a href="php/auth-logout.php">
                      <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        Cerrar Sesión
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
