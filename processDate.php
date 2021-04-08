<?php 

function processDate($getMesg) {
	if(strtotime($getMesg)){
		$array = array("country","Great, now which country are you planning to visit?",$getMesg);
		echo json_encode($array);
	} else {
		$array = array("date","I'm sorry I didn't get that date. Can you try again?",$getMesg);
		echo json_encode($array);
	}
}
	
?>