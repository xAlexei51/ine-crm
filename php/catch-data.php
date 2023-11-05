<?php

require_once '../vendor/autoload.php';
use Twilio\Rest\Client;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seleccionados'])) {
    $seleccionados = $_POST['seleccionados'];

    // Haz lo que necesites con los datos seleccionados
    foreach ($seleccionados as $email) {
        echo "Correos: ". $email . "<br>";    
        $sid    = "AC1f0e2d4ce39b7f5ee69fb5f28cc1e56e";
        $token  = "334e00d332af7f415da052e31c4db493";
        $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+521".$email, // to
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "Hola puta"
        )
      );

print($message->sid);

        // Realiza acciones adicionales con cada ID seleccionado
    }
} else {
    echo "No se han seleccionado elementos.";
}
?>