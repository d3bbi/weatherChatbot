<?php

$getWeather = $_POST['weather'];
$getTemp = round($_POST['temp'], 0);
$icon = $_POST['icon'];
$getCity = $_POST['city'];
$getCondition = $_POST['condition'];

$buttons = "<div class='weatherButton'><button id='continues'>My trip continues</button><button id='ends'>Trip ends here</button></div>";

$heading = "<div class='containerWeather'><div class = 'successMsg'><img src='http://openweathermap.org/img/wn/$icon.png'><h3>$getCity</h3><p>$getWeather</p><h5>{$getTemp}°</h5></div>";

$summerClothing = "<div class = 'imgContainer'>
					<img src='images/shorts.jpg' alt='shorts' width='100' height='100'>
					<img src='images/suncream.jpg' alt='suncream' width='100' height='100'>
					<img src='images/sunglasses.jpg' alt='sunglasses' width='100' height='100'>
					<img src='images/umbrella.jpg' alt='umbrella' width='100' height='100'>
					</div>
				</div>";

/*if the weather condition id is:
	btw 200 - 232 Thunderstorm
	btw 300 - 321 Drizzle
	btw 500 - 531 Rain
	btw 600 - 622 Snow
	800 clear
	btw 801 - 804 Clouds 
	check here https://openweathermap.org/weather-conditions*/
	
//if it's raining
if ($getCondition >= 500 and $getCondition < 531) {
	if ($getTemp <= 12) {
		echo $heading . $summerClothing . $buttons;
	} else {
		echo $heading . $summerClothing . $buttons;
	}
	//if it s cloudy
} else if ($getCondition >= 801 and $getCondition < 804) {
	if ($getTemp <= 12) {
		echo $heading . $summerClothing . $buttons;
	} else {
		echo $heading . $summerClothing . $buttons;
	}
	//if it s clear
} else if ($getCondition == 800) {
	if ($getTemp <= 10) {
		echo $heading . $summerClothing . $buttons;
	} else {
		echo $heading . $buttons;
	}
} else {
	echo $heading . $summerClothing . $buttons;
}

