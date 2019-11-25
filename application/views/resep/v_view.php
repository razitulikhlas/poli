<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-3">RESEP OBAT</h1>
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
            <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Transaksi</h3>

                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
              <form method="post" action=" <?= base_url().'resep/tambah';?> ">
              <div class="row ml-3">
                

                     
                 </form>
               </div>
               <!-- end row -->
                <div class="form-group ml-3 mr-10">
                      <table id="tabel_id" class="table table-bordered">
                        <thead>
                        <tr>
                            
                            <th scope="col">No faktur</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Di Bayar</th>
                            <th scope="col">Kembalian</th>
                            <th scope="col">Karyawan</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($resep as $row) :  ?>
                          <tr>
                              <td><?= $row['no_faktur'] ?></td>
                              <td><?= $row['total_harga'] ?></td>
                              <td><?= $row['dibayar'] ?></td>
                              <td><?= $row['kembalian'] ?></td>
                              <td><?= $row['pelayan'] ?></td>
                              <td>
                                <a href="<?= base_url()?>resep/detail/<?= $row['no_faktur']  ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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

  <script>

      $(function(){
          $('#btntambah').click(function(){
      
              var kd_dokter   = $("[name='kd_dokter']").val();
              var kd_pasien   = $("[name='kd_pasien']").val();
  

                $.ajax({
                  type     : 'POST',
                  data     :  'kd_dokter='+kd_dokter+
                              '&kd_pasien='+kd_pasien,
                  url      : '<?= base_url()."resep/tambah"?>',
                  dataType : 'json',
                  success  : function(hasil){
                    if(hasil.pesan == ''){

                      Swal.fire({
                      title : 'Data Poli ',
                      text  : 'Berhasil ditambah',
                      type  : 'success'
                    });
                    
                  }     
                }  
              });
          });

          $("select").select2();

    });

     

  </script>

