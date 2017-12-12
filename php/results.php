<?php

require_once('config.php');
global $pdo;
    
    $pollID = $_GET['pollid'];
    $query = "SELECT BallotName, BallotType FROM Poll WHERE PollID = :pollid";
    $poll = $pdo->prepare($query);
    $poll->bindValue(':pollid', $pollID);
    $poll -> execute();
    $row = $poll->fetch(PDO::FETCH_ASSOC);
    $ballotName = $row['BallotName'];
    $selectedBallotType = $row['BallotType'];

    class User {};
    $newOptions = array();

    //Get the list of Voters, choices and their selections
    $query2 = "SELECT Ballot.BallotID , Poll.BallotName AS name, Poll.BallotType AS type, Ballot_Choice.BallotChoice AS choice,Selected_Ballot_Choices.Selection AS selection FROM Poll, Ballot_Choice, Ballot, Selected_Ballot_Choices WHERE Poll.PollID = :pollid AND Ballot_Choice.PollID = :pollid AND Ballot.PollID = :pollid AND Ballot.BallotID = Selected_Ballot_Choices.BallotID AND Ballot_Choice.BallotChoice_ID = Selected_Ballot_Choices.BallotChoice_ID ";
      
    $poll_data = $pdo->prepare($query2);
    $poll_data->bindValue(':pollid', $pollID);
    $poll_data -> execute();

    // $row = $poll_data->fetchALL(PDO::FETCH_CLASS);
    $ballots = new stdClass();
    $allBallots = array();
    $newChoiceSelections = array();

    while($row = $poll_data->fetch(PDO::FETCH_ASSOC)){
        $ballotid = $row['BallotID'];
        $ballotChoice = $row['choice'];
        $selectionChoice = $row['selection'];
        //$choiceSelections[$ballotChoice] = $selectionChoice;
        //echo $ballotid;
        //echo $ballotChoice;
        //echo $selectionChoice;
        $choiceSelections = array('choice' => $ballotChoice, 'selection' => $selectionChoice);
        array_push($newChoiceSelections, $choiceSelections);

        //var_dump($newChoiceSelections);
        
        //.= [
          //(object) array('name' => $ballotName, 'type' => $selectedBallotType,'choiceSelections' => $choiceSelections)
          //];
        
          //(object) ['name' => '$ballotName', 'type' => '$selectedBallotType', '$choiceSelections' => (object)];
            //foreach ($choiceSelections as $choice => $selection) {
              //$ballots['choiceSelections'][] = object  [['choice' => '$choice', 'selection' => '$selection'],
        //}
        //]],];;     
      }

      $ballots->name = $ballotName;
        $ballots->type = $selectedBallotType;
        $ballots->choiceSelections = $newChoiceSelections;
        array_push($allBallots, $ballots);

     echo json_encode($allBallots);

    //   $ballots[] -> name = $ballotName;
    //   $ballots[] -> type = $selectedBallotType;

    // var_dump($newOptions);
    // echo "<br><br><br>";
    // echo json_encode($newOptions);

    // echo "<br><br><br>";
    // print("<pre>".print_r($newOptions,true)."</pre>");
    // echo "<br><br><br>";

    // class choiceSelections {
    //     // public $name;
    //     // public $type;
    //     // public $choiceSelections;
    //     // public $choice;
        
    //     // public $value;
    // }

    
    
    // $ballots = [
    // (object) ['name' => 'Favorite Color', 'type' => 'Approval',
    //     'choiceSelections' => [(object) ['choice' => 'red', 'selection' => true],
    //         (object) ['choice' => 'blue', 'selection' => false],
    //         (object) ['choice' => 'yellow', 'selection' => false],
    //     ]],
    // (object) ['name' => 'Favorite Color', 'type' => 'Approval',
    //     'choiceSelections' => [(object) ['choice' => 'red', 'selection' => false],
    //         (object) ['choice' => 'blue', 'selection' => true],
    //         (object) ['choice' => 'yellow', 'selection' => false],
    //     ]]];


    
    
    // $newBallots = array();
    // $newarr = array();
    // foreach($newOptions as $ball => $values){
    //     $newKey = "";
    //     $newValue ="";

    //     $newBallots = [
    //             (object) ['name' => $ballotName, 'type' => $selectedBallotType,'choiceSelections' => [(object)[$newarr]]]];
    //     foreach ($values as $key => $value) {
    //         $newKey = $key;
    //         $newValue = $value;
    //         $newarr = ['choice' => $newKey, 'selection' => $newValue];
    //         // $newBallots = [];
    //     }
    // }


// $newBallot = array();

