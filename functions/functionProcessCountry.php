<?php 

$processCountry = function($getMesg) {
	$curl = curl_init();
			curl_setopt_array($curl, [
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

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				$array = array("country","I did not get that, can you enter the country again please?".$response,$getMesg,$getCities);
				return $array;
			} else {
				$cityArr = array();
				$arr = json_decode($response);
				foreach($arr as $key => $value) {
					//
						array_push($cityArr,$value->city);
					//}
				}
					//foreach($arr as $item) { //foreach element in $arr
					//	array_push($cityArr,$item['city']); //etc
					//}
					
				$array = array("city","Great, what city in ".$getMesg."?",$getMesg,$cityArr);
				return $array;
			}
}
	
?>