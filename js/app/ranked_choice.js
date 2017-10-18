'use strict';

console.log("Loaded ranked_choice.js");

/**
 * Returns the winner of a ranked choice ballot to app.js. 
 *
 * Called in findwinner().
 *
 * @return
 *   Returns a string name of the winner and an array with the history of rounds.
 */

var tallyRankedChoice = function(ballots) {
	//console.log("tallyRankedChoice", ballots);
	var history = [];
	var winner = hasMajority(ballots, history);
	while (!winner) {
		eliminateLastPlace(ballots, history);
		winner = hasMajority(ballots, history);
	}
	return winner;
};

/**
 * Checks the ballots given to see if any choice has a majority
 *
 * Called in tallyRankedChoice().
 *
 * @return
 *   Returns a string of winner is majority is found, false if no majority is found.
 */

var hasMajority = function(ballots, history) {
	//console.log("hasMajority", ballots);
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
	//return string if majority
	//return false if no majority
};

/**
 * Checks each ballot for the lowest ranked choice, if there is a full tie for first place it selects one of them randomly to remove.
 *
 * Called in tallyRankedChoice().
 *
 * @return
 *   Returns the ballots, truncated with last place removed.
 */

var eliminateLastPlace = function(ballots, history) {
	//console.log("eliminateLastPlace", ballots);
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
};

/**
 * Adds counts for all number one choices.
 *
 * Called in eliminateLastPlace().
 *
 * @return
 *   Returns an array of counts for top choice.
 */

var countTopChoice = function(ballots) {
	//console.log("countTopChoice", ballots);
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

/**
 * Checks each ballot to see which choice is number 1
 *
 * Called in countTopChoice().
 *
 * @return
 *   Returns string of top choice per ballot.
 */

var topChoice = function(ballot){
	//console.log("topChoice", ballot);
	var choiceSelections = ballot.choiceSelections;
	var lowestSoFar = {selection: Infinity}
	choiceSelections.forEach(function(choiceSelection){
		if (choiceSelection.selection < lowestSoFar.selection) {
			lowestSoFar = choiceSelection;
		}
	});
	return lowestSoFar.choice;
};

/**
 * Removes last place from ballot.
 *
 * Called in eliminateLastPlace().
 *
 * @return
 *   Returns ballot with last place choice removed.
 */

var removeChoice = function(ballot, lastPlace) {
	//console.log("removeChoice", ballot, lastPlace)
	ballot.choiceSelections = ballot.choiceSelections.filter(function(choiceSelection) {
		return !lastPlace.includes(choiceSelection.choice);
	});
};