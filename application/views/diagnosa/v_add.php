<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-3"></h1>
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
                <h3 class="card-title">Diagnosa</h3>
                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
              <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                   <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
              
                <form id="formdata" method="post" action=" <?= base_url().'diagnosa/simpanData';?> ">
                  <input type="hidden" name="no"  class="form-control" id="no">
                <div class="form-group">
                  <label for="diagnosa">Diagnosa</label>
                  <input type="text" name="diagnosa"  class="form-control" id="diagnosa" placeholder="Diagnosa">
                </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                placeholder="Deskripsi" >
              </div>
                
           <button type="button" class="btn btn-secondary swalDefaultError" data-dismiss="modal">Close</button>
            <button type="submit" id="btn" class="btn btn-primary">Simpan Data</button>

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