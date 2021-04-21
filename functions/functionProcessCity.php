<?php 

$processCity = function($getMesg,$getCities) {
$found = false;
		$cities = explode(",",$getCities);
		foreach($cities as $value) {
			if (strcasecmp($getMesg, $value)) {
				$found = true;
			}
		}
			
		if ($found == true) {
		require "functions/functionProcessWeather.php";
		
		return $processWeather($getMesg);

		} else {
		$array = array("city","Couldn't Find",$getMesg,$getCities);
		return $array;			
		}
}

?>