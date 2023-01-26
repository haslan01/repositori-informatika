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
<div class="container">
    <div class="card-header">
        <div style="font-size: 30px" align="center">Tambah skripsi Baru</div>
    </div>
    <div class="card-body">
        <form action="<?= base_url('saveAddSkripsi') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
                    <!-- Form no_skripsi -->
            <div class="form-group">
                <label for="no_skripsi">No skripsi</label>
                <input type="text" name="no_skripsi" id="no_skripsi" placeholder="No skripsi" autocomplete="off" value="<?= set_value('no_skripsi') ?>" class="form-control
                            <?php if (isset($validation)) { ?>
                                <?php if ($validation->hasError('no_skripsi')) { ?>
                                    is-invalid
                                <?php } else { ?>
                                    is-valid
                                <?php } ?>
                            <?php } ?>" required maxlength="10">

                <?php if (isset($validation)) { ?>
                    <?php if ($validation->hasError('no_skripsi')) { ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_skripsi') ?>
                        </div>
                    <?php } else { ?>
                        <div class="valid-feedback">
                            No skripsi benar
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <small class="form-text text-muted">Masukkan No skripsi dengan benar</small>
                <?php } ?>
            </div>

            <!-- Form nama skripsi -->
            <div class="form-group">
                <label for="nama">Nama skripsi</label>
                <input type="text" name="nama" id="nama" placeholder="Nama skripsi" autocomplete="off" value="<?= set_value('nama') ?>" class="form-control
                            <?php if (isset($validation)) { ?>
                                <?php if ($validation->hasError('nama')) { ?>
                                    is-invalid
                                <?php } else { ?>
                                    is-valid
                                <?php } ?>
                            <?php } ?>" required maxlength="150">

                <?php if (isset($validation)) { ?>
                    <?php if ($validation->hasError('nama')) { ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama') ?>
                        </div>
                    <?php } else { ?>
                        <div class="valid-feedback">
                            Nama skripsi benar
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <small class="form-text text-muted">Masukkan Nama skripsi dengan benar</small>
                <?php } ?>
            </div>

            <!-- Form pengarang -->
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" placeholder="Pengarang" autocomplete="off" value="<?= set_value('pengarang') ?>" class="form-control
                            <?php if (isset($validation)) { ?>
                                <?php if ($validation->hasError('pengarang')) { ?>
                                    is-invalid
                                <?php } else { ?>
                                    is-valid
                                <?php } ?>
                            <?php } ?>" required maxlength="150">

                <?php if (isset($validation)) { ?>
                    <?php if ($validation->hasError('pengarang')) { ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('pengarang') ?>
                        </div>
                    <?php } else { ?>
                        <div class="valid-feedback">
                            Pengarang benar
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <small class="form-text text-muted">Masukkan Pengarang dengan benar</small>
                <?php } ?>
            </div>

            <!-- Form penerbit -->
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" autocomplete="off" value="<?= set_value('penerbit') ?>" class="form-control
                            <?php if (isset($validation)) { ?>
                                <?php if ($validation->hasError('penerbit')) { ?>
                                    is-invalid
                                <?php } else { ?>
                                    is-valid
                                <?php } ?>
                            <?php } ?>" required maxlength="100">

                <?php if (isset($validation)) { ?>
                    <?php if ($validation->hasError('penerbit')) { ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('penerbit') ?>
                        </div>
                    <?php } else { ?>
                        <div class="valid-feedback">
                            Penerbit benar
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <small class="form-text text-muted">Masukkan Penerbit dengan benar</small>
                <?php } ?>
            </div>

            <div class="form-group">
                <p>
                    <label for="sampul">File (Opsional)</label>
                    <br>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseUploadSampul" aria-expanded="false" aria-controls="collapseUploadSampul">
                        Upload file
                    </button>
                    <?php if (isset($validation)) { ?>
                        <?php if ($validation->hasError('sampul')) { ?>
                            <small style="color: #dc3545;" class="form-text">
                                <?= $validation->getError('sampul') ?>
                            </small>
                        <?php } else { ?>
                            <small style="color:#28a745;" class="form-text">
                                File benar
                            </small>
                        <?php } ?>
                    <?php } else { ?>
                        <small class="form-text text-muted">Masukkan File dengan benar</small>
                    <?php } ?>
                </p>
                <div class="collapse" id="collapseUploadSampul">
                    <!-- Form upload sampul -->
                    <div class="form-group">
                        <input type="file" class="custom-file-input fas dropify" data-height="150" name="sampul" id="sampul">
                    </div>
                </div>
            </div>

            <!-- Select kategori -->
            <div class="form-group">
                <label for="kategori">Kategori skripsi</label>
                <select name="kategori" id="kategori" class="form-control
                            <?php if (isset($validation)) { ?>
                                <?php if ($validation->hasError('kategori')) { ?>
                                    is-invalid
                                <?php } else { ?>
                                    is-valid
                                <?php } ?>
                            <?php } ?>" required>

                    <?php foreach ($kategori as $ktg) { ?>
                        <option value="<?= $ktg['nama_kategori'] ?>"><?= $ktg['nama_kategori'] ?></option>
                    <?php } ?>
                </select>
                <?php if (isset($validation)) { ?>
                    <?php if ($validation->hasError('kategori')) { ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kategori') ?>
                        </div>
                    <?php } else { ?>
                        <div class="valid-feedback">
                            Kategori benar
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <small class="form-text text-muted">Pilih Kategori dengan benar</small>
                <?php } ?>
            </div>

            <!-- Form deskripsi skripsi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi (Opsional)</label>
                <textarea name="deskripsi" id="deskripsi" cols="70" rows="5" placeholder="Deskripsi skripsi" class="form-control
                            <?php if (isset($validation)) { ?>
                                <?php if ($validation->hasError('deskripsi')) { ?>
                                    is-invalid
                                <?php } else { ?>
                                    is-valid
                                <?php } ?>
                            <?php } ?>" maxlength="450"><?= set_value('deskripsi') ?></textarea>

                <?php if (isset($validation)) { ?>
                    <?php if ($validation->hasError('deskripsi')) { ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi') ?>
                        </div>
                    <?php } else { ?>
                        <div class="valid-feedback">
                            Deskripsi benar
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <small class="form-text text-muted">Masukkan Deskripsi dengan benar</small>
                <?php } ?>
            </div>
            <hr>

            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>