<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-3"></h1>
          </div>

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">REKAM MEDIK PASIEN <b><?= $pasien->nama?></b></h3>

                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
               <!-- end row -->
                <div class="form-group ml-3 mr-10">
                      <table id="tabel_id" class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No Rekam Medik</th>
                            <th scope="col">Dokter</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="target">
                        <?php $i = 1; ?>
                      <?php foreach($rkmedik as $row) : ?>
                        <tr>
                          <td><?= $row["no_faktur"] ?></td>
                          <td><?= $row["nama"] ?></td>
                          <td><?= $row["created_at"] ?></td>
                          <td>
                          <a href="<?= base_url()?>listpasien/Detail/<?= $row["no_faktur"] ?>" class="btn btn-warning tombol-hapus"><i class="fa fa-eye"></i></a>
                          </td>
                         
                        </tr>
                      
              <?php endforeach; ?>
                        </tbody>
                      </table>
                </div>
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
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
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
          <form action="<?=base_url('resep/update') ?>" method="post">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="karyawan" id="karyawan" value="Fikri">
                </div>   
                <div class="form-group">
                    <label for="no_faktur">No Faktur</label>
                    <input type="text" class="form-control" name="no_faktur" id="no_faktur" readonly="">
                </div>    
               <div class="form-group">
                    <label for="total_harga">total harga</label>
                   <input type="text" class="form-control" id="total_harga" name="total_harga" >
                </div>
                <div class="form-group">
                    <label for="dibayar">Dibayar</label>
                   <input type="text" class="form-control" id="dibayar" name="dibayar" >
                </div>
                <div class="form-group">
                    <label for="kembalian">Kembalian</label>
                   <input type="text" class="form-control" id="kembalian" name="kembalian" >
                </div>
              
      
   
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Bayar</button>

      </form>
    
      </div>
      
    </div>
  </div>
</div>



