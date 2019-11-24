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
                <h3 class="card-title">Data User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">

                <button type="button" class="btn bg-gradient-danger mb-3" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah Data</button>
                <button type="button" class="btn bg-gradient-success mb-3" >Export Excell</button>
                <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button>
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">Kode User</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Level</th>
                      <th scope="col">Foto</th>
                      
                      <th scope="col">Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                      <?php foreach($user as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?= $row["nama"] ?></td>
                          <td><?= $row["level"] ?></td>
                          <td><?= $row["photo"] ?></td>
                          
                          
                         <td onclick="javascript: return confirm('Anda Yakin Hapus ?')">
                          <?php echo anchor('user/hapus/'.$row['kd_user'],'<div class="btn btn-danger"><i class="fa fa-trash">Delete</i></div>') ?>
                          <?php echo anchor('user/edit/'.$row['kd_user'],'<div class="btn btn-primary"><i class="fa fa-edit">Edit</i></div>') ?>
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
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <?php echo form_open_multipart('user/add_data'); ?>

            <div class="form-group">
                    <label for="kd_poli">Poli</label>
                    <select class="form-control form-control-lg kdpoli" id="kd_poli" name="kd_poli">
                      <?php foreach($spesialis as $row) : ?>
                      <option value="<?= $row['kd_spesialis']?>"><?= $row['nama'] ?></option>
                    <!--   <?php endforeach; ?> -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="kd_dokter">Dokter</label>
                    <select class="form-control form-control-lg" id="kd_dokter" name="kd_dokter">
                    </select>
                </div>
            
            <div class="form-group">
              <label for="photo">PHOTO</label>
              <input type="file" class="form-control form-control-lg" id="photo" name="foto">
          </div>
          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="tarif" name="password">
          </div>
          
    
          
      
       
      
   
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" onclick="save()" class="btn btn-primary">Simpan Data</button>

      <?php echo form_close(); ?>  
    
      </div>
      
    </div>
  </div>
</div>
 