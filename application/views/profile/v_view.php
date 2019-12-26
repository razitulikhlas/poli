<div class="content-wrapper ">
  <div class="container-fluid ">
    <div class="row ">
      <div class="col-md-12">
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->

          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username"><?= $dokter[0]->nama  ?></h3>
            <h5 class="widget-user-desc">Spesialis Anak</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="<?= base_url() ?>assets/dist/img/<?= $dokter[0]->photo  ?>" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">Rp <?= number_format($dokter[0]->gaji, 0, ",", ".") ?></h5>
                  <span class="description-text">PENDAPATAN BULAN INI</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">1711082035</h5>
                  <span class="description-text">NO IZIN</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header"><?= $pasien->total ?></h5>
                  <span class="description-text">TOTAL PASIEN</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- end col -->
      </div>


      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Profile</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body" style="display: block;">
            <!-- <div class="col-md-2 mb-2">
              <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-edit"></i> edit</button>
            </div> -->
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Absen</th>
                  <td>
                    <label class="switch">
                      <input type="checkbox" class="absen">
                      <span class="slider round"></span>
                    </label>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Alamat</th>
                  <td><?= $dokter[0]->alamat ?></td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td><?= $dokter[0]->email ?></td>
                </tr>
                <tr>
                  <th scope="row">Gaji</th>
                  <td><label id="tarif">Rp <?= number_format($dokter[0]->gaji, 0, ",", ".") ?></label></td>
                </tr>
                <tr>
                  <th scope="row">Jenis kelamin</th>
                  <td><?= $dokter[0]->jenis_kelamin ?></td>
                </tr>
                <tr>
                  <th scope="row">Kode Dokter</th>
                  <td><label id="kd_dokter"><?= $dokter[0]->kd_dokter ?></label></td>
                </tr>
                <tr>
                  <th scope="row">No hp</th>
                  <td><?= $dokter[0]->nohp ?></td>
                </tr>

                <tr>
                  <th scope="row">Tanggal Lahir</th>
                  <td><?= $dokter[0]->tanggal_lahir ?></td>
                </tr>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Riwayat Gaji</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body" style="display: block;">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Credit</th>
                        <th scope="col">Withdrat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>08-11-1197</td>
                        <td>Rp. 1500.000</td>
                        <td>Rp. 1500.000</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
        </div>
    </div>   -->
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Dokter</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <form action="<?= base_url('jadwal/simpanJadwal') ?>" method="post">

          <div class="form-group">
            <input type="hidden" class="form-control" name="kd_dokter" id="kd_dokter" value="<?= $dokter[0]->kd_dokter  ?>">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="kd_poli" id="kd_poli" value="<?= $dokter[0]->spesialis  ?>">
          </div>
          <div class="form-group">
            <label for="dokter">Dokter</label>
            <input type="text" class="form-control" value="<?= $dokter[0]->nama   ?>" id="dokter" name="dokter" readonly="">

          </div>
          <div class="form-group">
            <label for="waktu">WAKTU</label>
            <div class="input-group date" id="waktu" data-target-input="nearest">
              <input type="text" name="waktu" class="form-control datewaktu-input" data-target="#waktu">
              <div class="input-group-append" data-target="#waktu" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="jadwal">Tanggal</label>
            <input type="date" class="form-control" id="jadwal" name="jadwal">
          </div>

          <div class="form-group">
            <label for="status">STATUS</label>
            <input type="text" class="form-control" id="status" name="status">
          </div>
          <div class="form-group">
            <label for="status">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
          </div>


          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah Data</button>
        </form>
      </div>
    </div>
  </div>
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
    let tarif = $('#tarif').text();
    let kd_dokter = $('#kd_dokter').text();
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