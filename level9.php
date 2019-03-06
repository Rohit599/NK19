<?php
session_start();
include'conf.php';
$thislevel=9;
if(isset($_SESSION['user']))
{

	$sql="SELECT level FROM users WHERE email='".$_SESSION['user']."'";
	$result=mysqli_query($con,$sql);
	  while($row = mysqli_fetch_assoc($result)) {
	   $user_level = $row['level'];
	}

	include 'validate.php';

	if($_POST['ans']=="d33P5W7347")
	{
		$sql="UPDATE users SET level=10,last_time='".date('Y-m-d H:i:s')."' WHERE email='".$_SESSION['user']."'";
		$result=mysqli_query($con,$sql);
		echo "<script>
		window.location = 'level10.php?reason=';
		</script>";
		die();
	}
	else if($_POST['ans']=="d33P5W734")
	{
		echo "<script>
		alert('Some More !! Some More !!');
		</script>";
	}
	else if($_POST['ans']!="d33P5W734" && $_POST['ans']!="d33P5W7347" && $_POST['ans']!="")
	{
		echo "<script>
		alert('Keep Trying !!');
		</script>";
	}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Encounter | Night Knitting</title>
    <?php include 'head.php'; ?>
</head>
<body>
	
	<div>
		<img src="assets/images/img-6.jpg" margin="auto">
	</div>
	<script type="text/javascript">
		window.helpme = "Didn't we solve this one already!";
		window.yes = "Then why do you seek my help?";
		window.no = "What's the difference?";
		window.nine = "Ah right… You got this one..";
	</script>
	<br>
	<h6 style="font-size: 12px;">corrupt</h6>
	<div class="input-type-answer">
		<form method="POST" action="">
			<input type="text" id="ans" name="ans" required>
			<button type="submit">Submit</button>
		</form>
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