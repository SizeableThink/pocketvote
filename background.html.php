<?php
	session_start(); 

	// if (!isset($_SESSION['firstname'])) {
	// 	$_SESSION['msg'] = "You must log in first";
	// 	header('location: home.html.php');
	// }

	if (isset($_GET['logout'])) {
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
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="home.html.php">Pocket Vote</a></h1>
				<?php $page = 'two'; include('php/menu.php'); ?>
				<!-- <nav id="nav">
					<ul>
						<li><a href="home.html">Home</a></li>
						<li><a href="background.html">Background</a></li>
						<li><a href="home.html#method">Voting Methods</a></li>
						<li><a href="demoBallot.html#method">Ballot Demo</a></li>
						<li><a href="createballot.html.php" class="button special">Create Ballot</a></li>
						<li><a href="login.html.php">Login</a></li>
					</ul>
				</nav> -->
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Background</h2>
					</header>

					<!-- Text -->
						<section>
							
							<header>
								<h3>What is a voting system?</h3>
							</header>
							<p>Electoral systems are rules that govern all aspects of voting such as: when elections occur, who is allowed to vote, who can run as a candidate, how ballots are counted, how ballots are marked, and any other factor that can determine the outcome of a vote.</p>
							<header>
							<hr />
							<header>
								<h3>What is the purpose of this site?</h3>
							</header>
							<p>The purpose of this site is to inform you, the visitor, of the different type of voting systems, what the pros/cons are of each system, and how each system works.</p>
							<header>
							<hr />
							<header>
								<h3>What is the importance of voting?</h3>
							</header>
							<p>Voting is important because it allows people to solve disputes and differences of opinion in a civil manner. It also allows people to vote for who best represents them in regards to voting for a representative, senator, or even a president and vice-president.</p>
							<header>
							<hr />
							<header>
								<h3>What is the best electoral system?</h3>
							</header>
							<p>There is no definite answer, as every system comes with its unique set of flaws. However, some systems allow the voter to truly vote their heart rather than not voting or voting for someone/something they think will win.</p>
							<header>
				</div>
			</section>

	</body>
</html>