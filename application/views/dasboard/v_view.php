  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $pasien ?></h3>
                <p>Total Pasien</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="<?php echo base_url() ?>pasien/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $dokter ?></h3>

                <p>Total Dokter</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-md"></i>
              </div>
              <a href="<?php echo base_url() ?>dokter/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $karyawan ?></h3>

                <p>Total Karyawan</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-nurse"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" >
              <div class="inner">
                <h3>Rp </h3>
                <h1><?= number_format(115489,0,",",".")?></h1>
              </div>
              <div class="icon">
                <i class="fas fa-wallet"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
          <!-- end col -->
          <div class="col-6">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Diagnosa Penyakit Bulan Ini
                </h3>
                </div>
                <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="canvas" height="200" style="height: 200px; display: block; width: 383px;" class="chartjs-render-monitor" width="383"></canvas>                        
                </div>
                <div class="form-group ml-3 mr-3">
                  <label>Range Waktu diagnosa:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.card-body -->
              </div>
           </div>
           <!-- end col -->

          
        </div>

        
 
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  
  </div>

  <?php
            foreach($diagnosa as $diagnosa){
                $diagnosas[] = $diagnosa->nama_diagnosa;
                $total[] = (float) $diagnosa->total;
            }
  ?>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script>
var ctx = document.getElementById("canvas").getContext('2d');

var myChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		labels: <?php echo json_encode($diagnosas);?>,
		datasets: [{
			label: '# of Votes',
			data: <?php echo json_encode($total);?>,
			backgroundColor: [
			'#00FFFF',
			'#FFEBCD',
			'#00008B',
			'rgba(75, 192, 192, 0.2)',
			'rgba(153, 102, 255, 0.2)',
			'rgba(255, 159, 64, 0.2)'
			],
			borderColor: [
			'rgba(255,99,132,1)',
			'rgba(54, 162, 235, 1)',
			'rgba(255, 206, 86, 1)',
			'rgba(75, 192, 192, 1)',
			'rgba(153, 102, 255, 1)',
			'rgba(255, 159, 64, 1)'
			],
		borderWidth: 1
		}]
	}
});
        
            

        
</script>