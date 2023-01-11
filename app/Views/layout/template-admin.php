<?php $uri = service('uri'); ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="/material-lite/assets/images/favicon.png">
        <title><?= $title ?></title>
        <!-- Bootstrap Core CSS -->
        <link
            href="/material-lite/assets/plugins/bootstrap/css/bootstrap.min.css"
            rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/material-lite/lite/css/style.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="/material-lite/lite/css/colors/blue.css" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script
        src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script
        src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="fix-header fix-sidebar card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- <div class="preloader"> <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
        stroke-miterlimit="10" /> </svg> </div> -->
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?= base_url('admin') ?>">
                            <!-- Logo icon -->
                            <b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

                                <!-- Light Logo icon -->
                                <!-- <img
                                    src="material-lite/assets/images/logo-light-icon.png"
                                    alt="homepage"
                                    class="light-logo"/> -->
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span>

                                <!-- Light Logo text -->
                                <img
                                    src="/material-lite/assets/images/logo-light-text.png"
                                    class="light-logo"
                                    alt="homepage"/>
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
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is -->
                            <li class="nav-item">
                                <a
                                    class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                    href="javascript:void(0)">
                                    <i class="mdi mdi-menu"></i>
                                </a>
                            </li>
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class="nav-item hidden-sm-down search-box">
                                <a
                                    class="nav-link hidden-sm-down text-muted waves-effect waves-dark"
                                    href="javascript:void(0)">
                                    <i class="ti-search"></i>
                                </a>
                                <form class="app-search">
                                    <input type="text" class="form-control" placeholder="Search & enter">
                                    <a class="srh-btn">
                                        <i class="ti-close"></i>
                                    </a>
                                </form>
                            </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
                                    href=""
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    <img
                                        src="<?= base_url('foto/fotoprofil/' . $user['foto_profil']) ?>"
                                        alt="user"
                                        class="profile-pic m-r-10"/><?= $user['nama_user'] ?></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li>
                                <a
                                    class="waves-effect waves-dark"
                                    href="<?= base_url('admin') ?>"
                                    aria-expanded="false">
                                    <i class="mdi mdi-gauge"></i>
                                    <span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a
                                    class="waves-effect waves-dark"
                                    href="<?= base_url('user') ?>"
                                    aria-expanded="false">
                                    <i class="mdi mdi-account"></i>
                                    <span class="hide-menu">Data Mahasiswa</span></a>
                            </li>
                            <li>
                                <a
                                    class="waves-effect waves-dark"
                                    href="<?= base_url('book') ?>"
                                    aria-expanded="false">
                                    <i class="mdi mdi-book"></i>
                                    <span class="hide-menu">Data Skripsi</span></a>
                            </li>
                            <li>
                                <a
                                    class="waves-effect waves-dark"
                                    href="<?= base_url('kategori') ?>"
                                    aria-expanded="false">
                                    <i class="mdi mdi-burst-mode"></i>
                                    <span class="hide-menu">Data Kategori</span></a>
                            </li>
                            <!-- <li>
                                <a
                                    class="waves-effect waves-dark"
                                    href="<?= base_url('peminjaman') ?>"
                                    aria-expanded="false">
                                    <i class="mdi mdi-book-plus"></i>
                                    <span class="hide-menu">Data Peminjaman</span></a>
                            </li>
                            <li>
                                <a
                                    class="waves-effect waves-dark"
                                    href="<?= base_url('pengembalian') ?>"
                                    aria-expanded="false">
                                    <i class="mdi mdi-book-minus"></i>
                                    <span class="hide-menu">Data Pengembalian</span></a>
                            </li> -->
                        </ul>

                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
                <!-- Bottom points-->
                <div class="sidebar-footer">
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="Settings">
                        <i class="ti-settings"></i>
                    </a>
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="Email">
                        <i class="mdi mdi-gmail"></i>
                    </a>
                    <!-- item-->
                    <a href="<?= base_url('logout') ?>" class="link" data-toggle="tooltip" title="Logout">
                        <i class="mdi mdi-power"></i>
                    </a>
                </div>
                <!-- End Bottom points-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss -->
            <!-- ============================================================== -->

            <?= $this->renderSection('content'); ?>
        </div>

        <!-- Jika user sudah login -->
        <?php if (session()->get('isLoggedIn')) { ?>

        <!-- Memanggil Footer -->

        <?php } ?>
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
        © 2022 Material Pro Admin
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/material-lite/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/material-lite/assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="material-lite/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/material-lite/lite/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="/material-lite/lite/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/material-lite/lite/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script
src="/material-lite/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="/material-lite/lite/js/custom.min.js"></script>
</body>

</html>