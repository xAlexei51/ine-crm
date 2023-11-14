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

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$username = $_POST['username'];
$password = $_POST['password'];

$hash_password = password_hash($password, PASSWORD_DEFAULT);

try {

    $queryData = [
        'nombre' => $nombre,
        'email' => $email,
        'telefono' => $telefono,
        'username' => $username,
        'password' => $hash_password
    ];
    
    $query = "INSERT INTO users (" . implode(', ', array_keys($queryData)) . ") VALUES (:" . implode(', :', array_keys($queryData)) . ")";
    $stmt = $con->prepare($query);
    $stmt->execute($queryData);

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
} catch (Exception $th) {
    echo "<script>";
    echo "Swal.fire({
            title: '¡Ups!',
            text: 'Error: '".$th->getMessage().",
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