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
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Inicio / Adminsitradores / Editar</h5>
            </a>            
        </div>        

        <div class="flex flex-col mt-6 py-3 px-3">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden rounded-md shadow-md">
                        
                                <?php
                                require_once "db-connection.php";
                                $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
                                $sql = "SELECT * FROM users WHERE id = ?";                                
                                $stmt = $con->prepare($sql);
                                $stmt->bindParam(1, $id);
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                
                                foreach($result as $row):
                                                                                                  
                                ?>
                                                                    
                            <form action="update-user.php?id=<?php echo $row['id']?>" method="post">
                                <label class="block uppercase tracking-wide text-gray-700 text-xl font-bold mb-2 px-3" for="grid-colonia">
                                    Editar Informacion
                                </label>
                                <!-- Nombre (s) -->
                                <div class="flex flex-wrap -mx-3 mb-3 px-3 py-3">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Nombre
                                        </label>
                                        <input name="nombre" value="<?php echo $row['nombre'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="John Doe">
                                    </div>
                                </div>
                                <!-- Correo electronico y telefono -->
                                <div class="flex flex-wrap -mx-3 mb-3 px-3">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                                            Correo electronico
                                        </label>
                                        <input name="email" value="<?php echo $row['email'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="email" placeholder="example@gmail.com">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-telefono">
                                            Telefono
                                        </label>
                                        <input name="telefono" value="<?php echo $row['telefono'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-telefono" type="text" placeholder="+523333333333" maxlength="10">
                                    </div>
                                </div>
                                <!-- Usuario -->
                                <div class="flex flex-wrap -mx-3 mb-3 px-3">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Usuario
                                        </label>
                                        <input name="username" value="<?php echo $row['username'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="Ejemplo: john_2025">
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="flex flex-wrap -mx-3 px-3">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Password
                                        </label>
                                        <input name="password" value="<?php echo $row['password'];?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="password" placeholder="Contraseña">
                                    </div>
                                </div>                
                                
                              </div>  
                              <div class="flex items-center gap-x-6 mb-5">
                                  <button type="submit" class="mx-5 block mb-5 dark:hover:bg-gray-700 w-96 bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                      Guardar
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
