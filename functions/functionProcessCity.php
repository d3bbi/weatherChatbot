<?php 

$processCity = function($getMesg,$getCities) {
$found = false;
		$cities = explode(",",$getCities);
		foreach($cities as $value) {
				if ($value == $getMesg) {
					$found = true;
				}
			}
			
		if ($found == true) {
			        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/weather?q=".$getMesg."&appid=a6b398ac3fdaeeb64f5fa4d343043948");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //$output contains the output string
        $output = curl_exec($ch);
		$js_code = json_decode($output);
		//$js_code->weather[0]->description . '<br>' . $js_code->main->temp;
		$array = array("weather","The weather in ".$getMesg." is ".$js_code->weather[0]->description . " with a temperature of: " . $js_code->main->temp,$getMesg,$getCities,$js_code->weather[0]->description,$js_code->main->temp);
		return $array;
        // close curl resource to free up system resources
        curl_close($ch);
		} else {
		$array = array("city","Couldn't Find",$getMesg,$getCities);
		return $array;			
		}
}

?>