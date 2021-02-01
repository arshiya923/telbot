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
        $city = substr($message, 6);
        $city_fa_encoded = file_get_contents("https://api.mymemory.translated.net/get?q=".$city."&langpair=en|fa");
        $city_fa_decoded = json_decode($city_fa_encoded, TRUE);
        $city_fa = $city_fa_decoded ["responseData"]["translatedText"];
        if($city == "")
        {
            return;
        }
        $weather_json_encoded = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=2f24c59900e19fa5b545708c99edad89");
        $weather_json_decoded = json_decode($weather_json_encoded, TRUE);
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
        
        if($weather_eng == "")
        {
            $text = "شهر پیدا نشد!!!";
        }


        file_get_contents($tel_api."/sendmessage?chat_id=".$chatId."&text=".$text);
    }
    else if (strpos($message, "/pass") === 0) {
        $passlen = substr($message, 6);
        $passlen = intval($passlen);

        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890*@&$';

        $pass = array(); //remember to declare $pass as an array

        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

        for ($i = 0; $i < $passlen; $i++) {
            $n = rand(0, $alphaLength);
            $pass[$i] = $alphabet[$n];
        }

        $text = implode($pass);
        file_get_contents($tel_api."/sendmessage?chat_id=".$chatId."&text=".$text);
    }
    else if (strpos($message, "/arz") === 0) {
        $arz_json_encoded = file_get_contents("http://api.navasan.tech/latest/?api_key=BMjxwcKGYiyvyXFQMEuUtR1aNewYIngb");
        $arz_json_decoded = json_decode($arz_json_encoded, TRUE);

        $arz_dolar_sell = $arz_json_decoded['usd_sell']['value'];
        $arz_dolar_change_sell = $arz_json_decoded['usd_sell']['change'];

        $text = "قیمت دلار آمریکا فروش : ".$arz_dolar_sell."\n تغییرات ".abs($arz_dolar_change_sell);
        if(($arz_dolar_change_sell+0) > 0)
        {
            $text = $text." 🔺\n";
        }
        else{
            $text = $text." 🔻\n";
        }
        
        $arz_dolar_buy = $arz_json_decoded['usd_buy']['value'];
        $arz_dolar_change_buy = $arz_json_decoded['usd_buy']['change'];

        $text = $text."قیمت دلار آمریکا خرید : ".$arz_dolar_buy."\n تغییرات ".$arz_dolar_change_buy;
        if(($arz_dolar_change_buy+0) > 0)
        {
            $text = $text." 🔺";
        }
        else{
            $text = $text." 🔻";
        }
        
        $text = urlencode($text);

        file_get_contents($tel_api."/sendmessage?chat_id=".$chatId."&text=".$text);
    }
?>
