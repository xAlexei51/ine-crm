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

require_once(__DIR__.'/../php/db-config.php');
require_once "db-connection.php";

$user = new Users();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$username = $_POST['username'];
$password = $_POST['password'];

$hash_password = password_hash($password, PASSWORD_DEFAULT);

$user->setNombre($nombre);
$user->setEmail($email);
$user->setTelefono($telefono);
$user->setUsername($username);
$user->setPassword($hash_password);

$query = "INSERT INTO users (nombre, email, telefono, username, password) 
VALUES (?, ?, ?, ?, ?)";


$stmt = $con->prepare($query);
if($stmt === false){
    die("Error en la preparacion de la consulta: " . $con->error);
}

$stmt->bindParam(1, $nombre);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $telefono);
$stmt->bindParam(4, $username);
$stmt->bindParam(5, $hash_password);
$stmt->execute();


if($stmt){
    echo "<script>";
    echo "Swal.fire({
            title: '¡Exito!',
            text: 'Usuario agregado!',
            icon: 'success',
            confirmButtonText: '¡Entendido!'
        }).then((result) => {
            if (result.isConfirmed) {
            // Redirige a otra página después de cerrar el cuadro de diálogo
            window.location.href = '../adminUserList.php';
            }
        });";
    echo "</script>";
}else {
    echo "<script>";
    echo "Swal.fire({
            title: 'Ups!',
            text: 'No se puedo agregar el usuario!',
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