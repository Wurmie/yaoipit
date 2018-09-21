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
?>
<!DOCTYPE html>
<html class="background1">
<title>non-Yaoi Manga</title>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="yaoiStyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body>
<div class="box">
	<?php include("navigation.html");?>
	<div class="innerBox">
	<button class="alphaSort" onclick="sortAlpha()">Alphabetical</button>
	<input type="text" id="mangaInput" onkeyup="searchManga()" placeholder="Search Manga">
		<div class="marginManga">
		<ul id="allManga">
		<?php
			$sql = "SELECT Name FROM nonYaoiManga ORDER BY Name";
			$result = mysqli_query($connect,$sql);
			
			while ($row = mysqli_fetch_array($result)){
				?>
				<li class="mangaList" id="<?php echo $row["Name"];?>" onclick = "getManga(this.id)">
					<img class="enlarge" src="Images/icons/nonBLSmall/<?php $row["Name"];?>.png"></a></br>
					<h3><center><?php echo $row["Name"];?></center></h3>
				</li>
				<?php
			}
		?>
		</ul>
		</div>
	</div>
</div>
	<div><?php include("toTopButton.php");?></div>
	<script>
		function sortAlpha() {
			var list, i, switching, b, shouldSwitch;
			list = document.getElementById("allManga");
			switching = true;
			while (switching) {
				switching = false;
				b = list.getElementsByTagName("LI");
				for (i = 0; i < (b.length - 1); i++) {
					shouldSwitch = false;
					if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
						shouldSwitch= true;
						break;
					}
				}
				if (shouldSwitch) {
					b[i].parentNode.insertBefore(b[i + 1], b[i]);
					switching = true;
				}
			}
		}
		function searchManga() {
			var input, filter, ul, li, a, i;
			input = document.getElementById("mangaInput");
			filter = input.value.toUpperCase();
			ul = document.getElementById("allManga");
			li = ul.getElementsByTagName("li");
			for (i = 0; i < li.length; i++) {
				a = li[i].getElementsByTagName("h3")[0];
				if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
					li[i].style.display="inline-block";
				} else {
					li[i].style.display = "none";
				}
			}
		}
		function getManga(id) {
			var chapterName = id;
			window.location.href=("nonYaoiManga.php?chapterName=" + chapterName);
		}
</script>
</body>
</html>
<?php
}
?>