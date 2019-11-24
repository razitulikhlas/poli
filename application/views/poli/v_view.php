
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

              <div class="card-body" style="background-color: #212529; color: white;">
              <form method="post" action=" <?= base_url().'poli/tambahdata';?> ">
                <div class="form-group">
                <label for="id_label_single">
                  Kode Poli

                  <select class="js-example-responsive form-control" style="width:100%;height:100%" id="id_label_single">
                  <?php 
                          $poli =  $this->jenispoli_model->get_data();
                      ?>
                      <?php foreach($poli as $row) : ?>
                      <option value="<?= $row['kd_poli'] ?>"><?= $row['nama_poli']?></option>
                      <?php endforeach;?>
                  </select>
                </label>
                </div>
                <button type="submit" id="btn" class="btn btn-primary mb-3">Tambah Data</button>
              </form>
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <table id="tabel_id" class="table table-bordered mt-3" >
        				  <thead>
        				    <tr>
        				      <th scope="col">No</th>
        				      <th scope="col">Kode Poli</th>
        				      <th scope="col">Nama Poli</th>
        				      <th scope="col">Aksi</th>
        				    </tr>
        				  </thead>
        				  <tbody>
                    <?php $i = 1; ?>
                      <?php foreach($poli as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?= $row["kd_poli"] ?></td>
                          <td><?= $row["nama_poli"] ?></td>
                          <td>
                           <?php echo anchor('poli/edit/'.$row['kd_poli'],'<div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?>
                           <?php echo anchor('poli/hapus/'.$row['kd_poli'],'<div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?>
                           
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
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Poli</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action=" <?= base_url().'poli/add_data';?> ">

      <div class="form-group">
        <label for="kd_dokter">KODE DOKTER</label>
        <select class="form-control form-control-lg" id="kd_dokter" name="kd_dokter">
          <?php 
              $dokter =$this->dokter_model->get_data();;
           ?>
          
          <?php foreach($dokter as $row) : ?>
          <option value="<?= $row['kd_dokter']  ?>"><?php echo $row['nama']  ?></option>
        <?php endforeach; ?>
        </select>
    </div>
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>

</form>
      </div>
      
    </div>
  </div>

  
</div>



  <!-- /.content-wrapper -->
 
 <!-- <script>
 $(function(){
   $('#btnadd').click(function(e){
      e.preventDefault();
      const data = $('#kd_poli').val();
      document.location.href = 'http://localhost/poli/poli/tambahdata/s'+data;
   });

 });
 </script> -->

