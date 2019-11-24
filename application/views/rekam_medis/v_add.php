<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-3">Rekam Medis</h1>
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
                <h3 class="card-title">Form rekam medis</h3>
                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
              <form action="<?=base_url('dokter/add_data') ?>" method="post" enctype="multipart/form-data">
         
              <?php echo form_open_multipart('dokter/add_data'); ?>

                <div class="form-group">
                    <input type="hidden" class="form-control" name="kode_dokter" id="kode_dokter" placeholder="Kode Dokter">
                </div>
                <div class="form-group">
                    <label for="namadokter">NAMA DOKTER</label>
                    <input type="text" name="namadokter" class="form-control" id="namadokter" placeholder="Nama Dokter" readonly="">
                </div>
                <div class="form-group">
                    <label for="namapasien">NAMA PASIEN</label>
                    <input type="text" name="namapasien" class="form-control" id="namadokter" placeholder="Nama Pasien" readonly="">
                </div>
                
                <div class="form-group">
                    <label for="diagnosa">Diagnosa</label>
                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="diagnosa">
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="save()" class="btn btn-primary">Simpan Data</button>
        <?php echo form_close(); ?>
     
                 
     

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

  <script>
  
  tarif();
    function tarif(){
        var spesialis = $('#spesialis').val();
        $.ajax({

            type     : 'POST',
            data     : 'kd_spesialis='+spesialis,
            url      : '<?= base_url()."dokter/get_tarif"?>',
            dataType : 'json',
            success  : function(hasil){
              console.log(hasil);
              $("[name='tarif']").val(hasil[0].tarif);
             

            }

        });

    }

    $('select').on('change', function()
    {
      tarif();
    });

</script>

