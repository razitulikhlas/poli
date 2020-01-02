
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

              	<button type="button" class="btn bg-gradient-danger mb-3" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah Data</button>
              	<!-- <button type="button" class="btn bg-gradient-success mb-3">Export Excell</button>
              	<button type="button" class="btn bg-gradient-primary mb-3">Export Word</button> -->
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <table id="tabel_id" class="table table-bordered mt-3" >
        				  <thead>
        				    <tr>
        				      <th scope="col">No</th>
        				      <th scope="col">Nama Poli</th>
        				      <th scope="col">Keterangan</th>
        				      <th scope="col">Aksi</th>
        				    </tr>
        				  </thead>
        				  <tbody>
                    <?php $i = 1; ?>
                      <?php foreach($jenispoli as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?= $row["nama_poli"] ?></td>
                          <td><?= $row["keterangan"] ?></td>
                          <td>
                           <a href="" class="btn btn-primary">Detai</a>
                           <?php echo anchor('jenispoli/edit/'.$row['kd_poli'],'<div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?>
                           <?php echo anchor('jenispoli/hapus/'.$row['kd_poli'],'<div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?>
                           
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
        <form method="post" action=" <?= base_url().'jenispoli/add_data';?> ">

       <div class="form-group">
        <input type="hidden" class="form-control" name="kd_poli">
      </div>
      <div class="form-group">
        <label for="namapoli">NAMA POLI</label>
        <input type="text" name="namapoli" class="form-control" id="namapoli" placeholder="Nama Poli">
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Nama Poli">
      </div>
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>

</form>
      </div>
      
    </div>
  </div>
</div>


  <!-- /.content-wrapper -->
 