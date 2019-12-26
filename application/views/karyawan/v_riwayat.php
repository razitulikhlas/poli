  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

         <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Data Riwayat gaji <b><?=$karyawan->nama?></b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">debet</th>
                      <th scope="col">keterangan</th>
                      <th scope="col">tanggal</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                      <?php foreach($riwayatgaji as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td>Rp <?= number_format( $row["gaji"],0,",",".")?></td>
                          <td><?= $row["keterangan"] ?></td>
                          <td><?= $row["created_at"] ?></td>
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

