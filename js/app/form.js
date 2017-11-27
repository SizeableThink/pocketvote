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

  //Jquery Form Validation

  $.validator.setDefaults({

      errorClass: 'help-block',

      highlight: function(element){
        $(element)
          .closest('.form-group')
          .addClass('has-error');
      },

      unhighlight: function(element){
        $(element)
          .closest('.form-group')
          .removeClass('has-error'); 
      }
  });

  $.validator.addMethod('strongPassword', function(value,element){
      return this.optional(element)
      || value.length >= 6
      && /\d/.test(value)
      && /[a-z]/i.test(value)
      && /[A-Z]/i.test(value)
      && /[~!,@#%&_\$\^\*\?\-]/.test(value);
  }, 'Password must be atleast 6 characters and contain atleast one number, one upper case and a symbol')


  $.validator.addMethod('lettersonly', function(value,element){
      return this.optional(element)
      || value.length >= 3
      && /[a-z]/i.test(value)
      && /[A-Z]/i.test(value)
  }, 'Names should be more than 3 characters')


  //Sign up Validation
  $("#register_form").validate({

    rules:{
      reg_fname:{
        required: true,
        lettersonly: true
      },

      reg_lname:{
         required: true,
         lettersonly: true
      },

      reg_email: {
        required: true,
        email: true,
        remote: {
          url: "php/checkemail.php",
          type: "post",
          async: false
        }
      },

      reg_password: {
        required: true,
        strongPassword: true
      },

      confirm_password:{
        required: true,
        equalTo: "#reg_password"
      }
    },
    messages:{
      reg_email:{
        required: 'Please enter an email address',
        email: 'Please enter a valid email address',
        remote: 'Email already exists'
      },

      reg_fname:{
        required: 'Please enter your First Name'
      },

      reg_lname:{
        required: 'Please enter your Last Name'
      },

      reg_password:{
        required: 'Please enter your password'
      },

      confirm_password:{
        required: 'Please enter your password to confirm',
        equalTo: 'Passwords do not match'
      }
    }
  });


  $("#loginform").validate({
      
      rules:{
          log_password: {
            required: true
          },

          log_email: {
            required: true,
            email: true
          },
      },

       messages:{

          log_password:{
            required: 'Please enter your password'
          },
            
          log_email:{
            required: 'Please enter your email address',
            email: 'Please enter a valid email address'
          }
       },

        submitHandler: submitForm 

    });  

    
    /* login submit */
    function submitForm(){  

      var data = $("#loginform").serialize();
    
      $.ajax({
    
        type : 'POST',
        url  : 'php/sign_up_in.php',
        data : data,
        beforeSend: function(){ 
            $("#error").fadeOut();
        },

        success :  function(response){      
            if(response=="ok"){  
                setTimeout(' window.location.href = "home.html.php"; ');

            }else{
                 $("#error").fadeIn(1000, function(){      
                    $("#error").html(response);
                });
            }
          }
      });
      return false;
  }
});

