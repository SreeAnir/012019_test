    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
      <header class="header">
     

      </header>
    <div class="container">
        <div class="mini-container">
            <div class="well inner-div">
                   <h4 class="title">Sample project</h4>
                  <p class="login-btn">
                   <a class="login-user" href="<?php echo base_url();?>login">User Module</a>
                    <a class="login-admin"  href="<?php echo base_url();?>admin">Admin Module</a>
                </p>
                   </p>
    </div>
    </div>
    </div>
    <footer class="footer">

    <p>Created By </p> 
      <p><a  target="_blank" href="https://in.linkedin.com/in/sreekala-anirudhan-1026">Sreekala Anirudhan</a></p>   
      </footer>
    <style type="text/css">
    .mini-container{
        width: 90;
        margin:0 auto;
        text-align: center;
    }
    .inner-div{
        margin-top: 50px;
    }
    .login-btn{
 background-color:#337ab7;
 color: #FFF;
 width:300px;
 margin:0 auto;
 border-radius: 5px;
padding: 5px; 
    }
     .login-user{
        border-right: 2px solid #FFF;
        padding-right: 5px;
     }
     .login-btn a{
         width:150px;
color:#FFF;
text-decoration: none;
     }
     .login-btn a:hover{
text-decoration: none;
color:yellow;
     }
    .login-user{
      }
    .login-admin{
         padding-left: 3px;
     }

    .header{
     position: fixed;
      left: 0;
      top: 0;
      height:20px;
      width: 100%;
      background-color: #f5f5f5;
      color: #f5f5f5;
      text-align: center;
    }
    .title{
       color: #337ab7;  
    }
    .footer{
        position: fixed;
      left: 0;
      bottom: 0;
      padding: 10px;
      width: 100%;
      background-color: #f5f5f5;
      color:#337ab7;
      text-align: center;
    }
    </style>

    </body>
    </html>
