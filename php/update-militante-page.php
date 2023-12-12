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
         if (!isset($_SESSION['username'])) {
             echo "<script>";
             echo "Swal.fire({
                 title: '¡Ups!',
                 text: 'Parece que no has iniciado sesión',
                 icon: 'warning',
                 confirmButtonText: '¡Entendido!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = 'login.html';
                 }
             });";
             echo "</script>";
         }
         
         require "navbar-folder.php";
         ?>
      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
         <!-- Main content header -->
         <!-- Start Content -->
         <div class="max-w-full p-6 bg-white rounded-lg shadow">
            <a href="#">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Inicio / Miitantes / Editar</h5>
            </a>
         </div>
         <div class="flex flex-col mt-6 py-3 px-3">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                  <div class="overflow-hidden rounded-md shadow-md">
                     <?php
                        require_once "db-connection.php";
                        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
                        $sql = "SELECT * FROM militantes WHERE id = ?";                                
                        $stmt = $con->prepare($sql);
                        $stmt->bindParam(1, $id);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($result as $row):
                                                                                          
                        ?>
                     <form action="update-militante.php?id=<?php echo $row['id']?>" method="post">
                        <div class="grid grid-cols-3 ">
                           <!-- Identificacion Divider -->
                           <div class="bg-gray-700 py-2 px-2 mb-2 text-left">
                              <span class="text-white font-bold text-lg w-full pl-44">Identificacion</span>
                           </div>
                           <div class="bg-gray-700 py-2 px-2 mb-2"></h2></div>
                           <div class="bg-gray-700 py-2 px-2 mb-2"></div>
                           <!-- Identificacion informacion -->
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Nombre (s) -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Nombre
                                    </label>
                                    <input name="nombre" value="<?php echo $row['nombre'];?>" class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Fecha de nacimiento
                                    </label>
                                    <input name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="date" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Fecha de inscripcion al padron -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Fecha de inscripcion al padron
                                    </label>
                                    <input name="fecha_padron" value="<?php echo $row['fecha_inscripcion_padron'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="date" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Apellido paterno -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Apellido Paterno
                                    </label>
                                    <input name="apellido_paterno" value="<?php echo $row['apellido_paterno'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="Apellido Paterno">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Lugar de nacimiento -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Lugar de nacimiento
                                    </label>
                                    <input name="lugar_nacimiento" value="<?php echo $row['lugar_nacimiento'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Correo electronico -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Correo Electronico
                                    </label>
                                    <input name="email" value="<?php echo $row['correo_electronico'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="example@gmail.com">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Apellido Materno -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Apellido Materno
                                    </label>
                                    <input name="apellido_materno" value="<?php echo $row['apellido_materno'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Edad -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Edad
                                    </label>
                                    <input name="edad" value="<?php echo $row['edad'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Telefono -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Telefono
                                    </label>
                                    <input name="telefono" value="<?php echo $row['telefono'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- CURP -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    CURP
                                    </label>
                                    <input name="curp" value="<?php echo $row['curp'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- cLAVE DE ELECTOR -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Clave de Elector
                                    </label>
                                    <input name="clave_elector" value="<?php echo $row['clave_elector'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div></div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Fecha de nacimiento -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Genero
                                    </label>                                            
                                    <div class="relative">
                                       <select name="genero" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                          <option><?php echo $row['genero']?></option>
                                          <option>Masculino</option>
                                          <option>Femenino</option>
                                          <option>Otro(s)</option>
                                       </select>
                                       <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                             <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                          </svg>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Folio Nacional
                                    </label>
                                    <input name="folio_nacional" value="<?php echo $row['folio_nacional'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
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
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Calle -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Calle
                                    </label>
                                    <input name="calle" value="<?php echo $row['calle'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Numero interior -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Numero interior
                                    </label>
                                    <input name="numero_interior" value="<?php echo $row['numero_interior'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Codigo Postal -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Codigo Postal
                                    </label>
                                    <input name="codigo_postal" value="<?php echo $row['codigo_postal'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Colonia -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Colonia
                                    </label>
                                    <input name="colonia" value="<?php echo $row['colonia'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Numero exterior -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Numero Exterior
                                    </label>
                                    <input name="numero_exterior" value="<?php echo $row['numero_exterior'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div></div>
                           <div></div>
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
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Entidad Federativa -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Entidad Federativa
                                    </label>
                                    <input name="entidad_federativa" value="<?php echo $row['entidad_federativa'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Localidad -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Localidad
                                    </label>
                                    <input name="localidad" value="<?php echo $row['localidad'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Codigo Postal -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Municipio
                                    </label>
                                    <input name="municipio" value="<?php echo $row['municipio'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Codigo Postal -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Distrito Electoral
                                    </label>
                                    <input name="distrito_electoral" value="<?php echo $row['distrito_electoral'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Codigo Postal -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Seccion
                                    </label>
                                    <input name="seccion" value="<?php echo $row['seccion'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div></div>
                           <div></div>
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
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Ocupacion -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Ocupacion
                                    </label>
                                    <input name="ocupacion" value="<?php echo $row['ocupacion'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Salario Mensual -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Salario Mensual
                                    </label>
                                    <input name="salario_mensual" value="<?php echo $row['salario_mensual'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Medio de transporte -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Medio de transporte
                                    </label>                                     
                                    <div class="relative">
                                       <select name="medio_transporte" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                          <option><?php echo $row['medio_transporte'];?></option>
                                          <option value="Automóvil">Automóvil</option>
                                          <option value="Transporte publico">Transporte publico</option>                                          
                                       </select>
                                       <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                             <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                          </svg>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Escolaridad -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Escolaridad
                                    </label>
                                    <div class="relative">
                                       <select name="escolaridad" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                          <option><?php echo $row['escolaridad']?></option>
                                          <option>Primaria</option>
                                          <option>Secundaria</option>
                                          <option>Bachillerato General</option>
                                          <option>Tecnólogo</option>
                                          <option>Bachillerato Tecnólogo</option>
                                          <option>Profesional Tecnico</option>
                                          <option>Técnico Superior Universitario</option>
                                          <option>Licenciatura</option>
                                          <option>Especializacion</option>
                                          <option>Maestría</option>
                                          <option>Doctorado</option>
                                       </select>
                                       <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                             <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                          </svg>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                 <!-- Discapcidad -->
                                 <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="grid-first-name">
                                    Discapacidad
                                    </label>
                                    <input name="discapacidad" value="<?php echo $row['discapacidad'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                 </div>
                              </div>
                           </div>
                           <div></div>
                           <div></div>
                           <div></div>
                           <div></div>
                           <div></div>
                           <div></div>
                           <div></div>
                        </div>
                        <div class="flex items-center gap-x-6 mb-5">
                                  <button type="submit" class="mx-5 w-full block mb-5 dark:hover:bg-gray-700 w-96 bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                      ACTUALIZAR DATOS
                                  </button>
                             </div>
                     </form>
                     <?php 
                        endforeach;
                        
                        $stmt = null;
                        $con = null;
                        
                        ?>
                  </div>
               </div>
            </div>
         </div>
      </main>
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
      <output></output>
      <script src="js/update-dialog.js"></script>
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="js/dialog.js"></script>
   </body>
</html>