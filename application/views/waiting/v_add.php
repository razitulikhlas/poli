<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title">Diagnosa Pasien <?= $kodepasien ?></h3>
                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
              <form id="formdata" method="post" action=" <?= base_url().'listpasien/simpanRekamMedis';?> "> 
                <div class="form-group">
                          <input type="hidden" name="nofaktur"  class="form-control" id="nofaktur" value="<?= $kodepasien ?>">
                           <input type="hidden" name="kdpasien"  class="form-control" id="kdpasien" value="<?= $detail->kd_pasien ?>">
                            <input type="hidden" class="form-control" id="kddokter" name="kddokter" value="<?= $detail->kd_dokter; ?>">
                </div>
                  <div class="row">
                    <div class="col-md-3">
                       <div class="form-group">
                          <label for="namapasien">NAMA PASIEN</label>
                          <input type="text" name="namapasien"  class="form-control" id="namapasien" value="<?= $detail->namapasien ?>" placeholder="Nama Pasien" readonly="">
                       </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="namadokter">NAMA DOKTER</label>
                          <input type="text" class="form-control" id="namadokter" name="namadokter" value="<?= $detail->namadokter ?>" placeholder="Nama Dokter" readonly="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="keluhan">Keluhan</label>
                          <input type="text" class="form-control" id="keluhan" name="keluhan"  placeholder="Keluhan Pasien" >
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="Diagnosa">Diagnosa</label>
                      <div class="form-group">
                           <div class="select2-purple">
                              <select class="select2" id="diagnosa" name="diagnosa[]" multiple="multiple" data-placeholder="Pilih diagnosa" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                <?php foreach($diagnosa as $row) : ?>
                                  <option value="<?= $row['no'] ?>"><?= $row['nama_diagnosa'] ?></option>
                                <?php endforeach; ?>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                       <button id="btndiagnosa" class="btn btn-warning" style="width: 100%">Simpan rekam medik</button>
                       </div>
                    </div>
                  </div>   
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
  $(document).ready(function(){
      $("select").select2();
  });
</script>