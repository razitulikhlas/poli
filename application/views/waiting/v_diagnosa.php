<div class="content-wrapper">
    <div class="ml-3">
        <div class="row">
            <div class="col-7 mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pasien</h3>
                                    <div class="card-tools">
                                    <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button> -->

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="Nama">Nama</label>
                                        </div>
                                        <div class="col-6">
                                            <?= $pasien->nama?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="Nama">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-6">
                                        <?= $pasien->tgl_lahir?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="Nama">Jenis Kelamin</label>
                                        </div>
                                        <div class="col-6">
                                        <?= $pasien->jenis_kelamin?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="Nama">Alamat</label>
                                        </div>
                                        <div class="col-6">
                                        <?= $pasien->alamat?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="Nama">No HP</label>
                                        </div>
                                        <div class="col-6">
                                        <?= $pasien->nohp?>
                                        </div>
                                    </div>
                                </div>
                    <!-- /.card-body -->
                    </div>
                        <!-- end col data pasien -->
                    </div>
                </div>
                <!-- end card data pasien -->
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Diagnosa Pasien</h3>
                    <div class="card-tools">
                    <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button> -->

                    </div>
                </div>
                <div class="card-body mb-5">
                <div class="form-group">
                          <input type="hidden" name="nofaktur"  class="form-control" id="nofaktur" value="<?= $kodepasien ?>">
                           <input type="hidden" name="kdpasien"  class="form-control" id="kdpasien" value="<?= $detail->kd_pasien ?>">
                            <input type="hidden" class="form-control" id="kddokter" name="kddokter" value="<?= $detail->kd_dokter; ?>">
                </div>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                          <label for="keluhan">Keluhan</label>
                          <input type="text" class="form-control" id="keluhan" name="keluhan"  placeholder="Keluhan Pasien" >
                      </div>
                    </div>
                    
                    <div class="col-md-2 mt-4">
                     <button id="btnkeluhan" onclick="save(4)" class="btn btn-warning mt-2" style="width: 100%">tambah</button>
                    </div>
                    <!-- end row diagnosa -->
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <label for="Diagnosa">Diagnosa</label>
                      <div class="form-group">
                           <div class="select2-purple">
                              <select class="form-control" id="diagnosa" name="diagnosa" >
                                <?php foreach($diagnosa as $row) : ?>
                                  <option value="<?= $row['no'] ?>"><?= $row['nama_diagnosa'] ?></option>
                                <?php endforeach; ?>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 mt-4">
                     <button id="btndiagnosa" onclick="save(5)" class="btn btn-warning mt-2" style="width: 100%">tambah</button>
                    </div>
                    <!-- end row diagnosa -->
                  </div>
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
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>SUB HARGA</label>
                        <input type="text" class="form-control" id="subhargaobat" name="subhargaobat" placeholder="harga ..." readonly="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group" style="margin-top: 32px;">
                        <button class="btn btn-warning" onclick="save(1)" style="width: 100%">tambah</button>
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
                    <div class="col-sm-4">
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
                        <button class="btn btn-warning" onclick="save(2)" style="width: 100%" >tambah</button>
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
                    <div class="col-sm-4">
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
                        <button class="btn btn-warning" onclick="save(3)" style="width: 100%">tambah</button>
                      </div>
                    </div>

                  </div>
                
              </div>
                </div>
                    <!-- end diagnosa pasien -->
                    </div>
                </div>

            </div>
            <div class="col mt-3 mr-2">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">History</h3>
                <div class="card-tools">
                <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button> -->
                </div>
              </div> 
                <div class="card-body">
                <label class="ml-2" style="color: #808080">Keluhan</label>  
                    <div class="ml-2 keluhan" style="color: #808080">
                       <div class="row" id="rinciankeluhan">
                          
                       </div>
                    </div> 
                     <hr>
                   <label class="ml-2" style="color: #808080">Diagnosa</label>  
                    <div class="ml-2 diagnosa" style="color: #808080">
                       <div class="row" id="rinciandiagnosa">
                          
                       </div>
                    </div>
                     <hr>
                    <label class="ml-2" style="color: #808080">OBAT</label>  
                    <div class="ml-2 " style="color: #808080">
                    <div class="row" id="rincianobat">  
                      
                    </div>
                    
                    <div class="row  mb-2">
                      <div class="col-9"><label for="">Sub harga</label></div>
                      <div class="col-3" id="detailsubhargaobat">Rp 0</div>
                    </div>
                    <hr>

                    <label style="color: #808080">TINDAKAN</label>  
                    <div class="ml-2 " style="color: #808080">
                      <div class="row" id="rinciantindakan">
                          
                       </div>
                    </div>

                   <div class="row  mb-2">
                      <div class="col-9"><label for="">Sub harga</label></div>
                      <div class="col-3" id="detailsubhargatindakan">Rp 0</div>
                    </div>
                    <hr>
                     
                    <label style="color: #808080">Labor</label>  
                    <div class="ml-2 Obat" style="color: #808080">
                       <div class="row" id="rincianlabor">
                          
                       </div>
                  </div>
                  <div class="row  mb-5">
                      <div class="col-9"><label for="">Sub harga</label></div>
                      <div class="col-3" id="detailsubhargalabor">Rp 0</div>
                  </div>
                  <hr>

                  <div class="row ">
                      <div class="col-9"><label for="">TOTAL HARGA</label></div>
                      <div class="col-3"id="txtTotal">Rp 0</div>
                  </div> 
                  <div class="row mt-4">
                      <div class="col-9"><button class="btn btn-primary" onclick="simpanData()">Simpan</button></div>
                     
                  </div>             
                </div>
            </div>
        </div>
    </div>

  


