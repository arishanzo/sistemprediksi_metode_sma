<?php
require_once "../config/config.php";
if (!isset($_SESSION['username'])) {
    echo "<script>window.location='" . base_url('') . "';</script>";
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> Sistem Peramalan</title>

        <!-- Custom fonts for this template-->
        <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">

        <link href="<?= base_url() ?>/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
        <!-- This page CSS -->
        <!-- chartist CSS -->
        <link href="<?= base_url() ?>/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
        <!--c3 CSS -->
        <link href="<?= base_url() ?>/assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">
        <!-- Dashboard 1 Page CSS -->
        <link href="<?= base_url() ?>/assets/css/pages/dashboard1.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="<?= base_url() ?>/assets/css/colors/default.css" id="theme" rel="stylesheet">
        <link href="../datatable/css/datatables.css" rel="stylesheet">
        <link href="../datatable/css/datatables.min.css" rel="stylesheet">

        <link href="../sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    </head>

    <body class="fix-header fix-sidebar card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">aku Wrap</p>
            </div>
        </div> -->
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.html">
                            <!-- Logo icon --><b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="../img/logo.png" alt="homepage" class="dark-logo" width="50px" />
                                <!-- Light Logo icon -->
                                <img src="../img/logo.png" alt="homepage" class="light-logo" width="50px" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text --><span>
                                <!-- dark Logo text -->
                                <img src="../img/babyshop.png" alt="homepage" class="dark-logo" width="150px" />
                                <!-- Light Logo text -->
                                <img src="../img/babyshop.png" class="light-logo" alt="homepage" width="150px" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                            <h4 class="text-center">Sistem Peramalan</h4>

                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown u-pro dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic dropbtn" href="../img/fotouser/avatar7.png" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../img/fotouser/avatar.png" alt="user" class="" /> <span class="hidden-md-down"><?= $_SESSION['nama']; ?> &nbsp;</span> </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= base_url() ?>/user/gantipasword.php">
                                        <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                        <span> Ubah Pswrd</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../auth/logout.php"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        <span> Logout </span>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                        <ul class="navbar-nav my-lg-0">
                            <li class=" nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                            <a href="../auth/logout.php" class="text-danger">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                <span> Logout </span>
                            </a>

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li>
                                <a class="nav-link" href="<?= base_url() ?>/dashboard/index.php">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                    <span>Home</span></a>
                            </li>
                            <!-- Divider -->
                            <hr class="sidebar-divider">


                            <!-- Nav Item - Pages Collapse Menu -->
                            <li>
                                <a class="nav-link" href="<?= base_url() ?>/user/index.php">
                                    <i class="fas fa-users"></i>
                                    <span>Admin</span></a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?= base_url() ?>/kategori/index.php">
                                    <i class="fas fa-book"></i>
                                    <span>Kategori</span></a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?= base_url() ?>/penjualan/index.php">
                                    <i class="fas fa-globe"></i>
                                    <span>Data Penjualan</span></a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?= base_url() ?>/perhitungan/index.php">
                                    <i class="fas fa-file-contract"></i>
                                    <span>Peramalan</span></a>
                            </li>

                            <li>
                                <a class="nav-link" href="<?= base_url() ?>/laporan/index.php">
                                    <i class="fas fa-book"></i>
                                    <span>Laporan Peramalan</span></a>
                            </li>
                        </ul>

                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>

            <script src="../datatable/js/datatables.min.js"></script>
            <script src="../vendor/datatables/jquery.dataTables.js"></script>

            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
            <script src="<?= base_url() ?>/sweetalert/sweetalert.min.js"></script>

            <script src="../assets/node_modules/jquery/jquery.min.js"></script>
            <!-- Bootstrap popper Core JavaScript -->
            <script src="<?= base_url() ?>/assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="<?= base_url() ?>/assets/js/perfect-scrollbar.jquery.min.js"></script>
            <!--Wave Effects -->
            <script src="<?= base_url() ?>/assets/js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="<?= base_url() ?>/assets/js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="<?= base_url() ?>/assets/js/custom.min.js"></script>
            <!-- ============================================================== -->
            <!-- This page plugins -->
            <!-- ============================================================== -->
            <!--morris JavaScript -->
            <script src="<?= base_url() ?>/assets/node_modules/raphael/raphael-min.js"></script>
            <script src="<?= base_url() ?>/assets/node_modules/morrisjs/morris.min.js"></script>
            <!--c3 JavaScript -->
            <script src="<?= base_url() ?>/assets/node_modules/d3/d3.min.js"></script>
            <script src="<?= base_url() ?>/assets/node_modules/c3-master/c3.min.js"></script>
            <!-- Chart JS -->

        <?php

    }
        ?>