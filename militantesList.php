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
            // Redirige a otra página después de cerrar el cuadro de diálogo
            window.location.href = 'login.html';
            }
        });";
    echo "</script>";
  }

  require "php/navbar.php";
  
?>
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
                                            
                                            $registrosPorPagina = 5;
                                            $pagina = isset($_GET["pagina"]) ? max(1, intval($_GET["pagina"])) : 1;

                                            $limit = $registrosPorPagina;
                                            $offset = ($pagina - 1) * $registrosPorPagina;

                                            // Obtener el número total de registros
                                            $sqlConteo = $con->query("SELECT COUNT(*) AS conteo FROM militantes");
                                            $conteo = $sqlConteo->fetchObject()->conteo;

                                            // Calcular el número total de páginas
                                            $paginas = ceil($conteo / $registrosPorPagina);

                                            // Asegurarse de que la página solicitada sea válida
                                            if ($pagina > $paginas && $paginas > 0) {
                                                $pagina = $paginas;
                                            }

                                            // Consulta preparada para obtener los registros paginados
                                            $stmt = $con->prepare("SELECT * FROM militantes LIMIT :limit OFFSET :offset");
                                            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                                            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                                            $stmt->execute();

                                            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                                            foreach ($result as $row):                              
                                            ?>
                                              <tr class="dark:hover:bg-gray-200 cursor-pointer" >
                                                  <td class="px-4 py-4 text-medium font-medium text-black-700 dark:text-black-200 whitespace-nowrap">
                                                      <div class="inline-flex items-center gap-x-3">
                                                          <input type="checkbox" name="seleccionados[]" value="<?php echo $row->telefono?>" class="text-blue-500 rounded dark:bg-black dark:ring-offset-black-900 dark:border-black-700">
                                                          <span class="text-black"><?php echo $row->distrito_electoral; ?></span>
                                                      </div>
                                                  </td>
                                                  <td class="px-4 py-4 text-medium text-black whitespace-nowrap" onclick="window.location.href='php/user-details.php?id=<?php echo $row->id; ?>'"><?php echo $row->nombre; ?> </td>
                                                  <td class="px-4 py-4 text-medium font-medium text-black-700 whitespace-nowrap">
                                                      <div class="inline-flex items-center px-3 py-1">                                            
                                                          <h2 class="text-medium font-normal"><?php echo $row->apellido_paterno?> <?php echo $row->apellido_materno?></h2>
                                                      </div>
                                                  </td>
                                                  <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo $row->codigo_postal?></td>
                                                  <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo $row->calle?></td>
                                                  <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo $row->municipio?></td>
                                                  <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo $row->colonia?></td>
                                                  <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                      <div class="flex items-center gap-x-6">
                                                          <a href="php/update-militante-page.php?id=<?php echo $row->id?>">
                                                            <button class="block w-32 bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                                Editar
                                                            </button>
                                                          </a>
                                                          <a href="php/delete-militant.php?id=<?php echo $row->id?>">
                                                            <button class="block w-32 bg-red-700 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                              Eliminar
                                                            </button>
                                                          </a>
                                                      </div>
                                                  </td>
                                              </tr>                                              
                                              <?php 
                                              endforeach;                                                                                                                                                                                      
                                              ?>                                                                                                                                                    
                                          </tbody>                                          
                                      </table>
                                      
                                                                                                              
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Paginacion -->
                            <div class="w-full justify-center p-6 bg-white text-center rounded-lg shadow">                            
                              <?php
                              $mostrarDesde = max(1, $pagina - 2);
                              $mostrarHasta = min($paginas, $pagina + 2);

                              if ($pagina > 1) :
                              ?>
                                  <a href="?pagina=<?php echo $pagina - 1; ?>">
                                      <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                          Prev
                                      </button>
                                  </a>
                              <?php endif;

                              if ($mostrarDesde > 1) :
                              ?>
                                  <a href="?pagina=1">
                                      <button class='bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4'>
                                          1
                                      </button>
                                  </a>
                                  <?php if ($mostrarDesde > 2) : ?>
                                    <button class='bg-gray-300 hover:bg-gray-700 text-gray-800 font-bold py-2 px-4'>
                                              . . .
                                    </button>
                                  <?php endif;
                              endif;

                              for ($i = $mostrarDesde; $i <= $mostrarHasta; $i++) :
                                  if ($i == $pagina) :
                                  ?>
                                      <a href='?pagina=<?php echo $i; ?>'>
                                          <button class='bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4'>
                                              <?php echo $i; ?>
                                          </button>
                                      </a>
                                  <?php else : ?>
                                      <a href='?pagina=<?php echo $i; ?>'>
                                          <button class='bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4'>
                                              <?php echo $i; ?>
                                          </button>
                                      </a>
                              <?php
                                  endif;
                              endfor;

                              if ($mostrarHasta < $paginas) :
                              ?>
                                  <?php if ($mostrarHasta < $paginas - 1) : ?>
                                    <button class='bg-gray-300 hover:bg-gray-700 text-gray-800 font-bold py-2 px-4'>
                                              . . .
                                    </button>
                                  <?php endif; ?>
                                  <a href="?pagina=<?php echo $paginas; ?>">
                                      <button class='bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4'>
                                          <?php echo $paginas; ?>
                                      </button>
                                  </a>
                              <?php endif;

                              if ($pagina < $paginas) :
                              ?>
                                  <a href="?pagina=<?php echo $pagina + 1; ?>">
                                      <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                                          Next
                                      </button>
                                  </a>
                              <?php endif; ?>
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