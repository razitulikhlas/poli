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
                <h3 class="card-title">Elang Abdul Aziz</h3>
                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
                <form id="formdata" method="post" action=" <?= base_url().'obat/add_data';?> ">
                <div class="form-group">
                  <label for="namaobat">NAMA OBAT</label>
                  <input type="text" name="namaobat"  class="form-control" id="namaobat" placeholder="Nama Obat">
                </div>
              <div class="form-group">
                <label for="miligram">Miligram</label>
                <input type="text" class="form-control" id="miligram" name="miligram" placeholder="miligram">
              </div>
              <div class="form-group">
                  <label for="jenisobat">Type obat</label>
                  <select class="form-control form-control-lg" id="jenisobat" name="jenisobat">
                    <option>Tablet</option>
                    <option>Kapsul</option>
                    <option>Salep</option>
                    <option>Cair</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="unit">Unit</label>
                  <select class="form-control form-control-lg" id="unit" name="unit">
                    <option>Box</option>
                    <option>Botol</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="jumlahunit">Jumlah Unit</label>
                <input type="text" class="form-control" id="jumlahunit" name="jumlahunit" placeholder="Jumlah Unit">
              </div>
              <div class="form-group">
                <label for="obatperunit">Jumlah Obat Per Unit</label>
                <input type="text" class="form-control" id="obatperunit" name="obatperunit" placeholder="Jumlah Obat Per Unit">
              </div>
              <div class="form-group">
                <label for="totalobat">Total Obat</label>
                <input type="text" class="form-control" id="totalobat" name="totalobat" placeholder="Total Obat" readonly="">
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="hargabeli">Harga beli/unit(Rp.)</label>
                    <input type="text" class="form-control" id="hargabeli" name="hargabeli" placeholder="Harga Beli">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="hargamodal">Harga Modal</label>
                    <input type="text" class="form-control" id="hargamodal" name="hargamodal" placeholder="Harga Modal" readonly="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="hargajual">Harga Jual</label>
                <input type="text" class="form-control" id="hargajual" name="hargajual" placeholder="Harga Jual" readonly="">
              </div>                  
              <div class="form-group">
                <label for="tgl_masuk">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" >
              </div>
              <div class="form-group">
                <label for="expired">EXPIRED OBAT</label>
                <input type="date" class="form-control" id="expired" name="expired" placeholder="Expired Obat">
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

  <script type="text/javascript">
    
    function getTotal(){
      let jumlahunit  = $('#jumlahunit').val();
      let obatperunit = $('#obatperunit').val();
      let total       = jumlahunit * obatperunit;
      $('#totalobat').val(total);
    }

    function getModal(){
      let obatperunit = $('#obatperunit').val();
      let hargabeli   = $('#hargabeli').val();
      let modal       = hargabeli / obatperunit;
      let hargajual   = (modal * 0.5) + modal ;
      $('#hargamodal').val(modal);
      $('#hargajual').val(hargajual); 
     }

    $('#obatperunit').on('input',function(){
      getTotal();
    });
    
    $('#hargabeli').on('input',function(){
      getModal();
    });
  </script>