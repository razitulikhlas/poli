  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

         <div class="card">
              <div class="card-header" style="background-color: aqua">
                <h3 class="card-title">Data Obat</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style="color: white">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>

              <div class="card-body" style="background-color: #212529; color: white;">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
                <!-- <button type="button" class="btn bg-gradient-danger mb-3" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah Data</button> -->
                <a href="<?= base_url()?>obat/tambah" class="btn btn-danger mb-3">Tambah Data</a>
                <button type="button" id="export" class="btn bg-gradient-success mb-3" >Export Excell</button>
                <button type="button" class="btn bg-gradient-primary mb-3">Export Word</button>
               <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
              
                <div class="container-fluid">
                <table id="tabel_id" class="table table-bordered mt-3 mb-3" >
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Obat</th>
                      <th scope="col">Stock</th>
                      <th scope="col">Harga Modal</th>
                      <th scope="col">Harga Jual</th>
                      <th scope="col">Order Date</th>
                      <th scope="col">EXP Date</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="target">
                    
              </tbody>
              </table>
              </div>
            </div>
       </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  
  </div>


   <!-- modal -->


  <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ubah data obat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form id="formdata" method="post" action=" <?= base_url().'obat/add_data';?> ">

             <div class="form-group">
              <input type="hidden" class="form-control" name="kode_obat" id="kode_obat">
            </div>
            <div class="form-group">
                  <label for="namaobat">NAMA OBAT</label>
                  <input type="text" name="namaobat"  class="form-control" id="namaobat" placeholder="Nama Obat">
                </div>
              <div class="form-group">
                <label for="miligram">Miligram</label>
                <input type="text" class="form-control" id="miligram" name="miligram" placeholder="miligram">
              </div>
              <div class="form-group">
                  <label for="jenisobat">Type obat</label>
                  <select class="form-control form-control-lg" id="jenisobat" name="jenisobat">
                    <option id="Tablet">Tablet</option>
                    <option id="Kapsul">Kapsul</option>
                    <option id="Salep">Salep</option>
                    <option id="Cair">Cair</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="unit">Unit</label>
                  <select class="form-control form-control-lg" id="unit" name="unit">
                    <option id="box">Box</option>
                    <option id="botol">Botol</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="jumlahunit">Jumlah Unit</label>
                <input type="text" class="form-control" id="jumlahunit" name="jumlahunit" placeholder="Jumlah Unit">
              </div>
              <div class="form-group">
                <label for="obatperunit">Jumlah Obat Per Unit</label>
                <input type="text" class="form-control" id="obatperunit" name="obatperunit" placeholder="Jumlah Obat Per Unit">
              </div>
              <div class="form-group">
                <label for="totalobat">Total Obat</label>
                <input type="text" class="form-control" id="totalobat" name="totalobat" placeholder="Total Obat" readonly="">
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="hargabeli">Harga beli/unit(Rp.)</label>
                    <input type="text" class="form-control" id="hargabeli" name="hargabeli" placeholder="Harga Beli">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="hargamodal">Harga Modal</label>
                    <input type="text" class="form-control" id="hargamodal" name="hargamodal" placeholder="Harga Modal" readonly="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="hargajual">Harga Jual</label>
                <input type="text" class="form-control" id="hargajual" name="hargajual" placeholder="Harga Jual" readonly="">
              </div>                  
              <div class="form-group">
                <label for="tgl_masuk">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" >
              </div>
              <div class="form-group">
                <label for="expired">EXPIRED OBAT</label>
                <input type="date" class="form-control" id="expired" name="expired" placeholder="Expired Obat">
              </div>
   
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn" class="btn btn-primary">Update Data</button>

      </form>
    
      </div>
      
    </div>
  </div>
</div>

