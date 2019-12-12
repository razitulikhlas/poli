  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row">
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Diagnosa</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pendapatan</span>
                <span class="info-box-number">Rp <?=$dokter->gaji?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pasien</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Dokter <?= $dokter->nama?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
              <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Nama</Label>
                        </div>
                        <div class="col-sm">
                            <?= $dokter->nama?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Jenis Kelamin</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->jenis_kelamin?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>No Hp</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->nohp ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Noizin</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->noizin?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Alamat</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->alamat?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Provinsi</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->provinsi?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Kota</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->kota?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Kecamatan</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->kecamatan?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Kelurahan</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->kelurahan?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Tempat Lahir</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->tampat_lahir?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Tanggal Lahir</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->tanggal_lahir?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Spesialis</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->spesialis?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Email</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->email?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Bergabung</Label>
                        </div>
                        <div class="col-sm">
                        <?= $dokter->created_at?>
                        </div>
                    </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  
  </div>