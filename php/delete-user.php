<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>
</head>
<body>
    
<?php

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

session_start();

require_once(__DIR__.'/../php/db-config.php');
require_once "db-connection.php";

$id = $_GET['id'];

// Utiliza sentencias preparadas para prevenir la inyección de SQL
$query = "DELETE FROM users WHERE id = ?";

$stmt = $con->prepare($query);
if($stmt === false){
    die("Error en la preparacion de la consulta: " . $con->error);
}

$stmt->bindParam(1, $id);
$stmt->execute();
if ($stmt) {
    echo "<script>";
    echo "Swal.fire({
            title: '¡Exito!',
            text: 'Usuario eliminado!',
            icon: 'success',
            confirmButtonText: '¡Entendido!'
        }).then((result) => {
            if (result.isConfirmed) {
            // Redirige a otra página después de cerrar el cuadro de diálogo
            window.location.href = '../adminUserList.php';
            }
        });";
    echo "</script>"; 
} else {
    // Manejo de errores: No se pudo ejecutar la consulta
    echo "<script>";
    echo "Swal.fire({
            title: '¡Ups!',
            text: 'No se puedo eliminar el usuario!',
            icon: 'error',
            confirmButtonText: '¡Entendido!'
        }).then((result) => {
            if (result.isConfirmed) {
            // Redirige a otra página después de cerrar el cuadro de diálogo
            window.location.href = '../adminUserList.php';
            }
        });";
    echo "</script>"; 
}

$stmt = null;
$con = null;
?>

</body>
</html>