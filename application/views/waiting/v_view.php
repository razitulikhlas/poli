  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
 
         <div class="card">
              <div class="card-header" style="background-color: aqua">
              <h3 class="card-title">Pasien Dokter </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
            
                <!-- <button type="button" id="btncel" class="btn bg-gradient-success mb-3" >Export Excell</button>
                <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button> -->
       
              
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">No Pendaftaran</th>
                      <th scope="col">Nama Pasien</th>
                      <th scope="col">Tanggal Lahir</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="target">
       
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
        <h4 class="modal-title" id="exampleModalLabel">Diagnosa Pasien</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
          <form action="<?=base_url('jadwal/update') ?>" method="post">

             <div class="form-group">
                    <input type="hidden" class="form-control" name="kd_dokter" id="kd_dokter" placeholder="Kode Dokter">
                </div>
                <div class="form-group">
                    <label for="namadokter">Dokter</label>
                    <input type="text" class="form-control" id="namadokter" name="namadokter" readonly="">
                   
                </div>
                 <div class="form-group">
                    <label for="pasien">Pasien</label>
                    <input type="text" class="form-control" id="pasien" name="pasien" readonly="">
                </div>
                <div class="form-group">
                    <label for="status">Diagnosa</label>
                   <input type="text" class="form-control" id="status" name="status" >
                </div>
      
   
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah Data</button>
        <a href=""></a>
      </form>
    
      </div>
      
    </div>
  </div>
</div>



<script>

 ambilData();
  function ambilData(){
      $.ajax({
        type     : 'POST',
        url      : '<?= base_url()."listpasien/getData"?>',
        dataType : 'json',
        success  : function(data){
            console.log(data);
            let baris = '';
            
            for(var i=0;i<data.pasien.length;i++){
              let status = checkStatus(data.pasien[i].status,data.pasien[i].no_pendaftaran,data.pasien[i].kd_dokter,data.pasien[i].kd_pasien);
              baris += `<tr>
                          <td>`+data.pasien[i].no_pendaftaran+`</td>
                          <td>`+data.pasien[i].nama+`</td>+
                          <td>`+data.pasien[i].tgl_lahir+`</td>+
                          <td>`+data.pasien[i].jenis_kelamin+`</td>+
                          <td>`+data.pasien[i].nohp+`</td>+
                          <td id="aksi">
                           `+status+`
                       </tr>`;
            }
            $('#target').html(baris);
        }
      });
  }

  function checkStatus(status,nopen,kd_dokter,kd_pasien){
      let data;
      if(status == 0){
        data = `<a href="<?= base_url()?>listpasien/tambah/`+nopen+`/`+kd_dokter+`/`+kd_pasien+` " class="btn btn-primary tombol-hapus"><i class="fa fa-edit"></i></a>`
      }else{
        data = `<a href="<?= base_url()?>listpasien/Detail/`+nopen+`" class="btn btn-warning tombol-hapus"><i class="fa fa-eye"></i></a>`
      }  
      return data;
    }

    
</script>


