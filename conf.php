<?php
$con=mysqli_connect("localhost","anant","account60","ncs_game");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('Asia/Kolkata');

?>

<audio volume="0.05" loop autoplay>
  <source src="assets/audio/shinigami.mp3">
</audio>