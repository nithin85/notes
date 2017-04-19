<html>
<head>
<title>weather App</title>
<style>
body{
     width:960px;
	 margin:0 auto;
         font-size:175%;
	 }
	 .userform
	 {
		 padding-top=50px;
	 }
</style>
</head>
<body>
<form class="userform" name="weatherform" action="index.php" action="GET">
<h1><u>Weather report</u></h1>

Enter City :<input type="text" name="city" placeholder="City"><br>
Enter Country :<input type="text" name="country" placeholder="Country"><br>

<input type="submit" name="temp" value="Check" style="height:50px;width:75px"<br>

</form>

<?php
if(isset($_GET))
{
  //get methods
 $city=$_GET['city'];
 $country=$_GET['country'];

//checking wether fields are not empty
if($city<>"" && $country<>"")
{
 
 //api url and api key
 $api_url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=393c63c4a3ba26f3d2500c22c45c37fb";
 
 //fecthing and decoding data
 $weather_data=file_get_contents($api_url);
 $json=json_decode($weather_data,TRUE);
 
 //saving data to variable
 $temp=$json['main']['temp'];
 $humidity=$json['main']['humidity'];
 $condition=$json['main']['temp'];
 $wind=$json['wind']['speed'];
 $Sunrise=$json['sys']['sunrise'];
 $direction=$json['wind']['deg'];


 echo "<br/>";
 echo"<br/>";

  // displaying data in UI
 echo "<strong> City:</strong>".$city."<br/>";
 echo "<strong> Temperature:</strong>".$temp."<br/>";
 echo "<strong> Humidity:</strong>".$humidity."<br/>";
 echo "<strong> Current Condition:</strong>".$condition."<br/>";
 echo "<strong> Wind speed:</strong>".$wind."<br/>";
 echo "<strong> Wind direction:</strong>".$direction."<br/>";
 echo "<strong> Sun rise:</strong>".$Sunrise."<br/>";
}
else
{
echo"<h2>Enter the city and country</h2>";
}

};


?>
</body>
</html>