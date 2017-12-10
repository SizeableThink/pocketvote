<?php
 include('php/displayBallot.php');
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
        <script src="js/init.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script src="js/app/ranked_choice.js"></script>
        <script src="js/app/approval.js"></script>
        <script src="js/app/plurality.js"></script>
        <script src="js/app/demoBallots.js"></script>
        <script src="js/app/ballot.js"></script>
        <script src="js/app/app.js"></script>
        <script src="js/app/form.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/style-xlarge.css" />
        </noscript>
    </head>
    <body id="displayballopg">


 <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well-block">
                        <div class="well-title">
                            <h2>Please fill the ballot</h2>
                        </div>
                        <form>
                            <!-- Form start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="ballottype">Ballottype</label>
                                        <input id="ballottype" name="approval" type="text" placeholder="ballotname" class="form-control input-md" value="<?php echo $ballottype;?>" >
                                   </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="ballotname">Ballotname</label>
                                        <input id="ballotname" name="ballotname" type="text" placeholder="ballotname" class="form-control input-md" value="<?php echo $ballottname;?>" >
                                    </div>
                                </div>
                            <!-- Select Ballotchoice_RankedChoice -->                  
                                 <div class="container">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <form>
                                                <div class="form-group">
                                                   
                                                    <label>Multiple selects</label>
                                                    <div class="form-group input-group">
                                                        <select name="multiple[]" class="form-control">
                                                            <option value="">Default select</option>
                                                            <option value="">Option 1</option>
                                                            <option value="">Option 2</option>
                                                        </select>
                                                        <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+</button></span>
                                                    </div>
                                                   
                                                </div>
                                            </form>
                                        </div>        
                                    </div>
                                </div>
                                                            

                         <!-- Select Ballotchoice_Plurality -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="appointmentfor">Selection</label>
                                        <select id="appointmentfor" name="appointmentfor" class="form-control">
                                            <option value="Service#1">Service#1</option>
                                            <option value="Service#2">Service#2</option>
                                            <option value="Service#3">Service#3</option>
                                            <option value="Service#4">Service#4</option>
                                        </select>
                                    </div>
                                </div>
                         <!-- Select Ballotchoice_Approval -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="appointmentfor">Selection</label>
                                        <select id="appointmentfor" name="appointmentfor" class="form-control">
                                            <option value="Service#1">Service#1</option>
                                            <option value="Service#2">Service#2</option>
                                            <option value="Service#3">Service#3</option>
                                            <option value="Service#4">Service#4</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-default">Click here to submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
               