<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="heading-page header-text">
</div>
<h2 class="mb-3" align="center">Detail skripsi untuk <?= $skripsi['nama_skripsi'] ?></h2>

<!-- Jika ada pesan berhasil -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('success') ?> Lihat<a href="<?= base_url('myBook') ?>"> skripsi Saya</a>
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
                <h5 class="card-title"><b><?= $skripsi['nama_skripsi'] ?></b></h5>            
                <hr>
                <p class="card-text">Penulis: <b><?= $skripsi['pengarang_skripsi'] ?></b></p>
                <p class="card-text">Penerbit: <b><?= $skripsi['penerbit_skripsi'] ?></b></p>
                <p class="card-text">Kategori: <b><?= $skripsi['nama_kategori'] ?></b></p>
                <p class="card-text">Deskripsi: <b><?= $skripsi['deskripsi_skripsi'] ?></b></p>
               
                <a class="btn btn-primary" href="<?php echo base_url('foto/sampulbuku/' . $skripsi['file_skripsi']); ?>">Download</a>
                <!-- Jika admin mengunjungi halaman ini -->
                
            </div>
        </div>
    </div>
</div>
<script>
  // Muat file PDF
  PDFJS.getDocument(<?php base_url('foto/sampulbuku/' . $skripsi['file_skripsi'])?>).then(function(pdf) {
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