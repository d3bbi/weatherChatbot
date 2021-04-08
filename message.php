<?php

	// getting user message through ajax
	$getAnswerExpected = $_POST['question'];
	$getCities = $_POST['cities'];
	$getMesg = $_POST['text'];
	if($getAnswerExpected == 'date') {
		require "functions/functionProcessDate.php";
		$date = $processDate($getMesg);
	    echo json_encode($date);
	} else if ($getAnswerExpected == 'country'){
		require "functions/functionProcessCountry.php";
		$country = $processCountry($getMesg);
		echo json_encode($country);
		
	} else if ($getAnswerExpected == 'city'){
		require "functions/functionProcessCity.php";
		$city = $processCity($getMesg,$getCities);
		echo json_encode($city);		

		
	}
	
	
	
?>