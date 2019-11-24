<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-3">DATA LAB</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Collapsed Sidebar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title">Tambah Data Lab</h3>
                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
              <form action="<?=base_url('labor/simpanData') ?>" method="post">
                <div class="form-group">
                    <label for="tindakan">Tindakan</label>
                    <input type="text" class="form-control" id="tindakan" name="tindakan" placeholder="tindakan" >
                </div>
               <div class="form-group">
                    <label for="feedokter">Fee dokter</label>
                   <input type="text" class="form-control" id="feedokter" name="feedokter" placeholder="fee dokter" >
                </div>
               
                <div class="form-group">
                    <label for="feekaryawan">Fee karyawan</label>
                   <input type="text" class="form-control" id="feekaryawan" name="feekaryawan" placeholder="fee karyawan" >
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                   <input type="text" class="form-control" id="harga" name="harga" placeholder="harga">
                </div>
                 <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                   <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi" >
                </div>
           

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                    
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

