<?php

	require_once('config.php'); 

	$query = "SELECT email FROM registration WHERE email = :emailid";
	$checkemail = $pdo->prepare($query);
	$checkemail->bindValue(':emailid', $_POST['reg_email']);
	$checkemail -> execute();
	$row = $checkemail->fetch(PDO::FETCH_ASSOC);//Retrieve the number of rows that matches

		//Check by count
  		if ($row > 0) {
  	  		echo json_encode( false );
  		}else {
      		echo json_encode( true );
    	}



?>