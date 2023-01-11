<?= $this->extend('layout/template-admin'); ?>

<?= $this->section('content'); ?>
<!-- ============================================================== -->
<!-- Page wrapper -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="container my-2 mb-4">

            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="col mb-4">
                                <div class="">
                                    <div class="">
                                        <h5 class="card-title">
                                            <b>
                                                <i class="mdi mdi-account"></i>
                                                Data Mahasiswa</b>
                                        </h5>
                                        <hr>
                                        <p class="card-text"><?= $jumlah['siswa'] ?>
                                            Mahasiswa terdaftar</p>
                                        <!-- <a class="btn btn-primary" href="<?= base_url('user') ?>">Atur</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="">
                                    <div class="">
                                        <h5 class="card-title">
                                            <b>
                                                <i class="mdi mdi-book"></i>
                                                Data Skripsi</b>
                                        </h5>
                                        <hr>
                                        <p class="card-text"><?= $jumlah['buku'] ?>
                                            Buku ditemukan</p>
                                        <!-- <a class="btn btn-primary" href="<?= base_url('book') ?>">Atur</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="">
                                    <div class="">
                                        <h5 class="card-title">
                                            <b>
                                                <i class="mdi mdi-burst-mode"></i>
                                                Data Kategori</b>
                                        </h5>
                                        <hr>
                                        <p class="card-text"><?= $jumlah['kategori'] ?>
                                            Kategori tersedia</p>
                                        <!-- <a class="btn btn-primary" href="<?= base_url('kategori') ?>">Atur</a> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col mb-4">
                                <div class="">
                                    <div class="">
                                        <h5 class="card-title">
                                            <b>
                                                <i class="mdi mdi-book-plus"></i>
                                                Data Peminjaman</b>
                                        </h5>
                                        <hr>
                                        <p class="card-text"><?= $jumlah['peminjaman'] ?>
                                            Peminjaman ditemukan</p>
                                        <a class="btn btn-primary" href="<?= base_url('peminjaman') ?>">Atur</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="">
                                    <div class="">
                                        <h5 class="card-title">
                                            <b>
                                                <i class="mdi mdi-book-minus"></i>
                                                Data Pengembalian</b>
                                        </h5>
                                        <hr>
                                        <p class="card-text"><?= $jumlah['pengembalian'] ?>
                                            Pengembalian ditemukan</p>
                                        <a class="btn btn-primary" href="<?= base_url('pengembalian') ?>">Atur</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->

            <?= $this->endSection('content'); ?>