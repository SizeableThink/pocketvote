<?php

require_once('config.php');
global $pdo;
    
    $pollID = $_GET['pollid'];
    $query = "SELECT BallotName, BallotType FROM Poll WHERE PollID = :pollid";
    $poll = $pdo->prepare($query);
    $poll->bindValue(':pollid', $pollID);
    $poll -> execute();
    $row = $poll->fetch(PDO::FETCH_ASSOC);
    $ballotName = $row['BallotName'];
    $selectedBallotType = $row['BallotType'];


    //Get the list of Voters, choices and their selections
    $query2 = "SELECT Ballot.BallotID , Poll.BallotName AS name, Poll.BallotType AS type, Ballot_Choice.BallotChoice AS choice,Selected_Ballot_Choices.Selection AS selection FROM Poll, Ballot_Choice, Ballot, Selected_Ballot_Choices WHERE Poll.PollID = :pollid AND Ballot_Choice.PollID = :pollid AND Ballot.PollID = :pollid AND Ballot.BallotID = Selected_Ballot_Choices.BallotID AND Ballot_Choice.BallotChoice_ID = Selected_Ballot_Choices.BallotChoice_ID ";

    $poll_data = $pdo->prepare($query2);
    $poll_data->bindValue(':pollid', $pollID);
    $poll_data -> execute();

    // $row = $poll_data->fetchALL(PDO::FETCH_CLASS);
    $poll_data_set = array();
    while($row = $poll_data->fetch(PDO::FETCH_ASSOC)){
      $poll_data_set[] = $row;
    };

    $ballotsDictionary = new stdClass();

//pull out array of unique ballot ids

    //for id in ids

    //dictionary per ballot id


    foreach ($poll_data_set as $row) {
        $ballotid = $row['BallotID'];
        $ballotChoice = $row['choice'];
        $selectionChoice = $row['selection'];
        $ballotName = $row['name'];
        $ballotType = $row['type'];

      if (isset($ballotsDictionary->$ballotid)) {
        $choiceSelection = (object) ['choice' => $ballotChoice, 'selection' => $selectionChoice];
        array_push($ballotsDictionary->$ballotid->choiceSelections, $choiceSelection);
      }

      else {
        $ballotsDictionary->$ballotid = (object) ['name' => $ballotName, 'type' => $ballotType,
           'choiceSelections' => [(object) ['choice' => $ballotChoice, 'selection' => $selectionChoice]]
        ];
      }}

      $ballots = array();

      foreach ($ballotsDictionary as $id => $ballot) {
        array_push($ballots, $ballot);
      }
      //var_dump($ballots);

     echo json_encode($ballots);

    ?>