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

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


$nombre = ($_POST['nombre']);
$apellido_paterno = ($_POST['apellido_paterno']);
$apellido_materno = ($_POST['apellido_materno']);
$curp = ($_POST['curp']);
$genero = ($_POST['genero']);
$fecha_nacimiento = ($_POST['fecha_nacimiento']);
$lugar_nacimiento = ($_POST['lugar_nacimiento']);
$edad = ($_POST['edad']);
$clave_elector = $_POST['clave_elector'];
$folio_nacional = $_POST['folio_nacional'];
$fecha_inscripcion_padron = $_POST['fecha_padron'];
$email = ($_POST['email']);
$telefono = ($_POST['telefono']);
#Domicilio del militante
$calle = ($_POST['calle']);
$colonia = ($_POST['colonia']);
$codigo_postal = ($_POST['codigo_postal']);
$numero_exterior = ($_POST['numero_exterior']);
$numero_interior = ($_POST['numero_interior']);
#Identificacion electoral
$entidad_federativa = $_POST['entidad_federativa'];
$distrito_electoral = $_POST['distrito_electoral'];
$municipio = ($_POST['municipio']);
$seccion = ($_POST['seccion']);
$localidad = ($_POST['localidad']);
#Informacion adicional
$ocupacion = ($_POST['ocupacion']);
$escolaridad = ($_POST['escolaridad']);
$medio_transporte = ($_POST['medio_transporte']);
$discapacidad = $_POST['discapacidad'];
$salario_mensual = ($_POST['salario_mensual']);

$hash_password = password_hash($password, PASSWORD_DEFAULT);

try {

$queryData = [
    'nombre' => $nombre,
    'apellido_paterno' => $apellido_paterno,
    'apellido_materno' => $apellido_materno,
    'curp' => $curp,
    'genero' => $genero,
    'fecha_nacimiento' => $fecha_nacimiento,
    'lugar_nacimiento' => $lugar_nacimiento,
    'edad' => $edad,
    'clave_elector' => $clave_elector,
    'folio_nacional' => $folio_nacional,
    'fecha_inscripcion_padron' => $fecha_inscripcion_padron,
    'correo_electronico' => $email,
    'telefono' => $telefono,
    'calle' => $calle,
    'colonia' => $calle,
    'codigo_postal' => $codigo_postal,
    'numero_exterior' => $numero_exterior,
    'numero_interior' => $numero_interior,
    'entidad_federativa' => $entidad_federativa,
    'distrito_electoral' => $distrito_electoral,
    'municipio' => $municipio,
    'seccion' => $seccion,
    'localidad' => $localidad,
    'ocupacion' => $ocupacion,
    'escolaridad' => $escolaridad,
    'medio_transporte' => $medio_transporte,
    'discapacidad' => $discapacidad,
    'salario_mensual' => $salario_mensual,
    'id' => $id
];

    $query = "UPDATE militantes SET " . implode(', ', array_map(fn($queryData) => "$queryData = :$queryData", array_keys($queryData))) . " WHERE id = :id";
    $stmt = $con->prepare($query);    
    if($stmt === false){
        die('Error en la preparacion de la consulta: ' . $con->error);
    }
    $stmt->execute($queryData);


    if($stmt){
        echo "<script>";
        echo "Swal.fire({
                title: '¡Exito!',
                text: 'Datos actualizados!',
                icon: 'success',
                confirmButtonText: '¡Entendido!'
            }).then((result) => {
                if (result.isConfirmed) {
                // Redirige a otra página después de cerrar el cuadro de diálogo
                window.location.href = '../militantesList.php';
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
                window.location.href = '../militantesList.php';
                }
            });";
        echo "</script>";
    }
} catch (\Throwable $th) {
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




?>

</body>
</html>