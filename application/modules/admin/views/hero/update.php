<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">


<!-- SweetAlert2 -->
<script src="<?= base_url()?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>


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
            <li class="breadcrumb-item"><a href="<?= base_url('hero')?>">Data Hero</a></li>
            <li class="breadcrumb-item active"><?= $judul?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div id="flashError" data-error="<?= $this->session->flashdata('error');?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('hero')?>" class="btn btn-secondary btn-sm">
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
            <input type="hidden" name="id" id="id" value="<?= $data->id?>">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : null ?>" id="title" name="title" placeholder="Masukan Title Hero" value="<?= $this->input->post('title') ?? $data->title?>">
                <span class="text-red"><?= form_error('title')?></span>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control <?= form_error('description') ? 'is-invalid' : null ?> " placeholder="Masukan Description Hero Anda"><?= $this->input->post('description') ?? $data->description ?></textarea>
                <span class="text-red"><?= form_error('description')?></span>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <div class="form-group">
                    <label for="banner">Banner Image:</label>
                    <input type="file" class="form-control" id="banner" name="banner" onchange="readURL(this);">
                </div>
                <span class="text-warning">
                  <ul>
                    <li>Format photo png, jpeg, jpg</li>
                    <li>Max size 2 mb</li>
                    <li>Recomended dimensi 4868 x 3227</li>
                  </ul>
                </span>
              </div>
              <div class="col-lg-8 col-sm-12">
                  <img class="img-fluid img-bordered h-10" src="<?= base_url('assets/upload/banner/'.$data->banner)?>" alt="Photo" id="photo">
              </div>
            </div><br>
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

  var flasherror = $('#flashError').data('error');
  if(flasherror)
  {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: flasherror,
    })
  }
</script>