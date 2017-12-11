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

 include('php/results.php');

?><!DOCTYPE html>
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
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		<script src="js/app/ranked_choice.js"></script>
		<script src="js/app/approval.js"></script>
		<script src="js/app/plurality.js"></script>
		<script src="js/app/app.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body ng-app="ballotApp" ng-controller="ballotCtrl">

		<!-- Header -->
			<header id="header">
				<h1><a href="home.html.php">Pocket Vote</a></h1>

				<?php $page = 'five'; include('php/menu.php'); ?>
			</header>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="row 150%" style="margin:2em">
					<div class="12u 12u$(medium)">
						<div>
								<style>
									h4 {
    									border: 1px solid gray;
										}
								</style>
									<h3>{{ ballotName }} Ballot Results</h3>
									<!--if Ranked Choice ballot Results-->
									<h4 ng-if="selectedBallotType == 'Ranked Choice'"> Winner: {{ winner }} </h4>
									<div ng-repeat="event in history" ng-if="selectedBallotType == 'Ranked Choice'"> 
										<div ng-if="event.type == 'count'">
											<h3>Round: {{ $index/2 + 1 }}</h3>
											<p ng-repeat="(choice, count) in event.value"> {{ choice }}: {{ count }} </p>
										</div>
										<div ng-if="event.type == 'statement'">
											<p> {{ event.value }} </p>
										</div>
									</div>
									<!--if Approval ballot Results-->
									<div ng-if="selectedBallotType == 'Approval'">
										<div ng-repeat="name in winner"> 
											<h4>Winner: {{ name }} </h4>
											<div>
												<p ng-repeat="(choice, count) in counts"> {{choice}}: {{count}} </p>
											</div>
										</div>	
									</div>
									<!--if Plurality ballot Results-->
									<div ng-if="selectedBallotType == 'Plurality'">
										<div ng-repeat="name in winner"> 
											<h4>Winner: {{ name }} </h4>
											<div>
												<p ng-repeat="(choice, count) in counts"> {{choice}}: {{count}} </p>
											</div>
										</div>	
									</div>

						</div>
					</div>
				</div>
			</section>
	</body>
</html>