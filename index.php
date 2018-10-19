<!DOCTYPE html>
<html>
<head>
	<title>Weather App</title>
</head>
<body>

	<!-- Form to grab location on user input -->
	<form action="index.php" method="GET">
		<input type="text" name="city" placeholder="Enter City">
		<input type="text" name="country">
		<button>Get Weather</button>
	</form>

	<!-- Reference the weather API -->

	<?php
	$api = 'http://api.openweathermap.org/data/2.5/';
	$apiKey = '&appid=958743d119be11170fca1e560ce8bdc6';

	if(isset($_GET['city'])){
		$city = $_GET['city'];
	}
	if(isset($_GET['country'])){
		$country = $_GET['country'];
	}
	if(empty($city)){
		echo 'enter in city';
	}
	if(empty($country)){
		echo "enter in country";
	}


	// Access the API

	$cURL = curl_init();

	curl_setopt($cURL, CURLOPT_URL, $api . "weather?q=" . $city . "," . $country . $apiKey);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($cURL);
	
	$jsonDecode = json_decode($result, true);




	?>

	<!-- Echo out user input  -->
<?php print_r($jsonDecode['weather'][0]['main']); ?>
	
</body>
</html>