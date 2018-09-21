<?php
session_start();
$expireTime = 60;
if(isset($_SESSION['last_action'])) {
	$secondsInactive = time()-$_SESSION['last_action'];
	$expire=$expireTime * 60;
	if($secondsInactive >= $expire){
		session_unset();
		session_destroy();
		header("Location: index.html");
	}
}
$_SESSION['last_action'] = time();
if($_SESSION["user"] != "guest") {
	header("Location: index.html");
}
else{
?>
<!DOCTYPE html>
<html class="background1">
<title>Home</title>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="homeStyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="box">
	<?php include("navigation.html");?>
	<div class="innerBox">
	</div>
</div>
	<div><?php include("toTopButton.php");?></div>
</body>
</html>
<?php
}
?>