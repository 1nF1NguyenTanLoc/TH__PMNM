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
            <span class="btn btn-primary glyphicon glyphicon-plus btn-sm" id="addBtn"></span>
          </div>
          <div class="container" id="addArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
              <legend>Thêm danh mục</legend>
              <i id="addError" style="color: red"></i>
              <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" id="categoryName">
              </div>
              <div class="form-group">
                <label for="">Quốc gia</label>
                <input type="text" class="form-control" id="categoryCountry">
              </div>

              <span class="btn btn-success" id="add2Btn">Thêm</span>
              <span class="btn btn-default" id="cancelAddBtn">Hủy</span>
            </form>
          </div>
          <div class="container" id="editArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
              <legend>Sửa danh mục</legend>
              <i id="addError" style="color: red"></i>
              <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" id="categoryName4Edit">
              </div>
              <div class="form-group">
                <label for="">Quốc gia</label>
                <input type="text" class="form-control" id="categoryCountry4Edit">
              </div>

              <span class="btn btn-success" id="edit2Btn">Xong</span>
              <span class="btn btn-default" id="cancelEditBtn">Hủy</span>
            </form>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Quốc gia</th>
                <th>Tổng sản phẩm</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              for ($i=0; $i < count($data); $i++) { ?>
              <tr>
                <td><?php echo $i + 1 ?></td>
                <td><?php echo $data[$i]['madm'] ?></td>
                <td><?php echo $data[$i]['tendm'] ?></td>
                <td><?php echo $data[$i]['xuatsu'] ?></td>
                <td><?php echo $data[$i]['tongsp'] ?></td>
                <td class="text-center">
                  <span class="btn btn-primary editItemBtn" data-id='<?php echo $data[$i]['madm'] ?>'>Chỉnh sửa</span>
                  <span class="btn btn-danger delItemBtn" data-id='<?php echo $data[$i]['madm'] ?>'>Xóa</span>
                </td>
              </tr>
              <?php }
              ?>
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
  $('#dmsptab').addClass('active');
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
</script>
<script>
  $('#addBtn').on('click',function(){
    $('#addArea').toggle(300);
  })
  $('#cancelAddBtn').on('click',function(){
    $('#addArea').toggle(300);
  })
  $('#add2Btn').on('click',function(){
    action('add',);
  })
  $('#edit2Btn').on('click',function(){
    var id = $(this).data('id');
    action('edit',id);
  })
  $('.delItemBtn').on('click',function(){
    var cf = confirm('Bạn chắc chứ?');
    if(cf){
      var id = $(this).data('id');
      action('del', id);  
    }
  })
  $('.editItemBtn').on('click',function(){
    $('#edit2Btn').attr('data-id',$(this).data('id'));
    $('#example1').toggle();
    $('#editArea').toggle(300);
    $('#categoryName4Edit').val($(this).closest('tr').children('td:nth-child(3)').text());
    $('#categoryCountry4Edit').val($(this).closest('tr').children('td:nth-child(4)').text());
  })
  $('#cancelEditBtn').on('click',function(){
    $('#example1').toggle();
    $('#editArea').toggle(300);
  })
  function action(name, id = null){
    var name4edit = $('#categoryName4Edit').val();
    var country4edit = $('#categoryCountry4Edit').val();
    var cname = ccountry = '';
    if(name == 'add'){
      cname = $('#categoryName').val();
      ccountry = $('#categoryCountry').val();
      if(cname == ''){
        alert('Bạn chưa điền tên danh mục!');
        return;
      }
    }
    $.ajax({
      url: 'category/action',
      type: 'GET',
      dataType: 'text',
      data: {name, id,cname, ccountry,name4edit,country4edit},
      success: function(result){
        if(result == 'OK'){
          alert("Successful!");
          location.reload();
        } else {
          $('#addError').html(result);
        }
      }
    })
  }
</script>



