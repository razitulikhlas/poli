
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
                <h3 class="card-title">Detail transaksi no-faktur &nbsp;</h3>
                <h3 class="card-title"><?= $faktur ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                 </div>
               </div>
              <div class="card-body">
                <div style="margin-top: 20px">
                  <table id="tabel_id" class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">harga</th>
                            <th scope="col">jumlah</th>
                            <th scope="col">subharga</th>

                          </tr>
                        </thead>
                        <tbody id="tbody">
                          
                        </tbody>
                      </table>
                      <div class="row mt-2">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-1 mt-1">
                          
                        </div>
                        <div class="col-md-2 pull-right">
                          <input  value="<?= $faktur ?>" name="faktur" id="faktur" class="form-control" readonly>
                        </div>
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
  
  getTabel();
  function getTabel(){
    let faktur = $('#faktur').val();

    console.log(faktur);

    $.ajax({
      type     : 'POST',
      data     : 'faktur='+faktur,
      url      : '<?= base_url()."resep/getDataTable"?>',
      dataType : 'json',
      success  : function(hasil){
        console.log(hasil);
          var baris='';
            var no=1;
            for(var i=0;i<hasil.length;i++){
             
              baris += '<tr>'+
                          '<td>'+no+'</td>'+
                          '<td>'+hasil[i].nama_obat+'</td>'+
                          '<td>Rp.'+hasil[i].harga+'</td>'+
                          '<td>'+hasil[i].jumlah+'</td>'+
                          '<td>'+hasil[i].sub_total+'</td>'+
                          
                       '</tr>';
               no++;
            }
            $('#tbody').html(baris);
      }
    });
  }
</script>


  


