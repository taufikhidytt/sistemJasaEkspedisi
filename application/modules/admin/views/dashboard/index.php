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
          <h1><?= $judul ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><?= $judul?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div id="flashSuccess" data-success="<?= $this->session->flashdata('success');?>"></div>
  <div id="flashWarning" data-warning="<?= $this->session->flashdata('warning');?>"></div>
  <div id="flashError" data-error="<?= $this->session->flashdata('error');?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?= $judul?></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $superiority?></h3>

                <p>Superiority MK TRANS</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-solid fa-gem"></i>
              </div>
              <a href="<?= base_url('superiority')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $termsAndConditions ?></h3>

                <p>Terms And Conditions</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-solid fa-feather-alt"></i>
              </div>
              <a href="<?= base_url('termsAndConditions')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?= $barang?></h3>

                <p>Types Of Good</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-cubes"></i>
              </div>
              <a href="<?= base_url('barang')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $contact?></h3>

                <p>Address And Medsos</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-address-card"></i>
              </div>
              <a href="<?= base_url('contact')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  var flashsuccess = $('#flashSuccess').data('success');
  var flashwarning = $('#flashWarning').data('warning');
  var flasherror = $('#flashError').data('error');

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

  if(flasherror)
  {
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: flasherror,
      })
  }
</script>