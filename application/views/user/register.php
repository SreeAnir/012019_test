<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register Now</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form .form-class {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form autocomplete="off" class="form-class" action="authenticate" method="post">
         <input autocomplete="off" name="hidden" type="text" style="display:none;">
        <h2 class="text-center">Register</h2>       
        <div class="form-group">
            <input type="text"  class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input autocomplete="off" type="text"  class="form-control" placeholder="name" required="required">
        </div>
            <div class="form-group">
            <input autocomplete="off" type="password" class="form-control" placeholder="Password" required="required">
        </div>
         <div class="form-group">
            <input autocomplete="off" type="password" class="form-control" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <div class="clearfix">
            <a href="login" class="pull-right">Back To Log in</a>
        </div>        
    </form>
</div>
</body>
</html>                                		                            