<?php 

$processCity = function($getMesg,$getCities) {
	
$found = false;
		$cities = explode(",",$getCities);
		foreach($cities as $value) {
			if (strcasecmp($getMesg, $value) === 0) {
				$found = true;
			}
		}
			
		if ($found) {
		require "functions/functionProcessWeather.php";
		return $processWeather($getMesg);

		} else {
		$array = array("city","Couldn't Find",$getMesg,$getCities);
		return $array;			
		}
}

?>