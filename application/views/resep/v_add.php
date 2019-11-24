
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
                <h3 class="card-title">Razitul Ikhlas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                 </div>
               </div>
              <div class="card-body">
                <!-- <form > -->
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Dokter</label>
                        <input type="text" id="kd_dokter" data-kode="<?= $kd_dokter ?>"  name="kd_dokter" class="form-control" placeholder="Enter ..." readonly="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Pasien</label>
                        <input type="text" id="kd_pasien" data-kode="<?= $kd_pasien ?>" name="kd_pasien"  class="form-control" placeholder="Enter ..." readonly="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>No Faktur</label>
                        <input type="text" id="faktur" name="faktur" class="form-control" placeholder="Enter ..." readonly="">
                      </div>
                    </div>
                  </div>
                   <div class="row">
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label>KODE OBAT</label>
                          <select class="custom-select" id="kd_obat" name="kd_obat"> 
                            <?php foreach($kd_obat as $row) : ?>
                              <option value="<?= $row['kd_obat'] ?>"><?= $row['nama_obat']  ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                      </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                          <label>HARGA</label>
                          <input type="text" id="harga" name="harga" class="form-control" placeholder="harga..." readonly="">
                        </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>JUMLAH</label>
                        <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="jumlah ..." >
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>SUB HARGA</label>
                        <input type="text" class="form-control" id="subharga" name="subharga" placeholder="harga ..." readonly="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group" style="margin-top: 32px;">
                        <button class="form-control btn btn-primary" id="btnTambah" style="width: 40%"> tambah</button>
                      </div>
                    </div>     
                  </div>
             <!--    </form> -->
                
                <br><br>
                <div style="margin-top: 20px">
                  <table id="tabel_id" class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">harga</th>
                            <th scope="col">jumlah</th>
                            <th scope="col">subharga</th>
                            <th scope="col">Aksi</th>
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
                          <b>Total</b>
                        </div>
                        <div class="col-md-2 pull-right">
                          <input type="text" name="txtTotal" id="txtTotal" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-1 mt-1">
                          <b>Di bayar</b>
                        </div>
                        <div class="col-md-2 pull-right">
                          <input type="text" name="dibayar" id="dibayar" class="form-control" >
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-1 mt-1">
                          <b>Kembalian</b>
                        </div>
                        <div class="col-md-2 pull-right">
                          <input type="text" name="kembalian" id="kembalian" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-2">
                          
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-1 mt-1">
                          
                        </div>
                        <div class="col-md-2 pull-right">
                          <button class="form-control btn btn-danger" id="btnBayar">Bayar</button>
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





  


  <!-- /.content-wrapper -->
