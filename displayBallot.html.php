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
    <body id="displayballot">


 			<div class="row 150%" style="margin:2em">
				<div class="12u 12u$(medium)">
					<section class="box" id="ballot">
                    	<div class="well-block">
                            <h2>Please fill out the ballot</h2>
                        </div>
                        	<form method="post" action="php/displayBallot.php">
                            <!-- Form start -->
                            	<div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <h4>Ballot Name: <?php echo $ballotName;?></h4>
                                    </div>
                                </div>
                                <br>    
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <h4>Ballot Type: <?php echo $ballotType;?></h4>
                                    </div>
                                </div>
                                <br>
                                <br>	
                                <!-- Text input-->   
                            	<div class="row">
                                	<div class="col-md-6 col-sm-12">
                                    	<label class="control-label" for="ballottype">Make a selection below:</label>
                                	</div>
                            	</div>

                           <!-- Select Ballotchoice_Plurality -->
                               <div class="row">
                                	<div class="col-md-6 col-sm-12">
                                        <?php
                                        if( $ballotChoiceArray[0]['BallotType'] == "Plurality"){
                                        foreach($ballotChoiceArray as $i => $ballotChoicerow) {
                                            $ballotChoice=$ballotChoiceArray[$i]['BallotChoice'];
                                            $ballotChoiceid=$ballotChoiceArray[$i]['BallotChoice_ID'];
                                        echo "<input type=\"radio\" name=\"ballotChoiceRadio\" value=\"$ballotChoiceid\">  $ballotChoice<br>";}
                                        }
                                        elseif ( $ballotChoiceArray[0]['BallotType'] == "Approval"){
                                        foreach($ballotChoiceArray as $i => $ballotChoicerow) {
                                            $ballotChoice = $ballotChoiceArray[$i]['BallotChoice'];
                                            $ballotChoiceid=$ballotChoiceArray[$i]['BallotChoice_ID'];
                                        echo "<input type=\"radio\" name=\"ballotChoiceRadio\" value=\"$ballotChoiceid\">  $ballotChoice<br>";

                                        //echo "<input type=\"checkbox\" name=\"ballotChoicecbox\" value=\"$ballotChoice\">  $ballotChoice<br>";
                                        }
                                        }
                                        elseif ( $ballotChoiceArray[0]['BallotType'] == "RankedChoice"){
                                        foreach($ballotChoiceArray as $i => $ballotChoicerow) {
                                            $ballotChoice = $ballotChoiceArray[$i]['BallotChoice'];

                                            echo "<label for=\"$ballotChoice\"> $ballotChoice </label>";
                                            echo "<input type=\"number\" min=\"1\" style=\"width: 48px\" class=\"form-control\" name=\"$ballotChoice\" id=\"$ballotChoice\"> <br>";
                                        }
                                        }
                                        ?>
                                        </label>
                                        
                                    </div>
                                </div> 
                                <!-- Button -->
                                <div class="row">
                                	<div class="col-md-6 col-sm-12">
                                        <input type="submit" name="ballotchoice_submit" id="ballotchoice_submit" tabindex="3" class="button large" value="Submit BallotChoice">
                                    </div>
                                </div>
                            </div>
                        </section>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
               