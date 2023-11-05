<?php 

require_once(__DIR__.'/../php/db-config.php');

$conn = new Conexion();

$servername = $conn->getServername();
$dbname = $conn->getdbName();
$username = $conn->getUsername();
$password = $conn->getPassword();

try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);        
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {
    echo "Error en la conexion: " . $th->getMessage();
}


?>