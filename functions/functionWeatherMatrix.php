<?php

$getWeather = $_POST['weather'];
$getTemp = round($_POST['temp'], 0);
$icon = $_POST['icon'];
$getCity = $_POST['city'];
$getCondition = $_POST['condition'];

$buttons = "<div class='weatherButton'><button id='continues'>My trip continues</button><button id='ends'>Trip ends here</button></div>";

$heading = "<div class='containerWeather'><div class = 'successMsg'><img src='http://openweathermap.org/img/wn/$icon.png'><h3>$getCity</h3><p>$getWeather</p><h5>{$getTemp}°</h5></div>";

$summerClothing = "<div class = 'imgContainer'>
					<img src='images/sunglasses.png' alt='sunglasses' width='100' height='100'>
					<img src='images/swimShorts.png' alt='swim Shorts' width='100' height='100'>
					<img src='images/suncream.png' alt='suncream' width='100' height='100'>
					<img src='images/flipflop.png' alt='flipflop' width='100' height='100'>
					</div>
				</div>";

$rainyColdClothing = "<div class = 'imgContainer'>
					<img src='images/raincoat.png' alt='raincoat' width='100' height='100'>
					<img src='images/waterproofTrousers.png' alt='waterproof Trousers' width='100' height='100'>
					<img src='images/boots.png' alt='sunglasses' width='100' height='100'>
					<img src='images/umbrella.png' alt='umbrella' width='100' height='100'>
					</div>
				</div>";

$rainyWarmClothing = "<div class = 'imgContainer'>
					<img src='images/raincoat.png' alt='raincoat' width='100' height='100'>
					<img src='images/shorts.png' alt='waterproof Trousers' width='100' height='100'>
					<img src='images/shoes.png' alt='shoes' width='100' height='100'>
					<img src='images/umbrella.png' alt='umbrella' width='100' height='100'>
					</div>
				</div>";


$clearColdClothing = "<div class = 'imgContainer'>
					<img src='images/jacket.png' alt='jacket' width='100' height='100'>
					<img src='images/hoodie.png' alt='hoodie' width='100' height='100'>
					<img src='images/jeans.png' alt='jeans' width='100' height='100'>
					<img src='images/shoes.png' alt='shoes' width='100' height='100'>
					</div>
				</div>";

$cloudyWarmClothing = "<div class = 'imgContainer'>
					<img src='images/hoodie.png' alt='hoodie' width='100' height='100'>
					<img src='images/tshirt.png' alt='tshirt' width='100' height='100'>
					<img src='images/jeans.png' alt='jeans' width='100' height='100'>
					<img src='images/shoes.png' alt='shoes' width='100' height='100'>
					</div>
				</div>";

$clearWarmClothing = "<div class = 'imgContainer'>
					<img src='images/tshirt.png' alt='tshirt' width='100' height='100'>
					<img src='images/shorts.png' alt='jeans' width='100' height='100'>
					<img src='images/shoes.png' alt='shoes' width='100' height='100'>
					<img src='images/sunglasses.png' alt='sunglasses' width='100' height='100'>
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
	if ($getTemp <= 10) {
		echo $heading . $rainyColdClothing . $buttons;
	} else {
		echo $heading . $rainyWarmClothing . $buttons;
	}
	//if it s cloudy
} else if ($getCondition >= 801 and $getCondition < 804) {
	if ($getTemp <= 12) {
		echo $heading . $clearColdClothing . $buttons;
	} else if ($getTemp >= 25) {
		echo $heading . $summerClothing . $buttons;
	} else if ($getTemp >= 18) {
		echo $heading . $clearWarmClothing . $buttons;
	} else {
		echo $heading . $cloudyWarmClothing . $buttons;
	}
	//if it s clear
} else if ($getCondition == 800) {
	if ($getTemp <= 10) {
		echo $heading . $clearColdClothing . $buttons;
	} else if ($getTemp >= 25) {
		echo $heading . $summerClothing . $buttons;
	} else if ($getTemp >= 18) {
		echo $heading . $clearWarmClothing . $buttons;
	} else {
		echo $heading . $cloudyWarmClothing . $buttons;
	}
} else {
	echo $heading . $cloudyWarmClothing . $buttons;
}
