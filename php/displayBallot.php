
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
			$pollId ="1111";

			$query = "SELECT p.BallotName,p.BallotType,b.ballotChoice
		              FROM Poll p,Ballot_Choice b where p.pollId = b.pollid and p.pollId= :pollId";

		    $ballot = $pdo->prepare($query);
			$ballot->bindValue(':pollId', $pollId);
			$ballot->execute();
			

		    while($row = $ballot->fetch(PDO::FETCH_ASSOC))
			{
			 echo "Inside while";
		     $ballotChoiceArray[$index] = $row;
		     $index++;
			}

			//$ballotName =  $ballotChoiceArray[1]['BallotName'];
			//$ballotType =  $ballotChoiceArray[1]['BallotType'];

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

      if(isset($_POST['ballotchoice_submit']))
      {
	try
  	{
  		//$PollID="1112";
  		$pollId = $_GET['pollid'];
		$sql = "INSERT INTO Ballot (PollID)
		VALUES ('$PollID')";
		echo "outside foeach";

		foreach ($_POST['$PollID'] as $i => $ballotChoicerow) 
		{
			 $sql2 .= "INSERT INTO Selected_Ballot_Choice (BallotID, Selection,BallotID );
			VALUES ($i, $ballotChoicerow,$BallotID);";
			echo "Inside foeach";
			}
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


	?>

