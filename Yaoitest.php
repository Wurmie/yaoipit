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
<title>Manga</title>
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
			<li class="mangaList">
				<a href="30 Days With You.php"><img class="enlarge" src="Images/icons/BLSmall/30days.png"></a></br>
				<h3><center>30 Days With You</center></h3>
			</li>
			<li class="mangaList">
				<a href="A Guy Like You.php"><img class="enlarge" src="Images/icons/BLSmall/guylikeyou.png"></a></br>
				<h3><center>A Guy Like You</center></h3>
			</li>
			<li class="mangaList">
				<a href="All About Lust.php"><img class="enlarge" src="Images/icons/BLSmall/aboutlust.png"></a></br>
				<h3><center>All About Lust</center></h3>
			</li>
			<li class="mangaList">
				<a href="An Easy Target.php"><img class="enlarge" src="Images/icons/BLSmall/easytarget.png"></a></br>
				<h3><center>An Easy Target</center></h3>
			</li>
			<li class="mangaList">
				<a href="At the End of the Road.php"><img class="enlarge" src="Images/icons/BLSmall/endofroad.png"></a></br>
				<h3><center>At the End of the Road</center></h3>
			</li>
			<li class="mangaList">
				<a href="BJ Alex.php"><img class="enlarge" src="Images/icons/BLSmall/bjalex.png"></a></br>
				<h3><center>BJ Alex</center></h3>
			</li>
			<li class="mangaList">
				<a href="Blood Bank.php"><img class="enlarge" src="Images/icons/BLSmall/bloodbank.png"></a></br>
				<h3><center>Blood Bank</center></h3>
			</li>
			<li class="mangaList">
				<a href="Curious Recipe.php"><img class="enlarge" src="Images/icons/BLSmall/curiousrecipe.png"></a></br>
				<h3><center>Curious Recipe</center></h3>
			</li>
			<li class="mangaList">
				<a href="Dark Heaven.php"><img class="enlarge" src="Images/icons/BLSmall/darkheaven.png"></a></br>
				<h3><center>Dark Heaven</center></h3>
			</li>
			<li class="mangaList">
				<a href="December Rain.php"><img class="enlarge" src="Images/icons/BLSmall/decemberrain.png"></a></br>
				<h3><center>December Rain</center></h3>
			</li>
			<li class="mangaList">
				<a href="Dolphin Fairy.php"><img class="enlarge" src="Images/icons/BLSmall/dolphinfairy.png"></a></br>
				<h3><center>Dolphin Fairy</center></h3>
			</li>
			<li class="mangaList">
				<a href="Dress Him Up.php"><img class="enlarge" src="Images/icons/BLSmall/dresshimup.png"></a></br>
				<h3><center>Dress Him Up</center></h3>
			</li>
			<li class="mangaList">
				<a href="Escape into Oblivion.php"><img class="enlarge" src="Images/icons/BLSmall/escape.png"></a></br>
				<h3><center>Escape into Oblivion</center></h3>
			</li>
			<li class="mangaList">
				<a href="Eunsuk & Jung-Gu.php"><img class="enlarge" src="Images/icons/BLSmall/eunsuk.png"></a></br>
				<h3><center>Eunsuk & Jung-Gu</center></h3>
			</li>
			<li class="mangaList">
				<a href="Following Namsoo to the Bathhouse.php"><img class="enlarge" src="Images/icons/BLSmall/namsoo.png"></a></br>
				<h3><center>Following Namsoo to the Bathhouse</center></h3>
			</li>
			<li class="mangaList">
				<a href="From Points of Three.php"><img class="enlarge" src="Images/icons/BLSmall/frompoints.png"></a></br>
				<h3><center>From Points of Three</center></h3>
			</li>
			<li class="mangaList">
				<a href="Go Jin and Gam-Rae.php"><img class="enlarge" src="Images/icons/BLSmall/gojin.png"></a></br>
				<h3><center>Go Jin and Gam-Rae</center></h3>
			</li>
			<li class="mangaList">
				<a href="How to Hate Mate.php"><img class="enlarge" src="Images/icons/BLSmall/hatemate.png"></a></br>
				<h3><center>How to Hate Mate</center></h3>
			</li>
			<li class="mangaList">
				<a href="H and H Roman Company.php"><img class="enlarge" src="Images/icons/BLSmall/hhroman.png"></a></br>
				<h3><center>H&H Roman Company</center></h3>
			</li>
			<!--NOT YET
			<li class="mangaList">
				<a href="How Sweet is a Sugar Daddy.php"><img class="enlarge" src="Images/icons/BLSmall/.png"></a></br>
				<h3><center>How Sweet is a Sugar Daddy</center></h3>
			</li>-->
			<li class="mangaList">
				<a href="Hush.php"><img class="enlarge" src="Images/icons/BLSmall/hush.png"></a></br>
				<h3><center>Hush</center></h3>
			</li>
			<li class="mangaList">
				<a href="If You Hate Me So.php"><img class="enlarge" src="Images/icons/BLSmall/hatemeso.png"></a></br>
				<h3><center>If You Hate Me So</center></h3>
			</li>
			<li class="mangaList">
				<a href="Jazz For Two.php"><img class="enlarge" src="Images/icons/BLSmall/jazz.png"></a></br>
				<h3><center>Jazz For Two</center></h3>
			</li>
			<li class="mangaList">
				<a href="Killing Stalking.php"><img class="enlarge" src="Images/icons/BLSmall/killing.png"></a></br>
				<h3><center>Killing Stalking</center></h3>
			</li>
			<li class="mangaList">
				<a href="Kings Maker.php"><img class="enlarge" src="Images/icons/BLSmall/kingsmaker.png"></a></br>
				<h3><center>King's Maker</center></h3>
			</li>
			<li class="mangaList">
				<a href="Love Me More.php"><img class="enlarge" src="Images/icons/BLSmall/lovememore.png"></a></br>
				<h3><center>Love Me More</center></h3>
			</li>
			<li class="mangaList">
				<a href="Lover Boy.php"><img class="enlarge" src="Images/icons/BLSmall/loverboy.png"></a></br>
				<h3><center>Lover Boy</center></h3>
			</li>
			<li class="mangaList">
				<a href="Make Me Bark.php"><img class="enlarge" src="Images/icons/BLSmall/makemebark.png"></a></br>
				<h3><center>Make Me Bark</center></h3>
			</li>
			<li class="mangaList">
				<a href="Man Crush.php"><img class="enlarge" src="Images/icons/BLSmall/mancrush.png"></a></br>
				<h3><center>Man Crush</center></h3>
			</li>
			<li class="mangaList">
				<a href="Momentum.php"><img class="enlarge" src="Images/icons/BLSmall/momentum.png"></a></br>
				<h3><center>Momentum</center></h3>
			</li>
			<li class="mangaList">
				<a href="Moritat.php"><img class="enlarge" src="Images/icons/BLSmall/moritat.png"></a></br>
				<h3><center>Moritat</center></h3>
			</li>
			<li class="mangaList">
				<a href="My Starry Sky.php"><img class="enlarge" src="Images/icons/BLSmall/starrysky.png"></a></br>
				<h3><center>My Starry Sky</center></h3>
			</li>
			<li class="mangaList">
				<a href="Ordinary Men.php"><img class="enlarge" src="Images/icons/BLSmall/ordinarymen.png"></a></br>
				<h3><center>Ordinary Men</center></h3>
			</li>
			<li class="mangaList">
				<a href="Peach Love.php"><img class="enlarge" src="Images/icons/BLSmall/peachlove.png"></a></br>
				<h3><center>Peach Love</center></h3>
			</li>
			<li class="mangaList">
				<a href="Perfect Relationship.php"><img class="enlarge" src="Images/icons/BLSmall/perfectrelationship.png"></a></br>
				<h3><center>Perfect Relationship</center></h3>
			</li>
			<li class="mangaList">
				<a href="Royal Servant.php"><img class="enlarge" src="Images/icons/BLSmall/royalservant.png"></a></br>
				<h3><center>Royal Servant</center></h3>
			</li>
			<li class="mangaList">
				<a href="Saha.php"><img class="enlarge" src="Images/icons/BLSmall/saha.png"></a></br>
				<h3><center>Saha</center></h3>
			</li>
			<li class="mangaList">
				<a href="Scent of a Witch.php"><img class="enlarge" src="Images/icons/BLSmall/scent.png"></a></br>
				<h3><center>Scent of a Witch</center></h3>
			</li>
			<li class="mangaList">
				<a href="See You Again.php"><img class="enlarge" src="Images/icons/BLSmall/seeyouagain.png"></a></br>
				<h3><center>See You Again</center></h3>
			</li>
			<li class="mangaList">
				<a href="Sign.php"><img class="enlarge" src="Images/icons/BLSmall/sign.png"></a></br>
				<h3><center>Sign</center></h3>
			</li>
			<li class="mangaList">
				<a href="Star x Fanboy.php"><img class="enlarge" src="Images/icons/BLSmall/fanboy.png"></a></br>
				<h3><center>Star x Fanboy</center></h3>
			</li>
			<li class="mangaList">
				<a href="Story of Our Lives.php"><img class="enlarge" src="Images/icons/BLSmall/storyofourlives.png"></a></br>
				<h3><center>Story of Our Lives</center></h3>
			</li>
			<li class="mangaList">
				<a href="The Baker on the First Floor.php"><img class="enlarge" src="Images/icons/BLSmall/baker.png"></a></br>
				<h3><center>The Baker on the First Floor</center></h3>
			</li>
			<li class="mangaList">
				<a href="The Only One that Didn't Know.php"><img class="enlarge" src="Images/icons/BLSmall/onlyone.png"></a></br>
				<h3><center>The Only One </br>that Didn't Know</center></h3>
			</li>
			<li class="mangaList">
				<a href="Unfather.php"><img class="enlarge" src="Images/icons/BLSmall/unfather.png"></a></br>
				<h3><center>Unfather<center></h3>
			</li>
			<li class="mangaList">
				<a href="Window to Window.php"><img class="enlarge" src="Images/icons/BLSmall/windowtowindow.png"></a></br>
				<h3><center>Window to Window</center><h3>
			</li>
			<li class="mangaList">
				<a href="Wolf in the House.php"><img class="enlarge" src="Images/icons/BLSmall/wolf.png"></a></br>
				<h3><center>Wolf in the House</center></h3>
			</li>
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
	</script>
</body>
</html>
<?php
}
?>