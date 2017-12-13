<?php

	require_once('config.php');

	$edit_pollurl="www.pocketvoter.com/editballot.php?PollID=";
	$results_pollurl="http://localhost/Final_Pckt/pocketvote/results.html.php?PollID=";
	$link_pollurl="www.pocketvoter.com/displayballot.php?PollID=";
	$_SESSION['pollID'] = "";
	$emailid = $_SESSION['emailid'];
	// echo $_SESSION['emailid'];

	echo 'Hi, ' .$_SESSION['firstname'] . '<br><br>Please find the list of the Polls you created<br><br>';

	$query = "SELECT PollID, BallotName FROM Poll WHERE EmailID = :emailid";
	$list = $pdo->prepare($query);
	$list->bindValue(':emailid', $emailid);
	$list->execute();
	while($row = $list->fetch(PDO::FETCH_ASSOC)){

		// echo '<div><p> www.pocketvoter.com/results.html.php?PollID='.$row['PollID'].'</p>';
		echo '<div id="listpoll">
				<p>
					<h4>'. $row['BallotName'].'</h4>
					<a href="'.$edit_pollurl.$row['PollID'].'">Edit Ballot</a><br>
					<a href="'.$results_pollurl.$row['PollID'].'">Results</a><br>
					Your Poll ID link: <a href="'.$link_pollurl.$row['PollID'].'">'.$link_pollurl.$row['PollID'].'</a><br><br>
				</p>
			</div>';
			$_SESSION['pollID'] = $row['PollID'];
	}



?>