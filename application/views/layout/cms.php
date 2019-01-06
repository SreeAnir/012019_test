
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
    margin-top: 50px;
    border: 1px solid #ece9e9;
    -webkit-box-shadow: 15px -12px 101px -20px rgba(161,159,161,1);
-moz-box-shadow: 15px -12px 101px -20px rgba(161,159,161,1);
box-shadow: 15px -12px 101px -20px rgba(161,159,161,1);
 }

 .header{
    padding-left: 10px;
    padding-right: 10px;
    background-color: #999999;
    height: 80px;
    color: #f0f0f2;
    text-align: center;
 }
 .menuList li:last-child{
  }
 .menuList li{
    display: inline-block;
    min-width: 120px;
    border: 0.5px solid #858383;
    padding:5px 5px 5px;
    cursor: pointer;
    background-color:#858383;
 }
 .menuList li:hover{
     background-color:#474647;
    border: 0.5px solid #858383;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);


  }
 .menuList li a{
    color: #FFF;
    text-transform: uppercase;
     min-width: 120px;
     text-decoration: none;
 }
 .menuList li a:focus{
     text-decoration: none;
 }
 .logo{
   
height: 30px;
 }

 @media only screen and (max-width: 1026px) {
  .parent-container{
    width: 100%;
  }
}
@media only screen and (max-width: 745px) {
  
  .menuList li{
    min-width: 50px;
  }
}
 
</style>
</head>
<body>
    <div class="container-fluid parent-container">
    <div class="header">
        <div class="col-xs-12  col-md-12  " ><div class="logo"><h4>Admin Header</h4></div> </div>
         <div class="col-xs-12   col-md-12 ">
            <div class="navigation">
                <ul class="menuList">
                    <li><a href="<?php echo base_url() ; ?>admin/userlist/1">Users</a></li>
                      <li><a href="<?php echo base_url();?>">Back To page</a></li>
                      <li><a>Page Two</a></li>
                </ul>
            </div>
          </div>
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