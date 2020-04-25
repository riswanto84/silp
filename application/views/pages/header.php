<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>SISTEM INFORMASI LAYANAN PENGADAAN</title>
    <link rel="icon" type="image/png" href="https://simpeg.kemsos.go.id/assets/ico/favicon.ico""/>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/build/css/custom.min.css" rel="stylesheet">

    <!-- Date time picker -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="<?php echo base_url() ?>assets/templates/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <?php
          if($this->session->flashdata('error')==true)
                      {
                        echo "
                          <br/>
                          <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                          </button>
                          <strong>Error..!</strong><p>".$this->session->flashdata('error')."</p> 
                          </div>
                        ";
                      }
        ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>Selamat datang,</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url() ?>assets/images/<?php echo $this->session->userdata("avatar"); ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span></span>
                <h2><?php echo $this->session->userdata("user_nama"); ?></h2>
                <small><?php echo $this->session->userdata("nip"); ?></small><br/>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>Dashboard"><i class="fa fa-home"></i> Home </a>
                  </li>
                </ul>
<?php
//menampilkan menu dinamis berdasarkan previllege
$CI =& get_instance();
$CI->load->model('Admin');
foreach ($menu as $list_menu) 
{
    ?>
      <ul class="nav side-menu">
        <li><a><i class="<?php echo $list_menu->icon; ?>"></i> <?php echo $list_menu->nama_menu; ?> <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <?php
              $id_grup = $this->session->userdata("grup");
              $id_menu = $list_menu->id_menu;
              $query_sub_menu = $this->Admin->tampil_sub_menu($id_grup, $id_menu)->result();
              foreach ($query_sub_menu as $sub_menu) {
                //echo $sub_menu->nama_menu;
                echo "<li><a href='".base_url().$sub_menu->link."'>".$sub_menu->nama_menu."</a></li>";
              }
            ?>
          </ul>
        </li>
      </ul>
    <?php
}
    ?>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
        <img src="<?php echo base_url() ?>/assets/images/ulp.png" height="60" width="135">
        <a href="index.html" class="site_title"><span>Sistem Informasi Layanan Pengadaan</span></a>
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url() ?>assets/images/<?php echo $this->session->userdata("avatar"); ?>" alt=""><?php echo $this->session->userdata("user_nama"); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">FAQ</a></li>
                    <li><a href="<?php echo base_url() ?>Login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

           