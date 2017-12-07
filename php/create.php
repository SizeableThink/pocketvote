<?php

require_once('config.php');

global $pdo;

$PollID = smd5(uniqid(rand(), true));
$ballotName=$_POST['ballotName'];
$selectedBallotType=$_POST['selectedBallotType'];
$pollURL="www.pocketvoter.com/";
$BallotChoice_ID = 1;

if(isset($_POST['submit'])){
	$sql = "INSERT INTO Poll (BallotName, BallotType, PollURL, Creation_Time, PollID)
	VALUES ('$ballotName','$selectedBallotType','$pollURL', DEFAULT, '$PollID');"
	foreach ($_POST['choices'] as $choice) {
		$sql .= "INSERT INTO Ballot_Choice (BallotChoice_ID, PollID, BallotChoice)
		VALUES (DEFAULT,'$PollID','$choice');
		$BallotChoice_ID++;"
	}
}

if ($conn->query($sql) === TRUE) {
    echo "Ballot created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}