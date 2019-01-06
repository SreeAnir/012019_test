
<div class="login-form">
<?php echo validation_errors(); ?>
<?php if(isset($error_message)){
echo "<div class='alert alert-danger'>".$error_message."</div>";
}?>
    <form autocomplete="off" id="register-form" class="form-class"  method="post">
         <input autocomplete="off" name="hidden" type="text" style="display:none;">
        <h2 class="text-center">Register</h2>

        <div class="form-group">
            <input name="firstname" value="<?=set_value('firstname')?>" autocomplete="off" type="text"  class="form-control" placeholder="First Name" >
        </div>
        <div class="form-group">
            <input  name="lastname" value="<?=set_value('lastname')?>"  autocomplete="off" type="text"  class="form-control" placeholder="Last Name" >
        </div>
		  <div class="form-group">
		  <p><label>
		 Gender
		 </label></p>
		 <p  id="gender_div">
           <label>Male <input  type="radio"  value="male"   name="gender" ></label>
		  <label> Female <input  type="radio"  value="female"   name="gender" ></label>
		  <label> Others <input  type="radio"  value="other"   name="gender" ></label>
		  </p>
        </div>
        <div class="form-group">
            <input type="text" name="email" value="<?=set_value('email')?>"   class="form-control" placeholder="Email" >
        </div>
            <div class="form-group">
            <input autocomplete="off" name="password" value="<?=set_value('password')?>"  id="password" type="password" class="form-control" placeholder="Password" >
        </div>
         <div class="form-group">
            <input autocomplete="off" name="confirm_password" value="<?=set_value('confirm_password')?>"  type="password" class="form-control" placeholder="Confirm Password" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <div class="clearfix">
            <a href="login" class="pull-right">Back To Log in</a>
        </div>
    </form>
</div>
<script type="text/javascript">
/**
  * Basic jQuery Validation Form Demo Code
  * Copyright Sam Deering 2012
  * Licence: http://www.jquery4u.com/license/
  */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
					gender: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
					gender: "Choose Your Gender",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo:"Did not match with Password."
                        
                    },
                    email: "Please enter a valid email address",
                },
                submitHandler: function(form) {
                    form.submit();
                },
				errorPlacement: function(error, element) {
  if (element.attr("name") == "gender") {
     error.insertAfter("#gender_div");
  } else {
     error.insertAfter(element);
  }
},
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
