<?php
// Погода
    // Параметры запроса
    $api_key = "19352a5efc2e4d66a41203521222807";
    $method = "/v1/current.json";
    $q = "Moscow";
    // Параметры запроса

    $json_w= file_get_contents("http://api.weatherapi.com".$method."?key=".$api_key."&q=".$q."&lang=ru");
    $data_weather = json_decode($json_w, TRUE);

// Погода конец


// Валюта
    $json_file = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp");
    $xml = simplexml_load_string($json_file);
    $json = json_encode($xml);
    $data = json_decode($json, TRUE);
// Валюта конец

// можно коментить
    // $data = array_map('json_decode_array', $data);
    // // var_dump($data);
    // $json = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp");

    // // Декодируем JSON-данные в формат ассоциативного массива PHP
    // $arr = json_decode($json, true);

    // function json_decode_array($input) { 
    //     $from_json =  json_decode($input, true);  
    //     return $from_json ? $from_json : $input; 
    // }

    // $arr = array_map('json_decode_array', $data);
    // echo '<pre>';
    // var_dump($arr);
// можно коментить


// var_dump($data_weather);

?>