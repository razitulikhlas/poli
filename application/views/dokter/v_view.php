  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header" style="background-color: aqua">
            <h3 class="card-title">Data Dokter</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>

          <div class="card-body" style="background-color: #212529; color: white;">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <a href="<?= base_url() ?>dokter/tambah" class="btn btn-danger mb-3">Tambah Data</a>
            <!-- <button type="button" id="btncel" class="btn bg-gradient-success mb-3">Export Excell</button>
            <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button> -->
            <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->

            <table id="tabel_id" class="table table-bordered mt-3 mb-3">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Dokter</th>
                  <th scope="col">Spesialis</th>
                  <th scope="col">No Izin</th>
                  <th scope="col">No Hp</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($dokter as $row) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $row["namadokter"] ?></td>
                    <td><?= $row["namaspesialis"] ?></td>
                    <td><?= $row["noizin"] ?></td>
                    <td><?= $row["nohp"] ?></td>
                    <td>
                      <a href="<?= base_url() ?>dokter/detail/<?= $row['kd_dokter'] ?>" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                      <button type="button" onclick="submit(<?= $row['kd_dokter'] ?>)" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-edit"></i></button>
                      <a href="<?= base_url() ?>dokter/hapus/<?= $row['kd_dokter'] ?> " class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
          <?php echo form_open_multipart('dokter/add_data'); ?>

          <div class="form-group">
            <input type="hidden" class="form-control" name="kode_dokter" id="kode_dokter" placeholder="Kode Dokter">
          </div>
          <div class="form-group">
            <label for="namadokter">NAMA DOKTER</label>
            <input type="text" name="namadokter" class="form-control" id="namadokter" placeholder="Nama Dokter">
          </div>
          <div class="form-group">
            <label for="jeniskelamin">JENIS KELAMIN</label>
            <select id="target" class="form-control form-control-lg" name="jeniskelamin">

            </select>
          </div>
          <div class="form-group">
            <label for="nohp">NO HP</label>
            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Hand phone">
          </div>
          <div class="form-group">
            <label for="kotalahir">KOTA KELAHIRAN</label>
            <input type="text" class="form-control" id="kotalahir" name="kotalahir" placeholder="KOTA KELAHIRAN">
          </div>
          <div class="form-group">
            <label for="tgllahir">TANGGAL LAHIR</label>
            <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir">
          </div>
          <div class="form-group">
            <label for="nohp">NO IZIN</label>
            <input type="text" class="form-control" id="noizin" name="noizin" placeholder="No Izin">
          </div>
          <div class="form-group">
            <label for="Alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="provinsi">PROVINSI</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi">
          </div>
          <div class="form-group">
            <label for="kota">KOTA</label>
            <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
          </div>
          <div class="form-group">
            <label for="kelurahan">KELURAHAN</label>
            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan">
          </div>
          <div class="form-group">
            <label for="kecamatan">KECAMATAN</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
          </div>

          <div class="form-group">
            <label for="spesialis">SPESIALIS</label>
            <select class="form-control form-control-lg" id="spesialis" name="spesialis">
              <?php foreach ($spesialis as $row) : ?>
                <option class="s<?= $row['kd_spesialis'] ?>s" value="<?= $row['kd_spesialis'] ?>"><?= $row['nama'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tarif">TARIF</label>
            <input type="text" readonly class="form-control" id="tarif" name="tarif" placeholder="Tarif">
          </div>
          <div class="form-group">
            <label for="email">EMAIL</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email">
          </div>
          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
          </div>
          <div class="form-group">
            <label for="foto">UPLOAD PHOTO</label>
            <input value="foto" type="file" class="form-control" id="foto" name="foto" placeholder="Upload Your Photo">
          </div>


          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah Data</button>

          <?php echo form_close(); ?>

        </div>

      </div>
    </div>
  </div>


  <script>
    $(function() {

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
    });

    function submit(x) {
      $.ajax({
        type: 'POST',
        data: 'kd_dokter=' + x,
        url: '<?= base_url() . "dokter/edit" ?>',
        dataType: 'json',
        success: function(hasil) {
          console.log(hasil);
          $("[name='kode_dokter']").val(hasil[0].kd_dokter);
          $("[name='namadokter']").val(hasil[0].nama);
          $("[name='nohp']").val(hasil[0].nohp);
          $("[name='kotalahir']").val(hasil[0].tampat_lahir);
          $("[name='tgllahir']").val(hasil[0].tanggal_lahir);
          $("[name='provinsi']").val(hasil[0].provinsi);
          $("[name='kota']").val(hasil[0].kota);
          $("[name='kecamatan']").val(hasil[0].kecamatan);
          $("[name='kelurahan']").val(hasil[0].kelurahan);
          $("[name='email']").val(hasil[0].email);
          $("[name='password']").val(hasil[0].password);
          $("[name='noizin']").val(hasil[0].noizin);
          $("[name='alamat']").val(hasil[0].alamat);


          var jeniskelamin = hasil[0].jenis_kelamin;
          var options = '';
          console.log(jeniskelamin);
          if (jeniskelamin == 'pria') {
            option = '<option selected>pria</option>' +
              '<option>wanita</option>';
          } else {
            option = '<option >pria</option>' +
              '<option selected>wanita</option>';
          }
          $('#target').html(option);
          var spe = hasil[0].spesialis;
          console.log(spe);

          let kode = document.querySelector('option.s' + spe + 's');
          kode.setAttribute('selected', '');
          console.log(kode);


        }
      });
    }

    tarif();

    function tarif() {
      var spesialis = $('#spesialis').val();
      $.ajax({
        type: 'POST',
        data: 'kd_spesialis=' + spesialis,
        url: '<?= base_url() . "dokter/get_tarif" ?>',
        dataType: 'json',
        success: function(hasil) {
          console.log(hasil);
          $("[name='tarif']").val(hasil[0].tarif);
        }

      });

    }

    $('select').on('change', function() {
      tarif();
    });

    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
      Swal.fire({
        title: 'Data Dokter ',
        text: 'Berhasil ' + flashData,
        type: 'success'
      });

    }
  </script>