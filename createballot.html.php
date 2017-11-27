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
		<script src="js/app/form.js"></script>
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

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<!-- <div class="container">
					<header class="major">
						<h2>Create Ballot</h2>
						<p>Use the selections below to create a ballot with the voting method of your choice!</p>
					</header>
				</div> -->
					<div class="row 150%" style="margin:2em">
						<div class="12u 12u$(medium)">
							<section class="box" id="ballotform">
							<form id="lbl_form">
									<div class="row">
                            			<div class="col-md-6 col-sm-12">
                            				<label for="text1"> Title for your Ballot </label>
                                			<input id="input_size" type="text" name="text1" ng-model="ballotName">
                            			</div>
                            		</div>
									<br>

									<div class="row">
                            			<div class="col-md-6 col-sm-12">
											<label for="text2">Choose your ballot type</label>
											<input id="input_size" name="text2" list="ballotTypes" ng-model="selectedBallotType" ng-dropdown required ng-change="change()" class="alt">
											<datalist id="ballotTypes"> 
												<option ng-repeat="type in ballotTypes" value="{{type.name}}">
											</datalist>
										</div>
                            		</div>
									<br>

									<div class="row">
                            			<div class="col-md-6 col-sm-12">
											<label for="text3">Add/Remove your choices </label>
											<button type="submit" id="addButton" ng-click="addChoice()">
												<img id="addButton_img" src="images/add.png" />
											</button>

											<button type="submit" id="remvButton">
												<img id="remvButton_img" src="images/remove.png" />
											</button>
											<div id="add_textbox">
											</div>
									</div>
                            		</div>

									<br>
									<div id="btn_align">
										<button type="submit" class="button large" id="submitButton">Create Ballot</button>
									</div>
<!-- 									<button type="submit" class="button small" ng-click="addChoice()">Enter choice</button></div>
 -->									
									<!-- Enter number of ballots <input type="number" min="1" ng-model="ballotNumber" placeholder="# of ballots here"> -->
									<!--<button type="submit" class="button big" ng-click="addBallot()">Submit selections</button>-->
								</form>
							</section>
						</div>
					</div>
			</section>
	</body>
</html>