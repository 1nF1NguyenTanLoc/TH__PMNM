<section class="content-header">
  <h1>
    <?php echo $title ?>
    <small>Version 2.0</small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container" style="margin: 10px 0;">
            <span class="btn btn-primary btn-sm glyphicon glyphicon-trash" id="delBtn"></span>
            <span class="btn btn-success btn-sm" id="shippedBtn">Đã giao</span>
            <span class="btn btn-warning btn-sm" id="unshippedBtn">Chưa giao</span>
            <span class="btn btn-danger btn-sm" id="cancelBtn">Hủy</span><br>
            <i style="color: red" id="error"></i>
          </div>
          <div class="container" style="width: 100%; margin-bottom: 20px; display: none" id="editOrderArea">
            <form action="" method="POST" role="form">
              <legend>Thay đổi giao dịch</legend>

              <div class="form-group">
                <label for="">Quận: </label>
                <select class="form-control" name="quan" id="quan">
                  <option  value="Quận 1">Quận 1</option>
                  <option  value="Quận 2">Quận 2</option>
                  <option  value="Quận 1">Quận 3</option>
                  <option  value="Quận 4">Quận 4</option>
                  <option  value="Quận 5">Quận 5</option>
                  <option  value="Quận 6">Quận 6</option>
                  <option  value="Quận 7">Quận 7</option>
                  <option  value="Quận 8">Quận 8</option>
                  <option  value="Quận 9">Quận 9</option>
                  <option  value="Quận 10">Quận 10</option>
                  <option  value="Quận 11">Quận 11</option>
                  <option  value="Quận 12">Quận 12</option>
                  <option  value="Quận Thủ Đức">Quận Thủ Đức</option>
                  <option  value="Quận Bình Thạnh">Quận Bình Thạnh</option>
                  <option  value="Quận Gò Vấp">Quận Gò Vấp</option>
                  <option  value="Quận Tân Bình">Quận Tân Bình</option>
                  <option  value="Quận Bình Tân">Quận Bình Tân</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Địa chỉ cụ thể</label>
                <input type="text" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="">SDT</label>
                <input type="number" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" value="<?php echo $data['tensp'] ?>" id="editName">
              </div>
              

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr id="tbheader">
                <th><input type="checkbox" id="check-all-gd"></th>
                <th></th>
                <th>STT</th>
                <th>Tình trạng</th>
                <th>Tên KH</th>
                <th>Quận</th>
                <th>DC cụ thể</th>
                <th>SDT</th>
                <th>Ngày</th>
                <th>Mã sp</th>
                <th>Tên sp</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php  for($i = 0; $i < count($data); $i++){
                $rsp = count($data[$i]['sp']) ?>
                <tr>
                  <td><input type="checkbox" class="cbgd" value="<?php echo $data[$i]['magd'] ?>"></td>
                  <td><span class="glyphicon glyphicon-pencil btn btn-info editBtn" data-value="<?php echo $data[$i]['magd'] ?>"></span></td>
                  <td><?php echo $i+1 ?></td>
                  <td>
                    <?php if($data[$i]['tinhtrang'] == 1){
                      echo "<span class='label label-success'>Đã giao</span>";
                    } elseif($data[$i]['tinhtrang'] == 0) {
                      echo "<span class='label label-warning'>Chưa giao</span>";
                    } else {
                      echo "<span class='label label-danger'>Hủy</span>";
                    } ?>
                    
                  </td>
                  <td><?php echo $data[$i]['user_name'] ?></td>
                  <td><?php echo $data[$i]['user_dst'] ?></td>
                  <td><?php echo $data[$i]['user_addr'] ?></td>
                  <td><?php echo $data[$i]['user_phone'] ?></td>
                  <td><?php echo $data[$i]['date'] ?></td>

                  <td>
                    <?php 
                    for($j=0;$j<count($data[$i]['sp']);$j++){
                      echo $data[$i]['sp'][$j]['masp']."<br>";
                    }
                    ?>
                  </td>
                  <td>
                    <?php 
                    for($j=0;$j<count($data[$i]['sp']);$j++){
                      echo $data[$i]['sp'][$j]['tensp']."<br>";
                    }
                    ?>
                  </td>
                  <td>
                    <?php 
                    for($j=0;$j<count($data[$i]['sp']);$j++){
                      echo $data[$i]['sp'][$j]['dongia']."<br>";
                    }
                    ?>
                  </td>
                  <td>
                    <?php 
                    for($j=0;$j<count($data[$i]['sp']);$j++){
                      echo $data[$i]['sp'][$j]['soluong']."<br>";
                    }
                    ?>
                  </td>

                  <td><?php echo number_format($data[$i]['tongtien'], 0, ',', ' ') ?> &#8363;</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

  <!-- jQuery 3 -->
  <script src="views/admin/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="views/admin/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="views/admin/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="views/admin/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="views/admin/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="views/admin/AdminLTE/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="views/admin/AdminLTE/dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $('#gdtab').addClass('active');
    $(document).ready(function(){
      $('#example1 tr').not($('#tbheader')).click(function(event){
        if (event.target.type !== 'checkbox'){
          $(':checkbox', this).trigger('click');
        }
      })
      $('#example1').addClass('active');
      $('#check-all-gd').click(function() {
       $('input:checkbox').not(this).prop('checked', this.checked);
     });
      $('#shippedBtn').click(function(){
        action('shipped');
      });
      $('#unshippedBtn').click(function(){
        action('unshipped');
      });
      $('#cancelBtn').click(function(){
        action('cancel');
      });
      $('#delBtn').click(function(){
        action('del');
      });
    })
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
    function action(action){
      var selected = [];
      $('.cbgd').each(function(){
        if($(this).is(":checked")){
          selected.push($(this).val());
        }
      })
      if(selected == ''){
        alert("Bạn chưa chọn giao dịch muốn đổi trạng thái!");
        return ;
      }
      $.ajax({
        url: 'order/action',
        type: 'GET',
        dataType: 'text',
        data: {
          selected, action
        },
        success: function(result){
          if(result == "success"){
            location.reload();
          } else {
            $('#error').html(result);  
          }
        }
      })
    }
    /*Edit order*/
    $('.editBtn').click(function(){
      alert("Chưa hoàn thiện!");return;
      $('#editOrderArea').toggle();
      $('#example1').toggle();
      getOrderById($(this).data('value'));
    })
    function getOrderById(magd){
      $.ajax({
        url: 'order/gerOrderById',
        type: 'GET',
        dataType: 'text',
        data: {
          magd
        },
        success: function(result){
          /*data = result;*/
          $('#editName').val(result);
        }
      })
    }
  </script>