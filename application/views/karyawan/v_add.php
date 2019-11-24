<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-3">Jadwal DOKTER</h1>
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
                <h3 class="card-title">Karyawan</h3>
                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
                <form id="formdata" method="post" action=" <?= base_url().'karyawan/simpanData';?> ">

                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama"  class="form-control" id="nama" placeholder="nama">
                </div>
                <div class="form-group">
                    <label for="jeniskelamin">JENIS KELAMIN</label>
                    <select class="form-control form-control-lg" id="jeniskelamin" name="jeniskelamin">
                    <option>Laki-Laki</option>
                    <option>wanita</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="tgl">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgl" name="tgl"
                  placeholder="Tanggal Lahir" >
                </div>
                <div class="form-group">
                  <label for="nohp">No Hp</label>
                  <input type="text" class="form-control" id="nohp" name="nohp"
                  placeholder="No hp" >
                </div>
                <div class="form-group">
                  <label for="alamat">ALamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat"
                  placeholder="Alamat" >
                </div>
                
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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