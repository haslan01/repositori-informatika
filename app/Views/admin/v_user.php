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
        <div class="">

            <div class="row">
                <div class="col mt-2">
                    <a href="<?= base_url('addUser') ?>" class="btn btn-primary">Tambah User</a>
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

            <div class="">
                <div class="row">
                    <div class="col-12 col-sm-6 float-right">
                        <h3>
                            Jumlah total User :
                            <?= ($jumlah_siswa) ? $jumlah_siswa : 0 ?>
                        </h3>
                    </div>
                    <div class="col-12 col-sm-6 float-right">
                        <form class="" action="" method="get">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : null ?>"
                                    name="keyword"
                                    placeholder="Masukkan Kata Kunci Pencarian"
                                    maxlength="100"
                                    autocomplete="off"
                                    autofocus="autofocus">
                                <div class="input-group-append">
                                    <input class="btn btn-success fas" type="submit" value="Cari">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Jika tidak ada user sama sekali -->
                <?php if ($all_siswa == null) { ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 style="display: inline;">
                            Tidak ada User.
                        </h3>
                    </div>
                </div>
            <?php } else { ?>
                <div class="table-responsive mt-4">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 + (5 * ($current_page - 1));
                    foreach ($all_siswa as $siswa) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $siswa['nis'] ?></td>
                                <td><?= $siswa['nama_user'] ?></td>
                                <td>
                                    <img
                                        style="height: 50px; width: 50px;"
                                        src="<?= base_url('foto/fotoprofil/' . $siswa['foto_profil']); ?>"
                                        alt="image"
                                        class="rounded-circle">
                                </td>
                                <td>
                                    <a
                                        title="Hapus Data <?= $siswa['nama_user'] ?>"
                                        href="<?= base_url('deleteUser/' . $siswa['nis']) ?>"
                                        class="mt-1 btn btn-danger"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus Siswa ini?');">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                    <a
                                        title="Ubah Data <?= $siswa['nama_user'] ?>"
                                        href="<?= base_url('updateUser/' . $siswa['nis']) ?>"
                                        class="mt-1 btn btn-primary">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?= $pager->links('user', 'custom_pagination') ?>
                </div>
                <?php } ?>
            </div>

            <?= $this->endSection('content'); ?>