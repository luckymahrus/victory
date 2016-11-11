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
        background-color:#fff;
        overflow-x: hidden;
        overflow-y: scroll;
        -webkit-box-shadow: 0 7px 10px 0 #9E9E9E;
        box-shadow: 0 7px 10px 0 #9E9E9E;
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
      .tile-group-title{
        color: black !important;
        text-transform: uppercase;
      }
      .buka{
        background-color: #FFFFFF;
      }
      .buka a:visited{
        color: #04BFBF !important;
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

                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div style="margin:0 5%">
                      <div class="tile-group triple" >
                        <span class="tile-group-title">Penjualan</span>
                          <div class="tile-container">
                              <div class="tile-large fg-white" data-role="tile" style="background-color: #734ACC">
                                <div class="tile-content iconic">
                                  <span class="icon mif-coins mif-ani-slow mif-ani-bounce"></span>
                                  <span class="tile-label">Daftar Penjualan</span>
                                </div>
                              </div>
                              <div class="tile fg-white" data-role="tile" style="background-color: #905CFF">
                                <div class="tile-content iconic">
                                  <span class="icon mif-plus"></span>
                                  <span class="tile-label">Penjualan Baru</span>
                                </div>
                              </div>    
                              <div class="tile fg-white" data-role="tile" style="background-color:  #4383E8">
                                <div class="tile-content iconic">
                                  <span class="icon mif-checkmark"></span>
                                  <span class="tile-label">Booking Baru</span>
                                </div>
                              </div>    
                              <div class="tile-wide tile-big-x fg-white" data-role="tile" style="background-color: #3466B5">
                                <div class="tile-content iconic">
                                  <span class="icon mif-clipboard mif-ani-slow mif-ani-heartbeat"></span>
                                  <span class="tile-label">Daftar Booking</span>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="tile-group triple" >
                          <span class="tile-group-title">Pembelian</span>
                          <div class="tile-container">
                              <div class="tile-wide tile-big-y fg-white" data-role="tile" style="background-color: #3AB2A5">
                                <div class="tile-content iconic">
                                  <span class="icon mif-file-text mif-ani-slow mif-ani-vertical"></span>
                                  <span class="tile-label">Daftar Pembelian</span>
                                </div>
                              </div>
                              <div class="tile fg-white" data-role="tile" style="background-color: #3DBD8B">
                                <div class="tile-content iconic">
                                  <span class="icon mif-plus"></span>
                                  <span class="tile-label">Beli Emas</span>
                                </div>
                              </div>    
                              <div class="tile fg-white" data-role="tile" style="background-color: #4DF0B0">
                                <div class="tile-content iconic">
                                  <span class="icon mif-plus"></span>
                                  <span class="tile-label">Beli Diamond</span>
                                </div>
                              </div>    
                              <div class="tile fg-white" data-role="tile" style="background-color: #4AE5D4">
                                <div class="tile-content iconic">
                                  <span class="icon mif-plus"></span>
                                  <span class="tile-label">Beli Perhiasan</span>
                                </div>
                              </div>
                          </div>
                      </div>
                      </div>
                    </div>
                  </div>
              </li>
              <li><a href="#" onclick="openNav(this)"><i class="fa fa-dropbox" aria-hidden="true"></i> Inventory</a>
                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div class="tile-group">
                        <span class="tile-group-title">Inventory</span>
                        <div class="tile-container">
                          <div class="tile-large tile-big-y bg-amber fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-list"></span><span class="tile-label">Daftar Barang</span></div>
                          </div>
                          <div class="tile-large bg-red fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-search"></span><span class="tile-label">Stok Opnam</span></div>
                          </div>
                          <div class="tile tile-wide-y bg-orange fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-truck mif-ani-pass"></span><span class="tile-label">Kirim</span></div>
                          </div>
                          <div class="tile tile-wide-y bg-crimson fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon fa fa-check-square-o"></span><span class="tile-label">Terima</span></div>
                          </div>
                          <div class="tile tile-super-x bg-lightRed fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-shopping-basket mif-ani-bounce mif-ani-fast"></span><span class="tile-label">Daftar Baki</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <li><a href="#" onclick="openNav(this)"><span class="icon mif-shop"></span> Outlets</a>
                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div class="tile-group triple">
                        <div class="tile-group-title">Outlet</div>
                        <div class="tile-container">
                          <div class="tile-large bg-lime fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-shop mif-ani-shake"></span><span class="tile-label">Daftar Outlet</span></div>
                          </div>
                          <div class="tile bg-green fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-user-plus"></span><span class="tile-label">Sales Baru</span></div>
                          </div>
                          <div class="tile bg-emerald fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-plus"></span><span class="tile-label">Toko Baru</span></div>
                          </div>
                          <div class="tile tile-big-x bg-darkEmerald fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-users"></span><span class="tile-label">Daftar Sales</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <li><a href="#" onclick="openNav(this)"><i class="fa fa-phone" aria-hidden="true"></i> Kontak</a>
                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div class="container overlay">
                        <div class="overlay-content">
                          <div class="tile-group triple">

                            <span class="tile-group-title">DAFTAR KONTAK</span>
                            <div class="tile-container">
                              <a class="tile tile-wide-y bg-darkCobalt fg-white" data-role="tile">
                                <div class="tile-content iconic">
                                  <span class="icon mif-users mif-ani-bounce"></span>
                                  <span class="tile-label">Daftar Customer</span>
                                </div>
                              </a>

                              <a class="tile-wide bg-cobalt fg-white" data-role="tile">
                                <div class="tile-content iconic">
                                  <span class="icon mif-file-text"></span>
                                  <span class="tile-label">Daftar Supplier</span>
                                </div>
                              </a>
                              <a class="tile-square bg-darkBlue fg-white" data-role="tile">
                                <div class="tile-content iconic">
                                  <span class="icon mif-user-plus"></span>
                                  <span class="tile-label">Tambah Customer</span>
                                </div>
                              </a>
                              <a class="tile-square bg-lightBlue fg-white" data-role="tile">
                                <div class="tile-content iconic">
                                  <span class="icon mif-user-plus mif-ani-heartbeat"></span>
                                  <span class="tile-label">Tambah Supplier</span>
                                </div>
                              </a>
      
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <li><a href="#" onclick="openNav(this)"><i class="fa fa-cog" aria-hidden="true"></i> Konfigurasi</a>
                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div class="tile-group double">
                        <div class="tile-group-title">Konfigurasi</div>
                        <div class="tile-container">
                          <div class="tile bg-darkEmerald fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-users"></span><span class="tile-label">Gold</span></div>
                          </div>
                          <div class="tile bg-darkEmerald fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon fa fa-diamond"></span><span class="tile-label">Diamond</span></div>
                          </div>
                          <div class="tile-wide bg-darkEmerald fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-users"></span><span class="tile-label">Toko</span></div>
                          </div>
                          <div class="tile bg-darkEmerald fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-users"></span><span class="tile-label">Sales</span></div>
                          </div>
                          <div class="tile bg-darkEmerald fg-white" data-role="title">
                            <div class="tile-content iconic"><span class="icon mif-users"></span><span class="tile-label">Member</span></div>
                          </div>
                        </div>
                      </div>
                      <div class="tile-group double">
                        <div class="tile tile-large bg-darkEmerald fg-white" data-role="title">
                          <div class="tile-content iconic"><span class="icon mif-users"></span><span class="tile-label">Promo</span></div>
                        </div>
                      </div>
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
          $(el).parent('li').find('.overlay').css('height','90%');
        } 
        
      }
    </script>
  </body>
</html>