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
	<div><img src="assets/images/logo-full.png" margin="auto"></div>
	<h1>BE WARNED</h1>
	<div class="table-container">
	<h4>Leaderboard.</h4>
		<table>
			<?php
			$i=0;
 			$c=0;
			$query="select name,email,pic,level from user order by level desc,last_time";
			$results = mysqli_query($con,$query);
		    	while ($row = mysqli_fetch_array($results))
			{
			    	$i=$i+1;
 				if($_SESSION['user']==$row['email'] || $i<=30)
				{
					echo '<tr>
					<td valign="middle">#'.$i.'</td>
					<td valign="middle"><img src="'.$row['pic'].'" width="50" height="50"></td>
					<td valign="middle">'.$row['name'].'</td>
					<td valign="middle">'.$row['email'].'</td>
					<td valign="middle">'.$row['level'].'0</td>
					</tr>';
				}
			}
?>
</table>
</div>
<div style="padding-top: 6rem; padding-left: 8rem; text-align: left;"><a href="home.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30;">Home.</a>
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