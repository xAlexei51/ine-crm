<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once './vendor/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "AC57cd92eb3409bcc61845d557f497789a";
    $token  = "ac5767b3f6132760efc9897674fe4c4e";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+5213320659549", // to
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "Your appointment is coming up on July 21 at 3PM"
        )
      );

print($message->sid);