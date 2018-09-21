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
	$user = 'root';
	$pass = '';
	$db = 'manga';
	$connect = new mysqli('localhost',$user,$pass,$db);
	
	if ($connect->connect_error) {
		die("Connection failed: " . $connect->connect_error);
	}
	$numbChapters = 0;
	$chapterName = $_GET['chapterName'];
?>
<!DOCTYPE html>
<html class="background1">
<title>Home</title>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="mangaStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="box">
		<div><?php include("navigation.html");?></div>
		<div class="innerBox">
			<a href="Yaoi.php"><h3 class="goBack">Back</h3></a>
			<div class="profile">
				<img src="Images/icons/BL/<?php echo $_GET['chapterName']; ?>.png">
			</div>
			<div class="profileText">
				<p><h1><?php echo $_GET['chapterName']; ?></h1></p>
				<p><?php
					$sql = "SELECT Description FROM Manga WHERE Name='$chapterName'";
					$result = $connect->query($sql);
	
					if($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						echo $row["Description"];
					}
				?>
				</p>
			</div>
			<div id="chapters" onclick="getChapter()">
				<?php
					$path = "Manga/".$chapterName."/";
					$dir = new DirectoryIterator($path);
					$counter = 0;
					foreach ($dir as $fileinfo) {
						if ($fileinfo->isDir() && !$fileinfo->isDot()) {
							$counter++;
						}
					}
					$numbChapters = $counter;
					$filename = "Manga/".$chapterName."/Ch00";
					if(file_exists($filename)){
						$array = range(0,$numbChapters-1);
						foreach($array as $chapter) {
							?>
							<p onClick="getChapter(<?php echo $chapter;?>)" class="getChapter">Chapter <?php echo $chapter;?></p>
							<?php
						}
					}
					else {
						$array = range(1,$numbChapters);
						foreach($array as $chapter) {
							?>
							<p onClick="getChapter(<?php echo $chapter;?>)" class="getChapter">Chapter <?php echo $chapter;?></p>
							<?php
						}
					}
				?>
			</div>
		</div>
	</div>
	<div><?php include("toTopButton.php");?></div>
	<script>
		var thisChapter;
		function getChapter(chapter) {
			thisChapter = chapter.toString();
			var numbChapters = "<?php echo $numbChapters ?>";
			var chapterName = "<?php echo $chapterName ?>";
			window.location.href=("Chapter.php?thisChapter=" + thisChapter + "&numbChapters=" + numbChapters + "&chapterName=" + chapterName);
		}
	</script>
</body>
</html>
<?php
}
?>