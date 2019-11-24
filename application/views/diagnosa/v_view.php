  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

         <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Data Diagnosa</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
                <a href="<?= base_url()?>diagnosa/tambah" class="btn btn-danger mb-3">Tambah Data</a>
                <button type="button" id="export" class="btn bg-gradient-success mb-3" >Export Excell</button>
                <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button>
               
              
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Diagnosa</th>
                      <th scope="col">Deskripsi</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                      <?php foreach($diagnosa as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?= $row["nama_diagnosa"] ?></td>
                          <td><?= $row["deskripsi"] ?></td>
                         <td>
                           
                           <button type="button" onclick="submit(<?= $row['no']?>)" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-edit"></i></button>
                           <a href="<?= base_url()?>diagnosa/hapus/<?= $row['no']?> " class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
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
        
        <form id="formdata" method="post" action=" <?= base_url().'diagnosa/update';?> ">

             <div class="form-group">
              <input type="hidden" class="form-control" name="no" id="no">
            </div>
            <div class="form-group">
              <label for="diagnosa">Diagnosa</label>
              <input type="text" name="diagnosa"  class="form-control" id="diagnosa" placeholder="Nama Obat" readonly="">
            </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" >
          </div>        
   
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn" class="btn btn-primary">Update Data</button>

      </form>
    
      </div>
      
    </div>
  </div>
</div>

<script>
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
      title : 'Data diagnosa ',
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

function submit(x){
    $.ajax({
          type     : 'POST',
          data     : 'no='+x,
          url      : '<?= base_url()."diagnosa/edit" ?>',
          dataType : 'json',
          success  : function(hasil){
            console.log(hasil);
            $("[name='no']").val(hasil[0].no);
            $("[name='diagnosa']").val(hasil[0].nama_diagnosa);
            $("[name='deskripsi']").val(hasil[0].deskripsi);
          }
        }); 
  }

  

  
</script>
 