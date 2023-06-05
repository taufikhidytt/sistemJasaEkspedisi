
<!-- Sweetalert2 -->
<link href="<?= base_url()?>assets/users/assets/css/sweetalert2.min.css" rel="stylesheet">


<!-- Sweetalert2 -->
<script src="<?= base_url()?>assets/users/assets/js/sweetalert2.min.js"></script>

<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq mt-5" style="height: 100vh;">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Cek Resi</h2>
        </div>
        <div class="col-lg-6 offset-lg-3">
            <form action="" method="post">
                <div class="form-group">
                    <label for="no_resi">Cek Resi Anda Di Sini:</label><br><br>
                    <input type="text" name="no_resi" id="no_resi" class="form-control" autocomplete="off" placeholder="Masukan No Resi Anda">
                    <span class="text-danger"><?= form_error('no_resi')?></span>
                </div><br><br>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Submit</button>
                </div>
            </form>
        </div><br><br>
        <?php if($this->session->flashdata('success')):?>
            <div id="flashSuccess" data-success="<?= $this->session->flashdata('success');?>"></div>
            <div class="col-lg-10 offset-lg-1 col-sm-12">
                <table class="table table-bordered table-striped table-responsive text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Resi</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tujuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12345</td>
                            <td>Bpk.Suryana</td>
                            <td>Tangerang</td>
                            <td>Bali</td>
                            <td class="bg-success text-white">Success</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php endif;?>
        <div id="flashWarning" data-warning="<?= $this->session->flashdata('warning');?>"></div>
    </div>
</section>
<!-- End Frequently Asked Questions Section -->
<script>
    var flashsuccess = $('#flashSuccess').data('success');
    var flashwarning = $('#flashWarning').data('warning');

    if(flashsuccess)
    {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashsuccess,
        })
    }

    if(flashwarning)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashwarning,
        })
    }
</script>