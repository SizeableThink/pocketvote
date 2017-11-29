<?php

require_once('config.php');

global $pdo;

if(isset($_POST['save'])){
	$sql = "INSERT INTO poll (ballotName, selectedBallotType, pollURL, creationDate, poll_ID)
	VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."')";
}

if ($conn->query($sql) === TRUE) {
    echo "Ballot created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}