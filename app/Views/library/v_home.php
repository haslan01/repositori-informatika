<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-content">
              <div class="row">
                <div class="col-lg-8">
                <span>Selamat datang di</span>
                  <h4>Repositori Teknik Informatika Unsulbar</h4>
                </div>
                <!-- <div class="col-lg-4">
                  <div class="main-button">
                    <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <!-- <img src="assets/images/blog-post-01.jpg" alt=""> -->
                    </div>
                    <div class="down-content">
                    <?php if ($new_skripsi == null) { ?>
                        <div class="card-body">
                            <h3 style="display: inline;">
                                Tidak ditemukan.
                            </h3>
                        </div>
                    <?php } else { ?>
                    <div class="blog-thumb">
                      <!-- <img src="assets/images/blog-post-01.jpg" alt=""> -->
                    </div>                      
                      <?php foreach ($new_skripsi as $nskripsi) { ?>
                      <span><?= $nskripsi['nama_kategori'] ?></span>
                      <a href="<?= base_url('detailSkripsi/' . $nskripsi['no_skripsi']) ?>"><h4><b title="<?= $nskripsi['nama_skripsi'] ?>"><?= substr($nskripsi['nama_skripsi'], 0, 100) ?><?php if (strlen($nskripsi['nama_skripsi']) > 100) { ?>...<?php } ?></b></h4></a>
                      <ul class="post-info">
                        <li><a href="#"><?= $nskripsi['skripsi-created_at'] ?></a></li>
                      </ul>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="<?= base_url('detailSkripsi/' . $nskripsi['no_skripsi']) ?>">Lihat Detail</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <p><?= substr($nskripsi['deskripsi_skripsi'], 0, 150) ?><?php if (strlen($nskripsi['deskripsi_skripsi']) > 160) { ?>...<?php } ?></p>
                      
                      <br>
                      <?php } ?>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                
                <!-- <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.html">View All Posts</a>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="">
                      <input type="text" value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : null ?>" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                      <input class="btn" type="submit" value="Cari">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                      <?php foreach ($kategori_footer as $ktgr) { ?>
                        <li>
                            <a href="<?= base_url('kategoriCepat/' . $ktgr['nama_kategori']) ?>"><?= $ktgr['nama_kategori'] ?></a>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">jurnal</a></li>
                        <li><a href="#">skripsi</a></li>
                        <li><a href="#">jaringan</a></li>
                        <li><a href="#">rpl</a></li>
                        <li><a href="#">sistem cerdas</a></li>
                        <li><a href="#">informatika</a></li>
                        <li><a href="#">teknik</a></li>
                        <li><a href="#">robotika</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 
<?= $this->endSection('content'); ?>