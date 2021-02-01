<?php
    $tel_api = 'https://api.telegram.org/bot1447496536:AAGPNWGFicYEchqx6-NEx7b-0wKdn2y6EAk';
    $update = json_decode(file_get_contents('php://input'),TRUE);
    
    $chatId = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];

    if (strpos($message, "/chatid") === 0) {
        header("location:".$tel_api."/sendmessage?chat_id=".$chatId."&text=".$chatId);
    }
    else if (strpos($message, "/bego") === 0) {
        $payam = substr($message, 5);
        header("location:".$tel_api."/sendmessage?chat_id=".$chatId."&text=".$payam);
    }
?>