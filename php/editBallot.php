<?php


require_once('config.php'); 


// variable declaration
$ballotName = "";
$pollId = "";
$ballotChoice = "";
$ballotType = "";
$ballotId = uniqid(rand(), true);
$selection = "";
$selectedballotchoiceID = "";
$query = "";
$ballot = "";
$ballotChoiceArray = array(); // make a new array to hold all your data
$index = 0;


// To retrieve data for display ballot
		//if (isset($_POST['ballot_display'])) 
		{
			//$pollId = $_POST['pollId'];
			$PollId = $_GET['pollid'];

			$query = "SELECT p.BallotName,p.BallotType
		              FROM Poll p where p.pollId = b.pollid and p.pollId= :pollId";

		    $ballot = $pdo->prepare($query);
			$ballot->execute();
			

		    while($row = $ballot->fetch(PDO::FETCH_ASSOC))
			{
			 echo "Inside while";
		     $ballotChoiceArray[$index] = $row;
		     $index++;
			}

			$ballotName =  $ballotChoiceArray[1]['BallotName'];
			$ballotType =  $ballotChoiceArray[1]['BallotType'];

			echo $ballotName;
			echo $ballotType;

		}
		
		/*if (isset($_POST['ballotchoice_submit'])) 
		{
			//$pollId = $_POST['pollId'];
			$pollId ="1113";

			$query = "";

		    $ballot = $pdo->prepare($query);
			$ballot->bindValue(':pollId', $pollId);
			$ballot->execute();

		}*/




	?>
