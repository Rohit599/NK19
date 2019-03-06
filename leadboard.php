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
	<div class="table-container">
	<h1>Leaderboard.</h1>
	<table cellpadding="12px 0">
		<colgroup>
			<col width=24px">
			<col width=48px">
			<col width=240px">
			<col width=24px">
		</colgroup>
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