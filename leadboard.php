<?php
session_start();
include'conf.php';
// $thislevel=0;
if(isset($_SESSION['user']))
{
?>
<html>
<head>
	<title>Leaderboard | Night Knitting</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <?php include 'head.php'; ?>
</head>
<body>
	<div><img src="assets/images/logo-full.png" margin="auto" class="logo"></div>
	<h1>Leaderboard.</h1>
	<div class="table-container">
	<table cellpadding="12px 0">
			<?php
			$i=0;
 			$c=0;
			$query="select email,picture,level from users order by level desc,modified";
			$results = mysqli_query($con,$query);
		    	while ($row = mysqli_fetch_array($results))
			{
			    	$i=$i+1;
 				if($_SESSION['user']==$row['email'] || $i<=30)
				{
					echo '<tr>
					<td valign="middle">#'.$i.'</td>
					<td valign="middle"><img src="'.$row['picture'].'" width="50" height="50"></td>
					<td valign="middle">'.$row['email'].'</td>
					<td valign="middle">'.$row['level'].'0</td>
					</tr>';
				}
			}
?>
</table>
</div>
<div style="text-align: left; padding: 4rem 0">
	<a href="home.php">Home.</a>
</div>
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