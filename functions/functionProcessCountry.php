<?php 

//Takes the country value and pulls a list of all cities in that country.
$processCountry = function($getMesg) {
	//open curl.
	$curl = curl_init();
			//setting curl paras.
			curl_setopt_array($curl, [
				//api url.
				CURLOPT_URL => "https://andruxnet-world-cities-v1.p.rapidapi.com/?query=".$getMesg."&searchby=country",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"x-rapidapi-host: andruxnet-world-cities-v1.p.rapidapi.com",
					"x-rapidapi-key: 38d6996a9emsh912de85060ef640p1876e5jsn4639a20493f8"
				],
			]);

			//storing response.
			$response = curl_exec($curl);
			//logging errors.
			$err = curl_error($curl);
			//closing curl.
			curl_close($curl);
			//if there was an error then ask for the country again.
			if ($err) {
				$array = array("country","I did not get that, can you enter the country again please?".$response,$getMesg,$getCities);
				return $array;
			//if no errors, then loop through the returned array of cities and pass them return them with next question prompt.
			} else {
				$cityArr = array();
				$arr = json_decode($response);
				foreach($arr as $key => $value) {
						array_push($cityArr,$value->city);
				}
				$array = array("city","Great, what city in ".$getMesg."?",$getMesg,$cityArr);
				return $array;
			}
}
	
?>