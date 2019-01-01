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
    <form autocomplete="off" id="loginForm" class="form-class" action="authenticate" method="post">
         <input autocomplete="off" name="hidden" type="text" style="display:none;">
        <h2 class="text-center">Login</h2>       
        <div class="form-group">
            <input type="text"  class="form-control" placeholder="Email" required="required">
        </div>
         <div class="form-group">
            <input autocomplete="off" type="password" class="form-control" placeholder="Confirm Password" required="required">
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
$(document).ready(function(){
    $('#login_now').click(function(){
       if($("#loginForm").validate()){
        alert("DONE");
       }else{
        alert("Notyet");
       }
        return false;

    });
});
</script>