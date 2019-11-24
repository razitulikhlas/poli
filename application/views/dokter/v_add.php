<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-3">DATA DOKTER</h1>
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
              <div class="card-header" >
                <h3 class="card-title">Transaksi</h3>
                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
              <form action="<?=base_url('dokter/add_data') ?>" method="post" enctype="multipart/form-data">
         
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
                    <input type="text" readonly class="form-control" id="tarif" name="tarif" placeholder="Tarif" disable="">
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
             

            }

        });

    }

    $('select').on('change', function()
    {
      tarif();
    });

</script>

