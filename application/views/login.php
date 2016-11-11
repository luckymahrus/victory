<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login - Victory</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/yamm.css">
    <link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      body{
        background: #f0eff0;
      }
      .card{
        text-align: center;
        border: 1px solid #3498db;
        
      }
      .card-header{
        background-color: #3498db;
        color: white;
        padding: 20px 0;
      }
      .card-header h2{
        margin:0;
      }
      .card-body{
        background-color: white;
        padding: 20px;
      }
    </style>

  </head>
  <body>

    <div class="container">
      <div class="row" style="margin: 11% 0;">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
      
          <div class="card">
            <div class="card-header">
              <h2>Login</h2>  
            </div>
            <div class="card-body">
              
              <div class="form-group" style="margin-top:40px; ">
                <input type="text" name="username" placeholder="Username" class="form-control" aria-describedby="username-addon">
              </div>
              <div class="form-group" style="margin-top:20px; ">                    
                <input type="password" name="password" placeholder="Password" class="form-control" aria-describedby="username-addon">
              </div>
              <div class="form-group">
                <a href="<?php echo base_url('formula/home') ?>" class="form-control" style="margin-top: 20px; background-color: #3498db; color: white; ">
                  Log In
                </a>
              </div>
            </div>
          </div>

        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>
    
  </body>
</html>