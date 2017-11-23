<?php

require_once('config.php'); 

// variable declaration
$fname_error = "";
$email_error = "";
$lname_error = "";
$pswd1_error = "";
$pswd2_error = "";
$fname="";
$lname="";
$email = "";
$password_1 = "";
$password_2 = "";
$errors = array(); 
$_SESSION['success'] = "";

// Sign Up
if (isset($_POST['register_submit'])) {

	// receive all values from the form
	$fname = $_POST['reg_fname'];
	$lname = $_POST['reg_lname'];
	$email = $_POST['reg_email'];
	$password_1 = $_POST['reg_password'];
	$password_2 = $_POST['confirm_password'];

	// sign up form validation
	if (empty($fname)) {
    	$fname_error = "First Name is required";
    	array_push($errors, "First Name is required");
    	} 
  	// } else {
   //  	// To check if first name contains only letters and whitespace
   //  	if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
   //    		$fname_error = "Only letters and white space are allowed"; 
   //  	}
  	// }

	// if (empty($fname)) { 
	// 	$fname_error = "First Name is required";
	// 	array_push($errors, "First Name is required"); 
	// }

	if (empty($lname)) { 
		$lname_error = "Last Name is required";
		array_push($errors, "Last Name is required"); 
	}

	if (empty($email)) { 
		$email_error = "Email is required";
		array_push($errors, "Email is required"); 
	}

	if (empty($password_1)) {
	 	$pswd1_error = "Password is required";
		array_push($errors, "Password is required"); 
	}

	if ($password_1 != $password_2) {
		$pswd2_error = "The two passwords do not match";
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		$query = "INSERT INTO registration (firstname, lastname, email, passwd) 
				  VALUES('$fname', '$lname', '$email', '$password_1')";
		$s = $pdo->prepare($query);
		$s -> execute();

		// $_SESSION['username'] = $username;
		// $_SESSION['success'] = "You are now logged in";
		header('location: home.html.php');
	}

}



?>