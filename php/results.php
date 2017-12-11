<?php

require_once('config.php');

global $pdo;
//sql here

$ballots = [
    (object) ['name' => 'Favorite Color', 'type' => 'Approval',
    	'choiceSelections' => [(object) ['choice' => 'red', 'selection' => true],
    		(object) ['choice' => 'blue', 'selection' => false],
    		(object) ['choice' => 'yellow', 'selection' => false],
    	]],
    (object) ['name' => 'Favorite Color', 'type' => 'Approval',
    	'choiceSelections' => [(object) ['choice' => 'red', 'selection' => false],
    		(object) ['choice' => 'blue', 'selection' => true],
    		(object) ['choice' => 'yellow', 'selection' => false],
    	]],
    (object) ['name' => 'Favorite Color', 'type' => 'Approval',
    	'choiceSelections' => [(object) ['choice' => 'red', 'selection' => false],
    		(object) ['choice' => 'blue', 'selection' => true],
    		(object) ['choice' => 'yellow', 'selection' => false],
    	]]];

//var_dump($ballots);
echo json_encode($ballots);