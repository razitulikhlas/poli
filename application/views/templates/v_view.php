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
                <h3 class="card-title">Data Dokter</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body">

                <button type="button" class="btn bg-gradient-danger mb-3" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah Data</button>
                <button type="button" id="btncel" class="btn bg-gradient-success mb-3" >Export Excell</button>
                <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button>
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Dokter</th>
                      <th scope="col">Spesialis</th>
                      <th scope="col">No Izin</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">Tarif</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                      <?php foreach($dokter as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?= $row["nama"] ?></td>
                          <td><?= $row["spesialis"] ?></td>
                          <td><?= $row["noizin"] ?></td>
                          <td><?= $row["tarif"] ?></td>
                          <td><?= $row["nohp"] ?></td>
                          <td>
                           <a href="" class="btn btn-primary">Detai</a>
                           <?php echo anchor('dokter/edit/'.$row['kd_dokter'],'<div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?>
                           <?php echo anchor('dokter/hapus/'.$row['kd_dokter'],'<div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
              <select class="form-control form-control-lg" id="jeniskelamin" name="jeniskelamin">
                <option>pria</option>
                <option>wanita</option>
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
            <label for="universitas">KAMPUS ASAL</label>
            <input type="text" class="form-control" id="universitas" name="universitas" placeholder="UNIVERSITAS ASAL">
          </div>
          <div class="form-group">
            <label for="spesialis">SPESIALIS</label>
            <select class="form-control form-control-lg"  id="spesialis" name="spesialis">
                <?php foreach($spesialis as $row) : ?>
                  <option value="<?= $row['kd_spesialis']?>"><?= $row['nama']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
          <label for="tarif">TARIF</label>
          <input type="text" class="form-control" id="tarif" name="tarif" placeholder="Tarif" disable="">
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
          <input type="file" class="form-control" id="foto" name="foto" placeholder="Upload Your Photo">
        </div>
      
   
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" onclick="save()" class="btn btn-primary">Simpan Data</button>

      <?php echo form_close(); ?>  
    
      </div>
      
    </div>
  </div>
</div>


<script>
  
  tarif();
    function tarif(){
        var spesialis = $('#spesialis').val();
        $.ajax({

            type     : 'POST',
            data     : 'kd_spesialis='+spesialis,
            url      : '<?= base_url()."dokter/get_tarif"?>',
            dataType : 'json',
            success  : function(hasil){
              console.log(hasil);
              $("[name='tarif']").val(hasil[0].tarif);
              $("#tarif").prop('disabled', true);

            }

        });

    }

    $('select').on('change', function()
    {
      tarif();
    });

</script>