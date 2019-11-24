
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Data Pasien</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
              	<!-- <button type="button" class="btn bg-gradient-danger mb-3" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah Data</button> -->
              	<a href="<?= base_url()?>pasien/tambah" class="btn btn-danger mb-3"> Tambah </a>
                <button type="button" class="btn bg-gradient-success mb-3">Export Excell</button>
              	<button type="button" class="btn bg-gradient-primary mb-3">Export Word</button>
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
        				  <thead>
        				    <tr>
        				      <th scope="col">No</th>
        				      <th scope="col">Nama Pasien</th>
        				      <th scope="col">Jenis Kelamin</th>
        				      <th scope="col">Tempat Lahir</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">Nama Ibu Kandung</th>
                      <th scope="col">Aksi</th>
        				    </tr>
        				  </thead>
        				 <tbody>
                    <?php $i = 1; ?>
                      <?php foreach($pasien as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?= $row["nama"] ?></td>
                          <td><?= $row["jenis_kelamin"] ?></td>
                          <td><?= $row["tempat_lahir"] ?></td>
                          <td><?= $row["nohp"] ?></td>
                          <td><?= $row["nama_ibu"] ?></td>
                          <td>
                           <a href="" class="btn btn-primary">Detai</a>
                           <button type="button" onclick="submit(<?= $row['kd_pasien']?>)" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-edit"></i></button>
                           <a href="<?= base_url()?>pasien/hapus/<?= $row['kd_pasien']?> " class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                           
                          </td>
                         
                        </tr>
                      <?php $i++; ?>
              <?php endforeach; ?>
              </tbody>
        			</table>
            </div>

            <!-- Modal -->
            
              <!-- /.card-footer-->
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>





  <!-- modal -->


  <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Pasien</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action=" <?= base_url().'pasien/add_data';?> ">

       <div class="form-group">
        <input type="hidden" class="form-control" name="kode_pasien">
      </div>
      <div class="form-group">
        <label for="namapasien">NAMA PASIEN</label>
        <input type="text" name="namapasien" class="form-control" id="namapasien" placeholder="Nama Pasien">
      </div>
      <div class="form-group">
        <label >JENIS KELAMIN</label>
        <select class="form-control form-control-lg" id="target" name="jeniskelamin">
          
        </select>
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
        <label for="kecamatan">KECAMATAN</label>
        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
      </div>
      <div class="form-group">
        <label for="kelurahan">KELURAHAN</label>
        <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan">
      </div>
      <div class="form-group">
        <label for="ibukandung">NAMA IBU KANDUNG</label>
        <input type="text" class="form-control" id="ibukandung" name="ibukandung" placeholder="Nama ibu kandnug">
      </div>

      <div class="form-group">
        <label for="nohp">No Hp</label>
        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Handphone">
      </div>
      
   
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah</button>

</form>
      </div>
      
    </div>
  </div>
</div>


  <!-- /.content-wrapper -->
  <script>

      function submit(id){

        $.ajax({

            type     : 'POST',
            data     : 'kd_pasien='+id,
            url      : '<?= base_url()."pasien/edit"?>',
            dataType : 'json',
            success  : function(hasil){
                console.log(hasil);
                let jk = hasil[0].jenis_kelamin;
                console.log(jk);
                $("[name='kode_pasien']").val(hasil[0].kd_pasien);
                $("[name='namapasien']").val(hasil[0].nama);
                $("[name='kotalahir']").val(hasil[0].tempat_lahir);
                $("[name='tgllahir']").val(hasil[0].tgl_lahir);
                $("[name='alamat']").val(hasil[0].alamat);
                $("[name='provinsi']").val(hasil[0].provinsi);
                $("[name='kota']").val(hasil[0].kota);
                $("[name='kecamatan']").val(hasil[0].kecamatan);
                $("[name='kelurahan']").val(hasil[0].kelurahan);
                $("[name='ibukandung']").val(hasil[0].nama_ibu);
                $("[name='nohp']").val(hasil[0].nohp);

                if(jk == 'pria'){
                option = 
                        '<option selected>pria</option>'+
                         '<option>wanita</option>';
                }else{
                  option = '<option >pria</option>'+
                          '<option selected>wanita</option>';
                }
                    $('#target').html(option);
                }

        });

      }

      $(function(){ 

        $('h3').mouseenter(function(){
          $('h3').css('color','red');
        });
        $('h3').mouseleave(function(){
          $('h3').css('color','black');
        });

        const flashData = $('.flash-data').data('flashdata');
        if(flashData){
          Swal.fire({
            title : 'Data Pasien ',
            text  : 'Berhasil '+ flashData,
            type  : 'success'
          });
        }

        $('.tombol-hapus').click(function(e){
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
</script>