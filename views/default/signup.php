<div class="errorMes"></div>
<div class="container-fluid form" style="padding: 20px">
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form action="" method="POST" role="form">
				<legend>Đăng Ký</legend>
			
				<div class="form-group">
					<label for="">Tên: </label>
					<input type="text" class="form-control" id="name" placeholder="Tên người dùng...">
				</div>
				<div class="form-group">
					<label for="">Tên tài khoản: </label>
					<input type="text" class="form-control" id="username" placeholder="Tên tài khoản...">
				</div>
				<div class="form-group">
					<label for="">Mật khẩu: </label>
					<input type="password" class="form-control" id="password" placeholder="Mật khẩu...">
				</div>
				<div class="form-group">
					<label for="">Nhập lại mật khẩu: </label>
					<input type="password" class="form-control" id="cpassword" placeholder="Mật khẩu...">
				</div>
				<div class="form-group">
					<label for="">Địa chỉ: </label>
					<input type="text" class="form-control" id="addr" placeholder="Địa chỉ...">
				</div>
				<div class="form-group">
					<label for="">Số điện thoại: </label>
					<input type="text" class="form-control" id="tel" placeholder="Số điện thoại...">
				</div>
				<div class="form-group">
					<label for="">Email: </label>
					<input type="email" class="form-control" id="email" placeholder="Email liên lạc...">
				</div>
				
			
				<div class="btn btn-success" onclick="register()">Submit</div> |
				<a class="btn btn-primary" href="./index.php">Quay lại</a><br><br>
				<a href="index/signin" style="float: right;">Đăng nhập</a><br>
			</form>
		</div>
		<div class="col-lg-12"></div>
	</div>
</div>