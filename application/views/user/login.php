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
         
    </form>
</div> 
<script>
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