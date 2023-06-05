
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title?></title>

  <!-- Favicons -->
  <link href="<?= base_url()?>assets/logo/logoMkTrans.png" rel="icon">
  <link href="<?= base_url()?>assets/logo/logoMkTrans.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/dist/css/adminlte.min.css">

  
    <!-- jQuery -->
    <script src="<?= base_url()?>assets/admin/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard')?>" class="brand-link">
      <img src="<?= base_url()?>assets/logo/logoMkTrans.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MK TRANS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/upload/users/'.$this->checkusers->users_login()->image)?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span class="d-block text-white"><?= $this->checkusers->users_login()->nama?></span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('dashboard')?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : null ?>">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('hero')?>" class="nav-link <?= $this->uri->segment(1) == 'hero' ? 'active' : null ?>">
              <i class="nav-icon fas fa-camera-retro"></i>
              <p>
                Hero
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('superiority')?>" class="nav-link <?= $this->uri->segment(1) == 'superiority' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-gem"></i>
              <p>
                Superiority MK TRANS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('about')?>" class="nav-link <?= $this->uri->segment(1) == 'about' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-tags"></i>
              <p>
                About MK TRANS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('termsAndConditions')?>" class="nav-link <?= $this->uri->segment(1) == 'termsAndConditions' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-feather-alt"></i>
              <p>
                Terms And Conditions
              </p>
            </a>
          </li>
          <li class="nav-item 
            <?= $this->uri->segment(1) == 'visi' ? 'menu-open' : null ?> || 
            <?= $this->uri->segment(1) == 'misi' ? 'menu-open' : null ?>
          ">
            <a href="#" class="nav-link 
              <?= $this->uri->segment(1) == 'visi' ? 'active' : null ?> ||
              <?= $this->uri->segment(1) == 'misi' ? 'active' : null ?>
            ">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Visi And Misi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('visi')?>" class="nav-link <?= $this->uri->segment(1) == 'visi' ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('misi')?>" class="nav-link <?= $this->uri->segment(1) == 'misi' ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Misi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item 
              <?= $this->uri->segment(1) == 'kategoriBarang' ? 'menu-open' : null ?> ||
              <?= $this->uri->segment(1) == 'barang' ? 'menu-open' : null ?>
            ">
            <a href="#" class="nav-link 
              <?= $this->uri->segment(1) == 'kategoriBarang' ? 'active' : null ?> ||
              <?= $this->uri->segment(1) == 'barang' ? 'active' : null ?>
            ">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Types Of Good
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('kategoriBarang')?>" class="nav-link <?= $this->uri->segment(1) == 'kategoriBarang' ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('barang') ?>" class="nav-link <?= $this->uri->segment(1) == 'barang' ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item 
            <?= $this->uri->segment(1) == 'contactDescription' ? 'menu-open' : null ?>  ||
            <?= $this->uri->segment(1) == 'contact' ? 'menu-open' : null ?>
            ">
            <a href="#" class="nav-link 
              <?= $this->uri->segment(1) == 'contactDescription' ? 'active' : null ?> ||
              <?= $this->uri->segment(1) == 'contact' ? 'active' : null ?>
              ">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Contact And Medsos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('contactDescription')?>" class="nav-link <?= $this->uri->segment(1) == 'contactDescription' ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Description Contact</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('contact')?>" class="nav-link <?= $this->uri->segment(1) == 'contact' ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Address And Medsos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('logout')?>" class="nav-link">
              <i class="nav-icon fas fa-solid fa-person-booth"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <?php if($this->checkusers->users_login()->level != 'user'):?>
          <li class="nav-header">Users</li>
          <li class="nav-item">
            <a href="<?= base_url('users')?>" class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <?php endif;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?= $contents?>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2022 <span class="text-primary">MK TRANS</span>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
