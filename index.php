<!DOCTYPE HTML>
<!--
	İsmail Taşdelen - Security Researcher - Bug Bounty Hunter  -- eidted by me
-->
<html>

<head>
	<title>Daily Manager</title>
	<meta charset="utf-8" />
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="revisit-after" content="1 days">
	<meta name="author" content="Veselina Hadzhieva">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assts/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<link rel="shortcut icon" href="assts/css/images/icon.ico">
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/images/icon.ico" /><![endif]-->
</head>

<body class="Loading">
	<div id="wrapper">
		<div id="bg"></div>
		<div id="overlay"></div>
		<div id="main">

			<!-- Header -->
			<header id="header">
				<h1>Daily Manager</h1>
				<p>To-do list &nbsp;&bull;&nbsp; Goals &nbsp;&bull;&nbsp; Haushold organization </p>
				<nav>
					<ul>
						<li><a href="login.php">Login</a></li>
						<li><a href="registration.php">Signup</a></li>
					</ul>
				</nav>
			</header>

			<!-- Footer -->
			<footer id="footer">
				<span class="copyright">&copy;Design by <a href="https://html5up.net/aerial"> html5up.net </a>.</span>
			</footer>

		</div>
	</div>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script>
		window.onload = function () {
			document.body.className = '';
		}
		window.ontouchmove = function () {
			return false;
		}
		window.onorientationchange = function () {
			document.body.scrollTop = 0;
		}
	</script>
</body>

</html>
