<?php

require_once('config.php');

global $pdo;

PollID = string com_create_guid ( void );

if(isset($_POST['save'])){
	$sql = "INSERT INTO Poll (BallotName, BallotType, PollURL, Creation_Time, PollID)
	VALUES ('".$_POST["ballotName"]."','".$_POST["selectedBallotType"]."','".$pollURL."','".$_POST["Creation_Time"]."','".$PollID);
	foreach($_POST["choices"] as $key => $choice) {
		INSERT INTO Ballot_Choice (BallotChoice_ID, PollID, BallotChoice)
		VALUES (DEFAULT."','".$PollID."','".$choice);
	}
}

if ($conn->query($sql) === TRUE) {
    echo "Ballot created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}