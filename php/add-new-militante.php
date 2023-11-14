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

#Identificacion 
$nombre = strtoupper($_POST['nombre']);
$apellido_paterno = strtoupper($_POST['apellido_paterno']);
$apellido_materno = strtoupper($_POST['apellido_materno']);
$curp = strtoupper($_POST['curp']);
$genero = strtoupper($_POST['genero']);
$fecha_nacimiento = strtoupper($_POST['fecha_nacimiento']);
$lugar_nacimiento = strtoupper($_POST['lugar_nacimiento']);
$edad = strtoupper($_POST['edad']);
$clave_elector = $_POST['clave_elector'];
$folio_nacional = $_POST['folio_nacional'];
$fecha_inscripcion_padron = $_POST['fecha_padron'];
$email = strtoupper($_POST['email']);
$telefono = strtoupper($_POST['telefono']);
#Domicilio del militante
$calle = strtoupper($_POST['calle']);
$colonia = strtoupper($_POST['colonia']);
$codigo_postal = strtoupper($_POST['codigo_postal']);
$numero_exterior = strtoupper($_POST['numero_exterior']);
$numero_interior = strtoupper($_POST['numero_interior']);
#Identificacion electoral
$entidad_federativa = $_POST['entidad_federativa'];
$distrito_electoral = $_POST['distrito_electoral'];
$municipio = strtoupper($_POST['municipio']);
$seccion = strtoupper($_POST['seccion']);
$localidad = strtoupper($_POST['localidad']);
#Informacion adicional
$ocupacion = strtoupper($_POST['ocupacion']);
$escolaridad = strtoupper($_POST['escolardiad']);
$medio_transporte = strtoupper($_POST['medio_transporte']);
$discpacidad = $_POST['discapacidad'];
$salario_mensual = strtoupper($_POST['salario_mensual']);

try {
    $userExists = $con->query("SELECT COUNT(*) AS count FROM militantes WHERE curp = ?");
    $count = $userExists->fetchObject()->count;        

    if($count > 0){
        echo "<script>";
        echo "Swal.fire({
                title: 'Ups!',
                text: 'Parece que ya te has registrado antes!',
                icon: 'error',
                confirmButtonText: '¡Entendido!'
            }).then((result) => {
                if (result.isConfirmed) {
                // Redirige a otra página después de cerrar el cuadro de diálogo
                window.location.href = '../index.html';
                }
            });";
        echo "</script>";
    }else {
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
            'discapacidad' => $medio_transporte,
            'salario_mensual' => $salario_mensual
        ];
        
        $query = "INSERT INTO militantes (" . implode(', ', array_keys($queryData)) . ") VALUES (:" . implode(', :', array_keys($queryData)) . ")";
        $stmt = $con->prepare($query);
        if($stmt === false){
            die('Error en la preparacion de la consulta: ' . $con->error);
        }
        
        $stmt->execute($queryData);
        
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