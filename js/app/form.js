$(document).ready(function(){

  var counter = 1;

  $("#addButton").click(function () {

  	   $('#add_textbox').append('<p id="textbox' + counter + '"><input id="input_size" class="choice_ballot_txt' + counter + '" type="text" name="text2"> </p>');  
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

  	 // $('#lbl_form').validate({ // initialize the plugin
    //     rules: {
    //         text1: {
    //             required: true,
    //             minlength: 5
    //         },
    //         text2: {
    //             required: true,
    //             minlength: 5
    //         }
    //     }
    // });



  	 $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
  	 
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});


});
