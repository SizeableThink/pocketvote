
<?php


require_once('config.php'); 


// variable declaration
$ballotName = "";
$pollId = "";
$ballotChoice = "";
$ballotType = "";
//$ballotId = uniqid(rand(), true);
$selection = "";
$selectedballotchoiceID = "";
$query = "";
$ballot = "";
$ballotChoiceArray = array(); // make a new array to hold all your data
$index = 0;


// To retrieve data for display ballot
	
		{
		    $pollId = $_GET['pollid'];
			//$pollId ="1112";

			$query = "SELECT p.BallotName,p.BallotType,b.BallotChoice,p.Notes,b.BallotChoice_ID
		              FROM poll p,Ballot_Choice b where p.PollID = b.PollID and p.PollID= :pollId";

		    $ballot = $pdo->prepare($query);
			$ballot->bindValue(':pollId', $pollId);
			$ballot->execute();
			

		    while($row = $ballot->fetch(PDO::FETCH_ASSOC))
			{
			 //echo "Inside while";
		     $ballotChoiceArray[$index] = $row;
		     $index++;
			}

			$ballotName =  $ballotChoiceArray[0]['BallotName'];
			$ballotType =  $ballotChoiceArray[0]['BallotType'];
			$notes =  $ballotChoiceArray[0]['Notes'];

			//echo $ballotName;
			//echo $ballotType;

		}
		

      if(isset($_POST['ballotchoice_submit']))
      	{
		try
  			{
				$sql = "INSERT INTO Ballot (PollID)
				VALUES ('$pollId')";
				$s = $pdo->prepare($sql);
				$s -> execute();
				$sql2="";
				$sql3= "SELECT max(BallotID) as 'id' from Ballot";
				$statement = $pdo->prepare($sql3);
				$statement->execute();
				$user_data = $statement->fetch();
				$ballotid= $user_data['id'];

					foreach ($ballotChoiceArray as $i => $ballotChoicerow) 
						{
							if($ballotChoiceArray[0]['BallotType'] == "Plurality"){
								$ballotchoiceID=$_POST['ballotChoiceID'];
								$sql2 = "INSERT INTO Selected_Ballot_Choices (Selection,BallotID, BallotChoice_ID) VALUES (1, $ballotid, $ballotchoiceID)";
								$s2 = $pdo->prepare($sql2);
								$s2 -> execute();
								echo "Record Successfully Saved";
								break;
							}

							elseif ($ballotChoiceArray[0]['BallotType'] == "Approval"){
								$selectedChoices = $_POST['ballotChoicecboxes'];
								$ballotChoiceIDs = $_POST['ballotChoiceIDs'];
								var_dump($selectedChoices);
								foreach ($selectedChoices as $key => $selectedChoice) {
										$ballotChoiceID=$ballotChoiceIDs[$key];
										$sql2 .= "INSERT INTO Selected_Ballot_Choices (Selection, BallotID, BallotChoice_ID) VALUES (1, $ballotid, $ballotChoiceID);";
								}
								$s2 = $pdo->prepare($sql2);
								$s2 -> execute();
								echo "Record Successfully Saved";
								break;
							}

							elseif ($ballotChoiceArray[0]['BallotType'] == "Ranked Choice"){
								$selectedChoices=$_POST['ballotChoices'];
								$ballotChoiceIDs = $_POST['ballotChoiceIDs'];
								foreach ($selectedChoices as $key => $selectedChoice) {
									$ballotChoiceID=$ballotChoiceIDs[$key];
									$sql2 .= "INSERT INTO Selected_Ballot_Choices (Selection, BallotID, BallotChoice_ID) VALUES ($selectedChoice, $ballotid, $ballotChoiceID);";
									$s2 = $pdo->prepare($sql2);
									$s2 -> execute();
									echo "Record Successfully Saved";
									echo "ballotid $ballotid";
									echo "ballotChoiceID $ballotChoiceID";
								}
							}

			}
		
		
		}
		catch (PDOException $e)
	  	{
			$error = 'Error creating ballot: ' . $e->getMessage();
			include 'error.html.php';
			exit();
		}
	}


