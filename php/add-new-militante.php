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
            // Redirige a otra página después de cerrar el cuadro de diálogo
            window.location.href = 'login.html';
            }
        });";
    echo "</script>";
  }

$nombre = strtoupper($_POST['nombre']);
$apellido_paterno = strtoupper($_POST['apellido_paterno']);
$apellido_materno = strtoupper($_POST['apellido_materno']);
$email = strtoupper($_POST['email']);
$genero = strtoupper($_POST['genero']);
$fecha_nacimiento = strtoupper($_POST['fecha_nacimiento']);
$edad = strtoupper($_POST['edad']);
$calle = strtoupper($_POST['calle']);
$telefono = strtoupper($_POST['telefono']);
$codigo_postal = strtoupper($_POST['codigo_postal']);
$numero_exterior = strtoupper($_POST['numero_exterior']);
$numero_interior = strtoupper($_POST['numero_interior']);
$colonia = strtoupper($_POST['colonia']);
$municipio = strtoupper($_POST['municipio']);
$distrito_electoral = $_POST['distrito_electoral'];
$ocupacion = strtoupper($_POST['ocupacion']);
$seccion = strtoupper($_POST['seccion']);
$medio_transporte = strtoupper($_POST['medio_transporte']);
$nivel_de_estudios = strtoupper($_POST['nivel_de_estudios']);
$salario_mensual = strtoupper($_POST['salario_mensual']);


$militante = new Militantes();

$militante->setNombre($nombre);
$militante->setApellidoPaterno($apellido_paterno);
$militante->setApellidoMaterno($apellido_materno);
$militante->setCorreoElectronico($email);
$militante->setGenero($genero);
$militante->setFechaNacimiento($fecha_nacimiento);
$militante->setEdad($edad);
$militante->setCalle($calle);
$militante->setTelefono($calle);
$militante->setCodigoPostal($codigo_postal);
$militante->setNumeroExterior($numero_exterior);
$militante->setNumeroInterior($numero_interior);
$militante->setColonia($colonia);
$militante->setMunicipio($municipio);
$militante->setDistritoElectoral($distrito_electoral);
$militante->setOcupacion($ocupacion);
$militante->setSector($seccion);
$militante->setMedioTransporte($medio_transporte);
$militante->setNivelEstudios($nivel_de_estudios);
$militante->setSalarioPromedio($salario_mensual);

try {
    $query = 'INSERT INTO militantes (
        nombre,
        apellido_paterno,
        apellido_materno,
        correo_electronico,
        genero, 
        fecha_nacimiento,
        edad, 
        calle, 
        telefono,
        codigo_postal,
        numero_exterior,
        numero_interior,
        colonia, 
        municipio, 
        distrito_electoral,
        ocupacion, 
        sector,
        medio_transporte,
        nivel_de_estudios,
        salario_mensual) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    
    $stmt = $con->prepare($query);
    if($stmt === false){
        die('Error en la preparacion de la consulta: ' . $con->error);
    }
    
    $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
    $stmt->bindParam(2, $apellido_paterno, PDO::PARAM_STR);
    $stmt->bindParam(3, $apellido_materno, PDO::PARAM_STR);
    $stmt->bindParam(4, $email, PDO::PARAM_STR);
    $stmt->bindParam(5, $genero, PDO::PARAM_STR);
    $stmt->bindParam(6, $fecha_nacimiento, PDO::PARAM_STR);
    $stmt->bindParam(7, $edad, PDO::PARAM_STR);
    $stmt->bindParam(8, $calle, PDO::PARAM_STR);
    $stmt->bindParam(9, $telefono, PDO::PARAM_STR);
    $stmt->bindParam(10, $codigo_postal, PDO::PARAM_STR);
    $stmt->bindParam(11, $numero_exterior, PDO::PARAM_STR);
    $stmt->bindParam(12, $numero_interior, PDO::PARAM_STR);
    $stmt->bindParam(13, $colonia, PDO::PARAM_STR);
    $stmt->bindParam(14, $municipio, PDO::PARAM_STR);
    $stmt->bindParam(15, $distrito_electoral, PDO::PARAM_STR);
    $stmt->bindParam(16, $ocupacion, PDO::PARAM_STR);
    $stmt->bindParam(17, $seccion, PDO::PARAM_STR);
    $stmt->bindParam(18, $medio_transporte, PDO::PARAM_STR);
    $stmt->bindParam(19, $nivel_de_estudios, PDO::PARAM_STR);
    $stmt->bindParam(20, $salario_mensual, PDO::PARAM_STR);
    $stmt->execute();
    
    if($stmt){
        echo "<script>";
        echo "Swal.fire({
                title: '¡Exito!',
                text: 'Registro guardado!',
                icon: 'success',
                confirmButtonText: '¡Entendido!'
            }).then((result) => {
                if (result.isConfirmed) {
                // Redirige a otra página después de cerrar el cuadro de diálogo
                window.location.href = '../index.html';
                }
            });";
        echo "</script>";
    }else {
        echo "<script>";
        echo "Swal.fire({
                title: 'Ups!',
                text: 'No se puedo guardar el registro, intenta de nuevo mas tarde!',
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
} catch (Exeception $th) {
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