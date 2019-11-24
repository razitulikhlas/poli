
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

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
                <h3 class="card-title">Data Poli</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target=".bd-example-modal-xl" >Tambah Dokter</button>
                <LABEL></LABEL>
                <table id="tabel_id" class="table table-bordered mt-3" >
        				  <thead>
        				    <tr>
        				      <th scope="col">No</th>
        				      <th scope="col">Kode Poli</th>
                      <th scope="col">Kode Dokter</th>
        				      <th scope="col">Aksi</th>
        				    </tr>
        				  </thead>
        				  <tbody id="target">
                  
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
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Poli</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <div class="form-group">
                <input type="hidden" class="form-control" id="no" name="no" >
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="kdd_poli" name="kdd_poli" value="<?= $kode ?>">
            </div>
            <div class="form-group">
                <label for="kd_dokter">KODE DOKTER</label>
                    <select class="form-control form-control-lg" id="kdd_dokter" name="kdd_dokter">
                        <?php 
                            $dokter =$this->dokter_model->get_data();;
                        ?>
                            <?php foreach($dokter as $row) : ?>
                        <option value="<?= $row['kd_dokter']  ?>"><?php echo $row['nama']  ?></option>
                             <?php endforeach; ?>
                    </select>
            </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" onclick="save()" class="btn btn-primary">Tambah</button>

 
      </div>
      
    </div>
  </div>
</div>


  <!-- /.content-wrapper -->
  <script>

ambilData();

function ambilData(){
  $.ajax({
    type     : 'POST',
    url      : '<?= base_url()."poli/getdetail"?>',
    dataType : 'json',
    success  : function(data){
        console.log(data);
        var baris='';
        var no=1;
        for(var i=0;i<data.length;i++){
          baris += '<tr>'+
                      '<td>'+no+'</td>'+
                      '<td>'+data[i].kd_poli+'</td>'+
                      '<td>'+data[i].kd_dokter+'</td>'+
                      '<td><button onclick="hapus('+data[i].no+')" class="btn btn-danger mb-3">Hapus</button></td>'+
                   '</tr>';
           no++;
        }
        $('#target').html(baris);
       
    }
  });
}

function submit(x){

  if(x=='tambah'){
    $('#btn_simpan').show();
    $('#btn_ubah').hide();
  }else{
    $('#btn_simpan').hide();
    $('#btn_ubah').show();

    $.ajax({
      type     : 'POST',
      data     : 'kd_spesialis='+x,
      url      : '<?= base_url()."spesialis/edit"?>',
      dataType : 'json',
      success  : function(hasil){
        $("[name='kd_spesialis']").val(hasil[0].kd_spesialis);
        $("[name='namaspesialis']").val(hasil[0].nama);
        $("[name='tarif']").val(hasil[0].tarif);
        $("[name='keterangan']").val(hasil[0].keterangan);
      }
    });
  }

}

function ubah(){
  var kd_spesialis   = $("[name='kd_spesialis']").val();
  var namaspesialis  = $("[name='namaspesialis']").val();
  var tarif          = $("[name='tarif']").val();
  var keterangan     = $("[name='keterangan']").val();

  $.ajax({
    type     : 'POST',
    data     :  'kd_spesialis='+kd_spesialis+
                '&namaspesialis='+namaspesialis+
                '&tarif='+tarif+
                '&keterangan='+keterangan,
    url      : '<?= base_url()."spesialis/update"?>',
    dataType : 'json',
    success  : function(hasil){
      if(hasil.pesan == ''){
        $('#exampleModal').modal('hide');
        ambilData();

        $("[name='kd_spesialis']").val('');
        $("[name='namaspesialis']").val('');
        $("[name='tarif']").val('');
        $("[name='keterangan']").val('');
      }
    }
  });
}

function hapus(x){
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
      $.ajax({
      type     : 'POST',
      data     : 'no='+x,
      url      : '<?= base_url()."poli/hapusdetail"?>',
      success  : function(){
      ambilData();
      Swal.fire({
  title : 'Data Poli ',
  text  : 'Berhasil di hapus ',
  type  : 'success'
});
      }
    });
  }


})
  
}

function save(){
  
  var no         = $("[name='no']").val();
  var kdd_poli   = $("[name='kdd_poli']").val();
  var kdd_dokter = $("[name='kdd_dokter']").val();
  

        $.ajax({
          type     : 'POST',
          data     :  'no='+no+
                      '&kdd_poli='+kdd_poli+
                      '&kdd_dokter='+kdd_dokter,
          url      : '<?= base_url()."poli/add_detail"?>',
          dataType : 'json',
          success  : function(hasil){
            if(hasil.pesan == ''){

              $('#exampleModal').modal('hide');
              ambilData();
              $("[name='no']").val('');
            
            
            }
            Swal.fire({
              title : 'Data Poli ',
              text  : 'Berhasil ditambah',
              type  : 'success'
            });

          }

          
        });


}
</script>
