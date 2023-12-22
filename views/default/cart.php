<div class="container-fluid form" style="padding: 20px">
	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">
			<h4><?php echo $title; ?><i class="pull-right"><a href="././index.php"> Quay lại mua sắm tiếp!</a></i></h4>
			<hr style="border: 1px solid #337ab7;">
			<?php if(isset($_SESSION['cart'])){ ?>
			<form action="client/order" method="GET">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Ảnh</th>
							<th>Tên sản phẩm</th>
							<th>Đơn giá</th>
							<th>Số lượng</th>
							<th>Tùy chọn</th>
						</tr>
					</thead>
					<tbody>
						<?php } for($i = 1; $i < count($data); $i++){ ?>
						<tr>
							<td><img src="<?php echo $data[$i]['anhchinh']; ?>" data-masp='<?php echo $data['masp'] ?>[]' style="width: 80px"></td>
							<td><?php echo $data[$i]['tensp'] ?></td>
							<td class="prices" data-price='<?php echo $data[$i]['gia'] ?>'><?php echo $data[$i]['gia'] ?></td>
							<td><input type="number" class="num" name="num[]"  value="1" class="form-control" style="width: 80px;" min='1'></td>
							<td><button class="btn btn-danger delPrd" data-masp='<?php echo $data[$i]['masp']; ?>'>Xóa</button></td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="4" style="text-align: right;">
								<h3><b>Tổng tiền: </b><span id='totalPrice' style="color: red; font-size: 28px;"></span> VND</h3>
							</td>
							<td><input type="submit" class="btn btn-primary btn-block btn-lg" id='orderBtn' value="Đặt Hàng"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
<script>
	var price = 0;
	$('.prices').each(function(){
		price += parseInt($(this).data('price').replace(/\s/g,''));
	})
	price = price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
	$('#totalPrice').text(price);
	countPrice();
</script>