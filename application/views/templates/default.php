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

    <script src="<?php echo base_url() ?>js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
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
      .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
        border-top: none;
        vertical-align: middle;
        padding-top: 5px;
        padding-bottom: 0px;
      }
      .navbar{
        background-color: #04BFBF;
        height: 61px;
        border:none;
        border-radius: 0px;
      }
      .navbar-nav{
        width: 100%;
      }
      .navbar-nav>li>a,.navbar a{
        color: #fff !important;
      }
      .navbar-nav>li{
        height: 67px;
      }
      .navbar-nav>li>a{
        line-height: 37px;
      }
      .menu-a{
        padding-bottom: 0px !important;
        padding-top: 5px !important;
      }
      .menu-a p{
        margin-top: -12px !important;
      }
      #home{
        background-color: #04BFBF;
        border-right: 1px solid #CAFCD8;
        border-left: 1px solid #CAFCD8;
      }
      #trans{
        background-color: #04BFBF;
        border-right: 1px solid #CAFCD8;
      }
      #invent{
        background-color: #04BFBF;
        border-right: 1px solid #CAFCD8;
      }
      #outlet{
        background-color: #04BFBF;
        border-right: 1px solid #CAFCD8;
      }
      #contact{
        background-color: #04BFBF;
        border-right: 1px solid #CAFCD8;
      }
      #configuration{
        background-color: #04BFBF;
        border-right: 1px solid #CAFCD8;
      }
      
      .navbar-nav > .active > a {
          color: red;
      }
      .card{
        width: 100%; 
        height: 200px; 
        margin:auto; 
        padding-top: 50px;
      }
      .yamm-fw{
        width:12%;
      }
    </style>

  </head>
  <body>
	
  <header>
    <nav class="navbar navbar-default yamm">
      <div class="container-fluid" style="padding-left: 20px;padding-right: 20px">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav" role="menu">
            
            <li style="width: 12%;">
              <a href="<?php echo base_url('main') ?>" id="home" class="menu-a text-center"><i class="fa fa-home fa-2x" aria-hidden="true"></i><p class="segoe">Home</p>
              </a>
            </li>
            
            <!--Transactions-->
            <li class="dropdown yamm-fw">
              <a href="#" class="dropdown-toggle menu-a text-center" data-toggle="dropdown" id="trans"><i class="fa fa-money fa-2x" aria-hidden="true"></i><p class="segoe">Transactions</p></a>
              
              <div class="dropdown-menu yamm-content">
                <div class="row" style="padding-top: 35px; padding-bottom: 35px;">
              
                  <div class="col-md-1"></div>  
                  
                  <div class="col-md-10">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="<?php echo base_url('selling') ?>" class="text-center">
                          <div class="card" style="background-color:#2ecc71; height: 420px;">
                              <span class="fa fa-shopping-cart fa-5x" aria-hidden="true"></span><p class="segoe">Daftar Penjualan</p>
                          </div>
                        </a>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <a href="<?php echo base_url('purchasing') ?>" class="text-center">
                            <div class="card" style=" height: 200px; background-color:#e74c3c; margin:auto;">
                                <span class="fa fa-shopping-basket fa-5x" aria-hidden="true"></span><p class="segoe">Daftar Pembelian</p>
                            </div>
                          </a>  
                        </div>
                        <div class="row" style="margin-top: 20px;">
                          <a href="<?php echo base_url('purchasing') ?>" class="text-center">
                            <div class="card" style=" height: 200px; background-color:#e74c3c; margin:auto;">
                                <span class="fa fa-shopping-basket fa-5x" aria-hidden="true"></span><p class="segoe">Daftar Pembelian</p>
                            </div>
                          </a>  
                        </div>
                      </div>

                    </div>

                    <div class="row" style="margin-top: 20px;">
                      <div class="col-md-6">
                        <a href="<?php echo base_url('selling') ?>" class="text-center">
                        <div class="card" style=" height: 200px; background-color:#f1c40f; margin:auto;">
                            <span class="fa fa-dollar fa-5x" aria-hidden="true"></span>
                            <p class="segoe">Penjualan Baru</p>
                        </div>
                        </a>
                      </div>
                      <div class="col-md-6">
                        <a href="<?php echo base_url('selling') ?>" class="text-center">
                          <div class="card" style=" height: 200px; background-color:#f1c40f; margin:auto;">
                              <span class="fa fa-dollar fa-5x" aria-hidden="true"></span>
                              <p class="segoe">Penjualan Baru</p>
                          </div>
                        </a>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-1"></div>
                
                </div>
            
              </div>

            </li>
            <!--Transaction end-->

            <!--Inventories-->
            <li class="dropdown yamm-fw">
              <a href="#" class="dropdown-toggle menu-a text-center" data-toggle="dropdown" id="invent"><i class="fa fa-dropbox fa-2x" aria-hidden="true"></i><p class="segoe">Inventory</p></a>
              <div class="dropdown-menu yamm-content">
                <div class="row">
                  <div class="col-md-4">
                    <a href="<?php echo base_url('products') ?>" ><i id="template-button" class="fa fa-archive fa-2x" aria-hidden="true"></i><span><p class="segoe">Produk</p></span></a>
                  </div>
                  <div class="col-md-4">
                    <a href="<?php echo base_url('products/all_category') ?>" ><span class="glyphicon glyphicon-tags" aria-hidden="true"></span><span>Kategori</span></a>
                  </div>
                  <div class="col-md-4">
                    <a href="<?php echo base_url('mutasi') ?>" ><span class="fa fa-institution fa-2x" aria-hidden="true"></span><span>Mutasi</span></a>
                  </div>
                </div>
              </div>
            </li>
            <!--Inventory End-->

            <!--Outlet/Sales-->
            <li class="dropdown yamm-fw">
              <a href="#" class="dropdown-toggle menu-a text-center" data-toggle="dropdown" id="outlet"><i class="fa fa-male fa-2x" aria-hidden="true"></i><p class="segoe">Outlet/Sales</p></a>
              <div class="dropdown-menu yamm-content">
                <div class="row">
                    <div class="col-md-3">
                      <a href="<?php echo base_url('customers') ?>" ><span class="fa fa-users fa-2x" aria-hidden="true"></span><span>Customer</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('outlets') ?>" ><span class="glyphicon glyphicon-tags" aria-hidden="true"></span><span>Outlets</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('drivers') ?>" ><span class="fa fa-car fa-3x" aria-hidden="true"></span><span>Driver</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('supplier') ?>" ><span class="fa fa-users fa-2x" aria-hidden="true"></span><span>Supplier</span></a>
                    </div>
                </div>
              </div>
            </li>
            <!--Outlet/Sales End-->

            <!--Contacts-->
            <li class="dropdown yamm-fw">
              <a href="#" class="dropdown-toggle menu-a text-center" data-toggle="dropdown" id="contact"><i class="fa fa-phone fa-2x" aria-hidden="true"></i><p class="segoe">Contacts</p></a>
              <div class="dropdown-menu yamm-content">
                <div class="row">
                    <div class="col-md-3">
                      <a href="<?php echo base_url('customers') ?>" ><span class="fa fa-users fa-3x" aria-hidden="true"></span><span>Customer</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('outlets') ?>" ><span class="glyphicon glyphicon-tags" aria-hidden="true"></span><span>Outlets</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('drivers') ?>" ><span class="fa fa-car fa-3x" aria-hidden="true"></span><span>Driver</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('supplier') ?>" ><span class="fa fa-users fa-3x" aria-hidden="true"></span><span>Supplier</span></a>
                    </div>
                </div>
              </div>
            </li>
            <!--Contacts End-->

            <!--Configuration-->
            <li class="dropdown yamm-fw">
              <a href="#" class="dropdown-toggle menu-a text-center" data-toggle="dropdown" id="configuration"><i class="fa fa-gear fa-2x" aria-hidden="true"></i><p class="segoe">Contacts</p></a>
              <div class="dropdown-menu yamm-content">
                <div class="row">
                    <div class="col-md-3">
                      <a href="<?php echo base_url('customers') ?>" ><span class="fa fa-users fa-3x" aria-hidden="true"></span><span>Customer</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('outlets') ?>" ><span class="glyphicon glyphicon-tags" aria-hidden="true"></span><span>Outlets</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('drivers') ?>" ><span class="fa fa-car fa-3x" aria-hidden="true"></span><span>Driver</span></a>
                    </div>
                    <div class="col-md-3">
                      <a href="<?php echo base_url('supplier') ?>" ><span class="fa fa-users fa-3x" aria-hidden="true"></span><span>Supplier</span></a>
                    </div>
                </div>
              </div>
            </li>
            <!--Configuration End-->
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--Navbar Ends-->
  </header>

	<div class="container">
		<?php echo $body ?>
	</div>
	
  <footer></footer>
    
  </body>
</html>