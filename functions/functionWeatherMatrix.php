<?php 

	$getWeather = $_POST['weather'];
	$getTemp = $_POST['temp'];
	$icon = $_POST['icon'];
	$getCity = $_POST['city'];
	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL, 'http://openweathermap.org/img/wn/'.$icon);

	if ($getTemp > 280) {
		echo "<div class='containerWeather'>
				<div class = 'successMsg'><img src='http://openweathermap.org/img/wn/$icon.png'><h5>$getCity</h5><p>$getWeather</p></div>
				<div class = 'imgContainer'>
					<img src='images/shorts.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/suncream.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/sunglasses.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/umbrella.jpg' alt='Stickman' width='100' height='100'>
				</div>
			  </div>";
		
	} else if ( $getTemp < 280) {
		echo "<div class='containerWeather'>
				<div class = 'successMsg'><img src='http://openweathermap.org/img/wn/$icon.png'><h5>$getCity</h5><p>$getWeather</p></div>
				<div class = 'imgContainer'>
					<img src='images/shorts.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/suncream.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/sunglasses.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/umbrella.jpg' alt='Stickman' width='100' height='100'>
				</div>
			  </div>";
		
	}

?>