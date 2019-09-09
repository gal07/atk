<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/frontend/images/iconsmall.png">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/frontend/images/iconsmall.png">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/frontend/images/iconsmall.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="<?= base_url('admin/dasbor'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>T</b>R</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>TOKOREGGIE</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url(); ?>assets/frontend/images/iconsmall.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $user['nama']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url(); ?>assets/frontend/images/iconsmall.png" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $user['nama']; ?> - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?= base_url('autentikasi/alurlogout'); ?>" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url(); ?>assets/frontend/images/iconsmall.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $user['nama']; ?></p>
                        <a href="<?= base_url('admin/dasbor'); ?>"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN MENU</li>
                    <li>
                        <a href="<?= base_url('admin/dasbor'); ?>">
                            <i class="fa fa-dashboard"></i> <span>Dasbor</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/produk'); ?>">
                            <i class="fa fa-opencart"></i> <span>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/banner'); ?>">
                            <i class="fa fa-picture-o"></i> <span>Banner</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/pesan'); ?>">
                            <i class="fa fa-envelope-square"></i> <span>Pesan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/berlangganan'); ?>">
                            <i class="fa fa-user-secret"></i> <span>Berlanganan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('autentikasi/alurlogout'); ?>">
                            <i class="fa fa-sign-out"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>