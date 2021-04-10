<?php

//function to check if value is a date.
$processDate = function ($getMsg) {


	//using php strtotime function to check if value is a date.
	if (validateDateMinus($getMsg)) {
		$inputDate = new DateTime($getMsg);
		$currentDate = new DateTime();
		if ($inputDate > $currentDate) {
			//if the value is a date, update the question to country, show the return message and return original message as array.
			$array = array("country", "Great, now which country are you planning to visit?", $getMsg);
			return $array;
		} else {
			//if not a date the keep question as date and ask again.
			$array = array("date", "It would be great to travel back in time, but needs to be a future date.", $getMsg);
			return $array;
		}
	} else {
		//if not a date the keep question as date and ask again.
		$array = array("date", "I'm sorry I didn't get that date. Can you try again?", $getMsg);
		return $array;
	}
};

function validateDateMinus($date)
{
	$d = DateTime::createFromFormat('d-m-Y', $date);
	$a = DateTime::createFromFormat('d/m/Y', $date);
	if ($d && $d->format('d-m-Y') == $date) {
		return true;
	} else if ($a && $a->format('d/m/Y') == $date) {
		return true;
	} else {
		return false;
	}
};

// function validateDateSlash($date, $format = 'd/m/Y')
// {
// 	$d = DateTime::createFromFormat($format, $date);
// 	return $d && $d->format($format) == $date;
// };
