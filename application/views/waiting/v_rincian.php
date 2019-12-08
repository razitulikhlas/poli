
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">  
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Detail transaksi no-faktur &nbsp; <?= $no_faktur ?></h3>
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                 </div>
               </div>
              <div class="card-body">
                <label class="ml-2" style="color: #808080">Keluhan</label>  
                    <div class="ml-2 keluhan" style="color: #808080">
                       <div class="row" id="rinciankeluhan">
                         <?php foreach($keluhan as $row) :?>
                          <div class="col-6"></div>
                          <div class="col-3">
                              <?= $row['keluhan'] ?>
                          </div>
                          <div class="col-3"></div>
                        <?php endforeach;?>  
                       </div>
                    </div> 
                     <hr>
                   <label class="ml-2" style="color: #808080">Diagnosa</label>  
                    <div class="ml-2 diagnosa" style="color: #808080">
                       <div class="row" id="rinciandiagnosa">
                       <?php foreach($diagnosa as $row) :?>
                        <div class="col-6"></div>
                          <div class="col md-3">
                              <?= $row->nama_diagnosa ?>
                          </div>
                          <div class="col md-3"></div>
                        <?php endforeach;?>  
                       </div>
                    </div>
                     <hr>
                    <label class="ml-2" style="color: #808080">OBAT</label>  
                    <div class="ml-2 " style="color: #808080">
                    <div class="row" id="rincianobat">  
                    <?php foreach($obat as $row) :?>
                          <div class="col-6"></div>
                          <div class="col md-6">
                              <?= $row->nama_obat ?>
                          </div>
                          <div class="col md-3">
                              Rp <?= $row->sub_total ?>
                          </div>
                        <?php endforeach;?>  
                    </div>
                    
                    <div class="row  mb-2 mt-5">
                      <div class="col-6"></div>
                      <div class="col-3"><label for="">Sub harga</label></div>
                      <div class="col-3" id="detailsubhargaobat">Rp <?=$hargaobat->sub_total?></div>
                    </div>
                    <hr>

                    <label style="color: #808080">TINDAKAN</label>  
                    <div class="ml-2 " style="color: #808080">
                      <div class="row" id="rinciantindakan">
                      <?php foreach($tindakan as $row) :?>
                        <div class="col-6"></div>
                          <div class="col md-3">
                              <?= $row->tindakan ?>
                          </div>
                          <div class="col md-3">
                              Rp <?= $row->harga ?>
                          </div>
                        <?php endforeach;?>  
                       </div>
                    </div>

                   <div class="row mb-2 mt-5">
                      <div class="col-6"></div>
                      <div class="col-3"><label for="">Sub harga</label></div>
                      <div class="col-3" id="detailsubhargatindakan">Rp <?=$hargatindakan->harga?></div>
                    </div>
                    <hr>
                     
                    <label style="color: #808080">Labor</label>  
                    <div class="ml-2 Obat" style="color: #808080">
                       <div class="row" id="rincianlabor">
                       <?php foreach($labor as $row) :?>
                        <div class="col-6"></div>
                          <div class="col md-3">
                              <?= $row->tindakan ?>
                          </div>
                          <div class="col md-3">
                              Rp <?= $row->harga ?>
                          </div>
                        <?php endforeach;?>
                       </div>
                  </div>
                  <div class="row  mb-5 mt-5">
                      <div class="col-6"></div>
                      <div class="col-3"><label for="">Sub harga</label></div>
                      <div class="col-3" id="detailsubhargalabor">Rp <?=$hargalabor->harga?></div>
                  </div>
                  <hr>

                  <div class="row ">
                    <div class="col-6"></div>
                      <div class="col-3"><label for="">TOTAL HARGA</label></div>
                      <div class="col-3"id="txtTotal">Rp 0</div>
                  </div> 
                  <div class="row mt-4">
                      <div class="col-9"><button class="btn btn-primary" onclick="simpanData()">Cetak</button></div>

                  </div>             
                </div>

              </div>
            <!-- Modal -->
            <!-- /.card-footer-->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<script>
  totalHarga();
  function totalHarga(){
    let hargaobat = $('#detailsubhargaobat').text();
    hargaobat = convertHarga(hargaobat);
    let hargatindakan = $('#detailsubhargatindakan').text();
    hargatindakan = convertHarga(hargatindakan);
    let hargalab = $('#detailsubhargalabor').text();
    hargalab = convertHarga(hargalab);
    console.log(hargaobat);
    let total = parseInt(hargaobat) + parseInt(hargatindakan) + parseInt(hargalab);
    $('#txtTotal').html("Rp "+total);

  }

  function convertHarga(harga){
    let convert = harga.split(' ');
    if(convert[1] == ''){
      return 0;
    }else{
      return convert[1];
    }
    
  }
</script>


  


