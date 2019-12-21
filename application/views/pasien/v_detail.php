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
                <span class="info-box-text">Rekam Medik Pasien</span>
                <span class="info-box-number"><?= $countrekammedis->total?></span>
                <a href="<?= base_url()?>pasien/getRekamMedik/<?= $kdpasien?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pasien Dari Dokter</span>
                <span class="info-box-number"><?= $countdokter->total?></span>
                <a href="<?= base_url()?>pasien/getListDokter/<?= $kdpasien?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
      
         
          <!-- /.col -->
        </div>
      <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Data pasien dengan nama <b><?= $pasien->nama?></b> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
         
                </div>
              </div>
              <div class="card-body" style="background-color: #212529; color: white;">
              <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Nama</Label>
                        </div>
                        <div class="col-sm">
                            <?= $pasien->nama?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Jenis Kelamin</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->jenis_kelamin?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>No Hp</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->nohp ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Tempat Lahir</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->tempat_lahir?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Tanggal Lahir</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->tgl_lahir?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Provinsi</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->provinsi?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Kota</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->kota?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Kecamatan</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->kecamatan?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Kelurahan</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->kelurahan?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Nama Ibu</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->nama_ibu?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <Label>Bergabung</Label>
                        </div>
                        <div class="col-sm">
                        <?= $pasien->created_at?>
                        </div>
                    </div>
                    <hr>
                    
              </div>
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  
  </div>