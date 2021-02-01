<?php
    $tel_api = 'https://api.telegram.org/bot1447496536:AAE6dOUlrgVKdEesnLJsXN6s-zIIgUXC-8w';
    $update = json_decode(file_get_contents('php://input'),TRUE);
    
    $chatId = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];

    if (strpos($message, "/chatid") === 0) {
        file_get_contents($tel_api."/sendmessage?chat_id=".$chatId."&text=".$chatId);
    }
    else if (strpos($message, "/bego") === 0) {
        $payam = substr($message, 5);
        file_get_contents($tel_api."/sendmessage?chat_id=".$chatId."&text=".$payam);
    }
    echo 'h';
?>
