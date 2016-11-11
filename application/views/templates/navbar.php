<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Victory !</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/yamm.css">
    <link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/metro.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/metro-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/metro-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/metro-schemes.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>css/docs.css" rel="stylesheet">

    
    

    <script src="<?php echo base_url() ?>js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/metro.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      .segoe{
        font-family: 'Segoe UI';
        font-size: 12px;
        line-height: 30px;
      }
     
      .navbar{
        background-color: #04BFBF;
        height: 50px;
        border:none;
        border-radius: 0px;
      }
      .overlay{
        position: fixed;
        width: 100%;
        height: 0;
        z-index: 1;
        left: 0;
        top: 50px;
        background-color:#FFF;
        overflow-x: hidden;
        overflow-y: hidden;
        -webkit-box-shadow: 0 5px 10px 0 #9E9E9E;
box-shadow: 0 5px 10px 0 #9E9E9E;
        transition: 0.2s;
      }
      .overlay-content{
        position: relative;
        top: 0%;
        width: 100%;
        text-align: center;
        margin-top: 20px;
      }
      .navbar-nav>li{
        border-right: 1px solid #CAFCD8;
      }
      .navbar-nav>li>a{
        color: white !important;
      }
      .navbar-brand{
        border-right: 1px solid #CAFCD8; 
        color: white !important;
      }
    </style>

  </head>
  <body>
  
  <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Toko Kemenangan</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url('formula/home') ?>" ><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                  
              </li>
              <li><a href="#" onclick="openNav(this)"><i class="fa fa-money" aria-hidden="true"></i> Transaksi</a>
                  <div class="overlay">
                    <div class="overlay-content">
                      <div class="tile-small bg-cyan fg-white">
                        <div class="tile-content iconic">
                          <span class="icon mif-cogs"></span>
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <li><a href="#" onclick="openNav(this)"><i class="fa fa-dropbox" aria-hidden="true"></i> Inventory</a>
                  <div class="overlay">
                    <div class="overlay-content">
                      <p>Inventory</p>
                    </div>
                  </div>
              </li>
              <li><a href="#" onclick="openNav(this)"><i class="fa fa-square" aria-hidden="true"></i> Outlets</a>
                  <div class="overlay">
                    <div class="overlay-content">
                      <p>Outlet</p>
                    </div>
                  </div>
              </li>
              <li><a href="#" onclick="openNav(this)"><i class="fa fa-phone" aria-hidden="true"></i> Kontak</a>
                  <div class="overlay">
                    <div class="overlay-content">
                      <p>Kontak</p>
                    </div>
                  </div>
              </li>
              <li><a href="#" onclick="openNav(this)"><i class="fa fa-cog" aria-hidden="true"></i> Konfigurasi</a>
                  <div class="overlay">
                    <div class="overlay-content">
                      <p>Konfigurasi</p>
                    </div>
                  </div>
              </li>
            
            </ul>
           
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
  </header>
  <div class="container">
    <?php echo $body ?>
  </div>
  
  <footer></footer>
    <script>
      function openNav(el){
        if($(el).parent('li').hasClass('buka')){
          $(el).parent('li').find('.overlay').css('height', 0);
          $(el).parent('li').removeClass('buka');
        }else{
          $('.navbar-collapse').find('li').removeClass('buka');
          $('.navbar-collapse').find('.overlay').css('height', 0);
          $(el).parent('li').addClass('buka');
          $(el).parent('li').find('.overlay').css('height','75%');
        } 
        
      }
    </script>
  </body>
</html>