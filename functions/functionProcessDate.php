<?php 

$processDate = function($getMesg) {
	if(strtotime($getMesg)){
		$array = array("country","Great, now which country are you planning to visit?",$getMesg);
		return $array;
	} else {
		$array = array("date","I'm sorry I didn't get that date. Can you try again?",$getMesg);
		return $array;
	}
}

?>