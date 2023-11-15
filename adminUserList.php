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

    require "php/navbar.php";
    ?>
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
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left text-black">
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
                                require_once(__DIR__ . '/php/db-connection.php');
                                $sql = "SELECT * FROM users";
                                $stmt = $con->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) :
                                ?>
                                    <tr class="dark:hover:bg-gray-200 cursor-pointer">
                                        <a href="hola.html">
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
                                                    <a href="php/update-user-page.php?id=<?php echo $row['id'] ?>">
                                                        <button id="updateUser" class="block dark:hover:bg-gray-700 w-32 bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4">
                                                            Editar
                                                        </button>
                                                    </a>
                                                    <a href="php/delete-user.php?id=<?php echo $row['id'] ?>">
                                                        <button class="block w-32 bg-red-700 dark:hover:bg-red-500 mt-4 py-2 rounded text-white font-semibold mb-2 px-4" id="deleteButton">
                                                            Eliminar
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </a>
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
    <script src="js/update-dialog.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/dialog.js"></script>
</body>

</html>
