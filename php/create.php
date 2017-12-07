<?php

require_once('config.php');

global $pdo;

$PollID = uniqid(rand(), true);
$ballotName=$_POST['ballotName'];
$selectedBallotType=$_POST['selectedBallotType'];
$pollURL="www.pocketvoter.com/";
$BallotChoice_ID = 1;
$t=time();

if(isset($_POST['submit'])){
	$sql = "INSERT INTO Poll (BallotName, BallotType, PollURL, Creation_Time, PollID)
	VALUES ('$ballotName','$selectedBallotType','$pollURL', $t, '$PollID')";
	foreach ($_POST['choices'] as $choice) {
		$sql2 = "INSERT INTO Ballot_Choice (BallotChoice_ID, PollID, BallotChoice)
		VALUES ($BallotChoice_ID,'$PollID','$choice')";
		$BallotChoice_ID++;
		}
		$s = $pdo->prepare($sql);
		$s -> execute();
}