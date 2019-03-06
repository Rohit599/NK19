<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';
include 'conf.php';

if(isset($_SESSION['user']))
{
  $sql="SELECT level FROM users WHERE email='".$_SESSION['user']."'";
  $result=mysqli_query($con,$sql);
  while($row = mysqli_fetch_assoc($result)) {
   $user_level = $row['level'];
  }

  ?>
  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Night Knitting</title> 
    <?php include 'head.php'; ?>
  </head>
  <body>
    <img src="assets/images/logo-full.png">
    <div class="sign">
      <a href="level<?php echo $user_level; ?>.php"><?php
          if($user_level==0)
              echo "Start game.";
          else
              echo "Resume game.";
          ?></a>
      <a style="margin-top: 1rem;" href="rule.php">Rules.</a><br>
      <a href="https://youtu.be/OhP9Sp0JGL8">How to play.</a><br>
      <a href="https://www.facebook.com/nightknitting/">Discretion Forum.</a><br>
      <a href="leadboard.php">Leaderboard.</a><br>
      <a href="logout.php">Sign out.</a><br>
    </div>
  </body>
  </html>
<?php
}
?>

<!-- <a href="level1.php?lights=on"></a> -->
