<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '289935414878093',
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

<script>
   

function initMap(){
  var watchID;
    var log = $("#log");

 watchID = navigator.geolocation.watchPosition(showPosition, positionError);
 function showPosition(position) {

   logMsg("Showing current position.");

   var coords = position.coords;
   $("#clat").val(coords.latitude);
   $("#clng").val(coords.longitude);

   // var clat = latitude.dataset.decoder;
   // var clng = longitude.dataset.decoder;

   // clat.value = position.coords.latitude;
   // clng.value = position.coords.longitude;

   // mapLink.attr("href", "http://maps.google.com/maps?q=" + $("#clat").val() + ",+" + $("#clng").val() + "+(You+are+here!)&iwloc=A&hl=en");

   // mapLink.show();
  }

  function positionError(e) {
   switch (e.code) {
    case 0:
     logMsg("The application has encountered an unknown error while trying to determine your current location. Details: " + e.message);
     break;
    case 1:
     logMsg("You chose not to allow this application access to your location.");
     break;
    case 2:
     logMsg("The application was unable to determine your location.");
     break;
    case 3:
     logMsg("The request to determine your location has timed out.");
     break;
   }
  }

  function logMsg(msg) {
   log.append("<li>" + msg + "</li>");
  }
}
</script>
 <div class="spinner-loader" style="display:none;">
            <div class="spinloader"></div>
        </div> 
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
  <ul style="display:none" id="log"></ul>
 
    <form autocomplete="off" id="login-form-" class="form-class" method="post">
         <input autocomplete="off" name="hidden" type="text" style="display:none;">
        <h2 class="text-center">Login</h2>  
	  <?php echo validation_errors(); ?>
      <?php if(isset($error_message)){
      echo "<div class='alert alert-danger'>".$error_message."</div>";
      }?>     
      <input type="hidden" id="clat" name="clat" />
    <input type="hidden" id="clng" name="clng" />
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
function makeLogin() {
  $('.spinner-loader').show();
  FB.api('/me', function (response) {
    response.clat=$('#clat').val();
    response.clng=$('#clng').val();
    console.log(response);
    if(response.id!=""){

  $.post("FB_auth",
  {
  response,
  },
  function(data, status){

   if(status){
    window.location="home";
   }else{
     $('.spinner-loader').hide();
   }
  });
}else{
  alert("Failed to Login.");
}

});
}

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    console.log(response);
    makeLogin();
    
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
  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
