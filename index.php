<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Simple Chatbot in PHP | CodingNepal</title> -->
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<h2 class="question" id="question">date</h2>
	<h2 class="country" id="country">Country</h2>
	<input name="cities" id="cities" value=""/>
	<div class = "container">
		<div class="column">
			<div class="wrapper">
				<div class="title">Weather Bot</div>
				<div class="form">
					<div class="bot-inbox inbox">
						<div class="icon">
							<i class="fas fa-user"></i>
						</div>
						<div class="msg-header">
							<p>Hello there, I'm a chatbot that is here to help you plan what to pack for your trip. First, I need to know what date you are leaving?</p>
						</div>
					</div>
				</div>
				<div class="typing-field">
					<div class="input-data">
						<input id="data" type="text" placeholder="Type something here.." required>
						<button id="send-btn">Send</button>
					</div>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="wrapper">
				<div class="results">
					<h2>Test</h2>
				</div>
			</div>
		</div>
	</div>
  <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
				$question = $("#question").html();
                $value = $("#data").val();
				$cities = $('#cities').val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
				var jsonString = $cities;
				
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
					data: {question: $question, text: $value, cities: jsonString},
                    //data: 'text='+$value,
                    success: function(result){
						
						var jsArray = JSON.parse(result);
						console.log(jsArray);
						$replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header">'+ jsArray[1] +'</div></div>';
                        //$replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
						$(".results").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
						$("#question").html(jsArray[0]);
						$("#cities").val(jsArray[3]);
                    }
                });
            });
        });
    </script>

</body>
</html>