</div>

<script type="text/javascript">
let faktur    = $('#nofaktur').val();
  $(document).ready(function(){
      $("select").select2();
  });


  function simpanData(){
    let totalHarga = $("#txtTotal").text();
    totalHarga     = convertHarga(totalHarga);
    console.log(totalHarga);
    $.ajax({
            type     : 'POST',
            data     :  'total='+totalHarga+
                        '&faktur='+faktur,
            url      : '<?= base_url()."listpasien/simpanData"?>',
            dataType : 'json',
            success  : function(hasil){
              console.log(hasil);
              if(hasil == 'succes'){
                location.href = '<?= base_url()."listpasien/index" ?>';
              }
            },
            error: function(hasil){
              alert("data sudah ada");
            }  
        });

  }

  function bayar(){
      let txtTotal  = $('#txtTotal').val();
      let dibayar   = $('#dibayar').val();
      let kembalian = $('#kembalian').val();
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
              getRincian($rincian_kode);
            }  
          }
        });
      }else if($rincian_kode == 2){
          let kd_tindakan   = $("[name='kd_tindakan']").val();
          let kd_krywntdkn  = $("[name='karyawan_tindakan']").val();
          let harga         = $("[name='hargatindakan']").val();
      
          $.ajax({
            type     : 'POST',
            data     :  'kd_tindakan='+kd_tindakan+
                        '&kd_rincian='+$rincian_kode+
                        '&harga='+harga+
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
      }else if($rincian_kode == 4){
          let keluhan = $("[name='keluhan']").val();
          $.ajax({
            type     : 'POST',
            data     :  'keluhan='+keluhan+
                        '&kd_rincian='+$rincian_kode+
                        '&faktur='+faktur,
            url      : '<?= base_url()."listpasien/saveRincian"?>',
            dataType : 'json',
            success  : function(hasil){
              console.log(hasil);
              if(hasil == 'succes'){
                $('#keluhan').val('');
                getRincian($rincian_kode);
            }  
          }
        });
      }else if($rincian_kode == 5){
          let diagnosa = $("[name='diagnosa']").val();
          $.ajax({
            type     : 'POST',
            data     :  'diagnosa='+diagnosa+
                        '&kd_rincian='+$rincian_kode+
                        '&faktur='+faktur,
            url      : '<?= base_url()."listpasien/saveRincian"?>',
            dataType : 'json',
            success  : function(hasil){
              console.log(hasil);
              if(hasil == 'succes'){
                getRincian($rincian_kode);
            }  
          }
        });
      }else{
         let kd_tindakan = $("[name='kd_lab']").val();
         let kd_krywnlab = $("[name='karyawan_lab']").val();
         let harga       = $("[name='hargalab']").val();

          $.ajax({
            type     : 'POST',
            data     :  'kd_labor='+kd_tindakan+
                        '&kd_rincian='+$rincian_kode+
                        '&harga='+harga+
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
                baris += `<div class="col-md-7">
                            `+data.rincian[i].nama_obat+`
                          </div>
                          <div class="col-md-2">
                          <button class='btn btn-danger btn-xs' onclick="hapusObat('`+data.rincian[i].no+`')"><i class="fa fa-trash "></i></button>
                          </div>
                          <div class="col-md-3">
                           Rp  `+data.rincian[i].sub_total+`
                          </div>`;
                    no++;
              }
              $('#detailsubhargaobat').text('Rp '+data.subharga.sub_total);
              $('#rincianobat').html(baris);
              totalHarga();
            }else{
              $('#rincianobat').html('');
              $('#detailsubhargaobat').text("Rp 0");
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
              baris += `<div class="col-md-7">
                            `+data.rincian[i].tindakan+`
                          </div>
                          <div class="col-md-2">
                          <button class='btn btn-danger btn-xs' onclick="hapusTindakan('`+data.rincian[i].no+`')"><i class="fa fa-trash "></i></button>
                          </div>
                          <div class="col-md-3">
                           Rp  `+data.rincian[i].harga+`
                          </div>`;
              no++;
              }
              $('#rinciantindakan').html(baris);
              $('#detailsubhargatindakan').text('Rp '+data.subharga.harga);
              totalHarga();
            }else{
              $('#rinciantindakan').html('');
              $('#detailsubhargatindakan').text("Rp 0");
              totalHarga();
            }   
        }
      });
    }else if($kd_rincian == 4){
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
            if(data.keluhan.length > 0){
              for(var i=0;i<data.keluhan.length;i++){
              baris += `<div class="col-md-7">`
                         +data.keluhan[i].keluhan+`
                          </div>
                          <div class="col-md-2">
                          <button class='btn btn-danger btn-xs' onclick="hapusKeluhan('`+data.keluhan[i].no+`')"><i class="fa fa-trash "></i></button>
                          </div>`
                          ;
              no++;
              }
              $('#rinciankeluhan').html(baris);
            }else{
              $('#rinciankeluhan').html('');
            }   
        }
      });
    }else if($kd_rincian == 5){
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
            if(data.diagnosa.length > 0){
              for(var i=0;i<data.diagnosa.length;i++){
              baris += `<div class="col-md-7">`
                         +data.diagnosa[i].nama_diagnosa+`
                          </div>
                          <div class="col-md-2">
                          <button class='btn btn-danger btn-xs' onclick="hapusDiagnosa('`+data.diagnosa[i].no+`')"><i class="fa fa-trash "></i></button>
                          </div>`
                          ;
              no++;
              }
              $('#rinciandiagnosa').html(baris);
            }else{
              $('#rinciandiagnosa').html('');
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
                  baris += `<div class="col-md-7">
                            `+data.rincian[i].tindakan+`
                          </div>
                          <div class="col-md-2">
                          <button class='btn btn-danger btn-xs' onclick="hapusLab('`+data.rincian[i].no+`')"><i class="fa fa-trash "></i></button>
                          </div>
                          <div class="col-md-3">
                           Rp  `+data.rincian[i].harga+`
                          </div>`;
                      no++;
                }
                $('#rincianlabor').html(baris);
                $('#detailsubhargalabor').text("Rp "+data.subharga.harga);
                totalHarga();
            }else{
              $('#rincianlabor').html('');
              $('#detailsubhargalabor').text("Rp 0");
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

  function hapusKeluhan(kd){
    $.ajax({
      type     : 'POST',
      data     : 'id='+kd+
                 '&jenis=4',
      url      : '<?= base_url()."listpasien/hapusRincian" ?>',
      dataType : 'json',
      success  : function(data){
        if(data == 'success'){
          getRincian(4);
        }
      }
    })  
  }

  function hapusDiagnosa(kd){
    $.ajax({
      type     : 'POST',
      data     : 'id='+kd+
                 '&jenis=5',
      url      : '<?= base_url()."listpasien/hapusRincian" ?>',
      dataType : 'json',
      success  : function(data){
        if(data == 'success'){
          getRincian(5);
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
    let obat  = $('#detailsubhargaobat').text();
    obat = convertHarga(obat);
    console.log("obat :"+ obat);
    let tindakan = $('#detailsubhargatindakan').text();
    tindakan = convertHarga(tindakan);
    let lab = $('#detailsubhargalabor').text();
    lab = convertHarga(lab);
    let total = parseInt(obat) + parseInt(tindakan) + parseInt(lab);
    console.log(total);
    $('#txtTotal').html("Rp "+total);
  }

  function convertHarga(harga){
    let convert = harga.split(' ');
    return convert[1];
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




  
