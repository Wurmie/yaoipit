<!DOCTYPE html>
<html class="background1">
<head>
	<link rel="stylesheet" type="text/css" href="topButton.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script>
	window.onscroll = function() {scrollFunction()};
	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("myBtn").style.display = "block";
		} else {
			document.getElementById("myBtn").style.display = "none";
		}
	}
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
	</script>
</body>
</html>