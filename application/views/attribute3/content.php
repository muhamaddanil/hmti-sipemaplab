<!-- Begin Page Content -->
<div class="container-fluid">
  
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Beranda </h1>
  <hr>
  <?php if($this->session->userdata('group_id')==1){?>
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aduan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $aduan?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-folder-open fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Berita</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $berita?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-newspaper fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Group</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $group?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Seniman Proper</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $proper;?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User/Pengguna Sistem</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $user?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
  </div>
  <div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Aktifitas Online Hari Ini</h6>
        </div>
        <div class="card-body">
          <div id="grafikjam"></div>
          <script src="https://code.highcharts.com/highcharts.js"></script>
          <script src="https://code.highcharts.com/modules/series-label.js"></script>
          <script src="https://code.highcharts.com/modules/exporting.js"></script>
          <script src="https://code.highcharts.com/modules/export-data.js"></script>
          <script type="text/javascript">
            Highcharts.chart('grafikjam', {
                title: {
                    text: 'Kunjugan Web Hari Ini Per-Jam'
                },
                subtitle: {
                    text: 'Sumber: Website DLHK Kota Kendari'
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Kunjungan (<b>per-jam</b>)'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 0
                    }
                },
                series: [{
                    name: 'Kunjungan Hari Ini',
                    data: [
                      <?php 
                        for($i=0;$i<=23;$i++){
                          echo $jam[$i].",";
                        }
                      ?>
                    ]
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
          </script>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Log Sistem Terbaru</h6>
        </div>
        <div class="card-body">
          <?php foreach ($log as $key) { ?>
            <small class="text-danger"><b><?php echo $key->user_name?></b><br><?php echo $key->log_time?></small><br>
            <?php echo $key->log_message?><hr>
            <?php  } ?>
        </div>
      </div>
    </div>
  </div>
<?php }?>
</div>
