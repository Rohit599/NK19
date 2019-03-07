<?php
session_start();
include'conf.php';
$thislevel=7;
if(isset($_SESSION['user']))
{

	$sql="SELECT level FROM users WHERE email='".$_SESSION['user']."'";
	$result=mysqli_query($con,$sql);
	while($row = mysqli_fetch_assoc($result)) {
		$user_level = $row['level'];
	}

	include 'validate.php';

	if($_POST['answer']=="norsemen")
	{
		$sql="UPDATE users SET level=8,modified='".date('Y-m-d H:i:s')."' WHERE email='".$_SESSION['user']."'";
		$result=mysqli_query($con,$sql);
		echo "<script>
		window.location = 'level8.php';
		</script>";
		die();
	}
	?>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/stylelevel.css">
		<title>Fear</title>
		<?php include 'head.php'; ?>
	</head>
	<body style="background-color: black">

		<div class="level">
			<img src="assets/images/7fria.jpg">
		</div>
		<script type="text/javascript">
			window.helpme = "I am an ancient scandinavian";
		</script>


		<div class="input-type-answer" style="text-align: center;margin-top: 2rem">
			<form method="POST" action="">
				<input type="text" id="ans" name="answer">
				<button type="submit">Submit</button>
			</form>
		</div>

		<div style="padding-top: 6rem; padding-left: 8rem; text-align: left;"><a href="home.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30;">Home.</a>
		</div>
		<div style="padding
		-top: 6rem; "><a href="leadboard.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30; right: 132;">Leaderboard.</a>
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