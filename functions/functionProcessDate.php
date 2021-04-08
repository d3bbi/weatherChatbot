<?php 

//function to check if value is a date.
$processDate = function($getMesg) {
	//using php strtotime function to check if value is a date.
	if(strtotime($getMesg)){
		//if the value is a date, update the question to country, show the return message and return original message as array.
		$array = array("country","Great, now which country are you planning to visit?",$getMesg);
		return $array;
	} else {
		//if not a date the keep question as date and ask again.
		$array = array("date","I'm sorry I didn't get that date. Can you try again?",$getMesg);
		return $array;
	}
}

?>