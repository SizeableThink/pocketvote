<?php

require_once('config.php');

global $pdo;

$PollID = uniqid(rand(), true);
$ballotName=$_POST['ballotName'];
$selectedBallotType=$_POST['selectedBallotType'];
$pollURL="www.pocketvoter.com/displayBallot.php?PollID=$PollID";
$BallotChoice_ID = 1;
$t=time();

if(isset($_POST['submit'])){
	try
  	{
		$sql = "INSERT INTO Poll (BallotName, BallotType, PollURL, Creation_Time, PollID)
		VALUES ('$ballotName','$selectedBallotType','$pollURL', $t, '$PollID')";
		$sql2 = "";
		foreach ($_POST['choices'] as $choice) {
			 $sql2 .= "INSERT INTO Ballot_Choice (BallotChoice_ID, PollID, BallotChoice)
			VALUES ($BallotChoice_ID,'$PollID','$choice');";
			$BallotChoice_ID++;
			}
		//var_dump($sql2);
		$s = $pdo->prepare($sql);
		$s -> execute();
		$s2 = $pdo->prepare($sql2);
		$s2 -> execute();
	}
	catch (PDOException $e)
  	{
    	$error = 'Error creating ballot: ' . $e->getMessage();
    include 'error.html.php';
    exit();
  }
}