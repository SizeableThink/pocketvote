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
							<form id="lbl_form" method="post" action="php/create.php">
									<div class="row">
                            			<div class="col-md-6 col-sm-12">
                            				<label for="ballotName"> Title for your Ballot </label>
                                			<input id="input_size" type="text" name="ballotName">
                            			</div>
                            		</div>
									<br>

									<div class="row">
                            			<div class="col-md-6 col-sm-12">
											<label for="BallotType">Choose your ballot type</label>
											<select required name="selectedBallotType" id="input_size">
  												<option value="" disabled="disabled" selected="selected">Select ballot type from dropdown</option>
  												<option value="Approval">Approval</option>
  												<option value="Plurality">Plurality</option>
  												<option value="Ranked Choice">Ranked Choice</option>
											</select>
										</div>
                            		</div>
									<br>

									<div class="row">
                            			<div class="col-md-6 col-sm-12">
											<label for="text3">Add/Remove your choices</label>
											<button type="button" id="addButton" name="choice">
												<img id="addButton_img" src="images/add.png" />
											</button>

											<button type="button" id="remvButton">
												<img id="remvButton_img" src="images/remove.png" />
											</button>
											<div id="add_textbox">
											</div>
									</div>
                            		</div>

                            		<div class="row">
                            			<div class="col-md-6 col-sm-12">
                            				<label for="notes"> Write a message to your voters here: </label>
                                			<input id="input_size" type="text" name="notes">
                            			</div>
                            		</div>

									<br>
									<div id="btn_align">
										<button type="submit" class="button large" value="submit" name="submit" id="submitButton">Create Ballot</button>
									</div>
								</form>
							</section>
						</div>
					</div>
			</section>
	</body>
</html>