<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
// include'config.php';
include 'conf.php';
$thislevel=0;
if(isset($_SESSION['user']))
{
	$sql="SELECT level FROM users WHERE email='".$_SESSION['user']."'";
	$result=mysqli_query($con,$sql);
	  while($row = mysqli_fetch_assoc($result)) {
	   $user_level = $row['level'];
	}

	include 'validate.php';

	if($_GET['start']=="true")
	{
		$sql="UPDATE users SET level=1,modified='".date('Y-m-d H:i:s')."' WHERE email='".$_SESSION['user']."'";
		$result=mysqli_query($con,$sql);
		echo "<script>
		window.location = 'level1.php?level=1';
		</script>";
		die();
	}
?>
<html>
<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/stylelevel.css">
	<title>Downfall | Night Knitting</title>
	<style type="text/css">
		.btn {
    font-family: "Courier New",sans-serif;
    font-weight: bold;
    text-transform: uppercase;
    outline:0;
    background: red;
    width:200px;
    height:60px;
    border:0;
    border-radius: 0;
    padding:8px;
    color:#FFFFFF;
    font-size: 28px;
    cursor:pointer;
}
	</style>
</head>
<title>Downfall</title>
<body style="background-color: black;">
	<script type="text/javascript">
		window.helpme = "I feel like I am connected... to somewhere else...";
	</script>
	
	<!--from here-->
	<button class="btn" id="btn1" style="position: fixed;left: 24%; top: 300;" onclick="click1();">Click ME</button>
	<a href="level0.php?start=true" style="color: #000; position: fixed; left: 40%; top: 300;size:">You found ME !!!</a>
	<button class="btn hidden" id="btn2" style="position: fixed;right: 24%; top: 300;" onclick="click2();">Click ME
	</button>
	<!-- till here-->
    <div style="padding-top: 6rem; padding-left: 8rem; text-align: left;"><a href="home.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30;">Home.</a>
    </div>
    <div style="padding-top: 6rem; "><a href="leadboard.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30; right: 132;">Leaderboard.</a>
 	</div>

	<script type="text/javascript">
		function  click1() {
		var x1 = document.getElementById("btn1");
		var x2 = document.getElementById("btn2");
	    x1.classList.toggle('hidden');
	   	x2.classList.toggle('hidden');
	}	
		function click2() {
		var x1 = document.getElementById("btn1");
		var x2 = document.getElementById("btn2");
	    x2.classList.toggle('hidden');
	   	x1.classList.toggle('hidden');
	}
	</script>
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