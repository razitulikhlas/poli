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
                <h3 class="card-title">Diagnosa Pasien </h3>
                <div class="card-tools">
                  <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
              <!--  <form id="formdata" method="post" action=" <?= base_url().'listpasien/simpanRekamMedis';?> "> -->
                <div class="form-group">
                        <input type="hidden" name="nofaktur"  class="form-control" id="nofaktur" value="<?= $rekam_medik->no_faktur ?>">
                </div>
                  <div class="row">
                    <div class="col-md-3">
                       <div class="form-group">
                          <label for="namapasien">NAMA PASIEN</label>
                          <input type="text" name="namapasien"  class="form-control" id="namapasien" value="<?= $rekam_medik->kd_pasien ?>" placeholder="Nama Pasien" readonly="">
                       </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="namadokter">NAMA DOKTER</label>
                          <input type="text" class="form-control" id="namadokter" name="namadokter" value="<?= $rekam_medik->kd_dokter ?>" placeholder="Nama Dokter" readonly="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="keluhan">Keluhan</label>
                          <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?= $rekam_medik->keluhan  ?>"  placeholder="Keluhan Pasien" >
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="Diagnosa">Diagnosa</label>
                      <div class="form-group">
                           <div class="select2-purple">
                              <select class="select2" id="diagnosa" name="diagnosa[]" multiple="multiple" data-placeholder="Pilih diagnosa" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                <?php foreach($diagnosa as $row) : ?>
                                  <option  id="d<?= $row['no'] ?>" value="<?= $row['no'] ?>"><?= $row['nama_diagnosa'] ?></option>
                                <?php endforeach; ?>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                       <button id="btndiagnosa" class="btn btn-warning" style="width: 100%">Update Rekammedik</button>
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

            <div class="card" id="cardobat">
              <div class="card-body">
                <!-- <form > -->
                   <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>KODE OBAT</label>
                          <select class="bootstrap-select" style="width: 100%" id="kd_obat" name="kd_obat"> 
                            <?php foreach($obat as $row) : ?>
                              <option value="<?= $row['kd_obat'] ?>"><?= $row['nama_obat']  ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                      </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                          <label>HARGA</label>
                          <input type="text" id="hargaobat" name="hargaobat" class="form-control" placeholder="harga..." readonly="">
                        </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>JUMLAH</label>
                        <input type="text" id="jumlahobat" name="jumlahobat" class="form-control" placeholder="jumlah ..." >
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>SUB HARGA</label>
                        <input type="text" class="form-control" id="subhargaobat" name="subhargaobat" placeholder="harga ..." readonly="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group" style="margin-top: 32px;">
                        <button class="btn btn-primary" onclick="save(1)" style="width: 50%">tambah</button>
                      </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>TINDAKAN</label>
                          <select class="custom-select" id="tindakan" name="kd_tindakan"> 
                            <?php foreach($tindakan as $row) : ?>
                              <option value="<?= $row['no'] ?>"><?= $row['tindakan']  ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                      </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>KARYAWAN</label>
                          <select class="custom-select" id="karyawan" name="karyawan_tindakan"> 
                            <?php foreach($karyawan as $row) : ?>
                              <option value="<?= $row['no'] ?>"><?= $row['nama']  ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>HARGA</label>
                        <input type="text" id="hargatindakan" name="hargatindakan" class="form-control" placeholder="harga ..." readonly="">
                      </div>
                    </div>
                    
                    <div class="col-sm-2">
                      <div class="form-group" style="margin-top: 32px;">
                        <button class="btn btn-primary" onclick="save(2)" style="width: 50%" >tambah</button>
                      </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Lab</label>
                          <select class="custom-select form-control" id="lab" name="kd_lab"> 
                            <?php foreach($lab as $row) : ?>
                              <option value="<?= $row['no'] ?>"><?= $row['tindakan']  ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                      </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>KARYAWAN</label>
                          <select class="custom-select" id="karyawanlab" name="karyawan_lab"> 
                            <?php foreach($karyawan as $row) : ?>
                              <option value="<?= $row['no'] ?>"><?= $row['nama']  ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>HARGA</label>
                        <input type="text" id="hargalab" name="hargalab" class="form-control" placeholder="harga ..." readonly="">
                      </div>
                    </div>
                    
                    <div class="col-sm-2">
                      <div class="form-group" style="margin-top: 32px;">
                        <button class="btn btn-primary" onclick="save(3)" style="width: 50%">tambah</button>
                      </div>
                    </div>

                  </div>
             <!--    </form> -->
              </div>
            <!-- Modal -->
            <!-- /.card-footer-->
        </div>
        <div class="card">
              <div class="card-header">
                <h3 class="card-title"><label>Rincian Harga</label></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>
              <div class="card-body"> 
                <table class="table  mt-3 mb-3" >
                  <tbody>
                    <tr id="rincianobat">
                      <th>Rincian Harga Obat</th>
                      <td></td>
                    </tr>
                   
                    <!-- </rincian obat> -->
                     <tr>
                      <td>Sub Harga</td>
                      <td id="detailsubhargaobat">0</td>
                    </tr>
                    <!-- </sub harga obat> -->
                    <tr id="rinciantindakan">
                      <th>Rincian Harga Tindakan</th>
                      <td></td>
                    </tr>
                    <!-- </rincian tindakan> -->
                     <tr>
                      <td>Sub Harga</td>
                      <td id="detailsubhargatindakan">0</td>
                    </tr>
                    <!-- </sub Harga tindakan> -->
                    <tr id="rincianlabor">
                      <th>Rincian Harga Labor</th>
                      <td></td>
                    </tr>
                    
                     <!-- </rincian labor> -->
                    <tr>
                      <td>Sub Harga</td>
                      <td id="detailsubhargalabor">0</td>
                    </tr>
                    <!-- </sub Harga Labor> -->

                  </tbody>
              </table>
              <hr>
              <div class="row mt-2">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-3">

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
                        <div class="col-md-3">

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
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-1 mt-1">
                          <b>Kembali</b>
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
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-1 mt-1">
                          
                        </div>
                        <div class="col-md-2 pull-right">
                          <button class="form-control btn btn-success" onclick="bayar()">Bayar</button>
                        </div>
                    </div>

            </div>
       </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>



  <script> 

    function bayar(){
      let txtTotal  = $('#txtTotal').val();
      let dibayar   = $('#dibayar').val();
      let kembalian = $('#kembalian').val();
      let faktur    = $('#nofaktur').val();

      $.ajax({
            type     : 'POST',
            data     :  'total='+txtTotal+
                        '&dibayar='+dibayar+
                        '&kembalian='+kembalian+
                        '&faktur='+faktur,
            url      : '<?= base_url()."listpasien/pembayaran"?>',
            dataType : 'json',
            success  : function(hasil){
              if(hasil == 'succes'){
                location.href = '<?= base_url()."resep/index" ?>';
              }
              
          }
        });
    }

    function save($rincian_kode){
      if($rincian_kode == 1){
          let kd_obat   = $("[name='kd_obat']").val();
          let subharga  = $("[name='subhargaobat']").val();
          let jumlah    = $("[name='jumlahobat']").val();
          let faktur    = $('#nofaktur').val();
          $.ajax({
            type     : 'POST',
            data     :  'kd_obat='+kd_obat+
                        '&subharga='+subharga+
                        '&kd_rincian='+$rincian_kode+
                        '&jumlah='+jumlah+
                        '&faktur='+faktur,
            url      : '<?= base_url()."listpasien/saveRincian"?>',
            dataType : 'json',
            success  : function(hasil){
              console.log(hasil);
              if(hasil == 'succes'){
              $('#jumlahobat').val('');
              $('#subhargaobat').val('');
              $('tr').remove('#listobat');
              getRincian($rincian_kode);
            }  
          }
        });
      }else if($rincian_kode == 2){
          let kd_tindakan   = $("[name='kd_tindakan']").val();
          let kd_krywntdkn  = $("[name='karyawan_tindakan']").val();
          let faktur        = $('#nofaktur').val();
          $.ajax({
            type     : 'POST',
            data     :  'kd_tindakan='+kd_tindakan+
                        '&kd_rincian='+$rincian_kode+
                        '&kd_karyawan='+kd_krywntdkn+
                        '&faktur='+faktur,
            url      : '<?= base_url()."listpasien/saveRincian"?>',
            dataType : 'json',
            success  : function(hasil){
              console.log(hasil);
              if(hasil == 'succes'){
                $('tr').remove('#listindakan');
                getRincian($rincian_kode);
            }  
          }
        });
      }else{
         let kd_tindakan    = $("[name='kd_lab']").val();
          let kd_krywnlab   = $("[name='karyawan_lab']").val();
          let faktur        = $('#nofaktur').val();
          $.ajax({
            type     : 'POST',
            data     :  'kd_labor='+kd_tindakan+
                        '&kd_rincian='+$rincian_kode+
                        '&kd_karyawan='+kd_krywnlab+
                        '&faktur='+faktur,
            url      : '<?= base_url()."listpasien/saveRincian"?>',
            dataType : 'json',
            success  : function(hasil){
              if(hasil == 'succes'){ 
              $('tr').remove('#listlab');
              getRincian($rincian_kode);
            }  
          }
        });
      }  
  }

  


  function getRincian($kd_rincian){
    let faktur = $('#nofaktur').val();
    if($kd_rincian == 1){
      $.ajax({
        type     : 'POST',
        data     : 'faktur='+faktur+
                   '&kd_rincian='+$kd_rincian,
        url      : '<?= base_url()."listpasien/getRincian"?>',
        dataType : 'json',
        success  : function(data){
            console.log(data);
            var baris='';
            var no=1;
            if(data.rincian.length > 0){
                for(var i=0;i<data.rincian.length;i++){
                baris += `<tr id="listobat">
                        <td style="color:#808080">`+data.rincian[i].nama_obat+`</td>
                        <td style="color:#808080">
                        <button class='btn btn-danger btn-xs' onclick="hapusObat('`+data.rincian[i].no+`')"><i class="fa fa-trash "></i></button>
                        RP.`+data.rincian[i].sub_total+`</td>
                        </tr>`;
                    no++;
              }
              $('#detailsubhargaobat').text(data.subharga.sub_total);
              $('#rincianobat').after(baris);
              totalHarga();
            }else{
              $('tr').remove('#listobat');
              $('#detailsubhargaobat').text("0");
              totalHarga();
            }    
        }
      });
    }else if($kd_rincian == 2){
      $.ajax({
        type     : 'POST',
        data     : 'faktur='+faktur+
                   '&kd_rincian='+$kd_rincian,
        url      : '<?= base_url()."listpasien/getRincian"?>',
        dataType : 'json',
        success  : function(data){
          console.log(data);
            var baris='';
            var no=1;
            if(data.rincian.length > 0){
              for(var i=0;i<data.rincian.length;i++){
              baris += `<tr id="listindakan">
                      <td style="color:#808080">`+data.rincian[i].tindakan+`</td>
                      <td style="color:#808080">
                      <button class='btn btn-danger btn-xs' onclick="hapusTindakan('`+data.rincian[i].no+`')"><i class="fa fa-trash "></i></button>
                      RP.`+data.rincian[i].harga+`
                      </td>
                      </tr>`;
                  no++;
              }
              $('#rinciantindakan').after(baris);
              $('#detailsubhargatindakan').text(data.subharga.harga);
              totalHarga();
            }else{
              $('tr').remove('#listtindakan');
              $('#detailsubhargatindakan').text("0");
              totalHarga();
            }   
        }
      });
    }else{
      $.ajax({
        type     : 'POST',
        data     : 'faktur='+faktur+
                   '&kd_rincian='+$kd_rincian,
        url      : '<?= base_url()."listpasien/getRincian"?>',
        dataType : 'json',
        success  : function(data){
            console.log(data);
            var baris='';
            var no=1;
            if(data.rincian.length > 0){
                  for(var i=0;i<data.rincian.length;i++){
                  baris += `<tr id="listlab">
                          <td style="color:#808080">`+data.rincian[i].tindakan+`</td>
                          <td style="color:#808080">
                          <button class='btn btn-danger btn-xs' onclick="hapusLab('`+data.rincian[i].no+`')"><i class="fa fa-trash "></i></button>
                          RP.`+data.rincian[i].harga+`</td>
                          </tr>`;
                      no++;
                }
                $('#rincianlabor').after(baris);
                $('#detailsubhargalabor').text(data.subharga.harga);
                totalHarga();
            }else{
              $('tr').remove('#listlab');
              $('#detailsubhargatindakan').text("0");
              totalHarga();
            } 
        }
      });
    }
      
  }

  function hapusObat(kd){
    $.ajax({
      type     : 'POST',
      data     : 'id='+kd+
                 '&jenis=1',
      url      : '<?= base_url()."listpasien/hapusRincian" ?>',
      dataType : 'json',
      success  : function(data){
        if(data == 'success'){
          $('tr').remove('#listobat');
          getRincian(1);
        }
      }
    })  
  }

  function hapusTindakan(kd){
    $.ajax({
      type     : 'POST',
      data     : 'id='+kd+
                 '&jenis=2',
      url      : '<?= base_url()."listpasien/hapusRincian" ?>',
      dataType : 'json',
      success  : function(data){
        if(data == 'success'){
          $('tr').remove('#listindakan');
          getRincian(2);
        }
      }
    })  
  }

  function hapusLab(kd){
    $.ajax({
      type     : 'POST',
      data     : 'id='+kd+
                 '&jenis=3',
      url      : '<?= base_url()."listpasien/hapusRincian" ?>',
      dataType : 'json',
      success  : function(data){
        if(data == 'success'){
          $('tr').remove('#listlab');
          getRincian(3);
        }
      }
    })  
  }


  function getHargaLab(){
    let kd_lab = $('#lab').val();
    $.ajax({
      type     : 'POST',
      data     : 'no='+kd_lab,
      url      : '<?= base_url()."labor/edit" ?>',
      dataType : 'json',
      success  : function(data){
        $('#hargalab').val(data[0].harga);
      }
    })
  }
    
  function getNama(){
      let kd_pasien = $('#namapasien').val();
      let kd_dokter = $('#namadokter').val();
      $.ajax({
        type     : 'POST',
        data     : 'kd_pasien='+kd_pasien+'&kd_dokter='+kd_dokter,
        url      : '<?= base_url()."listpasien/getNama"?>',
        dataType : 'json',
        success  : function(hasil){
          $('#namapasien').val(hasil.namapasien);
          $('#namadokter').val(hasil.namadokter);
        }
      });
  }

  function getDiagnosa(){
      let faktur = $('#nofaktur').val();
      $.ajax({
        type     : 'POST',
        data     : 'faktur='+faktur,
        url      : '<?= base_url()."listpasien/getDetailDiagnosa"?>',
        dataType : 'json',
        success  : function(data){
          let kode=data[0].kd_diagnosa;
          $('#d'+kode).attr('selected', '');
        }
      });
    }

    

    function detailObat(){
    let kd_obat = $('#kd_obat').val();
    $.ajax({
        type     : 'POST',
        data     : 'kd_obat='+kd_obat,
        url      : '<?= base_url()."resep/detailObat"?>',
        dataType : 'json',
        success  : function(hasil){
          $("[name='hargaobat']").val(hasil[0].harga_jual);
        }
    });
  }

  function harga(){
    let jumlah = $('#jumlahobat').val();
    let subharga = $('#hargaobat').val() * jumlah ;
    $("[name='subhargaobat']").val(subharga);
  }

  function getHargaTindakan(){
    let kd_tindakan = $('#tindakan').val();
    $.ajax({
      type     : 'POST',
      data     : 'no='+kd_tindakan,
      url      : '<?= base_url()."tindakan/edit" ?>',
      dataType : 'json',
      success  : function(data){
        $('#hargatindakan').val(data[0].harga);
      }
    })
  }

  function totalHarga(){
    let obat = $('#detailsubhargaobat').text();
    let tindakan = $('#detailsubhargatindakan').text();
    let lab = $('#detailsubhargalabor').text();
    let total = parseInt(obat) + parseInt(tindakan) + parseInt(lab);
    console.log('total '+total);
    console.log('total '+tindakan);
    console.log('total '+lab);
    console.log('total '+obat);
    $('#txtTotal').val(total);
  }

  function kembalian(){
    let txtTotal  = $('#txtTotal').val();
    let dibayar   = $('#dibayar').val();
    if(dibayar == ''){
      $('#kembalian').val(0);
    }else{
      let kembalian = parseInt(dibayar) - parseInt(txtTotal);
      $('#kembalian').val(kembalian);
    }
    
  }
  

  getNama();
  getHargaLab();
  getDiagnosa();
  getHargaTindakan();
  detailObat();

  



  $(function(){
    $("select").select2();
  });

  $('#kd_obat').on('change',function(){
      detailObat();
  });

  $('#dibayar').on('input',function(){
      kembalian();
  });

  $('#lab').on('change',function(){
      getHargaLab();
  });

  $('#jumlahobat').on('input',function(){
      harga();
  });

  $('#tindakan').on('change',function(){
      getHargaTindakan();
  });

  </script>