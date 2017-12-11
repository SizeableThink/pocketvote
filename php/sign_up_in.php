<?php

session_start();

require_once('config.php'); 

// variable declaration
$fname = "";
$lname = "";
$reg_email = "";
$reg_password_1 = "";
$password_2 = "";

$log_email = "";
$log_passwd = "";

$reg_errors = array();
$log_errors = array(); 
$pswd1_error = "";
$_SESSION['success'] = "";
$_SESSION['logout'] = "";

// Sign Up
if (isset($_POST['register_submit'])) {

	// receive all values from the form
	$fname = $_POST['reg_fname'];
	$lname = $_POST['reg_lname'];
	$reg_email = $_POST['reg_email'];
	$reg_password_1 = $_POST['reg_password'];
	$password_2 = $_POST['confirm_password'];

	// sign up form validation
	if (empty($fname)) { 
		array_push($reg_errors, "First Name is required"); 
	}

	if (empty($lname)) { 
		array_push($reg_errors, "Last Name is required"); 
	}

	if (empty($reg_email)) { 
		array_push($reg_errors, "Email is required"); 
	}

	if (empty($reg_password_1)) {
		array_push($reg_errors, "Password is required"); 
	}

	if ($reg_password_1 != $password_2) {
		array_push($reg_errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($reg_errors) == 0) {
		// $password = md5(trim($password_1));
		// var_dump($password);
		//encrypt the password before saving in the database


		$query = "INSERT INTO Organizer (FirstName, LastName, EmailID, Password) 
				  VALUES('$fname', '$lname', '$reg_email', '$reg_password_1')";
		$s = $pdo->prepare($query);
		$s -> execute();

		$_SESSION['firstname'] = $fname;
		$_SESSION['success'] = "You are now logged in";
		header('location: home.html.php');
	}

}else if (isset($_POST['login_submit'])) {

	// receive all values from the form
	$log_email = $_POST['log_email'];
	$log_passwd = $_POST['log_password'];

	// sign up form validation
	if (empty($log_email)) { 
		array_push($log_errors, "Email is required"); 
	}

	if (empty($log_password)) {
		array_push($log_errors, "Password is required"); 
	}

	
	$log_password = trim($_POST['log_password']);
	$query = "SELECT EmailID, Password,FirstName FROM Organizer WHERE EmailID = :emailid";
	$login = $pdo->prepare($query);
	$login->bindValue(':emailid', $_POST['log_email']);
	$login->execute();
	$row = $login->fetch(PDO::FETCH_ASSOC);//Retrieve the number of rows that matches

		//Check by count
		if($row['Password'] == $log_password){
			echo "ok";
			$_SESSION['firstname'] = $row['FirstName'];
			$_SESSION['emailid'] = $row['EmailID'];
		}else{
			echo "Email or password does not exist.";
		}


	if (count($log_errors) == 0) {
		// echo "hi";
		header('location: home.html.php');
	}

}



?>