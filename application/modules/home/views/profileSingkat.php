<!-- ======= About Section ======= -->
<section id="" class="about section-bg" style="height: 100vh;">
    <div class="container" data-aos="fade-up">
    <div class="row no-gutters">
        <div class="content col-12">
        <div class="content">
            <h3 class="text-center" data-aos="fade-up">Profile Singkat Multi Kawan Trans (MK TRANS)</h3>
            <p class="text-center" data-aos="fade-up" style="line-height: 50px;">
            <?= $about->description?>
            </p>
        </div>
        </div>
    </div>

    </div>
</section>
<!-- End About Section -->

<!-- ======= About Section ======= -->
<section id="" class="about bg-white">
    <div class="container" data-aos="fade-up">
    <div class="row no-gutters">
        <h1 class="text-center" data-aos="fade-up"><b>Visi Dan Misi Multi Kawan Trans (MK TRANS)</b></h1>
        <div class="content col-12">
            <div class="content">
                <h3 class="text-center" data-aos="fade-up">Visi</h3>
                <div class="col-lg-4 offset-lg-4 col-sm-8 offset-sm-2 text-center">
                    <p data-aos="fade-up">
                    <?= $visi->visi?>
                    </p>
                </div>
                <h3 class="text-center" data-aos="fade-up">Misi</h3>
                <div class="col-lg-4 offset-lg-4 col-sm-8 offset-sm-2 text-center">
                    <p data-aos="fade-up">
                    <?= $misi->misi?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>
<!-- End About Section -->

<!-- ======= Portfolio Section ======= -->
<section id="" class="portfolio" style="background: #1b1b1b; color:#ffffff">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Jenis Barang Yang Kami Layani</h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                
                <?php foreach($kategori->result() as $kt):?>
                    <li data-filter=".filter-<?= $kt->id_kategori?>"><?= $kt->nama?></li>
                <?php endforeach;?>
            </ul>
            </div>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach($barang->result() as $br):?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-<?= $br->id_kategori;?>">
                    <div class="portfolio-wrap">
                        <img src="<?= base_url('assets/upload/barang/'.$br->image)?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                        <h4><?= $br->nama;?></h4>
                        <p><?= $br->description;?></p>
                        <div class="portfolio-links">
                            <a href="<?= base_url('assets/upload/barang/'.$br->image)?>" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bx bx-zoom-in"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<!-- End Portfolio Section