<section class="content-header">
  <h1>
    <?php echo $title ?>
    <small>Version 2.0</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!-- AREA CHART -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <select id="chartType">
            <option value="Day">Hôm nay</option>
            <option value="Month">Tháng này</option>
            <option value="Year">Năm nay</option>
          </select>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="line-chart" style="width: 100%; height: auto;"></canvas>
            <!-- <canvas id="line-chart" style="height:250px"></canvas> -->
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col (RIGHT) -->
  </div>
  <!-- /.row -->
</section>
<!-- jQuery 3 -->
<script src="views/admin/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="views/admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="views/admin/AdminLTE/bower_components/Chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="views/admin/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/admin/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/admin/AdminLTE/dist/js/demo.js"></script>
<!-- page script -->
<script>
  tempChart=null;
  function MyJS_paintStatistics(styleChart, canvas, lablesStatistics, dataSales, countBill) {
    //<!--Dử liệu data cho biểu đồ-->
    var data = {
      labels: lablesStatistics,
      datasets: [{
        label: 'Tổng tiền',
        borderColor: "#3e95cd",
        backgroundColor: '#3e95cd',
        fill: false,
        data: dataSales,
        yAxisID: 'Sales'
      }, {
        label: 'Số hóa đơn',
        borderColor: 'red',
        backgroundColor: 'red',
        fill: false,
        data: countBill,
        yAxisID: 'turns'
      }]
    }
    //paint chart 
    var chart = new Chart(canvas.getContext("2d"), {
      type: styleChart,
      data: data,
      options: {
        title: {
          display: true,
          text: "Thống kê Nasaxo"
        },
        scales: {
          yAxes: [{
            type: 'linear',
            display: true,
            position: 'left',
            id: 'Sales'
          }, {
            type: 'linear',
            display: true,
            position: 'right',
            id: 'turns'
          }]
        }
      }
    });
    //delete old chart
    if(window.tempChart!=null){
      window.tempChart.destroy();
    }
    window.tempChart=chart;
  }  
  MyJS_paintStatistics('line',document.getElementById('line-chart'),['a','b','c'],['1','2','3'],['1','2','2']);
</script>
<script>
  $('#pttab').addClass('active');
</script>

