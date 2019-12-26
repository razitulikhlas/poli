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
        <div class="card">
          <div class="card-header" style="background-color: aqua">
            <h3 class="card-title">Jadwal Dokter</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                <i class="fas fa-minus"></i></button>

            </div>
          </div>

          <div class="card-body" style="background-color: #212529; color: white;">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <a href="<?= base_url() ?>jadwal/tambah" class="btn btn-danger mb-3">Tambah Data</a>
            <!-- <button type="button" id="btncel" class="btn bg-gradient-success mb-3" >Export Excell</button>
                <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button> -->
            <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->

            <table id="tabel_id" class="table table-bordered mt-3 mb-3">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Dokter</th>
                  <th scope="col">Poli</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Status</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($jadwal as $row) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $row["namadokter"] ?></td>
                    <td><?= $row["namapoli"] ?></td>
                    <td><?= $row["waktu"] ?></td>
                    <td><?= $row["tanggal"] ?></td>
                    <td><?= $row["status"] ?></td>
                    <td><?= $row["keterangan"] ?></td>
                    <td><img src="<?= base_url() ?>assets/foto/<?= $row['photo'] ?>" height="50px"></td>

                    <td>

                      <button type="button" onclick="submit(<?= $row['kd_jadwal'] ?>)" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-edit"></i></button>
                      <a href="<?= base_url() ?>jadwal/hapus/<?= $row['kd_jadwal'] ?> " class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                    </td>

                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>


  <!-- modal -->


  <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Tambah Data Dokter</h4>
          <button type="button" onclick="clearChecked()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
          <form action="<?= base_url('jadwal/simpanJadwal') ?>" method="post">

            <div class="form-group">
              <input type="hidden" class="form-control" name="kd_jadwal" id="kd_jadwal" placeholder="Kode Jadwal">
              <input type="hidden" class="form-control" name="kd_dokter" id="kd_dokter" placeholder="Kode Poli">
              <input type="hidden" class="form-control" name="kd_poli" id="kd_poli" placeholder="Kode Poli">
            </div>
            <div class="form-group">
              <label for="nama">Dokter</label>
              <input type="text" class="form-control" name="nama" id="nama" readonly="">
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
              <label for="waktu">WAKTU</label>
              <div class="input-group date" id="waktu" data-target-input="nearest">
                <input type="text" name="waktu" class="form-control datewaktu-input" data-target="#waktu">
                <div class="input-group-append" data-target="#waktu" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="far fa-clock"></i></div>
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


            <button type="button" onclick="clearChecked()" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah Data</button>

          </form>

        </div>

      </div>
    </div>
  </div>


  <script>
    $(function() {
      //Timepicker
      $('#waktu').datetimepicker({
        format: 'LT'
      });

    })
    //jadwal



    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
      Swal.fire({
        title: 'Data Jadwal ',
        text: 'Berhasil ' + flashData,
        type: 'success'
      });
    }

    $('.tombol-hapus').click(function(e) {
      e.preventDefault();

      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Menghapus data ini",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })

    });

    function submit(x) {

      $.ajax({
        type: 'POST',
        data: 'kd_jadwal=' + x,
        url: '<?= base_url() . "jadwal/edit" ?>',
        dataType: 'json',
        success: function(hasil) {
          console.log(hasil);
          $("[name='kd_jadwal']").val(hasil.kd_jadwal);
          $("[name='waktu']").val(hasil.waktu);
          checkJadwal(hasil.tanggal);
          $("[name='status']").val(hasil.status);
          $("[name='nama']").val(hasil.nama);
          $("[name='keterangan']").val(hasil.Keterangan);
          $("[name='kd_dokter']").val(hasil.kd_dokter);
          $("[name='kd_poli']").val(hasil.kd_poli);

        }
      });
    }

    function checkJadwal(jadwal) {
      let harga = 'Sunday,Thursday';
      let convert = jadwal.split(',');
      console.log(convert.length);
      for (var i = 0; i < convert.length; i++) {
        if (convert[i] == 'Thursday') {
          console.log('data ditemukan', i);
          $('#kamis').attr("checked", 'checked');
        } else if (convert[i] == 'Sunday') {
          $('#minggu').attr("checked", 'checked');
        } else if (convert[i] == 'Monday') {
          $('#senin').attr("checked", 'checked');
        } else if (convert[i] == 'Tuesday') {
          $('#selasa').attr("checked", 'checked');
        } else if (convert[i] == 'Wednesday') {
          $('#rabu').attr("checked", 'checked');
        } else if (convert[i] == 'Friday') {
          $('#jummat').attr("checked", 'checked');
        } else if (convert[i] == 'Saturday') {
          $('#sabtu').attr("checked", 'checked');
        }
      }
    }

    function clearChecked() {
      $('#kamis').removeAttr("checked");
      $('#minggu').removeAttr("checked");
      $('#senin').removeAttr("checked");
      $('#selasa').removeAttr("checked");
      $('#rabu').removeAttr("checked");
      $('#jummat').removeAttr("checked");
      $('#sabtu').removeAttr("checked");

    }
  </script>