<?php

//Getting variables passed from index.php
$getAnswerExpected = $_POST['question'];
$getCities = $_POST['cities'];
$getMesg = $_POST['text'];


//Processing logic.
//If the expected answer is a date then
if ($getAnswerExpected == 'date') {
	//pull the process date file and run the function.
	require "functions/functionProcessDate.php";
	//Date varible stores the return of the function processDate.
	$date = $processDate($getMesg);
	//Date array is passed back to index.php for processing.
	echo json_encode($date);

	//If the expected answer is country then
} else if ($getAnswerExpected == 'country') {
	//pull the process country file and run the function.
	require "functions/functionProcessCountry.php";
	//Country stores the return of the function.
	$country = $processCountry($getMesg);
	//Country array is passed back to index.php for processing.
	echo json_encode($country);

	//If the expected answer is city then	
} else if ($getAnswerExpected == 'city') {
	//pull the process city file and run the function.
	require "functions/functionProcessCity.php";
	//City stores the return of the function.
	$city = $processCity($getMesg, $getCities);
	//City is passed back to index.php for processing.
	echo json_encode($city);

	//if the expected answer is loop then
} else if ($getAnswerExpected == 'loop') {
	//check if the user enter yes (will visit next place same day)
	if (strcasecmp($getMesg, "yes") === 0) {
		//Country stores the return of the function.
		$array = array("country", "Great, now which country are you planning to visit?", $getMesg);
	//or if the user enter no (will visit next place different day)
	} else if (strcasecmp($getMesg, "no") === 0) {
		//Date varible stores the return of the function processDate.
		$array = array("date", "Ok. What date are you leaving then?", $getMesg);
	//check if the user enter wrong input
	} else {
		$array = array("loop","I didn't get that. Are you visiting the next place on the same date?",$getMesg,"");
	}
	//the result is passed back to index.php for processing.
	echo json_encode($array);
} else if ($getAnswerExpected == 'restart'){
	$array = array("date","If you want to check another place, just enter a date.",$getMesg,"");
}
