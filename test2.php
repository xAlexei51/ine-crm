<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
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
                                            <input type="checkbox" name="seleccionados[]" value="<?php echo $row['correo_electronico']; ?>" class="text-blue-500 rounded dark:bg-black dark:ring-offset-black-900 dark:border-black-700">
                                            <span class="text-black"><?php echo $row['distrito_elctoral'];?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-medium text-black whitespace-nowrap"><?php echo $row['nombre']; ?></td>
                                    <td class="px-4 py-4 text-medium font-medium text-black-700 whitespace-nowrap">
                                        <div class="inline-flex items-center px-3 py-1">                                            
                                            <h2 class="text-medium font-normal"><?php echo $row['apellido_paterno']; ?> <?php echo $row['apellido_materno']; ?></h2>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo $row['codigo_postal']; ?></td>
                                    <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo $row['calle'];  ?></td>
                                    <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo $row['municipio']; ?></td>
                                    <td class="px-4 py-4 text-medium text-black-500 text-black whitespace-nowrap"><?php echo $row['colonia']  ?></td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <button class="block w-full bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                Editar
                                            </button>
                                            <button class="block w-full bg-red-700 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                <a href="php/delete-militant.php?id=<?php echo $row['id'] ?>">Eliminar</a>
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
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="js/multiselect.js"></script>
</html>