<script>
  getData();
  // getNamaPasien();
  function getData(){
      let nama = $('#kd_dokter').data('kode');
      let namapasien = $('#kd_pasien').data('kode');

      $.ajax({
          type     : 'POST',
          data     : 'kd_dokter='+nama+'&kd_pasien='+namapasien,
          url      : '<?= base_url()."resep/getData"?>',
          dataType : 'json',
          success  : function(hasil){
            console.log(hasil);
             $("[name='kd_dokter']").val(hasil['datadokter'][0].nama);
             $("[name='kd_pasien']").val(hasil['datapasien'][0].nama);
          }
      });
  }

  detaIlObat();

  function detaIlObat(){
    let kd_obat = $('#kd_obat').val();
    $.ajax({
        type     : 'POST',
        data     : 'kd_obat='+kd_obat,
        url      : '<?= base_url()."resep/detailObat"?>',
        dataType : 'json',
        success  : function(hasil){
          $("[name='harga']").val(hasil[0].harga);
        }
    });
  }

  
  $('#kd_obat').on('change',function(){
      detaIlObat();

  });

  function harga(){
    let jumlah = $('#jumlah').val();
    let subharga = $('#harga').val() * jumlah ;
    $("[name='subharga']").val(subharga);
  }

  $('#jumlah').on('input',function(){
      harga();
  });

  getFaktur();

  function getFaktur(){
    let faktur = $('#faktur').val();
    console.log('faktur')

    if(faktur==''){
      $.ajax({
        type     : 'POST',
        url      : '<?= base_url()."resep/getFaktur"?>',
        dataType : 'json',
        success  : function(hasil){
          console.log(hasil);
          $("[name='faktur']").val(hasil);
        }
      });
    }
  }

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
                          '<td><button type="button" class="btn btn-danger " onclick="hapus('+hasil[i].no+')" data-toggle="modal" data-target=".bd-example-modal-xl">hapus</button>'+
                       '</tr>';
               no++;
            }
            $('#tbody').html(baris);
      }
    });
  }

  function save(){
    
    let faktur   = $('#faktur').val();
    let kd_obat  = $('#kd_obat').val();
    let harga    = $('#harga').val();
    let jumlah   = $('#jumlah').val();
    let subharga = $('#subharga').val();

    $.ajax({
        type     :  'POST',
        data     :  'kd_obat='+kd_obat+
                    '&faktur='+faktur+
                    '&harga='+harga+
                    '&jumlah='+jumlah+
                    '&subharga='+subharga,
        url      : '<?= base_url()."resep/save"?>',
        dataType : 'json',
        success  : function(hasil){
          if(hasil.pesan == ''){
            $("[name='jumlah']").val('');
            $("[name='subharga']").val('');
            Swal.fire({
            title : 'Data Spesialis ',
            text  : 'Berhasil ditambah',
            type  : 'success'
          });
          }   
        }
      });
    getTabel();
    totalPembayaran(faktur);

  }

  $('#btnTambah').on('click',function(){
    
    let jumlah   = $('#jumlah').val();
    let subharga = $('#subharga').val();

    (jumlah =='' && subharga == '' ) ? alert('jumlah obat tidak boleh kosong') : save() ;
      
  });

  function totalPembayaran(nofaktur){   
    $.ajax({
      type     : 'POST',
      data     : 'faktur='+nofaktur,
      dataType : 'json',
      url      : '<?= base_url()."resep/totalHarga" ?>',
      success  : function(hasil){
        console.log(hasil);
        $("[name='txtTotal']").val(hasil[0].sub_total);

      }
    });
 
  }

  $('#dibayar').on('input',function(){
    let totalHarga = $('#txtTotal').val();
    let dibayar    = $('#dibayar').val();

    if(dibayar != ""){
      let kembalian = dibayar - totalHarga ;
      $("[name='kembalian']").val(kembalian);
    }else{
      $("[name='kembalian']").val('');
    }

  });

  function savePembayaran(){
    let nofaktur   = $('#faktur').val();
    let kd_dokter  = $('#kd_dokter').data('kode');
    let kd_pasien  = $('#kd_pasien').data('kode');
    let totalHarga = $('#txtTotal').val();
    let dibayar    = $('#dibayar').val();
    let kembalian  = $('#kembalian').val();
    let pelayan    = $('.card-title').text();

    $.ajax({
      type    : 'POST',
      url     : '<?= base_url()."resep/savePembayaran"?>',
      data    : 'nofaktur='+nofaktur+
                '&kd_dokter='+kd_dokter+
                '&kd_pasien='+kd_pasien+
                '&totalHarga='+totalHarga+
                '&dibayar='+dibayar+
                '&kembalian='+kembalian+
                '&pelayan='+pelayan,
      dataType : 'json',
      success  : function(e){
       // location.href = "https://www.w3schools.com";

      }
    });

  }

  $('#btnBayar').on('click',function(){
      savePembayaran();
      myFunction();
  });

  function myFunction() {
  location.href = '<?= base_url()."resep/index" ?>';
  }

 function hapus(x){
  $.ajax({
    type : 'POST',
    data : 'no='+x,
    url  : '<?= base_url()."resep/hapusData" ?>',
    dataType : 'json',
    success  : function(data){
      console.log(data);
      getTabel();
    }
  });
 }



</script>
