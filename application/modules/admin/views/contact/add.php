<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $judul?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('contact')?>">Data Contact</a></li>
            <li class="breadcrumb-item active"><?= $judul?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('contact')?>" class="btn btn-secondary btn-sm">
                <i class="fa fa-reply-all"></i> Back
            </a>
        </div>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name Contact:</label>
                <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : null ?>" id="name" name="name" placeholder="Masukan Name Contact" value="<?= $this->input->post('name')?>">
                <span class="text-warning">note: Jika jenis contact phone wajib terdaftar di whatsapp, agar bisa chat by whatsapp</span>
                <span class="text-red"><?= form_error('name')?></span>
            </div>
            <div class="form-group">
                <label for="jenis_contact">Jenis Contact:</label>
                <select name="jenis_contact" id="jenis_contact" class="form-control <?= form_error('jenis_contact') ? 'is-invalid' : null ?>">
                  <option value="">--Select--</option>
                  <option value="address" <?= set_value('jenis_contact') == 'address' ? 'selected' : null ?> >Address</option>
                  <option value="email" <?= set_value('jenis_contact') == 'email' ? 'selected' : null ?>>Email</option>
                  <option value="phone" <?= set_value('jenis_contact') == 'phone' ? 'selected' : null ?>>Phone</option>
                  <option value="facebook" <?= set_value('jenis_contact') == 'facebook' ? 'selected' : null ?>>Facebook</option>
                  <option value="instagram" <?= set_value('jenis_contact') == 'instagram' ? 'selected' : null ?>>Instagram</option>
                </select>
                <span class="text-red"><?= form_error('jenis_contact')?></span>
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i> Submit
            </button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->