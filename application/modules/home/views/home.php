
  <!-- Flickity CSS File -->
  <link href="<?= base_url()?>assets/users/assets/css/flickity.css" rel="stylesheet">

  <!-- flickity -->
  <script src="<?= base_url()?>assets/users/assets/js/flickity.pkgd.min.js"></script>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <img src="<?= base_url('assets/upload/banner/'.$hero->banner)?>" alt="Photo hero" id="heroimg" class="" data-aos="zoom-out">

    <div class="container" data-aos="zoom-in" data-aos-delay="1500">
      <div class="row">
        <div class="col-xl-6">
          <div class="card p-4">
            <h3 class="text-black">
              <b>
                <?= $hero->title?>
              </b>
            </h3>
            <h5 class="text-primary mt-2">
              <b>
                <?= $hero->description?>
              </b>
            </h5>
            <p>
              <a href="#contact" class="btn btn-danger mt-3 scrollto">Hubungi Kami</a>
            </p>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row no-gutters">
          <div class="content col-12">
            <div class="content">
              <h3 class="text-center" data-aos="fade-up">Mengapa Harus Pilih Multi Kawan Trans?</h3>
              <?php $no = 1; foreach($superiority->result() as $superiority):?>
                <p data-aos="fade-up">
                  <?= $no++;?>. <?= $superiority->title?>
                </p>
              <?php endforeach;?>
              <div class="text-center" data-aos="fade-up">
                <a href="#contact" class="about-btn"><span>Hubungi Kami</span></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact mt-5">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
              <h2>Contact</h2>
              <p><?= $contactDescription->description?></p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">

              <div class="col-lg-6">

                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Address</h3>
                            <ul>
                              <?php foreach($contactAddress->result() as $address):?>
                              <li>
                                  <p><?= $address->name?></p>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <?php foreach($contactEmail->result() as $email):?>
                              <a href="mailto:<?= $email->name?>" target="blank">
                                <p class="text-white"><?= $email->name?></p>
                              </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us And Chat</h3>
                            <?php foreach($contactPhone->result() as $phone):?>
                              <a href="https://wa.me/<?= $phone->name?>" target="blank">
                                <p class="text-white"><?= $phone->name?></p>
                              </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bxl-facebook"></i>
                            <h3>Facebook</h3>
                            <?php foreach($contactFacebook->result() as $facebook):?>
                              <a href="https://facebook.com/<?= $facebook->name?>" target="blank">
                                <p class="text-white"><?= $facebook->name?></p>
                              </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bxl-instagram"></i>
                            <h3>Instagram</h3>
                            <?php foreach($contactInstagram->result() as $instagram):?>
                              <a href="https://instagram.com/<?= $instagram->name?>" target="blank">
                                <p class="text-white"><?= $instagram->name?></p>
                              </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>

              </div>

              <div class="col-lg-6">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8607133293854!2d106.53318364579589!3d-6.282034902675443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fd62096d6151%3A0x3deb4f8ac488d0b6!2sPanongan%2C%20Kec.%20Panongan%2C%20Kabupaten%20Tangerang%2C%20Banten%2015710!5e0!3m2!1sid!2sid!4v1660336494244!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>

          </div>

        </div>
    </section>
    <!-- End Contact Section -->

  </main>
  <!-- End #main -->