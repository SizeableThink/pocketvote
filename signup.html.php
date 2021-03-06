 <?php include('php/sign_up_in.php');
  ?>

<!DOCTYPE html>
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
<body id="loginpg">
    <h1 id="h1font"><a href="home.html.php"> <span class="glyphicon glyphicon-home"></span> </a></h1>

    <!-- Signup/ Signin Forms Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <!-- Signup/ Signin Panel Start -->
                <div id="panel" class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12" id="reg">
                                <h3 id="h3font">SIGN UP</h3>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <!-- Signup/ Signin Panel Form Content Start -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12" >

                                <!-- Signup Form Content Start -->
                                <form id="register_form" role="form" method="post" name="registerform"
                                action="signup.html.php">
                                    <div class="form-group" >
                                        <label id="error">All Fields are required *</label>
                                        <input type="text" name="reg_fname" id="reg_fname" tabindex="1" class="form-control" placeholder="First Name" value="<?php echo $fname; ?>" >
                                    </div>
                                     <div class="form-group" >
                                        <input type="text" name="reg_lname" id="reg_lname" tabindex="2" class="form-control" placeholder="Last Name" value="<?php echo $lname; ?>" >
                                    </div> 
                                    <div class="form-group">
                                        <input type="email" name="reg_email" id="reg_email" tabindex="3" class="form-control" placeholder="Your Email Address"  value="<?php echo $reg_email; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="reg_password" id="reg_password" tabindex="4" class="form-control" placeholder="Your Password" value="<?php echo $reg_password_1; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" id="confirm_password" tabindex="5" class="form-control" placeholder="Confirm Password" value="<?php echo $password_2; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12" id="btn_align">
                                                <input type="submit" name="register_submit" id="register_submit" tabindex="6" class="button large" value="Sign Up">
                                            </div>
                                        </div>
                                    </div>
                                </form> <!-- Signup Form Content End -->

                            </div>
                        </div>
                    </div> <!-- Signup/ Signin Panel Form Content End -->

                </div> <!-- Signup/ Signin Panel End -->

            </div>
        </div>
    </div> <!-- Signup/ Signin Forms End -->
</body>
</html>