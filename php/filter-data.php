
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">    
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
            <!-- Main content -->
            
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
            window.location.href = '../login.html';
            }
        });";
    echo "</script>";
  }

  require "navbar-folder.php";
  
  ?>
          <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
              <!-- Main content header -->
              <div
                class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
              >                                
              </div>
    
              <!-- Start Content -->
              <div class="w-1/2 p-6 bg-white rounded-lg shadow">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Inicio / Militantes</h5>
                </a>                                                                  
                <div class="flex flex-wrap -mx-3 mb-6">                  
                    <div class="w-full px-3 mb-6 md:mb-0">
                    <form action="filter-data.php" method="post" id="tag-form">
                        <label for="tag-input" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-black">Añadir parametros de busqueda: </label>
                        <input type="text" class="bg-white border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-200 dark:placeholder-gray-400 dark:text-black" id="tag-input" name="tag" placeholder="Ingresa un tag">
                        <button type="button" class="block w-full bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4 float-right" id="add-tag">Añadir</button>                        
                        <input type="hidden" id="tags-hidden" name="tags" value="">
                        <input type="submit" class="block w-full bg-emerald-700 mt-4 py-2 rounded text-white font-semibold mb-2 px-4" value="Filtrar Datos">
                        <div id="tag-list" class="float- w-96 flex"></div>
                    </form>
                  </div>                                                                     
                </div>                                                            
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
                                  <th scope="col" class="py-3.5 px-4 text-medium font-normal text-left text-black">
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
                                                      Enviar Mensaje
                                                  </button>  
                                                  </th>
                                              </tr>
                                          </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-200 bg-white">
                            <?php 

                            require_once(__DIR__.'/../php/db-config.php');
                            require_once "db-connection.php";
                            // guardar_tags.php

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Lee los datos POST                                
                                $tags = isset($_POST['tags']) ? json_decode($_POST['tags'], true) : [];

                                if(empty($tags)){
                                    echo "<script>";
                                    echo "Swal.fire({
                                            title: '¡Ups!',
                                            text: 'Debes añadir algun parametro de busqueda antes!',
                                            icon: 'error',
                                            confirmButtonText: '¡Entendido!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Redirige a otra página después de cerrar el cuadro de diálogo
                                                window.location.href = '../militantesList.php';
                                            }
                                        });";
                                    echo "</script>";                                    
                                }

                                $datosFiltrados = filterData($con, $tags);
                                
                                foreach ($datosFiltrados as $usuario):                                                                     
                                                            
                            ?>
                                <tr class="dark:hover:bg-gray-200 cursor-pointer" onclick="window.location.href='user-details.php?id=<?php echo $usuario['id'] ?>'">
                                    <td class="px-4 py-4 text-medium font-medium text-black-700 dark:text-black-200 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                        <input type="checkbox" name="seleccionados[]" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" class="text-blue-500 rounded dark:bg-black dark:ring-offset-black-900 dark:border-black-700">
                                            <span class="text-black"><?php echo htmlspecialchars($usuario['distrito_electoral']);?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-medium text-black whitespace-nowrap"><?php echo htmlspecialchars($usuario['nombre']);?></td>
                                    <td class="px-4 py-4 text-medium font-medium text-black-700 whitespace-nowrap">
                                        <div class="inline-flex items-center px-3 py-1">                                            
                                            <h2 class="text-medium font-normal"><?php echo htmlspecialchars($usuario['apellido_paterno']);?> <?php echo htmlspecialchars($usuario['apellido_materno']);?></h2>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo htmlspecialchars($usuario['codigo_postal']);?></td>
                                    <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo htmlspecialchars($usuario['calle']);?></td>
                                    <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo htmlspecialchars($usuario['municipio']);?></td>
                                    <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo htmlspecialchars($usuario['colonia']);?></td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <button class="block w-full bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                Editar
                                            </button>
                                            <button class="block w-full bg-red-700 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                <a href="delete-militant.php?id=<?php echo htmlspecialchars($usuario['id']);?>">Eliminar</a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; }?>                                                                                                 
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
<script src="../js/tagselector.js"></script>
<script src="../js/filter-multiselect.js"></script>
</body>
</html>


<?php 
function filterData($con, $tags){
    $sql = "SELECT * FROM militantes WHERE ";
    $conditions = [];

    foreach($tags as $tag){
        $conditions[] = "(colonia LIKE '%$tag%' OR municipio LIKE '%$tag%' OR genero LIKE '%$tag%' OR distrito_electoral LIKE '%$tag%' OR edad LIKE '%$tag%' OR seccion LIKE '%$tag%')";
    }

    $sql .= implode(' AND ', $conditions);

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $datosFiltrados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $datosFiltrados;
}

$stmt = null;
$con = null;




?>