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
	// $apiKey = ''; API KEY REMOVED FOR SECURITY

	if(isset($_GET['city'])){
		$city = $_GET['city'];
	}
	if(isset($_GET['country'])){
		$country = $_GET['country'];
	}

	$jsonData = file_get_contents($api . "weather?q=" . $city . "," . $country . $apiKey);

	$jsonTranslate = json_decode($jsonData, true);

 print_r($jsonTranslate['weather'][0]['description']);


	?>

	<!-- Echo out user input  -->


	<h1><?php echo $jsonTranslate['weather'][0]['description']; 



	?></h1>
</body>
</html>