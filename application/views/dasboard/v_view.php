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
              <a href="<?php echo base_url() ?>karyawan/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Rp </h3>
                <h1><?= number_format(115489, 0, ",", ".") ?></h1>
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

              <div class="card-body">
                <div id="datachart">
                  <canvas id="canvas" height="200" style="height: 200px; display: block; width: 383px;" class="chartjs-render-monitor" width="383"></canvas>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Start Waktu diagnosa:</label>
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="date" class="form-control float-right" id="starttime">
                    </div>
                  </div>

                  <div class="col-6">
                    <label>Start Waktu diagnosa:</label>
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="date" class="form-control float-right" id="endtime">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- end col -->
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Diagnosa Tindakan Bulan Ini
                </h3>
              </div>

              <div class="card-body">
                <div id="datacharttindakan">
                  <canvas id="canvastindakan" height="200" style="height: 200px; display: block; width: 383px;" class="chartjs-render-monitor" width="383"></canvas>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Start Waktu Tindakan:</label>
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="date" class="form-control float-right" id="starttimetindakan">
                    </div>
                  </div>

                  <div class="col-6">
                    <label>Start Waktu Tindakan:</label>
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="date" class="form-control float-right" id="endtimetindakan">
                    </div>
                  </div>
                </div>
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





  <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/chart/Char.js"></script>
  <script>
    $(function() {
      getDiagnosaOfMonth();

      function getDiagnosaOfMonth() {
        $.ajax({
          type: 'POST',
          url: '<?= base_url() . "dasboard/getCountDiagnosaIsMonth" ?>',
          dataType: 'json',
          success: function(hasil) {
            console.log(hasil);

            var labels = hasil.map(function(e) {
              return e.nama_diagnosa;
            });
            var data = hasil.map(function(e) {
              return e.total;
            });
            chartDiagnosa(data, labels, 'canvas', 'doughnut');
          }
        })
      }

      function getDiagnosaDateRange() {
        let start = $('#starttime').val();
        let end = $('#endtime').val();
        console.log(start);
        console.log(end);
        $.ajax({
          type: 'POST',
          data: 'start=' + start +
            '&end=' + end,
          url: '<?= base_url() . "dasboard/getCountDiagnosaWhere" ?>',
          dataType: 'json',
          success: function(hasil) {
            console.log(hasil);
            var labels = hasil.map(function(e) {
              return e.nama_diagnosa;
            });
            var data = hasil.map(function(e) {
              return e.total;
            });
            var htm = '';
            htm += ` <canvas id="canvas" height="200" style="height: 200px; display: block; width: 383px;" class="chartjs-render-monitor" width="383"></canvas>`;
            $('#datachart').html('');
            $('#datachart').html(htm);
            chartDiagnosa(data, labels, 'canvas', 'doughnut');
          }
        });
      }

      getTindakanOfMonth();

      function getTindakanOfMonth() {
        $.ajax({
          type: 'POST',
          url: '<?= base_url() . "dasboard/getCountTindakanIsMonth" ?>',
          dataType: 'json',
          success: function(hasil) {
            console.log(hasil);
            var labels = hasil.map(function(e) {
              return e.tindakan;
            });
            var data = hasil.map(function(e) {
              return e.total;
            });
            chartDiagnosa(data, labels, 'canvastindakan', 'pie');
          }
        })
      }

      function getTindakanDateRange() {
        let start = $('#starttimetindakan').val();
        let end = $('#endtimetindakan').val();
        console.log(start);
        console.log(end);
        $.ajax({
          type: 'POST',
          data: 'start=' + start +
            '&end=' + end,
          url: '<?= base_url() . "dasboard/getCountTindakanWhere" ?>',
          dataType: 'json',
          success: function(hasil) {
            console.log(hasil);
            var labels = hasil.map(function(e) {
              return e.tindakan;
            });
            var data = hasil.map(function(e) {
              return e.total;
            });
            var htm = '';
            htm += ` <canvas id="canvastindakan" height="200" style="height: 200px; display: block; width: 383px;" class="chartjs-render-monitor" width="383"></canvas>`;
            $('#datacharttindakan').html('');
            $('#datacharttindakan').html(htm);
            chartDiagnosa(data, labels, 'canvastindakan', 'pie');
          }
        });
      }

      $('#endtime').on('input', function() {
        getDiagnosaDateRange();
      });
      $('#endtimetindakan').on('input', function() {
        getTindakanDateRange();
      });
    });

    function chartDiagnosa(datas, labelss, id, type) {
      var ctx = document.getElementById(id).getContext('2d');

      var myChart = new Chart(ctx, {
        type: type,
        data: {
          labels: labelss,
          datasets: [{
            label: '# of Votes',
            data: datas,
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
          }],

        }
      });
    }
  </script>