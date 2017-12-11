<?php

require_once('config.php');

global $pdo;

$PollID = uniqid(rand(), true);
$ballotName=$_POST['ballotName'];
$selectedBallotType=$_POST['selectedBallotType'];
$pollURL="www.pocketvoter.com/php/displayBallot.php?PollID=$PollID";
$date = date('y-m-d h:i:s a', time());



if(isset($_POST['submit'])){
	try
  	{
  		echo "Your URL is: $pollURL";
		$sql = "INSERT INTO Poll (BallotName, BallotType, PollURL, CreationTime, PollID)
		VALUES ('$ballotName','$selectedBallotType','$pollURL', DEFAULT, '$PollID')";
		$sql2 = "";
		foreach ($_POST['choices'] as $key => $choice) {
			 $sql2 .= "INSERT INTO Ballot_Choice (BallotChoice_ID, PollID, BallotChoice)
			VALUES ($key,'$PollID','$choice');";
			}
		
		//var_dump($_POST['submit']);
		//var_dump($sql);
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