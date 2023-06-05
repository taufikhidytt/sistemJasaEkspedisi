<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" id="home">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url()?>assets/logo/logoMkTrans.png" rel="icon">
  <link href="<?= base_url()?>assets/logo/logoMkTrans.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url()?>assets/users/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/users/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/users/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/users/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/users/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/users/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/users/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url()?>assets/users/assets/css/style.css" rel="stylesheet">

  <!-- Jquery -->
  <script src="<?= base_url()?>assets/users/assets/js/jquery.min.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto">
        <a href="<?= base_url()?>">
          <img src="<?= base_url()?>assets/logo/logoMkTrans.png" alt="">
        </a>
      </h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto <?= $this->uri->segment(1) == '' ? 'active' : null;?>" href="<?= base_url()?>">Home</a></li>
          <li class="dropdown">
            <a href="#" class="nav-link scrollto <?= $this->uri->segment(1) == 'profileSingkat' ? 'active' : null ?>">
              <span>Tentang Kami</span>
              <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
              <li><a class="nav-link scrollto <?= $this->uri->segment(1) == 'profileSingkat' ? 'active' : null?>" href="<?= base_url('profileSingkat')?>">Profile Singkat</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="<?= base_url()?>#contact">Kontak Kami</a></li>
          <li><a class="nav-link scrollto <?= $this->uri->segment(1) == 'syarat' ? 'active' : null?>" href="<?= base_url('syarat')?>">Syarat & Ketentuan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <?= $contents?>
  
  <!-- Footer -->
  <footer id="footer">
      <div class="container d-md-flex py-4">
          <div class="me-md-auto text-center text-md-start">
              <div class="copyright">
              &copy; Copyright <?= date('Y')?> <strong><span>Multi Kawan Trans</span></strong>. All Rights Reserved
              </div>
          </div>
      </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url()?>assets/users/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url()?>assets/users/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url()?>assets/users/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url()?>assets/users/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url()?>assets/users/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url()?>assets/users/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url()?>assets/users/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url()?>assets/users/assets/js/main.js"></script>

</body>

</html>