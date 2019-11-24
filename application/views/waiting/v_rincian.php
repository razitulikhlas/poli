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
                        <button class="btn btn-primary" id="btnobat" style="width: 50%">tambah</button>
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
                              <option value="<?= $row->no ?>"><?= $row->nama  ?></option>
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
                        <button class="btn btn-primary" id="btntindakan" style="width: 50%" onclick="saveTindakan()">tambah</button>
                      </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Lab</label>
                          <select class="custom-select form-control" id="lab" name="lab"> 
                            <?php foreach($lab as $row) : ?>
                              <option value="<?= $row['no'] ?>"><?= $row['tindakan']  ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                      </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>KARYAWAN</label>
                          <select class="custom-select" id="karyawanlab" name="karyawanlab"> 
                            <?php foreach($karyawan as $row) : ?>
                              <option value="<?= $row->no ?>"><?= $row->nama  ?></option>
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
                        <button class="btn btn-primary" id="btntindakan" style="width: 50%">tambah</button>
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
                      <td id="detailsubhargaobat">Rp. </td>
                    </tr>
                    <!-- </sub harga obat> -->
                    <tr id="rinciantindakan">
                      <th>Rincian Harga Tindakan</th>
                      <td></td>
                    </tr>
                    <!-- </rincian tindakan> -->
                     <tr>
                      <td>Sub Harga</td>
                      <td id="detailsubhargatindakan">RP. 0</td>
                    </tr>
                    <!-- </sub Harga tindakan> -->
                    <tr>
                      <th>Rincian Harga Labor</th>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="color:#808080">Check Darah</td>
                      <td style="color:#808080">RP. 30000</td>
                    </tr>
                    <tr>
                      <td style="color:#808080">Check Asam Urat</td>
                      <td style="color:#808080">RP. 40000</td>
                    </tr>
                     <!-- </rincian labor> -->
                    <tr>
                      <td>Sub Harga</td>
                      <td id="subhargalabor">RP. 70000</td>
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
                          <button class="form-control btn btn-danger" id="btnBayar">Bayar</button>
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
    function save(){
      let kd_obat   = $("[name='kd_obat']").val();
      let subharga  = $("[name='subhargaobat']").val();
      let jumlah    = $("[name='jumlahobat']").val();
      let faktur    = $('#nofaktur').val();
      $.ajax({
        type     : 'POST',
        data     :  'kd_obat='+kd_obat+
                    '&subharga='+subharga+
                    '&jumlah='+jumlah+
                    '&faktur='+faktur,
        url      : '<?= base_url()."listpasien/saveObat"?>',
        dataType : 'json',
        success  : function(hasil){
          if(hasil == 'succes'){
          $('#jumlahobat').val('');
          $('#subhargaobat').val('');
          $('tr').remove('#listobat');
          getRincianObat();
        }  
      }
    });
  }

  function saveTindakan(){
      let kd_tindakan   = $("[name='kd_tindakan']").val();
      let kd_krywntdkn  = $("[name='karyawan_tindakan']").val();
      let faktur        = $('#nofaktur').val();
      $.ajax({
        type     : 'POST',
        data     :  'kd_tindakan='+kd_tindakan+
                    '&kd_karyawan='+kd_krywntdkn+
                    '&faktur='+faktur,
        url      : '<?= base_url()."listpasien/saveTindakan"?>',
        dataType : 'json',
        success  : function(hasil){
          if(hasil == 'success'){
          $('tr').remove('#listindakan');
          getRincianTindakan();
        }  
      }
    });
  }


  function getRincianTindakan(){
    let faktur = $('#nofaktur').val();
      $.ajax({
        type     : 'POST',
        data     : 'faktur='+faktur,
        url      : '<?= base_url()."listpasien/getRincianTindakan"?>',
        dataType : 'json',
        success  : function(data){
            var baris='';
            var no=1;
            for(var i=0;i<data.tindakan.length;i++){
              baris += `<tr id="listindakan">
                      <td style="color:#808080">`+data.tindakan[i].tindakan+`</td>
                      <td style="color:#808080">
                      <a href="<?= base_url()?>labor/hapusData/`+data.tindakan[i].no+`" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i></a>
                      RP.`+data.tindakan[i].harga+`
                      </td>
                      </tr>`;
                  no++;
            }
            $('#rinciantindakan').after(baris);
            $('#detailsubhargatindakan').text("Rp ."+data.subharga.harga);
        }
      });
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

    function getRincianObat(){
      let faktur = $('#nofaktur').val();
      $.ajax({
        type     : 'POST',
        data     : 'faktur='+faktur,
        url      : '<?= base_url()."listpasien/getRincianObat"?>',
        dataType : 'json',
        success  : function(data){
            var baris='';
            var no=1;
            for(var i=0;i<data.obat.length;i++){
              baris += `<tr id="listobat">
                      <td style="color:#808080">`+data.obat[i].nama_obat+`</td>
                      <td style="color:#808080">
                      <a href="<?= base_url()?>labor/hapusData/`+data.obat[i].no+`" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i></a>
                       RP.`+data.obat[i].sub_total+`</td>
                      </tr>`;
                  no++;
            }
            $('#rincianobat').after(baris);
            $('#detailsubhargaobat').text("Rp ."+data.subharga.sub_total);
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
  

  getNama();
  getHargaLab();
  getDiagnosa();
  getHargaTindakan();
  detailObat();

  $('#btnobat').on('click',function(){
      save();
  });


  $(function(){
    $("select").select2();
  });

  $('#kd_obat').on('change',function(){
      detailObat();
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