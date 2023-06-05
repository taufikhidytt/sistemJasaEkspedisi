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
            <li class="breadcrumb-item"><a href="<?= base_url('kategoriBarang')?>">Data Kategori Barang</a></li>
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
            <a href="<?= base_url('kategoriBarang')?>" class="btn btn-secondary btn-sm">
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
        <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?= $data->id_kategori ?>">
            <div class="form-group">
                <label for="nama">Nama Kategori Barang:</label>
                <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : null ?>" id="nama" name="nama" placeholder="Masukan Nama Kategori Barang" value="<?= $this->input->post('nama') ?? $data->nama ?>">
                <span class="text-red"><?= form_error('nama')?></span>
            </div>
            <div class="form-group">
                <label for="description">Description Kategori Barang:</label>
                <textarea name="description" id="description" class="form-control <?= form_error('description') ? 'is-invalid' : null ?>" placeholder="Masukan Description Kategori Barang"><?= $this->input->post('description') ?? $data->description ;?></textarea>
                <span class="text-red"><?= form_error('description')?></span>
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