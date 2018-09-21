<?php
	$user = 'root';
	$pass = '';
	$db = 'manga';
	$conn = new mysqli('localhost',$user,$pass,$db);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "INSERT INTO Manga (id,Name,Description)
	VALUES ('5', 'test', 'Iro\'s plan was simple. Pretend to be a service man, make the delivery, and exchange a few words with Rene, his dream guy. But when a drunk Rene mistakes him for the android he ordered, Iro decides to take advantage of the situation. As long as he keeps playing along, he gets to live with the man of his dreams! But what will happen when Rene finds out the truth?')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
$conn->close();
?>