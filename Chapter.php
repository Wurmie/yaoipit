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
	<link rel="stylesheet" type="text/css" href="chapterStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="box">
		<div><?php include("navigation.html");?></div>
		<div class="innerBox">
			<div class="chapterDrop" method="post">
				<select id="allChapters" onchange="changeChapter()">
					<option selected="selected">Current Chapter: <?php echo $_GET['thisChapter'];?></option>
					<?php
						$chapterName = $_GET['chapterName'];
						$numbChapters = $_GET['numbChapters'];
						$filename = "Manga/".$chapterName."/Ch00";
						if(file_exists($filename)){
							$hasZero = 1;
							$array = range(0,$numbChapters);
							foreach($array as $chapter) {
								?>
								<option value="<?php echo $chapter;?>">Chapter <?php echo $chapter;?></option>
								<?php
							}
						}
						else {
							$hasZero=0;
							$array = range(1,$numbChapters);
							foreach($array as $chapter) {
							?>
							<option value="<?php echo $chapter;?>">Chapter <?php echo $chapter;?></option>
							<?php
							}
						}
					?>
				</select>
			</div>
			<a href= "Manga.php?chapterName=<?php echo $_GET['chapterName'];?>"><h2 id="chapTitle"><?php echo $_GET['chapterName'];?></h2></a>
			<div class="navButtons">
				<img class="readNav" onclick="getPrevChapter()" type="image" src="Images/prevs.png" onMouseOver="this.src='Images/prevSpill2.png'" onMouseOut="this.src='Images/prevs.png'"></a>
				<img class="readNav" onclick="getNextChapter()" type="image" src="Images/nexts.png" onMouseOver="this.src='Images/nextSpill2.png'" onMouseOut="this.src='Images/nexts.png'"></a>
			</div>
			<br><br><br>
			<div class="pages" onclick="getNextChapter()">
					<?php
						$chapter = $_GET['thisChapter'];
						$thisChapter;
						if($chapter < 10) {
							$thisChapter = "Ch0".$chapter;
						}
						else {
							$thisChapter = "Ch".$chapter;
						}
						$images = glob("Manga/".$chapterName."/".$thisChapter."/*.*");
						natcasesort($images);
						foreach($images as $image)
						{
							echo '<img src="'.$image.'"/>';
						}
					?>
			</div>
		</div>
	</div>
	<div><?php include("toTopButton.php");?></div>
	<script>
		var numbChapters = "<?php echo $numbChapters?>";
		var chapter = "<?php echo $chapter?>";
		var chapterName = "<?php echo $chapterName?>";
		var hasZero = Number("<?php echo $hasZero?>");
		
		function getPrevChapter() {
			var newChapter = Number(chapter);
			chapNumb = newChapter - 1;
			if (chapNumb > 0 || (chapNumb == 0 && hasZero == 1)) {
				var thisChapter = chapNumb;
				window.location.href=("Chapter.php?thisChapter=" + thisChapter + "&numbChapters=" + numbChapters + "&chapterName=" + chapterName);
			}
			else {
				window.location.href=("Manga.php?chapterName=" + chapterName);
			}
		}
		function getNextChapter() {
			var newChapter = Number(chapter);
			chapNumb = newChapter + 1;
			if((chapNumb <= numbChapters && !hasZero) || (hasZero && chapNumb < numbChapters)) {
				var thisChapter = chapNumb;
				window.location.href=("Chapter.php?thisChapter=" + thisChapter + "&numbChapters=" + numbChapters + "&chapterName=" + chapterName);
			}
			else {
				window.location.href=("Manga.php?chapterName=" + chapterName);
			}
		}
		function changeChapter() {
			var newChap = document.getElementById("allChapters").value;
			var thisChapter = newChap;
			window.location.href=("Chapter.php?thisChapter=" + thisChapter + "&numbChapters=" + numbChapters + "&chapterName=" + chapterName);
		}
	</script>
</body>
</html>
<?php
}
?>