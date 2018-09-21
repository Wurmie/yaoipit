<?php
	//start session
	session_start();
	
	if(isset($_POST['pwd']))
	{
		$input = $_POST['pwd'];
		if($input == "yaoi")
		{
			$_SESSION["user"]="guest";
			header("Location: home.php");
		}
		else
		{
			header("Location: index.html");
			session_unset();
		}
	}		
?>