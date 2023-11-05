<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once '../vendor/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "AC1f0e2d4ce39b7f5ee69fb5f28cc1e56e";
    $token  = "334e00d332af7f415da052e31c4db493";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+5213320659549", // to
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "Your appointment is coming up on July 21 at 3PM"
        )
      );

print($message->sid);

?>