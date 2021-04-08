<?php

require "processDate.php";

	// getting user message through ajax
	$getAnswerExpected = $_POST['question'];
	$getCities = array(json_encode($_POST['cities']));
	$getMesg = $_POST['text'];
	if($getAnswerExpected == 'date') {
	    processDate($getMesg);
	} else if ($getAnswerExpected == 'country'){

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://andruxnet-world-cities-v1.p.rapidapi.com/?query=ireland&searchby=country",
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
			echo json_encode($array);
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
			echo json_encode($array);
		}

	} else if ($getAnswerExpected == 'city'){
		$found = false;
		foreach($getCities as $value) {
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
		//echo $js_code->weather[0]->description . '<br>' . $js_code->main->temp;
		$array = array("weather","Found",$getMesg,$getCities);
		echo json_encode($array);
        // close curl resource to free up system resources
        curl_close($ch);
		} else {
		$array = array("city","Couldn't Find",$getMesg,$getCities);
		echo json_encode($array);			
		}

		
	}
	
	
	
?>