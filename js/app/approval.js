'use strict';

console.log("Loaded approval.js");

var tallyApproval = function(ballots) {
	var voteCounts = countChoice(ballots);
	var highestSoFar = -Infinity;
	var winner = [];
	console.log(voteCounts);
	for (var choice in voteCounts) {
		console.log("choice", choice);
		if (voteCounts.hasOwnProperty(choice)){
			var v = voteCounts[choice];
			console.log("v", v);
			if (v > highestSoFar) {
				highestSoFar = voteCounts[choice];
				console.log("highestSoFar", highestSoFar);
			}
		}
	}	
	for (var choice in voteCounts) {
		if (voteCounts.hasOwnProperty(choice)) {
			var v = voteCounts[choice];
			if (v === highestSoFar) {
				winner.push(choice);
			}
		}
	}
	console.log(winner, voteCounts);
	return [winner, voteCounts];
};

var countsList = function(ballots){
	var voteCountsList = [];
	console.log("ballots", ballots)
	ballots.forEach(function(ballot) {
		console.log("ballot.choiceSelections", ballot.choiceSelections)
		for (var i in ballot.choiceSelections){
			if (ballot.choiceSelections[i].selection === true){
				voteCountsList.push(ballot.choiceSelections[i].choice);
			}
		}
	});
	return voteCountsList;
}

var countChoice = function(ballots) {
	var voteCountsList = countsList(ballots);
	console.log("voteCountsList", voteCountsList)
	var voteCountDictionary = {};
	for (var i = 0; i < voteCountsList.length; i++) {
		voteCountDictionary[voteCountsList[i]] = (voteCountDictionary[voteCountsList[i]] || 0) + 1;
	}
	return voteCountDictionary;
}
