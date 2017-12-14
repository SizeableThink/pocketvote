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
				<?php $page = 'four'; include('php/menu.php'); ?>
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
				<div class="container">
					<header class="major">
						<h2>Demo Ballot</h2>
						<p>Use the interface below to see how the voting on Pocket Vote works!</p>
						<button type="submit" class="button big" ng-click="testRankedChoice();">Demo Ranked Choice</button>
						<button type="submit" class="button big" ng-click="testApproval()">Demo Approval</button>
						<button type="submit" class="button big" ng-click="testPlurality()">Demo Plurality</button>
					</header>
				</div>
					<div class="row 150%" style="margin:2em">
						<div class="4u 12u$(medium)">
							<section class="box" style="text-align:left">
								<h3>Ballot selection:</h3>
								<form>
									Name your ballot <input type="text" ng-model="ballotName" placeholder="Ballot name here">
									<br>
									Choose your ballot type<br><input list="ballotTypes"
									ng-model="selectedBallotType" ng-dropdown required ng-change="change()" class="alt">
									<br>
									<datalist id="ballotTypes"> 
									<option ng-repeat="type in ballotTypes" value="{{type.name}}">
									</datalist>
									<br>
									Add a ballot choice - you are able to add as many choices as you want <input type="text" ng-model="newChoice" placeholder="Add a ballot choice">
									<button type="submit" ng-click="addChoice()">Enter choice</button>
									<br>
									<br>
									Enter number of ballots <input type="number" min="1" ng-model="ballotNumber" placeholder="# of ballots here">
									<br>
									<br>
									<!--<button type="submit" class="button big" ng-click="addBallot()">Submit selections</button>-->
								</form>
								<button type="submit" class="button small" ng-click="addBallot()">Create ballot</button> <!-- want to add limit on submission to reset, not push another # of ballots-->
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<h3>{{ ballotName }} Ballots</h3>
								<p>Cast votes here</p>
								<button type="submit" class="button small" ng-click="findwinner()">Calculate</button>
								<br>
								<br>
								<div class="table-wrapper" >
									<table class="alt" ng-repeat="ballot in ballots">
										<thead>
											<tr>
												<th>Choice</th>
												<th>Rank</th>
											</tr>
										</thead>

										<tbody ng-if="selectedBallotType == 'Ranked Choice'">
											<tr ng-repeat="choiceSelection in ballot.choiceSelections">
												<td><b>{{choiceSelection.choice}}</b></td>
												<td><input type="number" style="width: 48px" min="1" ng-model="choiceSelection.selection"></td>
											</tr>
										</tbody>

										<tbody ng-if="selectedBallotType == 'Approval'">
											<tr ng-repeat="choiceSelection in ballot.choiceSelections">
												<td><b>{{choiceSelection.choice}}</b></td>
												<td><input type="checkbox" name="selection" value="choiceSelection.selection" ng-model="choiceSelection.selection"></td>
											</tr>
										</tbody>

										<tbody ng-if="selectedBallotType == 'Plurality'">
											<tr ng-repeat="choiceSelection in ballot.choiceSelections">
												<td><b>{{choiceSelection.choice}}</b></td>
												<td><input type="checkbox" name="selection" ng-model="choiceSelection.selection" ng-click="updateSelection($index, ballot.choiceSelections)"></td>
											</tr>
										</tbody>
									</table>
								</div>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
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
									<br>
									<button type="submit" class="button small" onclick="window.location.reload();">Clear All</button>
									<!--<p>{{results()}}</p>
									<div ng-repeat="(choice, selections) in findwinner()">
											<span><b>{{ choice }}: </b></span>
											<span ng-repeat="selection in selections track by $index"><a href="#">{{selection}}, </a></span>
										</div>--> 
									</div>
							</section>
						</div>
					</div>
			</section>
	</body>
</html>