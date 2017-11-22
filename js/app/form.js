$(document).ready(function(){

  var counter = 1;

  $("#addButton").click(function () {

  	   $('#add_textbox').append('<p id="textbox' + counter + '"><input id="input_size" class="choice_ballot_txt' + counter + '" type="text" name="text2" ng-model="newChoice"></p>');  
      counter++;
  });


  $("#remvButton").click(function () {
	if(counter==1){
          alert("No more textboxes to remove");
          return false;
       }

	counter--;
	console.log(counter);

        $("#textbox" + counter).remove();

   });

  

});