<script>
$(function(){ 

  $('h3').mouseenter(function(){
    $('h3').css('color','red');
  });
  $('h3').mouseleave(function(){
    $('h3').css('color','black');
  });

  const flashData = $('.flash-data').data('flashdata');
  if(flashData){
    
    Swal.fire({
      title : 'Data Obat ',
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
});


   function submit(x){

    $.ajax({
          type     : 'POST',
          data     : 'kd_obat='+x,
          url      : '<?= base_url()."obat/edit"?>',
          dataType : 'json',
          success  : function(hasil){
            console.log(hasil);
            $("[name='kode_obat']").val(hasil[0].kd_obat);
            $("[name='namaobat']").val(hasil[0].nama_obat);
            $("[name='miligram']").val(hasil[0].miligram);
            $("[name='jumlahunit']").val(hasil[0].jumlah_unit);
            $("[name='obatperunit']").val(hasil[0].jumla_obat_unit);
            $("[name='totalobat']").val(hasil[0].total_obat);
            $("[name='hargabeli']").val(hasil[0].harga_beli);
            $("[name='hargamodal']").val(hasil[0].harga_modal);
            $("[name='hargajual']").val(hasil[0].harga_jual);
            $("[name='tgl_masuk']").val(hasil[0].tgl_masuk);
            $("[name='expired']").val(hasil[0].expired);

            let jenisobat = hasil[0].jenis_obat;
            console.log(jenisobat);
            $('#'+jenisobat).attr('selected', '');

          }
        }); 
  }

  

  function checkTabel(){
    let str     = $('#stock').text();
    let strexp  = $('#exp').text();
    let span    = '<span class="badge badge-warning">Habis</span>';
    let spans   = '<span class="badge badge-danger">Kadaluarsa</span>';
    let stock   = str.split(" ");
    let exp     = strexp.split("-");
    let tgl     = new Date();
    let date    = tgl.getFullYear()+"-"+(tgl.getMonth()+1)+"-"+tgl.getDate();
    let tglnow  = date.split("-");

    console.log(str.length);

    console.log(tglnow);

    console.log(exp);
   
      if(stock[0] == 0){
       $('#stock').html(span);
      }
    
    if(tglnow[0] <= exp[0] ){
      if(tglnow[1] <= exp[1]){
        if(tglnow[2] <= exp[2]){

        }else{
          $('#exp').html(spans);  
        }
      }else{
        $('#exp').html(spans);  
      }
      
    }else{
      $('#exp').html(spans);
    }
  }

  
ambilData();

    function ambilData(){
      $.ajax({
        type     : 'POST',
        url      : '<?= base_url()."obat/getData"?>',
        dataType : 'json',
        success  : function(data){
            console.log(data);
            var baris='';
            var no=1;
            
            for(var i=0;i<data.length;i++){
              let stock = checkData(data[i].total_obat,data[i].jenis_obat);
              let tgl   = checkExpired(data[i].expired);
              baris += `<tr>
                          <td>`+no+`</td>
                          <td>`+data[i].nama_obat+`</td>+
                          <td>`+stock+`</td>+
                          <td>`+data[i].harga_modal+`</td>+
                          <td>`+data[i].harga_jual+`</td>+
                          <td>`+data[i].tgl_masuk+`</td>+
                          <td>`+tgl+`</td>+
                          <td><button type="button" onclick="submit('`+data[i].kd_obat+`')" class="btn btn-primary btnedit" data-toggle="modal" data-target=".bd-example-modal-xl">Edit</button><a href="<?= base_url()?>obat/hapus/`+data[i].kd_obat+` " class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                       </tr>`;
               no++;
            }
            $('#target').html(baris);
           
        }
      });
    }

    checkData(0);

    function checkData(n,j){
      let data;
      if(n == 0){
        data = `<span class="badge badge-warning">Stock Habis</span>`
      }else{
        data = `<span class="">`+n+' '+j+`</span>`
      }  
      return data;
    }

    function checkExpired(n){
    let exp     = n.split("-");
    let tgl     = new Date();
    let date    = tgl.getFullYear()+"-"+(tgl.getMonth()+1)+"-"+tgl.getDate();
    let tglnow  = date.split("-");
    let spans   = '<span class="badge badge-danger">Kadaluarsa</span>';
    let data;

    console.log("year "+tglnow[0]);
    console.log("month "+tglnow[1]);
    console.log("date "+tglnow[2]);

    console.log("years "+exp[0]);
    console.log("months "+exp[1]);
    console.log("dates"+exp[2]);

    if(tglnow[0] <= exp[0]){
        if(tglnow[1] <= exp[1]){
          if("0"+tglnow[2] <= exp[2]){
           data = n; 
          }else{
            data=spans;
          } 
        }else{
          data = spans;
        }
        
    }else{
      data=spans;
    }

    // if(tglnow[0] <= exp[0] ){
    //   if(tglnow[1] <= exp[1]){
    //     if(tglnow[2] <= exp[2]){
    //       data = n;
    //     }else{
    //      data = spans;  
    //     }
    //   }else{
    //     data = spans;  
    //   }
      
    // }else{
    //   data = spans;
    // }

    return data;
  }
  
</script>
 