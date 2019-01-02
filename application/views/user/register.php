
<div class="login-form">
<?php echo validation_errors(); ?>

    <form autocomplete="off" id="register-form___" class="form-class" action="authenticate" method="post">
         <input autocomplete="off" name="hidden" type="text" style="display:none;">
        <h2 class="text-center">Register</h2>

        <div class="form-group">
            <input name="firstname" autocomplete="off" type="text"  class="form-control" placeholder="First Name" required="required">
        </div>
        <div class="form-group">
            <input  name="lastname" autocomplete="off" type="text"  class="form-control" placeholder="Last Name" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="email"  class="form-control" placeholder="Email" required="required">
        </div>
            <div class="form-group">
            <input autocomplete="off" name="password" type="password" class="form-control" placeholder="Password" required="required">
        </div>
         <div class="form-group">
            <input autocomplete="off" name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" required="required">
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
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
