  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row">
          <!-- /.col -->
     

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pendapatan</span>
                <span class="info-box-number">Rp <?= number_format($karyawan->gaji,0,",",".")?></span>
                <a href="<?= base_url()?>karyawan/riwayatGaji/<?= $kdkaryawan?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
    
        </div>
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Karyawan <?= $karyawan->nama?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
              <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Nama</Label>
                        </div>
                        <div class="col-sm">
                            <?= $karyawan->nama?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Jenis Kelamin</Label>
                        </div>
                        <div class="col-sm">
                        <?= $karyawan->jenis_kelamin?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>No Hp</Label>
                        </div>
                        <div class="col-sm">
                        <?= $karyawan->no_hp ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Alamat</Label>
                        </div>
                        <div class="col-sm">
                        <?= $karyawan->alamat?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Tanggal Lahir</Label>
                        </div>
                        <div class="col-sm">
                        <?= $karyawan->tanggal_lahir?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Bergabung</Label>
                        </div>
                        <div class="col-sm">
                        <?= $karyawan->created_at?>
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