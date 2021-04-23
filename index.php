<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot PHP</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="script.js"></script>
</head>

<body>
	<header class="header">
		<div class="title">Weather Bot</div>
		<p>By The PHP Three</p>

	</header>
	<div class="testValueContainer">
		<h2 class="question" id="question">date</h2>
		<h2 class="country" id="country">Country</h2>
		<input name="cities" id="cities" value="" />
	</div>
	<div class="container">
		<div class="column">
			<div class="wrapper">
				
				<div class="form">
					<div class="bot-inbox inbox">
						<div class="icon">
							<img src="https://png.pngtree.com/png-vector/20201225/ourlarge/pngtree-small-robot-icon-element-design-png-image_2589340.jpg" class="robot">
						</div>
						<div class="msg-header">
							<p>Hello there, I'm a chatbot that is here to help you plan what to pack for your trip. First, I need to know what date you are leaving?</p>
						</div>
					</div>
				</div>
				<form>
					<div class="typing-field">
						<div class="input-data">
								<input id="data" type="text" placeholder="Type something here.." required oninvalid="this.setCustomValidity(' ')">							
							<button id="send-btn">Send</button>
						</div>
					</div>
				</form>
				<h3 class="no-browser-support">Sorry, Your Browser Doesn't Support the Web Speech API. Try Opening This Demo In Google Chrome.</h3>
				<div class="app">     
					<button id="start-record-btn" class="voice-btn" title="Start Recording">Use Voice</button>
					<button id="pause-record-btn" class="voice-btn" title="Pause Recording">Stop Recording</button> 
					<p id="recording-instructions">Press the <strong>Start Recognition</strong> button and allow access.</p>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
					<script src="script.js"></script>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="wrapper">
				<div class="results">
					<h2 class="pack-heading">What to pack</h2>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<p>By Deborah, David & Cian.</p>

	</footer>
  <script>

        $(document).ready(function(){
            $("#send-btn").on("click", function(){
			
				//pulls the question type value currently stored in the html.
				$question = $("#question").html();

				//stores the value entered into the user speech field as a variable.
				$value = $("#data").val();

				//Stores the list of cities returned as a string
				$cities = $('#cities').val();

				//Creates the html required to add the user message to the interface.
				$msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';

				//Adds the message to the form.
				$(".form").append($msg);
				//Clears the user entry field.
				$("#data").val('');

				//Ajax posts to the message.php file and receives the return on success.
				$.ajax({
					//file where post is being directed.
					url: 'message.php',
					//Type of call.
					type: 'POST',
					//Creating the data to be sent to message.php
					data: {
						question: $question,
						text: $value,
						cities: $cities
					},
					//data: 'text='+$value,
					success: function(result) {
						//Parsing the array returned into a js array.
						var jsArray = JSON.parse(result);
						//logging the array to console.
						console.log(jsArray);
						readOutLoud(jsArray[1]);
						//Creating the html require to show the bots reply on the form.
						$replay = '<div class="bot-inbox inbox"><div class="icon"><img src="https://png.pngtree.com/png-vector/20201225/ourlarge/pngtree-small-robot-icon-element-design-png-image_2589340.jpg" class="robot"></div><div class="msg-header"><p>' + jsArray[1] + '</p></div></div>';

						//if the first element of the array is weather then create html to process into what to pack section.
						if (jsArray[0] == "weather") {
							$.ajax({
								url: 'functions/functionWeatherMatrix.php',
								//Type of call.
								type: 'POST',
								//Creating the data to be sent to message.php
								data: {
									weather: jsArray[4],
									temp: jsArray[5],
									city: jsArray[2]
								},
								success: function(result) {
									console.log("success");
									$weather = result;
									$(".results").append($weather);
								}
								
							});
							
							
						}
						//$replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
						//Add the bots reply the form.
						$(".form").append($replay);

						// when chat goes down the scroll bar automatically comes to the bottom
						$(".form").scrollTop($(".form")[0].scrollHeight);
						//update the question type in the html.
						$("#question").html(jsArray[0]);
						//update the cities in the html.
						$("#cities").val(jsArray[3]);
					}
				});
			});
		});
	</script>

</body>

</html>