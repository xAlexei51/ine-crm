<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">    
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="styles/styles.css">    
    
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>   
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
    <title>Document</title>
</head>
<body>
<div>
        <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
          <!-- Loading screen -->
          <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)" >
            Loading.....
          </div>    
          <!-- Sidebar backdrop -->
          <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>
  
          <!-- Sidebar -->
          <aside x-transition:enter="transition transform duration-300" x-transition:enter-start="-translate-x-full opacity-30  ease-in" x-transition:enter-end="translate-x-0 opacity-100 ease-out"x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0 opacity-100 ease-out" x-transition:leave-end="-translate-x-full opacity-0 ease-in" class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none" :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                      </svg>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Militantes</span>                                        
                  </a>
                </li>
                <li>
                    <a href="adminUserList.php" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{'justify-center': !isSidebarOpen}" >
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
                      <span :class="{ 'lg:hidden': !isSidebarOpen }">Envio de mensajes</span>                                            
                    </a>
                  </li>
                <!-- Sidebar Links... -->
              </ul>
            </nav>
            <!-- Sidebar footer -->
            <div class="flex-shrink-0 p-2 border-t max-h-14">
              <button
                class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
                <a href="php/auth-logout.php">
                <span>
                  <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
                </span>
                <span :class="{'lg:hidden': !isSidebarOpen}"> 
                  Cerrar Sesión</span>
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
                  <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">Dashboard Princpal</span>
                  <!-- Toggle sidebar button -->
                  <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                    <svg class="w-4 h-4 text-gray-600" :class="{'transform transition-transform -rotate-180': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                  </button>
                </div>
    
                <!-- Mobile search box -->
                <div x-show.transition="isSearchBoxOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
                  <div @click.away="isSearchBoxOpen = false" class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md">
                    <div class="flex items-center flex-1 px-2 space-x-2">
                      <!-- search icon -->
                      <span>
                        <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                      </span>
                      <input type="text" placeholder="Search" class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none"/>
                    </div>
                    <!-- close button -->
                    <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
                      <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
    
                <!-- Desktop search box -->
                <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
                  <!-- search icon -->
                  <span>
                    <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                  </span>
                  <input type="text" placeholder="Search" class="px-4 py-3 rounded-md hover:bg-gray-100 lg:max-w-sm md:py-2 md:flex-1 focus:outline-none md:focus:bg-gray-100 md:focus:shadow md:focus:border"/>
                </div>    
                <!-- Navbar right -->
                <div class="relative flex items-center space-x-3">
                  <!-- Search button -->
                  <button @click="isSearchBoxOpen = true" class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200">
                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                  </button>    
                  <div class="items-center hidden space-x-3 md:flex">                                                              
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
                    <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max">
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
              <div class="md:w-1/2 p-6 bg-white rounded-lg shadow">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Inicio / Militantes</h5>
                </a>                                 
                <div class="flex flex-wrap -mx-3 mb-6">                 
                    <div class="w-full px-3 mb-6 md:mb-0">
                    <form action="php/filter-data.php" method="post" id="tag-form">
                        <label for="tag-input" class=" block mb-2 font-medium text-gray-900 dark:text-black">Añade parametros de busqueda, por ejemplo: Zapopan</label>
                        <input type="text" class="bg-white border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-200 dark:placeholder-gray-400 dark:text-black" id="tag-input" name="tag" placeholder="Ingresa un parametro">
                        <button type="button" class="block w-full bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4 float-right" id="add-tag">Añadir</button>                        
                        <input type="hidden" id="tags-hidden" name="tags" value="">
                        <input type="submit" class="block w-full bg-emerald-700 mt-4 py-2 rounded text-white font-semibold mb-2 px-4" value="Filtrar Datos">
                        <div id="tag-list" class="float-left flex"></div>
                    </form>
                  </div>                                                                     
                </div>
                                  
                    <div id="divContent" style="display: none;" class="flex flex-wrap -mx-3 mb-8">
                      <div x-data @tags-update="console.log('tags updated', $event.detail.tags)" data-tags='["Zapopan","45066"]' class=" m-3 mb-8">
                        <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()" @keydown.escape="clearSearch()">
                          <div class="relative" @keydown.enter.prevent="addTag(textInput)">
                            <span class="font-bold text-black mb-5"> ¿Por qué parametros quieres realizar la busqueda? Ejemplo: Zapopan</span>
                            <input x-model="textInput" x-ref="textInput" @input="search($event.target.value)" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingresa los datos los que quires filtrar">
                            <div :class="[open ? 'block' : 'hidden']">
                              <div class="absolute z-40 left-0 mt-2 w-full">
                                <div class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                                  <a @click.prevent="addTag(textInput)" class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white">Add tag "<span class="font-semibold" x-text="textInput"></span>"</a>
                                </div>
                              </div>
                            </div>
                            <!-- selections -->
                            <template x-for="(tag, index) in tags">
                              <div class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1">
                                <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
                                <button @click.prevent="removeTag(index)" class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                                  <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg>
                                </button>
                              </div>
                            </template>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div> 
    
              <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
              <h3 class="mt-6 text-xl">Lista de militantes</h3>
              <div class="flex flex-col mt-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden rounded-md shadow-md">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-200  ">
                            <thead class="bg-white dark:bg-gray-300">
                                <tr>
                                  <th scope="col" class="py-3.5 px-4 text-medium font-normal text-left  text-black">
                                      <div class="flex items-center gap-x-3">
                                          <input type="checkbox" id="seleccionar-todos" class="text-blue-500 rounded dark:bg-white dark:ring-offset-gray-900">
                                              <button class="flex items-center gap-x-2">
                                                <span class="text-black">Distrito</span>                                           
                                              </button>
                                                      </div>
                                                  </th>
                                                  <th scope="col" class="px-4 py-3.5 text-medium font-normal text-left text-black">
                                                      Nombre
                                                  </th>

                                                  <th scope="col" class="px-4 py-3.5 text-medium font-normal text-left text-black">
                                                      Apellidos
                                                  </th>

                                                  <th scope="col" class="px-4 py-3.5 text-medium font-normal text-left text-black">
                                                      Codigo Postal
                                                  </th>
                                                  <th scope="col" class="px-4 py-3.5 text-medium font-normal text-left text-black">
                                                      Calle
                                                  </th>
                                                  <th scope="col" class="px-4 py-3.5 text-medium font-normal text-left text-black">
                                                      Municipio
                                                  </th>
                                                  <th scope="col" class="px-4 py-3.5 text-medium font-normal text-left text-black">
                                                      Colonia
                                                  </th>   
                                                  <th scope="col" class="relative py-3.5 px-4">                                      
                                                  <button id="enviarFormulario" class="block w-full bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">                                      
                                                      Enviar correos
                                                  </button>  
                                                  </th>
                                              </tr>
                                          </thead>
                                          <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-200 bg-white">
                                            <?php 
                                            
                                            require_once(__DIR__.'/php/db-connection.php');

                                            $sql = "SELECT * FROM militantes";
                                            $stmt = $con->prepare($sql);
                                            
                                            $stmt->execute();

                                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($result as $row):                              
                                            ?>
                                              <tr class="dark:hover:bg-gray-200" >
                                                  <td class="px-4 py-4 text-medium font-medium text-black-700 dark:text-black-200 whitespace-nowrap">
                                                      <div class="inline-flex items-center gap-x-3">
                                                          <input type="checkbox" name="seleccionados[]" value="<?php echo htmlspecialchars($row['telefono']); ?>" class="text-blue-500 rounded dark:bg-black dark:ring-offset-black-900 dark:border-black-700">
                                                          <span class="text-black"><?php echo $row['distrito_electoral'];?></span>
                                                      </div>
                                                  </td>
                                                  <td class="px-4 py-4 text-medium text-black whitespace-nowrap"><?php echo $row['nombre']; ?></td>
                                                  <td class="px-4 py-4 text-medium font-medium text-black-700 whitespace-nowrap">
                                                      <div class="inline-flex items-center px-3 py-1">                                            
                                                          <h2 class="text-medium font-normal"><?php echo htmlspecialchars($row['apellido_paterno']); ?> <?php echo htmlspecialchars($row['apellido_materno']); ?></h2>
                                                      </div>
                                                  </td>
                                                  <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo htmlspecialchars($row['codigo_postal']); ?></td>
                                                  <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo htmlspecialchars($row['calle']);  ?></td>
                                                  <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo htmlspecialchars($row['municipio']); ?></td>
                                                  <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo htmlspecialchars($row['colonia']);  ?></td>
                                                  <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                      <div class="flex items-center gap-x-6">
                                                          <button class="block w-full bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                              Editar
                                                          </button>
                                                          <button class="block w-full bg-red-700 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                              <a href="php/delete-militant.php?id=<?php echo htmlspecialchars($row['id']) ?>">Eliminar</a>
                                                          </button>
                                                      </div>
                                                  </td>
                                              </tr>                                              
                                              <?php endforeach; 
                                              
                                              $stmt = null;
                                              $con = null;
                                              
                                              ?>   
                                              <tr>
                                              <td class="justify-center px-4 py-4 text-medium font-medium text-black-700 dark:text-black-200 whitespace-nowrap">
                                              <nav aria-label="Page navigation example">
                                                <ul class="inline-flex -space-x-px text-base h-10">
                                                  <li>
                                                    <a href="#" class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                                  </li>
                                                  <li>
                                                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                                  </li>
                                                  <li>
                                                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                                  </li>
                                                  <li>
                                                    <a href="#" aria-current="page" class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                                  </li>
                                                  <li>
                                                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                                                  </li>
                                                  <li>
                                                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                                                  </li>
                                                  <li>
                                                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                                  </li>
                                                </ul>
                                              </nav>
                                                  </td>
                                              </tr>                                                                                                             
                                          </tbody>                                          
                                      </table>
                                                                                         
                                  </div>
                                </div>
                              </div>
                            </div>
            </main>
            <!-- Main footer -->            
          </div>                        
              <!-- Settings Panel Content ... -->
            </div>
          </div>
        </div>
<script src="js/tagselector.js"></script>
<script src="js/multiselect.js" ></script>
</body>
</html>