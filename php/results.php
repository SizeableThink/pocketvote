<?php

require_once('config.php');

global $pdo;
    
    $pollID = $_SESSION['pollID'];

    $query = "SELECT BallotName, BallotType FROM Poll WHERE PollID = :pollid";
    $poll = $pdo->prepare($query);
    $poll->bindValue(':pollid', $pollID);
    $poll -> execute();
    $row = $poll->fetch(PDO::FETCH_ASSOC);

    $ballotName = $row['BallotName'];
    $selectedBallotType = $row['BallotType'];

    //Get the list of Voters, choices and their selections
    $query2 = "SELECT DISTINCT(B.BallotID),BC.PollID, SBC.BallotChoice_ID, SBC.Selection FROM Ballot_Choice BC INNER JOIN Ballot B ON BC.PollID = B.PollID INNER JOIN Selected_Ballot_Choices SBC ON B.BallotID = SBC.BallotID";
    $poll_data = $pdo->prepare($query2);
    $poll_data -> execute();
    


$newOptions = array();

while($row = $poll_data->fetch(PDO::FETCH_ASSOC)){
  $ballotid = $row['BallotID'];
  $ballotChoice_id = $row['BallotChoice_ID'];
  $selectionChoice = $row['Selection'];
  $newOptions[$ballotid][$ballotChoice_id] = $selectionChoice;
}

//sql here

// $ballots = [
//     (object) ['name' => 'Favorite Color', 'type' => 'Approval',
//     	'choiceSelections' => [(object) ['choice' => 'red', 'selection' => true],
//     		(object) ['choice' => 'blue', 'selection' => false],
//     		(object) ['choice' => 'yellow', 'selection' => false],
//     	]],
//     (object) ['name' => 'Favorite Color', 'type' => 'Approval',
//     	'choiceSelections' => [(object) ['choice' => 'red', 'selection' => false],
//     		(object) ['choice' => 'blue', 'selection' => true],
//     		(object) ['choice' => 'yellow', 'selection' => false],
//     	]]];

// var_dump($ballots);
//     echo json_encode($ballots);
    ?>