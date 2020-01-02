
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

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
                <h3 class="card-title">Data Spesialis</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>

              	<button type="button" onclick="submit('tambah')" class="btn bg-gradient-danger mb-3" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah Data</button>
              	<!-- <button type="button" class="btn bg-gradient-success mb-3">Export Excell</button>
              	<button type="button" class="btn bg-gradient-primary mb-3">Export Word</button> -->
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
                
                <div class="container-fluid">
                <table id="tabel_id" class="table table-bordered mt-3" >
        				  <thead>
        				    <tr>
        				      <th scope="col">No</th>
        				      <th scope="col">Spesialis</th>
        				      <th scope="col">Tarif</th>
        				      <th scope="col">Keterangan</th>
                      <th scope="col">Aksi</th>
                  
        				    </tr>
        				  </thead>
        				  <tbody id="target">
                    
                  </tbody>
        			</table>
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





  <!-- modal -->


  <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Spesialis</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <label for="kodespesialis">Kode Spesialis</label>
        <input type="text" class="form-control" id="kodespesialis" name="kodespesialis" placeholder="Kode Spesialis">
      </div>
      <div class="form-group">
        <label for="namaspesialis">NAMA SPESIALIS</label>
          <div class="controls">
          <input type="text" name="namaspesialis"  class="form-control" id="namaspesialis" placeholder="Nama Spesialis">
          </div>
      </div>
    <div class="form-group">
        <label for="tarif">TARIF</label>
        <input type="number" class="form-control" id="tarif" name="tarif" placeholder="Tarif">
      </div>
      <div class="form-group">
        <label for="keterangan">KETERANGAN</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
      </div>
     
   
       <button type="button" class="btn btn-secondary btnclose"  data-dismiss="modal">Close</button>
       <button type="submit" onclick="save()" id="btn_simpan" class="btn btn-primary">Simpan</button>
       <button type="submit" onclick="ubah()" id="btn_ubah" class="btn btn-primary">ubah</button>
      </div>
      
    </div>
  </div>
</div>


  <!-- /.content-wrapper -->
 <script>

    ambilData();

    function ambilData(){
      $.ajax({
        type     : 'POST',
        url      : '<?= base_url()."spesialis/getdata"?>',
        dataType : 'json',
        success  : function(data){
            console.log(data);
            var baris='';
            var no=1;
            for(var i=0;i<data.length;i++){
             
              baris += `<tr>
                          <td>`+no+`</td>
                          <td>`+data[i].nama+`</td>+
                          <td>`+data[i].tarif+`</td>+
                          <td>`+data[i].keterangan+`</td>+
                          <td><button type="button" onclick="submit('`+data[i].kd_spesialis+`')" class="btn btn-primary btnedit" data-toggle="modal" data-target=".bd-example-modal-xl">Edit</button><a href="<?= base_url()?>spesialis/hapus/`+data[i].kd_spesialis+` " class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                       </tr>`;
               no++;
            }
            $('#target').html(baris);
           
        }
      });
    }



    function submit(x){
      if(x=='tambah'){
        $('#btn_simpan').show();
        $('#btn_ubah').hide();
      }else{
        $('#btn_simpan').hide();
        $('#btn_ubah').show();

        $.ajax({
          type     : 'POST',
          data     : 'kd_spesialis='+x,
          url      : '<?= base_url()."spesialis/edit"?>',
          dataType : 'json',
          success  : function(hasil){
            console.log(hasil);
            $("[name='kodespesialis']").val(hasil[0].kd_spesialis);
            $("[name='namaspesialis']").val(hasil[0].nama);
            $("[name='tarif']").val(hasil[0].tarif);
            $("[name='keterangan']").val(hasil[0].keterangan);
          }
        });
      }

    }

    function ubah(){
      var kd_spesialis   = $("[name='kodespesialis']").val();
      var namaspesialis  = $("[name='namaspesialis']").val();
      var tarif          = $("[name='tarif']").val();
      var keterangan     = $("[name='keterangan']").val();

      $.ajax({
        type     : 'POST',
        data     :  'kd_spesialis='+kd_spesialis+
                    '&namaspesialis='+namaspesialis+
                    '&tarif='+tarif+
                    '&keterangan='+keterangan,
        url      : '<?= base_url()."spesialis/Update"?>',
        dataType : 'json',
        success  : function(hasil){
          if(hasil == 'succes'){
            $('.text-danger').remove();
            $('#exampleModal').modal('hide');
                Swal.fire({
                title : 'Data Spesialis ',
                text  : 'Berhasil ditambah',
                type  : 'success'
            });
            ambilData();
          }
        }
      });
    }

     $(function(){

        $('.tombol-hapus').click(function(e){
          e.preventDefault();

          const href = $(this).attr('href');

          Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: "Menghapus data ini",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus'
          }).then((result) => {
          if (result.value) {
            document.location.href = href;
          }
        })

        });

      $('.btnclose').click(function(){
          $("[name='kd_spesialis']").val('');
          $("[name='namaspesialis']").val('');
          $("[name='tarif']").val('');
          $("[name='keterangan']").val('');
      });
        const flashData = $('.flash-data').data('flashdata');
        if(flashData){
          Swal.fire({
            title : 'Data Spesialis ',
            text  : 'Berhasil '+ flashData,
            type  : 'success'
          });
        }
     });

   
    function save(){
      var kd_spesialis   = $("[name='kodespesialis']").val();
      var namaspesialis  = $("[name='namaspesialis']").val();
      var tarif          = $("[name='tarif']").val();
      var keterangan     = $("[name='keterangan']").val();

      $.ajax({
        type     : 'POST',
        data     :  'kd_spesialis='+kd_spesialis+
                    '&namaspesialis='+namaspesialis+
                    '&tarif='+tarif+
                    '&keterangan='+keterangan,
        url      : '<?= base_url()."spesialis/add_data"?>',
        dataType : 'json',
        success  : function(hasil){
          if(hasil == 'succes'){
            $('.text-danger').remove();
            $('#exampleModal').modal('hide');
                Swal.fire({
                title : 'Data Spesialis ',
                text  : 'Berhasil ditambah',
                type  : 'success'
            });
            ambilData();
          }
        //   if(hasil.succes == true){
        //     $('.text-danger').remove();
        //     $('#exampleModal').modal('hide');
        //     ambilData();
        //     $("[name='kd_spesialis']").val('');
        //     $("[name='namaspesialis']").val('');
        //     $("[name='tarif']").val('');
        //     $("[name='keterangan']").val('');

        //     Swal.fire({
        //       title : 'Data Spesialis ',
        //       text  : 'Berhasil ditambah',
        //       type  : 'success'
        //     });
        //  }else{
        //     console.log(hasil);
        //     $('.text-danger').remove();
        //     $.each(hasil.messages, function(key,value){
        //       var element = $('#'+key);
        //       element.after(value);
        //     });
        //  }
          
        }
      });
    }
 </script>

 