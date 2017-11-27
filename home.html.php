<?php
	session_start(); 

	// if (!isset($_SESSION['firstname'])) {
	// 	$_SESSION['msg'] = "You must log in first";
	// 	header('location: home.html.php');
	// }

	//echo $_GET['logout'];

	if (isset($_GET['logout'])) {
		echo "hi";
		session_destroy();
		unset($_SESSION['firstname']);
		header("location: home.html.php");
	}


?>

<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Pocket Vote</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="home.html.php">Pocket Vote</a></h1>
				<?php $page = 'one'; include('php/menu.php'); ?>

				<!-- <nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="background.html">Background</a></li>
						<li><a href="index.html#method">Voting Methods</a></li>
						<li><a href="demoBallot.html#method">Ballot Demo</a></li>
						<li><a href="createballot.php.html" class="button special">Create Ballot</a></li>
						<li><a href="login.php.html">Login</a></li>
					</ul>
				</nav> -->
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2>Pocket Vote</h2>
				<p>Alternative voting on the go</p>
				<ul class="actions">
				  <?php if(isset($_SESSION['firstname'])){
					echo '<li>
						<a href="createballot.html.php" class="button big">Create Ballot Now</a>
					</li>'; }  else{
							echo '<li>
						<a href="signin.html.php" class="button big">Create Ballot Now</a>
					</li>';
					}?>
				</ul>
				<!-- <?php // if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php //echo $_SESSION['username']; ?></strong></p>
		<?php //endif ?> -->
			</section>
								
	</body>
</html>