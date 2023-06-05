<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Syarat Dan Ketentuan Pengiriman</h2>
        </div>

        <ul class="faq-list accordion" data-aos="fade-up">

            <?php $no = 1; foreach($syarat->result() as $sy):?>
            <li>
                <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq<?= $no; ?>"><?= $sy->title; ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq<?= $no++; ?>" class="collapse" data-bs-parent=".faq-list">
                    <p>
                    <?= $sy->description; ?>
                    </p>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</section>
<!-- End Frequently Asked Questions Section -->