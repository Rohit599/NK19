<?php
session_start();
include'conf.php';
$thislevel=5;
if(isset($_SESSION['user']))
{
	if($_POST['answer']=="isaiah1412")
	{
		$sql="UPDATE users SET level=6,modified='".date('Y-m-d H:i:s')."' WHERE email='".$_SESSION['user']."'";
		$result=mysqli_query($con,$sql);
		echo "<script>
		window.location = 'level6.php';
		</script>";
		die();
	}
	?>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/stylelevel.css">
		<title>Fallen | Night Knitting</title>
		<?php include 'head.php'; ?>
	</head>
	<body>

		<div class="level">
			<img src="assets/images/5svir" margin="auto">
		</div>

		<div class="input-type-answer" style="margin-top: 2rem;text-align: center;">
			<form method="POST" action="">
				<input type="text" id="ans" name="answer">
				<button type="submit">Submit</button>
			</form>
		</div>

		<script type="text/javascript">
			console.log = 'He found it in KJB'
		</script>
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