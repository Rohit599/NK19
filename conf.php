<?php
$con=mysqli_connect("localhost","rohit","rohit","ncs_game");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('Asia/Kolkata');

$current_time=date('Hi');
$lockStart=1000;
$lockEnd=2200;
if($lockStart < $current_time && $current_time < $lockEnd)
{
	include 'lock.php';
	die();
}


?>

<audio volume="0.05" loop autoplay>
  <source src="assets/audio/shinigami.mp3">
</audio>