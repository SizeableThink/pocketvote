'use strict';

console.log("Loaded ranked_choice.js");

var tallyRankedChoice = function(ballots) {
	console.log("tallyRankedChoice", ballots);
	var history = [];
	var winner = hasMajority(ballots, history);
	while (!winner) {
		eliminateLastPlace(ballots, history);
		winner = hasMajority(ballots, history);
	}
	return winner;
};

var hasMajority = function(ballots, history) {
	console.log("hasMajority", ballots);
	var highestSoFar = {count: -Infinity};
	var total = 0;
	var countsDictionary = countTopChoice(ballots);
	history.push({
		type: "count",
		value: countsDictionary});
	for (var choice in countsDictionary) {
		if (countsDictionary.hasOwnProperty(choice)) {
			var v = countsDictionary[choice];
			if (v > highestSoFar.count) {
				highestSoFar = {choice: choice,
								count: v};
			}
			total += v;
		}
	}
	if (highestSoFar.count > (total/2)) {
		history.push({
		type: "statement",
		value: 'Winner is ' + highestSoFar.choice});
		return [highestSoFar.choice, history];
	}
	return false;
	//return string of majority
	//return false if no majority
};

var eliminateLastPlace = function(ballots, history) {
	console.log("eliminateLastPlace", ballots);
	var countsDictionary = countTopChoice(ballots);
	var lowestSoFar = Infinity;
	var lastPlace = [];
	for (var choice in countsDictionary) {
		if (countsDictionary.hasOwnProperty(choice)) {
			var v = countsDictionary[choice];
			if (v < lowestSoFar) {
				lowestSoFar = countsDictionary[choice];
			}
		}
	}
	for (var choice in countsDictionary) {
		if (countsDictionary.hasOwnProperty(choice)) {
			var v = countsDictionary[choice];
			if (v === lowestSoFar) {
				lastPlace.push(choice);
			}
		}
	}
	if (lastPlace.length === ballots[0].choiceSelections.length){
	//in case of a full first place tie - random removal
		var rand = lastPlace[Math.floor(Math.random() * lastPlace.length)];
		lastPlace = [rand];
		}
	ballots.forEach(function(ballot) {
		removeChoice(ballot, lastPlace);
	});
	history.push({
		type: "statement",
		value: 'Eliminate: ' + lastPlace});
	//return ballots, new truncated ballots
};

var countTopChoice = function(ballots) {
	console.log("countTopChoice", ballots);
	var counts = {};
	ballots.forEach(function(ballot) {
		var c = topChoice(ballot);
		if (!counts[c]){
			counts[c] = 0;
		}
		counts[c] += 1;
	});
	return counts;
};

//topChoice goes through each ballot and sees which choice has the highest rank (highest being 1)
var topChoice = function(ballot){
	console.log("topChoice", ballot);
	var choiceSelections = ballot.choiceSelections;
	var lowestSoFar = {selection: Infinity}
	choiceSelections.forEach(function(choiceSelection){
		if (choiceSelection.selection < lowestSoFar.selection) {
			lowestSoFar = choiceSelection;
		}
	});
	return lowestSoFar.choice;
};

var removeChoice = function(ballot, lastPlace) {
	console.log("removeChoice", ballot, lastPlace)
	ballot.choiceSelections = ballot.choiceSelections.filter(function(choiceSelection) {
		return !lastPlace.includes(choiceSelection.choice);
	});
};

var logCounts = function(ballots){
	
	return null;
}

/*var isFullTie = function(countsDictionary, ballots) {
	console.log("isFullTie", countsDictionary, ballots);
	var numberOfSelections = ballot.choiceSelections.length;
	if (numberOfSelections > Object.key(countsDictionary).length) {
		return false;
	}
	for (var i = 0, l = Object.key(countsDictionary).length; i < l; i++) {
        if(countsDictionary[i] !== countsDictionary[0])
        	return false;
    }
    return true;
}*/

/*var tallyRankedChoice = function() {
		var tally = {};
		for(var i = 0; i < $scope.ballots.length; i++) {
			var currentBallot = $scope.ballots[i];
			for (var j = 0; j < currentBallot.choiceSelections.length; j++) {
				var currentChoice = currentBallot.choiceSelections[j].choice;
				if(!tally[currentChoice]) {
					tally[currentChoice] = [];
				}
				var currentSelection = currentBallot.choiceSelections[j].selection;
				if(currentSelection != null) {
					tally[currentChoice].push(currentSelection)
				}
				//var counts = {};
				//currentChoice.forEach(function(x) { counts[x] = (counts[x] || 0)+1; });
			}
		}
		return tally;
	}*/