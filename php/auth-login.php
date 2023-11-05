<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<nav class="bg-black">
  <div class="max-w-6xl mx-auto px-4">
    <div class="flex justify-between">

      <div class="flex space-x-4">
        <!-- logo -->
        <div>
          <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">            
            <span class="font-bold text-white text-lg">LOGO</span>
          </a>
        </div>        
      </div>

      <!-- secondary nav -->
      <div class="hidden md:flex items-center space-x-1">
                
        <a href="index.html" class="py-2 px-3 text-white uppercase font-bold hover:text-gray-500 bg-gray-800 hover:bg-dark-800-300 text-dark-800-900 hover:text-dark-800-800 rounded transition duration-300">Regresar</a>      
      </div>

      <!-- mobile button goes here -->
      <div class="md:hidden flex items-center">
        <button class="mobile-menu-button">
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- mobile menu -->
  <div class="mobile-menu hidden md:hidden">
    <a href="#" class="block py-2 px-4 text-sm hover:bg-white text-white text-center uppercase font-bold">Registro</a>    
    <button type="button" class="w-full font-bold bg-gray-800 text-white uppercase focus:outline-none focus:ring-4 font-medium text-sm px-5 py-2.5 mr-2">
        <a href="login.html">Regresar</a>
        </button>
  </div>
</nav>

<!-- component -->
<div class="h-screen flex">
  <div class="flex w-1/2 bg-gray-900 i justify-around items-center">
    <div>
      <h1 class="text-white font-bold text-4xl font-sans">- Bienvenido - </h1>
      <p class="text-white mt-1">¡Este apartado es solo para administradores!</p>
      <a href="index.html">
      <button type="button" class="block w-28 bg-white text-indigo-800 mt-4 py-2 rounded-2xl font-bold mb-2">SALIR</button>
    </a>
    </div>
  </div>
  <div class="flex w-1/2 justify-center items-center bg-white">
    <form action="php/auth-login.php" method="post" class="bg-white">
      <h1 class="text-gray-800 font-bold text-2xl mb-1 uppercase">Ingresa tus credenciales</h1>      
      <br><div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">          
          <input name="username" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="Usuario">
        </div>           
      </div>
      <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full px-3">         
          <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="password" placeholder="Contraseña">
        </div>           
      </div>
      <button type="submit" class="block w-full bg-gray-900 mt-4 py-2 rounded text-white font-semibold mb-2">Iniciar</button>
      <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password?</span>
    </form>
  </div>
</div>
</body>
</html>
<?php 

require_once(__DIR__.'/../php/db-config.php');
require_once "db-connection.php";


$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $con->prepare("SELECT password, nombre FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();

if($stmt === false){
    die("Error en la preparacion de la consulta: " . $con->error);
}

$usuario_bd = $stmt->fetch(PDO::FETCH_ASSOC);

if($usuario_bd && password_verify($password, $usuario_bd['password'])){
    session_start();
    $_SESSION['username'] = $username;
    header("Location: ../adminUserList.php");
}else{
    echo "<script>";
    echo "Swal.fire({
            title: '¡Ups!',
            text: 'Usuario o contraseñas incorrectas!',
            icon: 'error',
            confirmButtonText: '¡Entendido!'
        }).then((result) => {
            if (result.isConfirmed) {
            // Redirige a otra página después de cerrar el cuadro de diálogo
            window.location.href = '../login.html';
            }
        });";
    echo "</script>";
}




?>