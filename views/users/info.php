<div class="container">
	<div class="row" style="margin: 0!important">
		<div class="col-md-3"></div>
		<div class="col-md-6" style="margin-bottom: 20px" id="info-user">
			<div id="edit-info-error"></div>
			<h5><b>Tên tài khoản:</b> <span style="color: grey"><?php echo $_SESSION['user']['tentaikhoan'] ?></span></h5>
			<div class="form-group">
				<label for="">Tên</label>
				<input class="form-control" type="text" value="<?php echo $_SESSION['user']['ten'] ?>" id="name">
			</div>
			<div class="form-group">
				<label for="">Địa chỉ</label>
				<input class="form-control" type="text" value="<?php echo $_SESSION['user']['diachi'] ?>" id="addr">
			</div>
			<div class="form-group">
				<label for="">Số điện thoại</label>
				<input class="form-control" type="text" value="<?php echo $_SESSION['user']['sodt'] ?>" id="tel">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input class="form-control" type="text" value="<?php echo $_SESSION['user']['email'] ?>" id="email">
			</div>
			<label>Ngày tạo: <span class="label label-primary"><?php echo $_SESSION['user']['date'] ?></span></label><br>
			<div class="btn btn-success" id='edit-btn'>Lưu</div>
		</div>
	</div>
</div>