<?php
session_start();
include'conf.php';
$thislevel=2;
if (isset($_SESSION['user'])) {
    if (!isset($_GET['answer'])) {
        echo "<script>
		window.location = 'level2.php?answer=';
		</script>";
        die();
    }
    if ($_GET['answer'] == "satanstar") {
        $sql="UPDATE users SET level=3,modified='".date('Y-m-d H:i:s')."' WHERE email='".$_SESSION['user']."'";
        $result=mysqli_query($con, $sql);
        echo "<script>
		window.location = 'level3.php?getme=';
		</script>";
        die();
    }

    $sql="SELECT level FROM users WHERE email='".$_SESSION['user']."'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        $user_level = $row['level'];
    }

        include 'validate.php';
    ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/stylelevel.css">
    <title>Identify The Star</title>
    <?php include 'head.php'; ?>
</head>
<body style="background-color: black">
    
    <div class="level">
        <img src="assets/images/2gjb.jpg" >
    </div>

    
    
    <div style="padding-top: 6rem; padding-left: 8rem; text-align: left;"><a href="home.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30;color: white">Home.</a>
    </div>
    <div style="padding-top: 6rem; "><a href="leadboard.php" style="font-size: 1.5rem; font-weight: bold; text-decoration: underline; position: fixed; bottom: 30; right: 132;color: white">Leaderboard.</a>
    </div>
    <script type="text/javascript">
        window.helpme = "";
        
    </script>
</body>
</html>
    <?php
} else {
    echo"<script type='text/javascript'>
	window.location.href='index.php';
	</script>";
}
?>