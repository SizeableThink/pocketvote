'use strict';

//console.log("Loaded app.js");

/**
 * creating the Angular app ballotApp and controller ballotCtrl. 
 */

var app = angular.module('ballotApp', []);
app.controller('ballotCtrl', function($scope) {

	//console.log($scope);
	$scope.ballotTypes = [{	
		name: "Ranked Choice",
	}, /*{
		name: "Range Choice",
	},*/{
		name: "Approval",
	}, {
		name: "Plurality",
	}];

	$scope.change = function() {
    	return;
    }

	/**
 	* Declaring choices (array literal)
 	*/

	$scope.choices = [];

	/**
 	* When creating ballot this allows user to add a choice by pushing the string onto the array
 	*/

	$scope.addChoice = function () {
		var resetText = null;
		if ($scope.newChoice != resetText) {
			$scope.choices.push($scope.newChoice);
			$scope.newChoice = resetText;
		}
		//console.log("Logging addChoice")
	};

	/**
 	* Declaring ballots (array literal)
 	*/

	$scope.ballots = [];

	/**
 	* Using the input from users creates the number of ballots requested
 	*/

	$scope.addBallot = function() {
		for(var i=0; i < $scope.ballotNumber; i++) {
			var choiceSelections = [];
			for(var h=0; h < $scope.choices.length; h++){
				choiceSelections.push({
					choice: $scope.choices[h],
					selection: false,
				})
			}
			$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: choiceSelections
			})
		}
	}

	/**
 	* To reload page
 	*/

	$scope.reloadRoute = function() {
   		$window.location.reload();
	}
	
	/**
 	* To clear the ballots
 	*/

	$scope.clearAll = function() {
		$scope.choices = [];
		$scope.ballotName = "";
		$scope.selectedBallotType = "";
		$scope.ballotNumber = 0;
		$scope.ballots = [];
	}
	
	/**
 	* Takes in all user ballots and depending on ballot chosen finds the winner
 	*/

	$scope.findwinner = function() {
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

	/**
 	* Allows plurality to be used on checkboxes and only have one checkbox marked at a time
 	*/

	 $scope.updateSelection = function(position, choiceSelections) {
      angular.forEach(choiceSelections, function(choiceSelection, index) {
      	//console.log("position, choiceSelections", position, choiceSelections);
      	//console.log("choiceSelection, index", choiceSelection, index);
        if (position != index) {
        	console.log("choiceSelection.checked", choiceSelection.checked);
          choiceSelection.selection = false;
      	}
      });
    }

    /**
 	* Demos ranked choice ballot
 	*/

	$scope.testRankedChoice = function() {
		$scope.choices = ["vanilla", "chocolate", "rocky road", "strawberry"];
		$scope.ballotName = "Ice Cream";
		$scope.selectedBallotType = "Ranked Choice";
		$scope.ballotNumber = 5;
		$scope.ballots = [];
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: 1,
				},
				{
					choice: "chocolate",
					selection: 3,
				},
				{
					choice: "rocky road",
					selection: 2,
				},
				{
					choice: "strawberry",
					selection: 4,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: 4,
				},
				{
					choice: "chocolate",
					selection: 3,
				},
				{
					choice: "rocky road",
					selection: 1,
				},
				{
					choice: "strawberry",
					selection: 2,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: 4,
				},
				{
					choice: "chocolate",
					selection: 1,
				},
				{
					choice: "rocky road",
					selection: 3,
				},
				{
					choice: "strawberry",
					selection: 2,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: 4,
				},
				{
					choice: "chocolate",
					selection: 3,
				},
				{
					choice: "rocky road",
					selection: 1,
				},
				{
					choice: "strawberry",
					selection: 2,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: 4,
				},
				{
					choice: "chocolate",
					selection: 1,
				},
				{
					choice: "rocky road",
					selection: 2,
				},
				{
					choice: "strawberry",
					selection: 3,
				}]});
	}

	/**
 	* Demos approval ballot
 	*/

	$scope.testApproval = function() {
		$scope.choices = ["vanilla", "chocolate", "rocky road", "strawberry"];
		$scope.ballotName = "Ice Cream";
		$scope.selectedBallotType = "Approval";
		$scope.ballotNumber = 5;
		$scope.ballots = [];
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: true,
				},
				{
					choice: "chocolate",
					selection: false,
				},
				{
					choice: "rocky road",
					selection: true,
				},
				{
					choice: "strawberry",
					selection: false,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: true,
				},
				{
					choice: "chocolate",
					selection: true,
				},
				{
					choice: "rocky road",
					selection: false,
				},
				{
					choice: "strawberry",
					selection: false,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: false,
				},
				{
					choice: "chocolate",
					selection: true,
				},
				{
					choice: "rocky road",
					selection: true,
				},
				{
					choice: "strawberry",
					selection: true,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: false,
				},
				{
					choice: "chocolate",
					selection: true,
				},
				{
					choice: "rocky road",
					selection: false,
				},
				{
					choice: "strawberry",
					selection: false,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: true,
				},
				{
					choice: "chocolate",
					selection: true,
				},
				{
					choice: "rocky road",
					selection: true,
				},
				{
					choice: "strawberry",
					selection: true,
				}]});
	}

	/**
 	* Demos plurality ballot
 	*/	

	$scope.testPlurality = function() {
		$scope.choices = ["vanilla", "chocolate", "rocky road", "strawberry"];
		$scope.ballotName = "Ice Cream";
		$scope.selectedBallotType = "Plurality";
		$scope.ballotNumber = 5;
		$scope.ballots = [];
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: true,
				},
				{
					choice: "chocolate",
					selection: false,
				},
				{
					choice: "rocky road",
					selection: false,
				},
				{
					choice: "strawberry",
					selection: false,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: false,
				},
				{
					choice: "chocolate",
					selection: true,
				},
				{
					choice: "rocky road",
					selection: false,
				},
				{
					choice: "strawberry",
					selection: false,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: false,
				},
				{
					choice: "chocolate",
					selection: false,
				},
				{
					choice: "rocky road",
					selection: true,
				},
				{
					choice: "strawberry",
					selection: false,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: false,
				},
				{
					choice: "chocolate",
					selection: true,
				},
				{
					choice: "rocky road",
					selection: false,
				},
				{
					choice: "strawberry",
					selection: false,
				}]});
		$scope.ballots.push({
				name: $scope.ballotName,
				type: $scope.selectedBallotType,
				choiceSelections: [{
					choice: "vanilla",
					selection: false,
				},
				{
					choice: "chocolate",
					selection: false,
				},
				{
					choice: "rocky road",
					selection: false,
				},
				{
					choice: "strawberry",
					selection: true,
				}]});
	}

	/**
 	* returns the checked state of a checkbox
 	*/

	var check = function(element) {
    document.getElementById(element).checked = true;
	}

	/**
 	* Placeholder for expansion
 	*/

	var tallyRangeChoice = function() {
		return null;
	}

});
