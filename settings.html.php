<?php
	session_start(); 

	// if (!isset($_SESSION['firstname'])) {
	// 	$_SESSION['msg'] = "You must log in first";
	// 	header('location: home.html.php');
	// }

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['firstname']);
		header("location: home.html.php");
	}
	// include('php/sign_up_in.php');
	// echo $_SESSION['firstname'];
	// echo $_SESSION['emailid'];
?>


<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Pocket Vote</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-layers.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
        <script src="js/init.js"></script>
        <script src="js/app/form.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
<!--             <link rel="stylesheet" href="css/style-xlarge.css" />
 -->        </noscript>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1 id="title_size"><a href="home.html.php">Pocket Vote</a></h1>

				<?php $page = 'seven'; include('php/menu.php'); ?>
			</header>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="row 150%" style="margin:2em">
					<div class="col-md-6 col-md-offset-3">
						<section class="box" id="poll_list">
						<div >
							<form id="passwordform" role="form" method="post" name="passwordform" action="settings.html.php">
                                    <div class="form-group" >
                                        <h3>Password Update</h3>
                                        <label>New Password</label>
                                        <input type="password" name="newpassword" id="newpassword" tabindex="1" class="form-control" placeholder="New Password" value="" >
                                         <p id="error1"></p>
                                    </div>
                                     <div class="form-group" >
                                     	 <label> Confirm Password</label>
                                        <input type="password" name="cnf_newpassword" id="cnf_newpassword" tabindex="2" class="form-control" placeholder="Confirm Password" value="" >
                                    </div> 
                           
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12" id="btn_align">
                                   <input type="submit" name="password_submit" id="password_submit" tabindex="3" class="button large" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div id="successmsg">
                                </div>
							
						</div>
						</section>
						</div>
					</div>
			</section>
	</body>
</html>