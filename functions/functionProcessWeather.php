<?php 

$processWeather = function($getMesg) {
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/weather?q=".$getMesg."&appid=a6b398ac3fdaeeb64f5fa4d343043948");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //$output contains the output string
    $output = curl_exec($ch);
    $js_code = json_decode($output);
    // $js_code->weather[0]->description . '<br>' . $js_code->main->temp;
    
    //calculate temperature - Celsius = Kelvin-273.15
    $temp = $js_code->main->temp-(273.15);
    //get weather conditions
    $description = $js_code->weather[0]->description;
    //ciy with first letter uppercase
    $capitalizedCity = ucwords($getMesg);
    //return weather icon
    $icon = $js_code->weather[0]->icon;

    $weatherConditionId = $js_code->weather[0]->id;

    $array = array(
    "weather",
    "The weather in $getMesg is $description with a temperature of ".round($temp,0)." °C",
    $capitalizedCity,
    $description,
    $icon,
    $temp,
    $weatherConditionId);

    return $array;
    // close curl resource to free up system resources
    curl_close($ch);

};
?>