// foreach($newOptions as $ball => $values){
// //     print("<pre>".print_r($ballotArrayKey,true)."</pre>");
// //     print("<pre>".print_r($ballotArrayValue,true)."</pre>");
//     foreach ($values as $key => $value) {
//     $newBallot = [(object)['choiceSelection' => $key]];
//     }
// }

        // echo "<br>New Ballots<br>";
        // print("<pre>".print_r($newBallots,true)."</pre>");
       
        // echo "<br>Ballots<br>";
        // echo json_encode($ballots);
        // echo "<br>Ballots<br>";
        // echo json_encode($ballots);


    // echo "<br><br><br>";
    // // print_r($newBallots);
    // echo json_encode($newBallots);

    // echo "<br><br><br>";
    // echo '<div>
    //     <p>
    //       <h4>'. $ballotName.'</h4>
    //       <h4>'. $selectedBallotType.'</h4>
    //       <h4>'. $row['BallotChoice_ID'].'</h4>
    //       <h4>'. $row['Selection'].'</h4>
    //     </p>
    //   </div>';

    // $ballots = []
   
    //$choiceselections = [choiceName, selection] (i.e. chocolate, 2)
    // $ballots .= [
    //   (object) ['name' => '$ballotName', 'type' => '$selectedBallotType',
    //   //foreach loop for choiceselections?
    //   'choiceSelections' .=> [(object) ['choice' => 'choiceName', 'selection' => $selection],
    //   ]],];;
//   }

// print_r($ballots);

 
  
    

// echo "<br>new<br>";
// $json = json_encode($newOptions);
// var_dump($json);
// $js = json_decode($json,true);
// var_dump($js);



// $newBallots = array();

// foreach($js['league'] as $key=>$val){// this can be ommited if only 0 index is there after 
// //league and $data['league'][0]['events'] can be used in below foreach instead of $val['events'].
//       foreach($val['events'] as $keys=>$value){
//         echo $value['home'].' v '.$value['away']};
//  }
// }
    // foreach($newOptions as $ball => $value){
    //     $selection = new choiceSelections();
    //     $element = 'choice'; 
    //     echo $selection -> $element = $ball[$value];
    //     // // // $selection -> $value = $ball[$selection -> $choiceid];
    //     $newBallots[] = $selection;
    // }

//     print_r($newBallots);
// foreach($categ as $key => $category){
//     $init->name = $ballotName;
//     $init->type = $selectedBallotType;
//     // echo $key.'<br/>';
//     foreach($category as $item){
//        $init->choiceSelections->choice=$item;
//        $init->choiceSelections->selection = $item;
//     }
    // var_dump($categ);
// }


// $i=0;
// while($b->{'resultList'}[$i])
// {
//     print_r($b->{'resultList'}[$i]->{'displayName'});
//     echo "<br />";
//     $i++;
// }

// for ( $i=0; $i<sizeof($newOptions); $i++){
//         // $init->bar = new stdClass;
//         $init->name = $ballotName;
//         $init->type = $selectedBallotType;
//         $init->choiceSelections->choice = $newOptions[$i];
// }

//      $init->bar = new stdClass;
//     $init->bar->name = $ballotName;
//     $init->bar->type = $selectedBallotType;
//     $init->bar->choiceSelections = new stdClass;
    // $init->bar->choiceSelections->choice = $row['BallotChoice_ID'];
    // $init->bar->choiceSelections->selection = $row['Selection'];

// $b=json_encode($newOptions);
// echo "<br>encode<br>";
// echo $b;
// $c = json_decode($b);
// echo "<br>decode<br>";
// echo $c;
// // var_dump(json_decode($newOptions, TRUE));
// // var_dump(sizeof($newOptions));

// $ballots = array();

// for ( $i=0; $i<sizeof($newOptions); $i++){
//     (object) ['name' => $ballotName, 'type' => $selectedBallotType,
//      'choiceSelections' => [(object) ['choice' => $row['BallotChoice_ID'], 'selection' =>$row['Selection']]
//      ]];
// }

// // Create new stdClass Object
//     $init = new stdClass;

//     // Add some test data


// for ( $i=0; $i<sizeof($newOptions); $i++){
//     // $arrayIndex = $newOptions[$i];
//     // echo $arrayIndex;
   

// }
    // $init->foo = "(object)";
    // $init->bar = new stdClass;
    // $init->bar->baaz = "Testing";
    // $init->bar->fooz = new stdClass;
    // $init->bar->fooz->baz = "Testing again";
    // $init->foox = "Just test";

//sql here

// $ballots = [
//     (object) ['name' => 'Favorite Color', 'type' => 'Approval',
//      'choiceSelections' => [(object) ['choice' => 'red', 'selection' => true],
//        (object) ['choice' => 'blue', 'selection' => false],
//        (object) ['choice' => 'yellow', 'selection' => false],
//      ]],
//     (object) ['name' => 'Favorite Color', 'type' => 'Approval',
//      'choiceSelections' => [(object) ['choice' => 'red', 'selection' => false],
//        (object) ['choice' => 'blue', 'selection' => true],
//        (object) ['choice' => 'yellow', 'selection' => false],
//      ]]];

// // var_dump($ballots);
//     echo json_encode($ballots);



    // echo $ball;
        // echo $value;

        // echo "<br><br>";
        // print("<pre>".print_r($ball,true)."</pre>");
        // echo "<br>ghhgjgh<br>";
        // print("<pre>".print_r($values,true)."</pre>");
    ?>