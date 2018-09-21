<?php
	$user = 'root';
	$pass = '';
	$db = 'manga';
	$connect = new mysqli('localhost',$user,$pass,$db);
	
	// Check connection
	if ($connect->connect_error) {
		die("Connection failed: " . $connect->connect_error);
	} 
	
	$sql = "SELECT Name FROM Manga";
	$result = $connect->query($sql);
	
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo "Name: ". $row["Name"];
	}
?>