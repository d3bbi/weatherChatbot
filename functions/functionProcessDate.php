<?php

//function to check if value is a date.
$processDate = function ($getMsg) {

	$valid = false;
	//check if the date is separated by "-"
	$minusDate = DateTime::createFromFormat('d-m-Y', $getMsg);
	//check if date is separated by "/"
	$slashDate = DateTime::createFromFormat('d/m/Y', $getMsg);
	if ($minusDate && $minusDate->format('d-m-Y') == $getMsg) {
		$valid = true;
	} else if ($slashDate && $slashDate->format('d/m/Y') == $getMsg) {
		$valid = true;
	} else {
		$valid = false;
	}

	//check if the date entered is valid
	if ($valid) {
		$inputDate = new DateTime($getMsg);
		$currentDate = new DateTime();
		//check if the date selected is in the future
		if ($inputDate > $currentDate) {
			//if the value is a valid date, update the question to country, show the return message and return original message as array.
			$array = array("country", "Great, now which country are you planning to visit?", $getMsg);
			return $array;
		} else {
			//if not a date the keep question as date and ask again.
			$array = array("date", "It would be great to travel back in time! Please enter a future date.", $getMsg);
			return $array;
		}
	} else {
		//if not a date the keep question as date and ask again.
		$array = array("date", "I'm sorry I didn't get that date. Can you try again?", $getMsg);
		return $array;
	}
};

