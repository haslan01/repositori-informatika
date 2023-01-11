<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="heading-page header-text">
</div>
<h2 class="mb-3" align="center">Detail skripsi untuk <?= $buku['nama_buku'] ?></h2>

<!-- Jika ada pesan berhasil -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('success') ?> Lihat<a href="<?= base_url('myBook') ?>"> Buku Saya</a>
    </div>
<?php endif; ?>

<!-- Jika ada pesan gagal -->
<?php if (session()->getFlashdata('danger')) : ?>
    <div class="alert alert-danger mt-2" role="alert">
        <?= session()->getFlashdata('danger') ?>
    </div>
<?php endif; ?>

<div class="card mb-3">
    <div class="row no-gutters">
        <!-- <div class="col-md-4"> -->
        <canvas id="pdf-canvas">
        </canvas>
        <!-- </div> -->
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><b><?= $buku['nama_buku'] ?></b></h5>
                <p>Status:<b>
                        <?php if ($buku['status_buku'] == 1) { ?>
                            <span class="badge badge-danger">
                                Dipinjam
                            </span>
                        <?php } else { ?>
                            <span class="badge badge-success">
                                Bebas
                            </span>
                        <?php } ?>
                    </b></p>
                <hr>

                <p class="card-text">Penulis: <b><?= $buku['pengarang_buku'] ?></b></p>
                <p class="card-text">Penerbit: <b><?= $buku['penerbit_buku'] ?></b></p>
                <p class="card-text">Kategori: <b><?= $buku['nama_kategori'] ?></b></p>
                <p class="card-text">Deskripsi: <b><?= $buku['deskripsi_buku'] ?></b></p>
               
                
                <a class="btn btn-primary" href="<?php echo base_url('foto/sampulbuku/' . $buku['sampul_buku']); ?>">Download</a>
                <!-- Jika admin mengunjungi halaman ini -->
                <?php if ($user['jabatan'] != 1) { ?>
                    <!-- Jika ada yang meminjam -->
                    <?php if ($peminjam != null) { ?>
                        <!-- Jika peminjamnya adalah user ini sendiri -->
                        <?php if ($peminjam['nis_bukupinjam'] == $user['nis']) { ?>
                            <!-- <button class="btn btn-primary" disabled>Anda Meminjam Buku Ini</button> -->
                        <?php } else { ?>
                            <!-- <button class="btn btn-danger" disabled>Seseorang Meminjam Buku Ini</button> -->
                        <?php } ?>
                    <?php } else { ?>
                        <!-- <a class="btn btn-success" href="<?= base_url('pinjamBuku/' . $buku['no_buku']) ?>" onclick="return confirm('Apakah anda yakin ingin meminjam Buku ini?');">Pinjam Buku</a> -->
                    <?php } ?>
                    <!-- Tombol Like -->
                    <?php if ($sudah_like == true) { ?>
                        <!-- <a href="<?= base_url('likeBuku/' . $buku['no_buku']) ?>" class="btn btn-primary"><i class="fas fa-thumbs-up" title="Batalkan Menyukai"> <?= $buku['love'] ?></i></a> -->
                    <?php } else { ?>
                        <!-- <a href="<?= base_url('likeBuku/' . $buku['no_buku']) ?>" class="btn btn-secondary"><i class="fas fa-thumbs-up" title="Sukai Buku Ini"> <?= $buku['love'] ?></i></a> -->
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
  // Muat file PDF
  PDFJS.getDocument(<?php base_url('foto/sampulbuku/' . $buku['sampul_buku'])?>).then(function(pdf) {
    // Ambil halaman pertama
    pdf.getPage(1).then(function(page) {
      var scale = 1.5;
      var viewport = page.getViewport({scale: scale});

      // Tentukan ukuran canvas sesuai dengan ukuran halaman PDF
      var canvas = document.getElementById('pdf-canvas');
      var context = canvas.getContext('2d');
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      // Render halaman PDF ke canvas
      var renderContext = {
        canvasContext: context,
        viewport: viewport
      };
      page.render(renderContext);
    });
  });
</script>

<?= $this->endSection('content'); ?>