<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1080755485440444',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.2'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div class="login-form">
  <?php if($this->session->flashdata('message')!=null){ ?>
  <div class="alert alert-success">
  <?php echo $this->session->flashdata('message');?>
</div>
<?php } ?>
<?php if($this->session->flashdata('error_message')!=null){ ?>
  <div class="alert alert-danger">
  <?php echo $this->session->flashdata('error_message');?>
</div>
<?php } ?>
  
    <form autocomplete="off" id="login-form-" class="form-class" method="post">
         <input autocomplete="off" name="hidden" type="text" style="display:none;">
        <h2 class="text-center">Login</h2>  
	  <?php echo validation_errors(); ?>
      <?php if(isset($error_message)){
      echo "<div class='alert alert-danger'>".$error_message."</div>";
      }?>     
        <div class="form-group">
            <input type="text" name="email"  class="form-control" placeholder="Email" >
        </div>
         <div class="form-group">
            <input autocomplete="off" name="password" type="password" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <button type="submit" id="login_now" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <a href="register" class="pull-right">Register</a>
        </div>     
         <fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
    </form>
</div> 
<script>
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    console.log(response);
    
  });
}
 
</script>
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
            $("#login-form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    },
                messages: {
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
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