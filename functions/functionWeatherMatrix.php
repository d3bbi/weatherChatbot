<?php 

	$getWeather = $_POST['weather'];
	$getTemp = $_POST['temp'];
	$getCity = $_POST['city'];
	
	if ($getTemp > 280) {
		echo '<div class="containerWeather">
				<div class = "successMsg">'.$getCity.':'.$getWeather.'</div>
				<div class = "imgContainer">
					<img src="images/shorts.jpg" alt="Stickman" width="100" height="100">
					<img src="images/suncream.jpg" alt="Stickman" width="100" height="100">
					<img src="images/sunglasses.jpg" alt="Stickman" width="100" height="100">
					<img src="images/umbrella.jpg" alt="Stickman" width="100" height="100">
				</div>
			  </div>';
		
	} else if ( $getTemp < 280) {
		echo '<div class="containerWeather">
				<div class = "successMsg">'.$getCity.':'.$getWeather.'</div>
				<div class = "imgContainer">
					<img src="images/shorts.jpg" alt="Stickman" width="100" height="100">
					<img src="images/suncream.jpg" alt="Stickman" width="100" height="100">
					<img src="images/sunglasses.jpg" alt="Stickman" width="100" height="100">
					<img src="images/umbrella.jpg" alt="Stickman" width="100" height="100">
				</div>
			  </div>';
		
	}

?>