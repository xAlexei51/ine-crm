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

use Twilio\Rest\Client;
require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seleccionados'])) {
    $message = $_POST['content'];
    $messageWithoutTags = html_entity_decode(strip_tags($message));
    $seleccionados = $_POST['seleccionados'];

    // Haz lo que necesites con los datos seleccionados
    foreach ($seleccionados as $phone) {
        echo "Correos: ". $phone . "<br>";    
        $sid    = $_ENV['SID'];
        $token  = $_ENV['TOKEN'];
        $twilio = new Client($sid, $token);      
    
        $message = $twilio->messages->create(
          "whatsapp:+521".$phone, // to
            array(
              "from" => "whatsapp:+14155238886",
              "body" => $messageWithoutTags              
            )
          );

    print($message->sid);
    }
} else {
  echo "<script>";
  echo "Swal.fire({
          title: '¡Ups!',
          text: 'Pararece que no has seleccionado usuarios!',
          icon: 'warning',
          confirmButtonText: '¡Entendido!'
      }).then((result) => {
          if (result.isConfirmed) {
          // Redirige a otra página después de cerrar el cuadro de diálogo
          window.location.href = '../militantesList.php';
          }
      });";
  echo "</script>";
}
?>
  
</body>
</html>
