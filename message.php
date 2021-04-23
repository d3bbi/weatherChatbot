<?php

	//Getting variables passed from index.php
	$getAnswerExpected = $_POST['question'];
	$getCities = $_POST['cities'];
	$getMesg = $_POST['text'];
	

	//Processing logic.
	//If the expected answer is a date then
	if($getAnswerExpected == 'date') {
		//pull the process date file and run the function.
		require "functions/functionProcessDate.php";
		//Date varible stores the return of the function processDate.
		$date = $processDate($getMesg);
		//Date array is passed back to index.php for processing.
	    echo json_encode($date);

	//If the expected answer is country then
	} else if ($getAnswerExpected == 'country'){
		//pull the process country file and run the function.
		require "functions/functionProcessCountry.php";
		//Country stores the return of the function.
		$country = $processCountry($getMesg);
		//Country array is passed back to index.php for processing.
		echo json_encode($country);
		
	//If the expected answer is city then	
	} else if ($getAnswerExpected == 'city'){
		//pull the process city file and run the function.
		require "functions/functionProcessCity.php";
		//City stores the return of the function.
		$city = $processCity($getMesg,$getCities);
		//City is passed back to index.php for processing.
		echo json_encode($city);

	} else if ($getAnswerExpected == 'continueLoop'){
		if (isset($getMsg)){
			echo "continue";
		} else {
			echo "end";
		}	
	}
	
	
	
?>