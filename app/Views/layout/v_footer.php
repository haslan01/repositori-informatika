    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
            <?php foreach ($kategori_footer as $ktgr) { ?>
                <li>
                    <a href="<?= base_url('kategoriCepat/' . $ktgr['nama_kategori']) ?>"><?= $ktgr['nama_kategori'] ?></a>
                </li>
            <?php } ?>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
              <p>Copyright 2023 Stand Blog Co.
                    
                 | Design: <a rel="nofollow" href="#" target="_parent">Sintaks</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>