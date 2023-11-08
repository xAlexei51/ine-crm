<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Administradores</title>    
</head>
<body>
<?php

session_start();
if(!isset($_SESSION['username'])){
  echo "<script>";
  echo "Swal.fire({
          title: '¡Ups!',
          text: 'Parece que no has iniciado sesion',
          icon: 'warning',
          confirmButtonText: '¡Entendido!'
      }).then((result) => {
          if (result.isConfirmed) {          
          window.location.href = 'login.html';
          }
      });";
  echo "</script>";
}

?>
    <div>
        <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
          <!-- Loading screen -->
          <div
            x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
          >
            Loading.....
          </div>
    
          <!-- Sidebar backdrop -->
          <div
            x-show.in.out.opacity="isSidebarOpen"
            class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
          ></div>
    
          <!-- Sidebar -->
          <aside
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="-translate-x-full opacity-30  ease-in"
            x-transition:enter-end="translate-x-0 opacity-100 ease-out"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0 opacity-100 ease-out"
            x-transition:leave-end="-translate-x-full opacity-0 ease-in"
            class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
            :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}"
          >
            <!-- sidebar header -->
            <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
              <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
                Panel-<span :class="{'lg:hidden': !isSidebarOpen}">Principal</span>
              </span>
              <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
                <svg
                  class="w-6 h-6 text-gray-600"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
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
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                      </span>
                      <span :class="{ 'lg:hidden': !isSidebarOpen }">Adminsitradores</span>                                            
                    </a>
                  </li>
                  <li>
                    <a href="" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{'justify-center': !isSidebarOpen}">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                          </svg>                          
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                      </span>
                      <span :class="{ 'lg:hidden': !isSidebarOpen }">Envio de correos</span>                                            
                    </a>
                  </li>
                <!-- Sidebar Links... -->
              </ul>
            </nav>
            <!-- Sidebar footer -->
            <div class="flex-shrink-0 p-2 border-t max-h-14">
              <button
                class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring"
              >
                <span>
                  <svg
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                    />
                  </svg>
                </span>
                <span :class="{'lg:hidden': !isSidebarOpen}"> 
                  <a href="php/auth-logout.php">Cerrar Sesión</a>                    
                </span>
              </button>
            </div>
          </aside>
    
          <div class="flex flex-col flex-1 h-full overflow-hidden">
            <!-- Navbar -->
            <header class="flex-shrink-0 border-b">
              <div class="flex items-center justify-between p-2">
                <!-- Navbar left -->
                <div class="flex items-center space-x-3">
                  <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">Dashboard Princpal</span>
                  <!-- Toggle sidebar button -->
                  <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                    <svg
                      class="w-4 h-4 text-gray-600"
                      :class="{'transform transition-transform -rotate-180': isSidebarOpen}"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                  </button>
                </div>
    
                <!-- Mobile search box -->
                <div
                  x-show.transition="isSearchBoxOpen"
                  class="fixed inset-0 z-10 bg-black bg-opacity-20"
                  style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
                >
                  <div
                    @click.away="isSearchBoxOpen = false"
                    class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md"
                  >
                    <div class="flex items-center flex-1 px-2 space-x-2">
                      <!-- search icon -->
                      <span>
                        <svg
                          class="w-6 h-6 text-gray-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                          />
                        </svg>
                      </span>
                      <input
                        type="text"
                        placeholder="Search"
                        class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none"
                      />
                    </div>
                    <!-- close button -->
                    <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
                      <svg
                        class="w-4 h-4 text-gray-500"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
    
                <!-- Desktop search box -->
                <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
                  <!-- search icon -->
                  <span>
                    <svg
                      class="w-5 h-5 text-gray-500"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </span>
                  <input
                    type="text"
                    placeholder="Search"
                    class="px-4 py-3 rounded-md hover:bg-gray-100 lg:max-w-sm md:py-2 md:flex-1 focus:outline-none md:focus:bg-gray-100 md:focus:shadow md:focus:border"
                  />
                </div>
    
                <!-- Navbar right -->
                <div class="relative flex items-center space-x-3">
                  <!-- Search button -->
                  <button
                    @click="isSearchBoxOpen = true"
                    class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200"
                  >
                    <svg
                      class="w-6 h-6 text-gray-500"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </button>
    
                  <div class="items-center hidden space-x-3 md:flex">
                    <!-- Notification Button -->
                    <div class="relative" x-data="{ isOpen: false }">
                      <!-- red dot -->
                      <div class="absolute right-0 p-1 bg-red-400 rounded-full animate-ping"></div>
                      <div class="absolute right-0 p-1 bg-red-400 border rounded-full"></div>
                      <button
                        @click="isOpen = !isOpen"
                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                      >
                        <svg
                          class="w-6 h-6 text-gray-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                          />
                        </svg>
                      </button>
    
                      <!-- Dropdown card -->
                      <div
                        @click.away="isOpen = false"
                        x-show.transition.opacity="isOpen"
                        class="absolute w-48 max-w-md mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                      >
                        <div class="p-4 font-medium border-b">
                          <span class="text-gray-800">Notification</span>
                        </div>
                        <ul class="flex flex-col p-2 my-2 space-y-1">
                          <li>
                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                          </li>
                          <li>
                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                          </li>
                        </ul>
                        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                          <a href="#">See All</a>
                        </div>
                      </div>
                    </div>
    
                    <!-- Services Button -->
                    <div x-data="{ isOpen: false }">
                      <button
                        @click="isOpen = !isOpen"
                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                      >
                        <svg
                          class="w-6 h-6 text-gray-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                          />
                        </svg>
                      </button>
    
                      <!-- Dropdown -->
                      <div
                        @click.away="isOpen = false"
                        @keydown.escape="isOpen = false"
                        x-show.transition.opacity="isOpen"
                        class="absolute mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                      >
                        <div class="p-4 text-lg font-medium border-b">Web apps & services</div>
                        <ul class="flex flex-col p-2 my-3 space-y-3">
                          <li>
                            <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                              <span class="block mt-1">
                                <svg
                                  class="w-6 h-6 text-gray-500"
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                                >
                                  <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                  <path
                                    fill="#fff"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                                  />
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                                  />
                                </svg>
                              </span>
                              <span class="flex flex-col">
                                <span class="text-lg">Atlassian</span>
                                <span class="text-sm text-gray-400">Lorem ipsum dolor sit.</span>
                              </span>
                            </a>
                          </li>
                          <li>
                            <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                              <span class="block mt-1">
                                <svg
                                  class="w-6 h-6 text-gray-500"
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                                >
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                  />
                                </svg>
                              </span>
                              <span class="flex flex-col">
                                <span class="text-lg">Slack</span>
                                <span class="text-sm text-gray-400"
                                  >Lorem ipsum, dolor sit amet consectetur adipisicing elit.</span
                                >
                              </span>
                            </a>
                          </li>
                        </ul>
                        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                          <a href="#">Show all apps</a>
                        </div>
                      </div>
                    </div>
    
                    <!-- Options Button -->
                    <div class="relative" x-data="{ isOpen: false }">
                      <button @click="isOpen = !isOpen" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring">
                        <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                      </button>
    
                      <!-- Dropdown card -->
                      <div
                        @click.away="isOpen = false"
                        x-show.transition.opacity="isOpen"
                        class="absolute w-40 max-w-sm mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                      >
                        <div class="p-4 font-medium border-b">
                          <span class="text-gray-800">Options</span>
                        </div>
                        <ul class="flex flex-col p-2 my-2 space-y-1">
                          <li>
                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                          </li>
                          <li>
                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                          </li>
                        </ul>
                        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                          <a href="#">See All</a>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <!-- avatar button -->
                  <div class="relative" x-data="{ isOpen: false }">
                    <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                      <img
                        class="object-cover w-8 h-8 rounded-full"
                        src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                        alt="Ahmed Kamel"
                      />
                    </button>
                    <!-- green dot -->
                    <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
                    <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>
    
                    <!-- Dropdown card -->
                    <div
                      @click.away="isOpen = false"
                      x-show.transition.opacity="isOpen"
                      class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max"
                    >
                      <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                        <span class="text-gray-800">Ahmed Kamel</span>
                        <span class="text-sm text-gray-400">ahmed.kamel@example.com</span>
                      </div>
                      <ul class="flex flex-col p-2 my-2 space-y-1">
                        <li>
                          <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                        </li>
                        <li>
                          <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                        </li>
                      </ul>
                      <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                        <a href="#">Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </header>
            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
              <!-- Main content header -->                  
              <!-- Start Content -->
              <div class="max-w-full p-6 bg-white rounded-lg shadow">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Inicio / Adminsitradores</h5>
                </a>                    
                <div class="px- mb-6 md:mb-0">
                    <button id="openDialog" class=" bg-gray-900 dark:hover:bg-gray-700 py-2 rounded text-white font-semibold mb-2 px-4">
                        Nuevo usuario
                    </button>
                </div>                                                                        
            </div>   
    
              <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
              <h3 class="mt-6 text-xl">Lista de Administradores</h3>
              
              <div class="flex flex-col mt-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden rounded-md shadow-md">
                        <table class="min-w-full">
                            <thead class="bg-white dark:bg-gray-300">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left  text-black">
                                        <div class="flex items-center gap-x-3">
                                            <input type="checkbox" class="text-blue-500 rounded dark:bg-white dark:ring-offset-gray-900">
                                            <button class="flex items-center gap-x-2">
                                                <span class="text-black">ID</span>                                           
                                            </button>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-black">
                                        Nombre
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-black">
                                        Correo Electronico
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-black">
                                        Telefono
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-black">
                                        Usuario
                                    </th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray- bg-white">
                              <?php
                              
                              

                              require_once(__DIR__.'/php/db-connection.php');

                              $sql = "SELECT * FROM users";
                              $stmt = $con->prepare($sql);
                              
                              $stmt->execute();

                              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


                              foreach ($result as $row):
                              ?>
                                <tr class="dark:hover:bg-gray-200">
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <input type="checkbox" class="text-blue-500 rounded dark:bg-black dark:ring-offset-gray-900 dark:border-gray-700">

                                            <span class="text-black"><?php echo $row['id']; ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-medium text-black whitespace-nowrap"><?php echo $row['nombre']; ?></td>
                                    <td class="px-4 py-4 text-medium font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-blue-500 bg-blue-100/60">                                            
                                            <h2 class="text-sm font-normal"><?php echo $row['email']; ?></h2>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 text-black whitespace-nowrap">                                                                                      
                                        <p class="text-medium font-medium text-black"><?php echo $row['telefono']; ?></p>                                          
                                    </td>
                                    <td class="px-4 py-4 text-medium text-black whitespace-nowrap"><?php echo $row['username']; ?></td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <button class="block dark:hover:bg-gray-700 w-full bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                Editar
                                            </button>
                                            <button class="block w-full bg-red-700 dark:hover:bg-red-500 mt-4 py-2 rounded text-white font-semibold mb-2 px-4" id="deleteButton">
                                                <a href="php/delete-user.php?id=<?php echo $row['id'] ?>">Eliminar</a>
                                            </button>
                                        </div>                                                                                                                                                               
                                    </td>
                                </tr>
                                <?php endforeach; 
                                
                                $stmt = null;
                                $con = null;
                                
                                ?>                                                                                                                    
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </main>                        
          </div>                        
              <!-- Settings Panel Content ... -->
            </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
        <script>
          const setup = () => {
            return {
              loading: true,
              isSidebarOpen: false,
              toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
              },
              isSettingsPanelOpen: false,
              isSearchBoxOpen: false,
            }
          }
        </script>
    </div>
    <dialog id="favDialog" class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <button id="cancelButton" class="float-right">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>              
            <form action="php/add-new-user.php" method="post">
                <form class="w-full max-w-lg">
                    <label class="block uppercase tracking-wide text-gray-700 text-xl font-bold mb-2" for="grid-colonia">
                      Nuevo Usuario
                    </label>
                    <!-- Nombre (s) -->
                    <div class="flex flex-wrap -mx-3 mb-3">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                          Nombre
                        </label>
                        <input name="nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                      </div>           
                    </div>                                                                                       
                    <!-- Correo electronico y telefono -->
                    <div class="flex flex-wrap -mx-3 mb-3">
                      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                          Correo electronico
                        </label>
                        <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="email" placeholder="example@gmail.com">
                      </div>        
                      <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-telefono">
                          Telefono
                        </label>
                        <input name="telefono" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-telefono" type="text" placeholder="+523333333333" maxlength="10">
                      </div>
                    </div>
                    <!-- Usuario -->
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Usuario
                          </label>
                          <input name="username" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="Ejemplo: john_2025">
                        </div>           
                    </div>
                    <!-- Password -->
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Password
                          </label>
                          <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="password" placeholder="Contraseña">
                        </div>           
                    </div>
                    <!-- Calle  -->
                    
                    </div>                                            
                <div class="flex items-center gap-x-6 mb-5">                  
                    <button type="submit" class="mx-5 block mb-5 dark:hover:bg-gray-700 w-96 bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                        Guardar
                    </button>        
                </div>
            </form>                     
    </dialog>    
    <output></output>
    <script src="https://cdn.tailwindcss.com"></script>    
    <script src="js/dialog.js"></script>    
</body>
</html>