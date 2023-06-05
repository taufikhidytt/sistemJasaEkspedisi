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
            <li class="breadcrumb-item"><a href="<?= base_url('barang')?>">Data Barang</a></li>
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
            <a href="<?= base_url('barang')?>" class="btn btn-secondary btn-sm">
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
            <input type="hidden" name="id" id="id" value="<?= $data->id_barang?>">
            <div class="form-group">
                <label for="nama">Nama Barang:</label>
                <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : null ?>" id="nama" name="nama" placeholder="Masukan Nama Barang" value="<?= $this->input->post('nama') ?? $data->nama?>">
                <span class="text-red"><?= form_error('nama')?></span>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori Barang:</label>
                <select name="kategori" id="kategori" class="form-control <?= form_error('kategori') ? 'is-invalid' : null ; ?>">
                  <option value="">--Select--</option>
                  <?= $params = $this->input->post('kategori') ?? $data->id_kategori ;?>
                  <?php foreach($kategori->result() as $kt):?>
                    <option value="<?= $kt->id_kategori?>" <?= $kt->id_kategori == $params ? 'selected' : null ?>><?= $kt->nama?></option>
                  <?php endforeach;?>
                </select>
                <span class="text-red"><?= form_error('kategori')?></span>
            </div>
            <div class="form-group">
                <label for="description">Description Kategori Barang:</label>
                <textarea name="description" id="description" class="form-control <?= form_error('description') ? 'is-invalid' : null ?>" placeholder="Masukan Description Barang"><?= $this->input->post('description') ?? $data->description ;?></textarea>
                <span class="text-red"><?= form_error('description')?></span>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <div class="form-group">
                    <label for="image">Image Barang:</label>
                    <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                </div>
                <span class="text-warning">
                  <ul>
                    <li>Format photo png, jpeg, jpg</li>
                    <li>Max size 2 mb</li>
                  </ul>
                </span>
              </div>
              <div class="col-lg-8 col-sm-12">
                  <img class="img-fluid img-bordered h-10" src="<?= base_url('assets/upload/barang/'.$data->image)?>" alt="Photo" id="photo">
              </div>
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
<script>
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#photo').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>