<?php 

	$getWeather = $_POST['weather'];
	$getTemp = round($_POST['temp'],0);
	$icon = $_POST['icon'];
	$getCity = $_POST['city'];
	$buttons = "<div class='weatherButton'><button id='continues'>My trip continues</button><button id='ends'>Trip ends here</button></div>";

	if ($getTemp < 280) {
		echo "<div class='containerWeather'>
				<div class = 'successMsg'><img src='http://openweathermap.org/img/wn/$icon.png'><h3>$getCity</h3><p>$getWeather</p><h5>{$getTemp}°</h5></div>
				<div class = 'imgContainer'>
					<img src='images/shorts.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/suncream.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/sunglasses.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/umbrella.jpg' alt='Stickman' width='100' height='100'>
				</div>
			  </div>".$buttons;
		
	} else if ( $getTemp < 280) {
		echo "<div class='containerWeather'>
		<div class = 'successMsg'><img src='http://openweathermap.org/img/wn/$icon.png'><h3>$getCity</h3><p>$getWeather</p><h5>{$getTemp}°</h5></div>
		<div class = 'imgContainer'>
					<img src='images/shorts.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/suncream.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/sunglasses.jpg' alt='Stickman' width='100' height='100'>
					<img src='images/umbrella.jpg' alt='Stickman' width='100' height='100'>
				</div>
			  </div>".$buttons;
		
	}

?>