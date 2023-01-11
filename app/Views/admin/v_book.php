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
                <h3 class="text-themecolor m-b-0 m-t-0"><?= $title ?></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

<div class="row">
    <div class="col mt-2">
        <a href="<?= base_url('addBuku') ?>" class="btn btn-primary">Tambah Skripsi</a>
    </div>
    <div class="col-sm-4 mt-2">
        <form style="display: inline;" action="" method="post">
            <select name="kategori" id="kategori" class="form-control">
                <option value="Tidak">Tanpa Kategori</option>
                <?php foreach ($kategori as $ktg) { ?>
                    <option <?= $ktg['nama_kategori'] == session()->get('kategori_book') ? 'selected=selected' : null ?> value="<?= $ktg['nama_kategori'] ?>"><?= $ktg['nama_kategori'] ?></option>
                <?php } ?>
            </select>
            <button id="ketegori-submit" style="display:none;" type="submit"></button>
        </form>
    </div>
</div>

<!-- Jika ada pesan berhasil -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Jika ada pesan gagal -->
<?php if (session()->getFlashdata('danger')) : ?>
    <div class="alert alert-danger mt-2" role="alert">
        <?= session()->getFlashdata('danger') ?>
    </div>
<?php endif; ?>

<div class="card card-body mt-2">
    <div class="row">
        <div class="col-10 col-sm-6 float-right">
            <h3>
                Jumlah buku total: <?= ($jumlah_buku) ? $jumlah_buku : 0 ?>
            </h3>
        </div>
        <div class="col-12 col-sm-6 float-right">
            <form class="" action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : null ?>" name="keyword" placeholder="Masukkan Kata Kunci Pencarian" maxlength="100" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-success fas" type="submit" value="Cari">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Jika tidak ada user sama sekali -->
    <?php if ($all_buku == null) { ?>
        <div class="card mt-4">
            <div class="card-body">
                <h3 style="display: inline;">
                    Tidak ada Buku.
                </h3>
            </div>
        </div>
    <?php } else { ?>
        <div class="table-responsive mt-4">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Buku</th>
                        <th scope="col">Nama</th>
                        <th scope="col">File</th>
                        <th scope="col">Kategori</th>
                        <!-- <th scope="col">Status</th> -->
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 + (5 * ($current_page - 1));
                    foreach ($all_buku as $buku) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $buku['no_buku'] ?></td>
                            <td title="<?= $buku['nama_buku'] ?>"><?= substr($buku['nama_buku'], 0, 60) ?><?php if (strlen($buku['nama_buku']) > 60) { ?>...<?php } ?></td>
                            <td>
                                <!-- <img style="height: 90px; width:65px;" src="<?= base_url('foto/sampulbuku/' . $buku['sampul_buku']) ?>" alt="image"> -->
                                <a href="<?Php echo base_url('foto/sampulbuku/' . $buku['sampul_buku']) ?>">Download</a>
                            </td>
                            <td><?= $buku['nama_kategori'] ?></td>
                            <!-- <td>
                                <?php if ($buku['status_buku'] == 1) { ?>
                                    Dipinjam
                                <?php } else { ?>
                                    Bebas
                                <?php } ?>
                            </td> -->
                            <td>
                                <a title="Hapus Data <?= $buku['nama_buku'] ?>" href="<?= base_url('deleteBuku/' . $buku['no_buku']) ?>" class="mt-1 btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus Buku ini?');"><i class="mdi mdi-delete"></i></a>
                                <a title="Ubah Data <?= $buku['nama_buku'] ?>" href="<?= base_url('updateBuku/' . $buku['no_buku']) ?>" class="mt-1 btn btn-primary"><i class="mdi mdi-lead-pencil"></i></a>
                                <a title="Lihat Detail <?= $buku['nama_buku'] ?>" href="<?= base_url('detailBuku/' . $buku['no_buku']) ?>" class="mt-1 btn btn-primary"><i class="mdi mdi-eye-outline"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?= $pager->links('buku', 'custom_pagination') ?>
        </div>
    <?php } ?>
</div>

<?= $this->endSection('content'); ?>