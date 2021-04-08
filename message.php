<?php



	// getting user message through ajax
	$getAnswerExpected = $_POST['question'];
	$getCities = array(json_encode($_POST['cities']));
	$getMesg = $_POST['text'];
	if($getAnswerExpected == 'date') {
		require "functions/functionProcessDate.php";
		$date = $processDate($getMesg);
	    echo json_encode($date);
	} else if ($getAnswerExpected == 'country'){
		require "function/ProcessCountry.php";
		$country = $processCountry($getMesg);
		echo json_encode($country);
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