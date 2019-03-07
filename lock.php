<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
    <?php include 'head.php'; ?>
</head>
<body>
	<div><img src="assets/images/logo-full.png" margin="auto" class="logo"></div>
	<h1>BE WARNED</h1>
	<div class="content"><h1>HE awaits for you eagerly.<br>But it's not time yet.</h1></div>
  <div class="countdown"><a href="#" id="demo" style="font-size: 6rem; font-weight: bold;"></a>
     <div><a href="home.php">Home.</a>
    </div>
	
</body>
<script type="text/javascript">
  var x = setInterval(function() {
  var d = new Date();
  var h = 21-d.getHours();
  var m = 60-d.getMinutes();
  var s = 60-d.getSeconds();
  if((h==0&&m==0&&s==0) || h<0)
    window.location.href = '/';
  else
  document.getElementById("demo").innerHTML = h + ":"
  + m + ":" + s;
}, 1000);
</script>
</html>
