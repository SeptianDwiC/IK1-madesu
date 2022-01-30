<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:index.php");
    exit;
}
require_once('../Models/database.php');
$conn = new database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="Asset/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Asset/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="Asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="Asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="Asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
        #modal-customer input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
</head>
<!--
`body` tag options:

Apply one or more of the following classes to to the body tag
to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tooltip" data-bs-placement="bottom" title="LOGOUT" href="logout.php" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar position-fixed sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="Asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="Asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Septian Dwi Cahya</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Page Settings <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="halaman_utama.php?page=home" class="nav-link">
                                        <i class="fas fa-home nav-icon"></i>
                                        <p>Home Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="halaman_utama.php?page=about" class="nav-link">
                                        <i class="fas fa-info-circle nav-icon"></i>
                                        <p>About Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="halaman_utama.php?page=services" class="nav-link">
                                        <i class="fas fa-briefcase nav-icon"></i>
                                        <p>Services</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="halaman_utama.php?page=login" class="nav-link">
                                        <i class="fas fa-sign-in-alt nav-icon"></i>
                                        <p>Login Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Sales Report <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="halaman_utama.php?page=produk" class="nav-link">
                                        <i class="fas fa-pills nav-icon"></i>
                                        <p>Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="halaman_utama.php?page=customer" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Customer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="halaman_utama.php?page=transaksi" class="nav-link">
                                        <i class="fas fa-money-bill-alt nav-icon"></i>
                                        <p>Transaksi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="halaman_utama.php?page=detail" class="nav-link">
                                        <i class="fas fa-notes-medical nav-icon"></i>
                                        <p>Detail Transaksi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="caption d-flex justify-content-center">
                <marquee behavior="alternate" direction="">
                    <h2 style="font-family: Viga;">Selamat Datang Di Halaman Admin</h2>
                </marquee>
            </div>
            <?php include 'halaman.php'; ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Admin E-POTEK</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="Asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="Asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="Asset/dist/js/adminlte.js"></script>
    <!-- Bootstrap -->
    <script src="Asset/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="Asset/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="Asset/dist/js/pages/dashboard3.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="Asset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="Asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="Asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="Asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="Asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="Asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="Asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="Asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="Asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>