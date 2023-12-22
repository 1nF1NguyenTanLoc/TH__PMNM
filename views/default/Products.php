<div id="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 all-product" id="prdCtn">
				<h3 class="content-menu">
					<?php echo $title; ?>
				</h3>
				<?php
				for ($i=0; $i < count($data); $i++){
					?>
					<div class='product-container' onclick="Display_PrdDetail('<?php echo $data[$i]['masp'] ?>')">
						<a data-toggle='modal' href='product/PrdDetail/<?php echo $data[$i]['masp'] ?>' data-target='#modal-id'>
							<div style="text-align: center;" class='product-img'>
								<img src='<?php echo $data[$i]['anhchinh'] ?>'>
							</div>
							<div class='product-info'>
								<h4><b><?php echo $data[$i]['tensp']; ?></b></h4>
								<b class='price'>Giá: <?php echo $data[$i]['gia']; ?> VND</b>
								<div class='buy'>
									<a class='btn btn-primary btn-md cart-container <?php
									if(isset($_SESSION['cart'])){
										if(array_search($data[$i]['masp'], $_SESSION['cart']) !== false){
											echo 'cart-ordered';
										}
									} ?>' data-masp='<?php echo $data[$i]['masp'] ?>' >
									<i title='Thêm vào giỏ hàng' class='glyphicon glyphicon-shopping-cart cart-item'></i>
								</a>
								<a href="client/buynow/<?php echo $data[$i]['masp'] ?>" class="snip0050"><span>Mua ngay</span><i class="glyphicon glyphicon-ok"></i>
								</a>
							</div>
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>	
</div>
<div class="container-fluid text-center" style="padding: 15px;">
	<div class="row">
		<div class="col-sm-12">
			<button id="loadmoreBtn" onclick="loadmore(8)" class="snip1582">Load more</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	var cr = $('#contentTitle').data('type');
	switch(cr){
		case 'onsale':
			$('#dgg').css('background-color','black');
			break;
		case 'newest':
			$('#spm').css('background-color','black');
			break;
		case 'bestselling':
			$('#mntq').css('background-color','black');
			break;
	}
</script>