var ballotTypes = [{	
		name: "Ranked Choice",
	}, /*{
		name: "Range Choice",
	},*/{
		name: "Approval",
	}, {
		name: "Plurality",
	}];

var addChoice = function () {
		var resetText = null;
		if ($scope.newChoice != resetText) {
			$scope.choices.push($scope.newChoice);
			$scope.newChoice = resetText;
		}
		//console.log("Logging addChoice")
	};

var updateSelection = function(position, choiceSelections) {
      angular.forEach(choiceSelections, function(choiceSelection, index) {
      	//console.log("position, choiceSelections", position, choiceSelections);
      	//console.log("choiceSelection, index", choiceSelection, index);
        if (position != index) {
        	console.log("choiceSelection.checked", choiceSelection.checked);
          choiceSelection.selection = false;
      	}
      });
    }

var check = function(element) {
    document.getElementById(element).checked = true;
	}

var findwinner = function() {
		//console.log($scope.ballots);
		var ballotsCopy = $.map($scope.ballots, function (ballot) {
			return $.extend(true, {}, ballot);
		});
		//console.log(ballotsCopy);
		switch($scope.selectedBallotType) {
    		case "Ranked Choice":
        		var results = tallyRankedChoice(ballotsCopy);
        		$scope.winner = results[0];
        		$scope.history = results[1];
        		break;
    		/*case "Range Choice":
        		$scope.winner = tallyRangeChoice();
        		break;*/
        	case "Approval":
        		var results = tallyApproval(ballotsCopy);
        		$scope.winner = results[0];
        		$scope.counts = results[1];
        		break;
        	case "Plurality":
        		var results = tallyPlurality(ballotsCopy);
        		$scope.winner = results[0];
        		$scope.counts = results[1];
        		break;
    		default:
        		return null;
		}
	}