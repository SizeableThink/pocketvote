<?php

	require_once('config.php');

	$edit_pollurl="www.pocketvoter.com/editballot.php?PollID=";
	$results_pollurl="www.pocketvoter.com/editballot.php?PollID=";
	$link_pollurl="www.pocketvoter.com/displayballot.php?PollID=";
	

	echo 'Hi, ' .$_SESSION['firstname'] . '<br><br>Please find the list of the Polls you created<br><br>';

	$query = "SELECT PollID, BallotName FROM Poll";
	$list = $pdo->prepare($query);
	$list->execute();
	while($row = $list->fetch(PDO::FETCH_ASSOC)){

		// echo '<div><p> www.pocketvoter.com/results.html.php?PollID='.$row['PollID'].'</p>';
		echo '<div>
				<p>
					<h4>'. $row['BallotName'].'</h4>
					<a href="'.$edit_pollurl.$row['PollID'].'">Edit Ballot</a><br>
					<a href="'.$results_pollurl.$row['PollID'].'">Results</a><br>
					Your Poll ID link: <a href="'.$link_pollurl.$row['PollID'].'">'.$link_pollurl.$row['PollID'].'</a><br><br>
				</p>
			</div>';
	}

?>