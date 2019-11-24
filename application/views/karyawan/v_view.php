 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

         <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Data Karyawan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
                <a href="<?= base_url()?>karyawan/tambah" class="btn btn-danger mb-3">Tambah Data</a>
                <button type="button" id="btncel" class="btn bg-gradient-success mb-3" >Export Excell</button>
                <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button>
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Karyawan</th>
                      <th scope="col">tanggal Lahir</th>
                      <th scope="col">jenis Kelamin</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">alamat</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                      <?php foreach($karyawan as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?= $row['nama'] ?></td>
                          <td><?= $row['tanggal_lahir'] ?></td>
                          <td><?= $row['jenis_kelamin'] ?></td>
                          <td><?= $row['no_hp'] ?></td>
                          <td><?= $row['alamat'] ?></td>
                          
                          <td>
                           <a href="" class="btn btn-primary">Detai</a>
                           <button type="button" onclick="submit(<?= $row['no']?>)" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-edit"></i></button>
                           <a href="<?= base_url()?>karyawan/hapusData/<?= $row['no']?> " class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
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
        
        <form id="formdata" method="post" action=" <?= base_url().'karyawan/simpanData';?> ">

             <div class="form-group">
              <input type="hidden" class="form-control" name="no" id="no">
            </div>
            <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama"  class="form-control" id="nama" placeholder="nama">
                </div>
                <div class="form-group">
                    <label for="jeniskelamin">JENIS KELAMIN</label>
                    <select class="form-control form-control-lg" id="jeniskelamin" name="jeniskelamin">
                    <option id="lk">Laki-Laki</option>
                    <option id="wn">wanita</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="tgl">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgl" name="tgl"
                  placeholder="Tanggal Lahir" >
                </div>
                <div class="form-group">
                  <label for="nohp">No Hp</label>
                  <input type="text" class="form-control" id="nohp" name="nohp"
                  placeholder="No hp" >
                </div>
                <div class="form-group">
                  <label for="alamat">ALamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat"
                  placeholder="Alamat" >
                </div>      
   
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn" class="btn btn-primary">Update Data</button>

      </form>
    
      </div>
      
    </div>
  </div>
</div>

  <script type="text/javascript">
    $(function(){ 

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

    const flashData = $('.flash-data').data('flashdata');
    if(flashData){
      Swal.fire({
        title : 'Data Karyawan ',
        text  : 'Berhasil '+ flashData,
        type  : 'success'
      });
    }
});

    function submit(x){
      $.ajax({
        type     : 'POST',
        data     : 'no='+x,
        url      : '<?= base_url()."karyawan/editData"?>',
        dataType : 'json',
        success  : function(hasil){
          console.log(hasil);
            $("[name='no']").val(hasil[0].no);
            $("[name='nama']").val(hasil[0].nama);
            $("[name='tgl']").val(hasil[0].tanggal_lahir);
            $("[name='nohp']").val(hasil[0].no_hp);
            $("[name='alamat']").val(hasil[0].alamat);

            if(hasil[0].jenis_kelamin == 'Wanita'){
              $('#wn').attr('selected','');
              $('#lk').removeAttr('selected');

            }else{
              $('#lk').attr('selected','');
              $('#wn').removeAttr('selected');
            }
           
        }

      });
    }

    

  </script>