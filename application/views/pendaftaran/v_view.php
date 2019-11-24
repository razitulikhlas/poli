          
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-lg-4 col-6 mt-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="totaldokter">150</h3>
                <p>DOKTER HARI INI</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6 mt-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="totalpasien">44</h3>
                <p>PASIEN TERDAFTAR HARI INI</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6 mt-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="riwayat">44</h3>
                <p>Riwayat Pendaftaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div><!-- /.row -->
         <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Jadwal Dokter</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
           
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <table class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Dokter</th>
                      <th scope="col">Waktu</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Status</th>
                      <th scope="col">Photo</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $i = 1; ?>
                      <?php foreach($jadwal as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i; ?></th>
                          <td><?= $row["namadokter"] ?></td>
                          <td><?= $row["waktu"] ?></td>
                          <td><?= $row["tanggal"] ?></td>
                          <td><?= $row["status"] ?></td>
                          <td><img src="<?= base_url()?>assets/foto/<?= $row['photo']?>" height="50px"></td>
                          
                          <td>
                          
                           <button type="button" onclick="submit(<?= $row['kd_jadwal']?>)" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-edit"></i></button>
                      
                          </td>
                         
                        </tr>
                      <?php $i++; ?>
              <?php endforeach; ?>
              </tbody>
              </table>
            </div>
       </div>
      </div><!-- /.container-fluid -->
         <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Pendaftaran Pasien</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
        
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">No Pendaftaran</t>
                      <th scope="col">Nama Pasien</th>
                      <th scope="col">Nama Dokter</th>
                      <th scope="col">Jadwal Berobat</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="target">
                   
              </tbody>
              </table>
            </div>
       </div>
    </div>
    <!-- /.content-header -->  
  </div>


   <!-- modal -->


  <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Pendaftaran Pasien Berobat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
          <form action="<?=base_url('pendaftaran/simpanData') ?>" method="post">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="kdjadwal" name="kdjadwal" value="" >
                </div>
                <div class="form-group">
                    <label for="nopendaftaran">NO PENDAFTARAN</label>
                    <input type="text" class="form-control" id="nopendaftaran" name="nopendaftaran" readonly="">
                </div>
                <div class="form-group">
                    <label for="no">KODE POLI</label>
                    <input readonly="" type="text" class="form-control" id="kd_poli" name="kd_poli" value="<?= $kd_poli ?>" >
                </div>
                <div class="form-group " >
                          <label>Pasien</label>
                              <select class="custom-select" id="kd_pasien" name="kd_pasien">
                                  <?php 
                                        
                                      $pasien = $this->pasien_model->get_data();

                                  ?>
                                  <?php foreach($pasien as $row) : ?>

                                    <option value="<?= $row['kd_pasien'] ?>"> <?= $row['nama']?> </option>
                                
                                  <?php endforeach;?>
                              </select>
                              
                </div>
               
               <div class="form-group">
                    <label for="keterangan">KETERANGAN</label>
                    <textarea readonly="" class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
      
   
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>

      </form>
    
      </div>
      
    </div>
  </div>
</div>


<script>
  getFaktur();
  function getFaktur(){
    let kd_poli   = $('#kd_poli').val();
    $.ajax({
      type     : 'POST',
      data     : 'kd_poli='+kd_poli,
      url      : '<?= base_url()."pendaftaran/getFaktur"?>',
      dataType : 'json',
      success  : function(hasil){
        console.log('no faktur :'+hasil);
         $("[name='nopendaftaran']").val(hasil);


      }
    });
  }

  const flashData = $('.flash-data').data('flashdata');
    if(flashData){
    Swal.fire({
      title : 'Data Jadwal ',
      text  : 'Berhasil '+ flashData,
      type  : 'success'
    });
  }

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

  function submit(x){

    $.ajax({
          type     : 'POST',
          data     : 'kd_jadwal='+x,
          url      : '<?= base_url()."jadwal/edit"?>',
          dataType : 'json',
          success  : function(hasil){
            console.log(hasil);
           
            $("[name='waktu']").val(hasil[0].waktu);
            $("[name='jadwal']").val(hasil[0].tanggal);
            $("[name='keterangan']").val(hasil[0].Keterangan);
            $("[name='kdjadwal']").val(x);  

          }
        }); 
  }

  getDataPasien();

  function getDataPasien(){
    let kd_poli   = $('#kd_poli').val();

    $.ajax({
      type     : 'POST',
      data     : 'kd_poli='+kd_poli,
      url      : '<?= base_url()."pendaftaran/getDataPasien"?>',
      dataType : 'json',
      success  : function(data){
        console.log(data);
         var baris='';
            var no=1;
            for(var i=0;i<data.pasien.length;i++){
              console.log(data)
             
              baris += '<tr>'+
                          '<td>'+data.pasien[i].no_pendaftaran+'</td>'+
                          '<td>'+data.pasien[i].namapasien+'</td>'+
                          '<td>'+data.pasien[i].namadokter+'</td>'+
                          '<td>'+data.pasien[i].waktu+'</td>'+
                          '<td><a href="<?= base_url()?>pendaftaran/hapus/'+data.pasien[i].no_pendaftaran+' " class="btn btn-danger mb-3 tombol-hapus"><i class="fa fa-trash"></i></a>'+
                       '</tr>';
               no++;
           }
            $('#target').html(baris);
            $('#totalpasien').html(data.total[0].jumlah);
            $('#totaldokter').html(data.dokter[0].jumlah);
            $('#riwayat').html(data.riwayat[0].jumlah);
      }
    });
  }


</script>