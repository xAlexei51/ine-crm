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

#Identificacion 
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
$discapacidad = ($_POST['discapacidad']);
$salario_mensual = ($_POST['salario_mensual']);

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
            'salario_mensual' => $salario_mensual            
        ];
        
        $userExists = "SELECT * FROM militantes WHERE curp = ?";
        $stmt = $con->prepare($userExists);
        $stmt->bindParam(1, $curp);        
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
                        
        if ($res) {
            echo "<script>";
                echo "Swal.fire({
                        title: 'Ups!',
                        text: 'Ya te has registrado anteriormente con esta CURP!',
                        icon: 'error',
                        confirmButtonText: '¡Entendido!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        // Redirige a otra página después de cerrar el cuadro de diálogo
                        window.location.href = '../index.html';
                        }
                    });";
                echo "</script>";
        } else {
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