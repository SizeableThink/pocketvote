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
				<?php $page = 'three'; include('php/menu.php'); ?>
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
			<!-- <section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Background</h2>
					</header> -->

					<!-- One -->
			<section id="method" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Voting Methods</h2>
						<p>Click on the below voting methods for more information about each type.</p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<h3>Ranked Choice</h3>
								<p>Rank choice voting works by voters selecting a candidate as their first choice, another candidate as their second choice, etc.</p>
								<a href="ranked_choice.html" class="button fit">Learn more</a>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<h3>Approval</h3>
								<p>Approval voting works by voters selecting all of the candidates they “approve” of.</p>
								<a href="approval.html" class="button fit">Learn more</a>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<h3>Range Choice</h3>
								<p>Range voting works by voters giving each candidate a score in order to show how much they like or dislike each candidate.</p>
								<a href="range_choice.html" class="button fit">Learn more</a>
							</section>
						</div>
					</div>
				
			<hr />

			<!-- Voting Methods Comparison Table -->
						<section>
							<h2>Voting Methods Comparison Table</h2>
							<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th></th>
											<th>Clone-Proof</th>
											<th>Mutual Majority</th>
											<th>Consistency</th>
											<th>Later-No-Harm</th>
											<th>Later-No-Help</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><b>Approval</b></td>
											<td>Yes</td>
											<td>No</td>
											<td>Yes</td>
											<td>No</td>
											<td>Yes</td>
										</tr>
										<tr>
											<td><b>Plurality</b></td>
											<td>Spoilers</td>
											<td>No</td>
											<td>Yes</td>
											<td>NA</td>
											<td>NA</td>
										</tr>
										<tr>
											<td><b>Ranked Choice</b></td>
											<td>Yes</td>
											<td>Yes</td>
											<td>No</td>
											<td>Yes</td>
											<td>Yes</td>
										</tr>
										<tr>
											<td><b>Range Choice</b></td>
											<td>Yes</td>
											<td>No</td>
											<td>Yes</td>
											<td>No</td>
											<td>Yes</td>
										</tr>
									</tbody>
									</table>
							</div>
						</section>
							<section id="textalign">
								<ul class="alt">
									<li><u>Clone Proof</u> - the existence of duplicated or extremely similar candidates (clones) would not affect the winner.</li>
									<li><u>Spoilers</u> - Candidates which decrease the chance of any of the similar or clone candidates winning. This causes the vote to be split between the two duplicates.</li>
									<li><u>Mutual Majority</u> - A candidate within a group of candidates ranked above all others by a majority of voters will win.</li>
									<li><u>Consistency</u> - whenever the electorate is divided into several parts and elections in those parts garner the same result, then an election of the entire electorate also garners that result.</li>
									<li><u>Later-No-Harm</u> - A voter giving an additional ranking or positive rating to a less-preferred candidate does not cause a more-preferred candidate to lose.</li>
									<li><u>Later-No-Help</u> - A voter giving an additional ranking or negative rating to a more-preferred candidate does not cause a less-preferred candidate to win.</li>
								</ul>
							</section>

					</div>
			</section>

	</body>
</html>