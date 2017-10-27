<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Annihilation page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script>
			function fu() {
				
			}
		</script>
	</head>
	<body class="subpage">

		<!-- Header -->
			<?php require("header.php"); ?>


		<!-- Nav -->
			<?php require("loggedinmenu.php");
			
			session_start();
			if (!isset($_SESSION["username"])) {
				header("Location: index.php");
			}
			?>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Are you sure you want to self-destruct the organization?</p>
						<h2>Self destruction</h2>
					</header>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p>To slap our leader and destroy the organization, press the red button below.</p>
								<h2>Final chance?</h2>
							</header>
							<form action="finalpage.php" method="post">
								<table border='0'>
								<tr><td><h4>Pass-phrase: (What am I thinking about?)</h4></td><td></td><td><div class="6u 12u$(xsmall)">
									<input style='width:300px' type="text" name="passphrase" id="passphrase" value="" placeholder="Pass phrase" /></div></td></tr>
								<tr><td colspan='3'><h4 id='error'></h4></td></tr>
								<tr><td></td><td colspan='2'><input type='submit' value='Annihilate' style='width:500px;height:100px; background-color: red;'></td></tr>
							</table>
							</form>
							</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>