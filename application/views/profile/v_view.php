  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row">
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-file"></i></span>

              <div class="info-box-content" id="">
                <span class="info-box-text">Diagnosa</span>
                <span class="info-box-number"><?= $diagnosa->jumlah?></span>
                <a href="<?= base_url()?>dokter/diagnosaDokter/<?= $kddokter?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <span class="info-box-number">Rp <?= number_format($dokter->gaji,0,",",".")?></span>
                <a href="<?= base_url()?>dokter/riwayatGaji/<?= $kddokter?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <input type="hidden" id="kd_dokter" value="<?= $kddokter?>">
              <div class="info-box-content">
                <span class="info-box-text">Pasien</span>
                <span class="info-box-number"><?= $pasien->total?></span>
                <a href="<?= base_url()?>dokter/pasienDokter/<?= $kddokter?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?= $dokter->nama?></h3>
                <h5 class="widget-user-desc"> <?= $dokter->spesialis?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?=base_url()?>assets/foto/<?=$dokter->photo?>" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?= $dokter->noizin?></h5>
                      <span class="description-text">No Izin</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          
        </div>
        
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Dokter <?= $dokter->nama?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
              <div class="container">
                  <div class="row">
                        <div class="col-sm-3">
                            <Label>Absen</Label>
                        </div>
                        <div class="col-sm">
                        <label class="switch">
                      <input type="checkbox" class="absen">
                      <span class="slider round"></span>
                    </label>
                        </div>
                    </div>
                    <hr>
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
                        <input type="hidden" value="<?= $dokters[0]->tarif ?>" id="tarif">
                    </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  
  </div>

  <script>
  $(function() {

    $('#waktu').datetimepicker({
      format: 'LT'
    })

    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
      Swal.fire({
        title: 'Data Jadwal ',
        text: 'Berhasil ' + flashData,
        type: 'success'
      });
    }
  });

  function tarif() {
    let tarif = $('#tarif').val();
    let kd_dokter = $('#kd_dokter').val();
    console.log(tarif, kd_dokter);

    $.ajax({
      type: 'POST',
      data: 'kd_dokter=' + kd_dokter +
             '&tarif=' + tarif,
      url: '<?= base_url() . "profile/absen" ?>',
      dataType: 'json',
      success: function(hasil) {
        console.log(hasil);
        if (hasil == null) {
          Swal.fire({
            title: 'Selamat absen anda sudah berhasil ',
            text: 'Berhasil ',
            type: 'success'
          });
        }

      }
    });

  }

  checkData();

  function checkData() {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() . "profile/checkData" ?>',
      dataType: 'json',
      success: function(hasil) {
        console.log(hasil);
        if (hasil) {
          $('.switch').append(
            `
                    <input type="checkbox" checked class="absen">
                    <span class="slider round"></span>  
                  `
          );

          $('.absen').prop('disabled', true);

        } else {
          $('.absen').prop('disabled', false);

        }

      }

    });
  }


  $('.absen').on('click', function() {
    tarif();
    $('.absen').prop('disabled', true);

  });
</script>