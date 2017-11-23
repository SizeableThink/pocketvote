'use strict';

//console.log("Loaded app.js");

/**
 * creating the Angular app ballotApp and controller ballotCtrl. 
 */

var app = angular.module('ballotApp', []);
app.controller('ballotCtrl', function($scope) {

	//console.log($scope);
	$scope.ballotTypes = ballotTypes;

	$scope.change = function() {
    	return;
    }

	//Declaring choices (array literal)
	$scope.choices = [];

 	//When creating ballot this allows user to add a choice by pushing the string onto the array
	$scope.addChoice = function () {
		var resetText = null;
		if ($scope.newChoice != resetText) {
			$scope.choices.push($scope.newChoice);
			$scope.newChoice = resetText;
		}
		//console.log("Logging addChoice")
	};

 	//Declaring ballots (array literal)

	$scope.ballots = [];

	//Using the input from users creates the number of ballots requested

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

 	//To reload page

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

	$scope.findwinner = findwinner;

	/**
 	* Allows plurality to be used on checkboxes and only have one checkbox marked at a time
 	*/

	$scope.updateSelection = updateSelection;

    /**
 	* Demos ranked choice ballot
 	*/

	$scope.testRankedChoice = testRankedChoice; 

	/**
 	* Demos approval ballot
 	*/

	$scope.testApproval = testApproval;

	/**
 	* Demos plurality ballot
 	*/	

	$scope.testPlurality = testPlurality;

	/**
 	* returns the checked state of a checkbox
 	*/

	var check = check;

	/**
 	* Placeholder for expansion
 	*/

	var tallyRangeChoice = function() {
		return null;
	}

});
