<?php
session_start();
include'conf.php';
$thislevel=8;
if(isset($_SESSION['user']))
{


	$sql="SELECT level FROM users WHERE email='".$_SESSION['user']."'";
	$result=mysqli_query($con,$sql);
	  while($row = mysqli_fetch_assoc($result)) {
	   $user_level = $row['level'];
	}

	include 'validate.php';

	if($_POST['answer']=="eyeofprovidence")
	{
		$sql="UPDATE users SET level=9,modified='".date('Y-m-d H:i:s')."' WHERE email='".$_SESSION['user']."'";
		$result=mysqli_query($con,$sql);
		echo "<script>
		window.location = 'level9.php?answer=';
		</script>";
		die();
	}
	?>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/stylelevel.css">
		<title> Night Knitting</title>
		<?php include 'head.php'; ?>
	</head>
	<body style="background-color: black">

		<div class="level">
			<img src="assets/images/8rvtug.jpg">
		</div>
		
		
		<div class="input-type-answer" style="margin-top: 2rem;text-align: center;">
			<form method="POST" action="">
				<input type="text" id="ans" name="answer">
				<button type="submit">Submit</button>
			</form>
		</div>
		<div style="padding-top: 6rem; padding-left: 8rem; text-align: left;"><a href="home.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30;color: white">Home.</a>
		</div>
		<div style="padding-top: 6rem; "><a href="leadboard.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30; right: 132;color: white">Leaderboard.</a>
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