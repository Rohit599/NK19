<?php
session_start();
include'config.php';
include 'conf.php';
$thislevel=1;
if(isset($_SESSION['user']))
{    
	if(!isset($_GET['level']))
	{
		echo "<script>
		window.location = 'level1.php?level=1';
		</script>";
		die();
	}
	
	$sql="SELECT level FROM users WHERE email='".$_SESSION['user']."'";
	$result=mysqli_query($con,$sql);
	while($row = mysqli_fetch_assoc($result)) {
		$user_level = $row['level'];
	}

	include 'validate.php'; 

	
	if($_GET['level']=="2")
	{
		$sql="UPDATE users SET level=2,modified='".date('Y-m-d H:i:s')."' WHERE email='".$_SESSION['user']."'";
		$result=mysqli_query($con,$sql);
		echo "<script>
		window.location = 'level2.php?answer=';
		</script>";
		die();
	}

	?>
	<html>
	<head>
		<?php include 'head.php'; ?>
		<link rel="stylesheet" type="text/css" href="css/stylelevel.css">
		<title>Downfall | Night Knitting</title>


	</head>
	<title>Downfall</title>
	<body style="background-color: black">
		<script type="text/javascript">
			window.helpme = "";
		</script>

		<div class="level">
			<img src="assets/images/1bar.jpg">
		</div>

		<div style="padding-top: 6rem; padding-left: 8rem; text-align: left;"><a href="home.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30;color: white">Home.</a>
		</div>
		<div style="padding-top: 6rem; "><a href="home.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30; right: 132;color: white">Leaderboard.</a>
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