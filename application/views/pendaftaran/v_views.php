  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <?php foreach($spesialis as $row) : ?>
        <div class="col-12 justify-content-center">
          <div class="card bg-primary">
            <div class="card-header">
              <h3 class="nav justify-content-center">POLI <?= $row['nama'] ?></h3>
            </div>
            <div class="nav justify-content-center">
              <img src="<?= base_url()?>assets/foto/dokter.png" height="100px"\>
            </div>
            <div class="card-footer">
                 <a href="<?= base_url()?>pendaftaran/tambah/<?= $row['kd_spesialis'] ?>" class="nav justify-content-center" style="color: white;font-size: 30px">PILIH&nbsp;<i class="fas fa-arrow-circle-right mt-2"></i></a>
            </div>
          </div>
      </div>
    <?php endforeach; ?>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  
  </div>


   <!-- modal -->


  
