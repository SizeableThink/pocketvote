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
        <script src="js/init.js"></script>
        <script src="js/app/form.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
<!--             <link rel="stylesheet" href="css/style-xlarge.css" />
 -->        </noscript>
</head>
<body id="loginpg">
    <h1 id="h1font"><a href="home.html.php"> POCKET VOTE </a></h1>

    <!-- Signup/ Signin Forms Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <!-- Signup/ Signin Panel Start -->
                <div id="panel" class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">SIGN IN</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">SIGN UP</a>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <!-- Signup/ Signin Panel Form Content Start -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- Signin Form Content Start -->
                                <form id="login-form" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="log_email" id="log_email" tabindex="1" class="form-control" placeholder="Your Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="log_password" id="log_password" tabindex="2" class="form-control" placeholder="Your Password">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember_me" id="remember_me">
                                        Remember Me
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="row"> -->
                                            <div id="btn_align">
                                                <input type="submit" name="login_submit" id="login_submit" tabindex="4" class="button large" value="Sign In">
                                            </div>
                                        <!-- </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a data-toggle="modal" data-target="#recover_pswd_modal" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form><!-- Signin Form Content End -->

                                <!-- Signup Form Content Start -->
                                <form id="register-form" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="email" name="reg_email" id="reg_email" tabindex="1" class="form-control" placeholder="Your Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="reg_password" id="reg_password" tabindex="2" class="form-control" placeholder="Your Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" id="confirm_password" tabindex="3" class="form-control" placeholder="Confirm Password">
                                    </div>
                                   <!--  <div class="form-group">
                                        <div class="row"> -->
                                            <div id="btn_align">
                                                <input type="submit" name="register_submit" id="register_submit" tabindex="4" class="button large" value="Sign Up">
                                            </div>
                                       <!--  </div>
                                    </div> -->
                                </form> <!-- Signup Form Content End -->
                            </div>
                        </div>
                    </div> <!-- Signup/ Signin Panel Form Content End -->
                </div> <!-- Signup/ Signin Panel End -->
            </div>
        </div>
    </div> <!-- Signup/ Signin Forms End -->


    <!-- Recover Account Modal Start -->
    <div class="modal fade" id="recover_pswd_modal" tabindex="-1" role="dialog" aria-labelledby="recover_pswd_modalLabel" aria-hidden="true">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div id="mdl_tit" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 id="h1font" class="modal-title" id="myModalLabel">Recover Account</h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form  role="form" name="recover_password">
                            <div class="form-group">
                                <input type="text" class="form-control" name="recover_email" id="recover_email" placeholder="Email Address"><br>
                            </div>
                                <p id="recover_button">
                                <button type="submit"  class="button large">SEND</button><br><br>
                                <a id="remeber_link" href="login.php.html">I remembered my password!</a>
                            </p>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Recover Account Modal End -->
</body>
</html>