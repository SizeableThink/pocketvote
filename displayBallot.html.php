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
    <body ng-app="ballotApp" ng-controller="ballotCtrl" id="displayballot">

        <!-- Header -->
            <header id="header">
                <h1><a href="home.html.php">Pocket Vote</a></h1>

                <?php $page = 'five'; include('php/menu.php'); ?>
            </header>

 			<div class="row 150%" style="margin:2em">
				<div class="12u 12u$(medium)">
					<section class="box" id="ballot">
                        	<form method="post" action="php/displayBallot.php?pollid=<?php echo $pollId;?>">
                            <!-- Form start -->
                            	<div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <h2><?php echo $ballotName;?></h2>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <h3><?php echo $ballotType;?></h3>
                                    </div>
                                </div>
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
                                        if($ballotChoiceArray[0]['BallotType'] == "Plurality"){
                                        foreach($ballotChoiceArray as $key => $ballotChoicerow) {
                                            $ballotChoice=$ballotChoiceArray[$key]['BallotChoice'];
                                            $ballotChoiceID=$ballotChoiceArray[$key]['BallotChoice_ID'];
                                        echo "<input type=\"radio\" name=\"ballotChoiceRadio\" value=\"$ballotChoice\">  $ballotChoice<br>";
                                        echo "<input type=\"hidden\" name=\"ballotChoiceID\" value=\"$ballotChoiceID\">";}
                                        }
                                        elseif ($ballotChoiceArray[0]['BallotType'] == "Approval"){
                                        foreach($ballotChoiceArray as $key => $row) {
                                            $ballotChoice=$row['BallotChoice'];
                                            $ballotChoiceID=$row['BallotChoice_ID'];
                                        echo "<input type=\"checkbox\" name=\"ballotChoicecboxes[$key]\" value=\"$ballotChoice\">  $ballotChoice<br>";
                                        echo "<input type=\"hidden\" name=\"ballotChoiceIDs[$key]\" value=\"$ballotChoiceID\">";}
                                        }
                                        elseif ($ballotChoiceArray[0]['BallotType'] == "Ranked Choice"){
                                        foreach($ballotChoiceArray as $key => $ballotChoicerow) {
                                            $ballotChoice = $ballotChoiceArray[$key]['BallotChoice'];
                                            $ballotChoiceID=$row['BallotChoice_ID'];
                                            echo "<label for=\"$ballotChoice\"> $ballotChoice </label>";
                                            echo "<input type=\"number\" min=\"1\" style=\"width: 48px\" class=\"form-control\" name=\"ballotChoices[$key]\" id=\"$ballotChoice\">";
                                            echo "<input type=\"hidden\" name=\"ballotChoiceIDs[$key]\" value=\"$ballotChoiceID\">";
                                        }
                                        }
                                        ?>
                                        </label>
                                        
                                    </div>
                                </div>
                                <br>
                                <br> 
                                <!-- Button -->
                                <div class="row">
                                	<div class="col-md-6 col-sm-12">
                                        <input type="submit" name="ballotchoice_submit" id="ballotchoice_submit" tabindex="3" class="button large" value="Submit Ballot">
                                    </div>
                                </div>
                            </div>
                        </section>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
               