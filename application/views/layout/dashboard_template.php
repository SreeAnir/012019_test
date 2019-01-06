
       <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
<style type="text/css">
    .parent-container{
            background-color: #F2F2EE;
    padding: 10px;
    width: 70%;
    margin-top: 20px;
    border: 1px solid #ece9e9;
}

 .header{
    padding-left: 10px;
    padding-right: 10px;
 }
 .logout{
    float: right;
 }
</style>
</head>
<body>
    <div class="container-fluid parent-container">
    <div class="header">
        <label class="logout"><a href="<?php base_url();?>login">Logout</a></label>
    <h1>User Header</h1>  
  </div>
  <div class="row content">
<?php $this->load->view($content); ?>
</div>
</div>
 <div class="spinner-loader"style="display:none;">
            <div class="spinloader"></div>
        </div>  
</body>
<style type="text/css">
.spinner-loader {
    background-color: #fff;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10000;
}
.spinloader {
    animation: 1.5s linear 0s normal none infinite running spinloader;
    background: #fed37f none repeat scroll 0 0;
    border-radius: 50px;
    height: 50px;
    left: 50%;
    margin-left: -25px;
    margin-top: -25px;
    position: absolute;
    top: 50%;
    width: 50px;
}
.spinloader::after {
    animation: 1.5s linear 0s normal none infinite running spinloader_after;
    border-color: #85d6de transparent;
    border-radius: 80px;
    border-style: solid;
    border-width: 10px;
    content: "";
    height: 80px;
    left: -15px;
    position: absolute;
    top: -15px;
    width: 80px;
}
@keyframes spinloader {
0% {
    transform: rotate(0deg);
}
50% {
    background: #85d6de none repeat scroll 0 0;
    transform: rotate(180deg);
}
100% {
    transform: rotate(360deg);
}
}
</style>
</html>                                                                 