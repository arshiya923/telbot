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
    else if (strpos($message, "/hava") === 0) {
        $city = substr($message, 5);
        $weather_json_encoded = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=2f24c59900e19fa5b545708c99edad89");
        $weather_json_decoded = json_decode($weather_json_encoded, TRUE);
        $weather_eng = $weather_json_decoded['weather'][0]['main'];
        
        $weather_farsi = '';
        if($weather_eng === "Clear")
        {
            $weather_farsi = 'صاف';
        }
        
        file_get_contents($tel_api."/sendmessage?chat_id=".$chatId."&text=Here's the weather in ".$city." : ". $weather_farsi);
    }
?>
