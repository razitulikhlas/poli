  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
 
         <div class="card">
              <div class="card-header" style="background-color: aqua">
                  <?php $row = $pasien->row(); ?>
                <h3 class="card-title">List pasien dokter <b><?= $row->namadokter ?></b> hari ini</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
               <!--  <a href="<?= base_url()?>jadwal/tambah" class="btn btn-danger mb-3">Tambah Data</a> -->
                <button type="button" id="btncel" class="btn bg-gradient-success mb-3" >Export Excell</button>
                <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button>
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
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
                  <tbody>
                   <?php $i = 1; ?>
                      <?php foreach($pasien->result_array() as $row) : ?>
                        <tr>
                          <th scope="row"><?= $row['no_pendaftaran'] ?></th>
                          <td><?= $row["namapasien"] ?></td>
                          <td><?= $row["tgl_lahir"] ?></td>
                          <td><?= $row["jenis_kelamin"] ?></td>
                          <td><?= $row["no_hp"] ?></td>
                          <td>
                            <a href="<?= base_url()?>listpasien/tambah/<?= $row['no_pendaftaran']?>/<?= $row['kd_dokter'] ?> " class="btn btn-primary tombol-hapus"><i class="fa fa-plus"></i></a>
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

      </form>
    
      </div>
      
    </div>
  </div>
</div>


