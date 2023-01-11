<?php $uri = service('uri'); ?>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="<?= base_url('home') ?>"><h2>Repositori</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <?php if (session()->get('isLoggedIn')) { ?>
              <li class="nav-item active <?= ($uri->getSegment(1)) == 'home' ? 'active' : null ?>">
                <a class="nav-link" href="<?= base_url('home') ?>">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item <?= ($uri->getSegment(1)) == 'library' ? 'active' : null ?>">
                <a class="nav-link" href="<?= base_url('library') ?>">Library</a>
              </li>
              <?php if ($user['jabatan'] == 1) { ?>
              <li class="nav-item <?= ($uri->getSegment(1)) == 'admin' ? 'active' : null ?>">
                <a class="nav-link" href="<?= base_url('admin') ?>">Admin</a>
              </li>
              <?php } ?>
              <ul class="navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= base_url('foto/fotoprofil/' . $user['foto_profil']) ?>" alt="image" class="rounded-circle" height="30px" width="30px">
                            <p style="display: inline;" id="nav-name"><?= $user['nama_user'] ?></p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('profile') ?>">
                                <img src="<?= base_url('foto/fotoprofil/' . $user['foto_profil']) ?>" alt="image" class="rounded-circle" height="55px" width="55px"> <?= $user['nama_user'] ?>
                            </a>
                            <?php if ($user['jabatan'] != 1) { ?>
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="<?= base_url('myBook') ?>"><i class="fas fa-book"></i> My Book</a> -->
                            <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav">
                    <li class="nav-item <?= ($uri->getSegment(1)) == '' ? 'active' : null ?>">
                        <a class="nav-link" href="<?= base_url('/') ?>">Login</a>
                    </li>
                </ul>
            <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>