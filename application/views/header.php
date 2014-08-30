<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard // GIreport</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?=base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?=base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?=base_url();?>assets/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?=base_url();?>assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?=base_url();?>assets/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?=base_url();?>assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?=base_url();?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="pace-done fixed skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?=base_url();?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                GIreport
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- timer refresh -->
                        <li>
                            <a href="#">
                                <span style="color:black;padding:auto;font-weight:bold;" id="timer"></span>
                            </a>                        
                        </li>  
                        <!-- /.timer -->
                        <!-- Notifications: style can be found in dropdown.less -->
                        <?php 
                            
                        ?>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <?php if($unreadcount->Total != 0) { ?>
                                <span class="label label-warning"><?=$unreadcount->Total;?></span>
                                <?php } ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Anda punya 
                                    <?php if (isset($unreadcount)) {
                                        echo $unreadcount->Total;
                                    } else {
                                        echo "0";
                                    } ?> 
                                    notifikasi belum terbaca</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php foreach ($unreadnotif->result() as $key ) { ?>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people <?=$key->tipe_nama;?>"></i><?=$key->notif_teks;?>
                                            </a>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?=base_url();?>index.php/notifikasi">Lihat Semua</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?= $this->session->userdata('username') ;?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?=base_url();?>assets/img/avatar8.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?=$this->session->userdata('nama');?>
                                        <small>sebagai <?=$this->session->userdata('role');?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?=base_url();?>index.php/pengaturan/profil" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=base_url();?>index.php/auth/logout" class="btn btn-default btn-flat">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?=base_url();?>assets/img/avatar8.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hai, <?=$this->session->userdata('username');?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="<?php if(isset($menu_dashboard)){echo 'active';}?>">
                            <a href="<?=base_url();?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="<?php if(isset($menu_notif)){echo 'active';}?>">
                            <a href="<?=base_url();?>index.php/notifikasi">
                                <i class="fa fa-warning"></i> <span>Notifikasi</span>
                                <?php if($unreadcount->Total != 0) { ?>
                                <small class="badge pull-right bg-yellow"><?=$unreadcount->Total;?></small>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="treeview <?php if(isset($menu_report)){echo 'active';}?>">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Report</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu <?php if(isset($menu_report)){echo 'active';}?>">
                                <li class="<?php if(isset($menu_antrian)){echo 'active';}?>"><a href="<?=base_url();?>index.php/report/antrian"><i class="fa fa-angle-double-right"></i> Antrian</a></li>
                                <li class="<?php if(isset($menu_pengunjung)){echo 'active';}?>"><a href="<?=base_url();?>index.php/report/pengunjung"><i class="fa fa-angle-double-right"></i> Pengunjung</a></li>
                                <li class="<?php if(isset($menu_survei)){echo 'active';}?>"><a href="<?=base_url();?>index.php/report/survei"><i class="fa fa-angle-double-right"></i> Survei</a></li>
                            </ul>
                        </li>
                        <li class="treeview <?php if(isset($menu_atur)){echo 'active';}?>">
                            <a href="<?=base_url();?>index.php/pengaturan">
                                <i class="fa fa-gear"></i> <span>Pengaturan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu <?php if(isset($menu_atur)){echo 'active';}?>">
                                <li class="<?php if(isset($menu_profil)){echo 'active';}?>"><a href="<?=base_url();?>index.php/pengaturan/profil"><i class="fa fa-angle-double-right"></i> Profil</a></li>
                                <li class="<?php if(isset($menu_counter)){echo 'active';}?>"><a href="<?=base_url();?>index.php/pengaturan/counter"><i class="fa fa-angle-double-right"></i> Counter</a></li>
                                <li class="<?php if(isset($menu_server)){echo 'active';}?>"><a href="<?=base_url();?>index.php/pengaturan/server"><i class="fa fa-angle-double-right"></i> Server</a></li>
                                <li class="<?php if(isset($menu_queue)){echo 'active';}?>"><a href="<?=base_url();?>index.php/pengaturan/queue"><i class="fa fa-angle-double-right"></i> Queue</a></li>
                            </ul>
                        </li>
                        <li class="<?php if(isset($menu_tentang)){echo 'active';}?>">
                            <a href="<?=base_url();?>index.php/tentang">
                                <i class="fa fa-info-circle"></i> <span>Tentang</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>