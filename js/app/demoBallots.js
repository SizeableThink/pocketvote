'use strict';

console.log("Loaded demoBallots.js");

demoRankedChoice = function() {
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


	demoApproval = function() {
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

	demoPlurality = function() {
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