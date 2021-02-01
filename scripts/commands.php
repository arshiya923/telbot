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
        $city_fa = file_get_contents("https://api.mymemory.translated.net/get?q=".$city."&langpair=en|fa");
        if($city == "")
        {
            return;
        }
        $weather_json_encoded = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=2f24c59900e19fa5b545708c99edad89");
        $weather_json_decoded = json_decode($weather_json_encoded, TRUE);
        file_get_contents($tel_api."/sendmessage?chat_id=".$chatId."&text=".$weather_json_decoded);
        $weather_eng = $weather_json_decoded['weather'][0]['main'];

        $weather_farsi = '';
        if($weather_eng === "Clear")
        {
            $weather_farsi = 'صاف';
        }
        else if($weather_eng === "Rain")
        {
            $weather_farsi = 'بارانی';
        }
        else if($weather_eng === "Snow")
        {
            $weather_farsi = 'برفی';
        }
        else if($weather_eng === "Clouds")
        {
            $weather_farsi = 'ابری';
        }

        $text = "هوای ".$city_fa." ".$weather_farsi." است.";
        
        if($weather_found == "404")
        {
            $text = "شهر پیدا نشد!!";
        }

        file_get_contents($tel_api."/sendmessage?chat_id=".$chatId."&text=".$text);
    }
?>
