<?php
session_start();
include'config.php';
$thislevel=10;
if(isset($_SESSION['user']))
{
	if(!isset($_GET['reason']))
	{
		echo "<script>
		window.location = 'level10.php?reason=';
		</script>";
		die();
	}
	
	$sql="SELECT level FROM users WHERE email='".$_SESSION['user']."'";
	$result=mysqli_query($con,$sql);
	$user_level=mysqli_result($result,0);
	$_SESSION['level'] = $user_level;

	include 'validate.php';
	// include 'country.php';
	// if($ipdata['country'] !== "America"){
	// 	echo "<script>"
	// 	window.location = 'changecountry.php';
	// 	</script>;
	// 	die();
	// }

	if($_GET['reason']=="iniquity")
	{
		$sql="UPDATE user SET level=11,last_time='".date('Y-m-d H:i:s')."' WHERE email='".$_SESSION['user']."'";
		$result=mysqli_query($con,$sql);
		echo "<script>
		window.location = 'level12.php';
		</script>";
		die();
	}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Doubt | Night Knitting</title>
    <?php include 'head.php'; ?>
</head>
<body>
	
	<div>
		<img src="assets/images/img-10.jpg" margin="auto">
	</div>
	 <div style="padding-top: 6rem; padding-left: 8rem; text-align: left;"><a href="home.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30;">Home.</a>
    </div>
    <div style="padding-top: 6rem; "><a href="leadboard.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30; right: 132;">Leaderboard.</a>
 	</div>
</body>
</html>
<?php
}
else
{
	echo"<script type='text/javascript'>
	window.location.href='index.php';
	</script>";
}
?>