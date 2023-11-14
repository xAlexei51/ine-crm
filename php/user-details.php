
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">    
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 
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
            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
              <!-- Main content header -->
              <div
                class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
              >                                
              </div>
    
              <!-- Start Content -->
              <div class="w-1/2 p-6 bg-white rounded-lg shadow">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Inicio / Detalle del militante</h5>
                </a>                                                                  
                                                                           
            </div>
            <?php 

            require_once "db-connection.php";

            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            $stmt = 'SELECT * FROM militantes WHERE id = ?';
            if($stmt === false){
                die("Error en la preparacion de la consulta: " . $con->error);
            }
            $stmt = $con->prepare($stmt);

            $stmt->bindParam(1, $id);                    
            $stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);                      
            
            foreach($result as $row):

            ?>               
            <div class="flex flex-col mt-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden rounded-md shadow-md">
                        <div class="grid grid-cols-3 ">
                            <!-- Identificacion Divider -->
                            <div class="bg-gray-700 py-2 px-2 mb-2 text-left">
                                <span class="text-white font-bold text-lg w-full pl-44">Identificacion</span>
                            </div>
                            <div class="bg-gray-700 py-2 px-2 mb-2"></h2></div>
                            <div class="bg-gray-700 py-2 px-2 mb-2"></div>                            
                            <!-- Identificacion informacion -->
                            <div>
                                <span class="text-black font-bold text-lg w-full">Nombres(s): <span class="font-normal"><?php echo htmlspecialchars($row['nombre']); ?></span> </span>    
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Fecha de nacimiento: <span class="font-normal"> <?php echo htmlspecialchars($row['fecha_nacimiento']); ?> </span> </span>    
                            </div>
                            <div>
                            <span class="text-black font-bold text-lg w-full">Fecha de inscripcion al Padron: <span class="font-normal"> <?php echo htmlspecialchars($row['fecha_inscripcion_padron']); ?> </span> </span>   
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Apellido Paterno: <span class="font-normal"> <?php echo htmlspecialchars($row['apellido_paterno']); ?> </span> </span> 
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Lugar de nacimiento: <span class="font-normal"> <?php echo htmlspecialchars($row['lugar_nacimiento']); ?> </span> </span> 
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Correo Electronico: <span class="font-normal"> <?php echo htmlspecialchars($row['correo_electronico']); ?> </span> </span> 
                            </div>    
                            <div>
                                <span class="text-black font-bold text-lg w-full">Apellido Materno: <span class="font-normal"> <?php echo htmlspecialchars($row['apellido_materno']); ?> </span> </span> 
                            </div>
                            <div>
                            <span class="text-black font-bold text-lg w-full">Edad: <span class="font-normal"> <?php echo htmlspecialchars($row['fecha_nacimiento']); ?> </span> </span> 
                            </div>
                            <div>
                            <span class="text-black font-bold text-lg w-full">Telefono: <span class="font-normal"> <?php echo htmlspecialchars($row['fecha_nacimiento']); ?> </span> </span>     
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">CURP: <span class="font-normal"> <?php echo htmlspecialchars($row['curp']); ?> </span> </span>  
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Clave de Elector: <span class="font-normal"> <?php echo htmlspecialchars($row['clave_elector']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Genero: <span class="font-normal"> <?php echo htmlspecialchars($row['genero']); ?> </span> </span> 
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Folio nacional: <span class="font-normal"> <?php echo htmlspecialchars($row['folio_nacional']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <!-- Domicilio Divider -->
                            <div class="bg-gray-700 py-2 px-2 mb-2 text-left pl-44">
                                <span class="text-white font-bold text-lg w-full">Domicilio </span> 
                            </div>
                            <div class="bg-gray-700 py-2 px-2 mb-2"></h2></div>
                            <div class="bg-gray-700 py-2 px-2 mb-2"></div> 
                            <!-- Informacion Domicilio -->
                            <div>
                                <span class="text-black font-bold text-lg w-full">Calle: <span class="font-normal"> <?php echo htmlspecialchars($row['calle']); ?> </span> </span> 
                            </div>
                            <div>
                            <span class="text-black font-bold text-lg w-full">Numero Interior: <span class="font-normal"> <?php echo htmlspecialchars($row['numero_interior']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Colonia: <span class="font-normal"> <?php echo htmlspecialchars($row['colonia']); ?> </span> </span> 
                            </div>
                            <div>
                            <span class="text-black font-bold text-lg w-full">Numero Exterior: <span class="font-normal"> <?php echo htmlspecialchars($row['numero_exterior']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Codigo Postal: <span class="font-normal"> <?php echo htmlspecialchars($row['codigo_postal']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <!-- Identificacion electoral divider -->                            
                            <div class="bg-gray-700 py-2 px-2 mb-2 text-left">
                                <span class="text-white font-bold text-lg w-full pl-44">Identificacion Electoral</span>
                            </div>
                            <div class="bg-gray-700 py-2 px-2 mb-2"></h2></div>
                            <div class="bg-gray-700 py-2 px-2 mb-2"></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Entidad Federativa: <span class="font-normal"> <?php echo htmlspecialchars($row['entidad_federativa']); ?> </span> </span> 
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Localidad: <span class="font-normal"> <?php echo htmlspecialchars($row['localidad']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Distrito Electoral: <span class="font-normal"> <?php echo htmlspecialchars($row['distrito_electoral']); ?> </span> </span> 
                            </div>
                            <div>
                              <span class="text-black font-bold text-lg w-full">Sección: <span class="font-normal"> <?php echo htmlspecialchars($row['seccion']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Municipio: <span class="font-normal"> <?php echo htmlspecialchars($row['municipio']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div></div>
                            <div>
                                
                            </div>
                            <div></div>
                            <div></div>
                            <!-- Informacion adiconal divider -->
                            <div class="bg-gray-700 py-2 px-2 mb-2 text-left">
                                <span class="text-white font-bold text-lg w-full pl-44">Informacion Adicional</span>
                            </div>
                            <div class="bg-gray-700 py-2 px-2 mb-2"></h2></div>
                            <div class="bg-gray-700 py-2 px-2 mb-2"></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Ocupación: <span class="font-normal"> <?php echo htmlspecialchars($row['ocupacion']); ?> </span> </span> 
                            </div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Salario Mensual: <span class="font-normal"> <?php echo htmlspecialchars($row['salario_mensual']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Escolaridad: <span class="font-normal"> <?php echo htmlspecialchars($row['escolaridad']); ?> </span> </span> 
                            </div>
                            <div>
                              <span class="text-black font-bold text-lg w-full">Discpacidad: <span class="font-normal"> <?php echo htmlspecialchars($row['discapacidad']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div>
                                <span class="text-black font-bold text-lg w-full">Medio de transporte: <span class="font-normal"> <?php echo htmlspecialchars($row['medio_transporte']); ?> </span> </span> 
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>   
              <?php endforeach;
              
              $stmt = null;
              $con = null;
              
              ?>                                                                
            </main>
            <!-- Main footer -->                   
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
