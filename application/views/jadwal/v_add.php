<div class="content-wrapper" style="min-height: 1537.56px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="ml-3">Jadwal DOKTER</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Collapsed Sidebar</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Elang Abdul Aziz</h3>
              <div class="card-tools">
                <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">
              <form action="<?= base_url('jadwal/simpanJadwal') ?>" method="post">

                <div class="form-group">
                  <input type="hidden" class="form-control" name="kd_jadwal" id="kd_jadwal" placeholder="Kode Jadwal">
                </div>
                <div class="form-group">
                  <label for="kd_poli">Poli</label>
                  <select class="form-control form-control-lg kdpoli" id="kd_poli" name="kd_poli">
                    <?php foreach ($spesialis as $row) : ?>
                      <option value="<?= $row['kd_spesialis'] ?>"><?= $row['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="kd_dokter">Dokter</label>
                  <select class="form-control form-control-lg" id="kd_dokter" name="kd_dokter">
                  </select>
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
                  <label for="waktu">Jadwal</label>
                  <div class="row ml-2">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" name="jadwal[]" type="checkbox" id="senin" value="Monday">
                      <label for="senin" class="custom-control-label">Senin</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" name="jadwal[]" type="checkbox" id="selasa" value="Tuesday">
                      <label for="selasa" class="custom-control-label ml-5">Selasa</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" name="jadwal[]" type="checkbox" id="rabu" value="Wednesday">
                      <label for="rabu" class="custom-control-label ml-5">Rabu</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" name="jadwal[]" type="checkbox" id="kamis" value="Thursday">
                      <label for="kamis" class="custom-control-label ml-5">Kamis</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" name="jadwal[]" type="checkbox" id="jummat" value="Friday">
                      <label for="jummat" class="custom-control-label ml-5">Jumm'at</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" name="jadwal[]" type="checkbox" id="sabtu" value="Saturday">
                      <label for="sabtu" class="custom-control-label ml-5">Sabtu</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" name="jadwal[]" type="checkbox" id="minggu" value="Sunday">
                      <label for="minggu" class="custom-control-label ml-5">Minggu</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="status">STATUS</label>
                  <input type="text" class="form-control" id="status" name="status">
                </div>

                <div class="form-group">
                  <label for="keterangan">KETERANGAN</label>
                  <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>


                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
              </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>


<script>
  $(function() {

    //Timepicker
    $('#waktu').datetimepicker({
      format: 'LT'
    })
    //jadwal

  });

  // getFoto();
  function getFoto() {
    var kd_dokter = $('#kd_dokter').val();
    console.log(kd_dokter);
    $.ajax({

      type: 'POST',
      data: 'kd_dokter=' + kd_dokter,
      url: '<?= base_url() . "jadwal/getFoto" ?>',
      dataType: 'json',
      success: function(hasil) {
        console.log(hasil);
        $("[name='foto']").val(hasil[0].photo);
      }

    });
  }

  $('select').on('change', function() {

  });

  $('.kdpoli').on('change', function() {
    getDokter();
  });

  getDokter();

  function getDokter() {
    let kd_poli = $('#kd_poli').val();
    $('#kd_dokter').html('');
    $.ajax({
      type: 'POST',
      url: '<?= base_url() . "jadwal/getDokter" ?>',
      data: 'kd_poli=' + kd_poli,
      dataType: 'json',
      success: function(hasil) {
        console.log(hasil)
        if (hasil.length > 0) {
          $.each(hasil, function(i, hasil) {
            $('#kd_dokter').append(`
                    <option id='opsi' value="` + hasil.kd_dokter + `">` + hasil.nama + `</option>  
                  `);
          });
        } else {
          $('#kd_dokter').append(`
                    <option id='opsi' value="" readonly>data tidak ditemukan</option>  
                  `);
        }
      }

    });

  }
</script>