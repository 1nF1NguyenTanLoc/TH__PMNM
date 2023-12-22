
<div id="content">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" id="headerSlide">
			<?php 
			$i = 0;
			for ($j=0; $j < count($data[0]); $j++) {
				if($i == 3){ ?>
				<div class='item active'>
					<a data-toggle='modal' href='product/PrdDetail/<?php echo $data[0][$i]['masp'] ?>' data-target='#modal-id' onclick="Display_PrdDetail('<?php echo $data[0][$i]['masp'] ?>')">
						<img src="<?php echo $data[0][$i]['anhchinh'] ?>">
					</a>
				</div>
				<?php } else { ?>
				<div class='item'>
					<a data-toggle='modal' href='product/PrdDetail/<?php echo $data[0][$i]['masp'] ?>' data-target='#modal-id' onclick="Display_PrdDetail('<?php echo $data[0][$i]['masp'] ?>')">
						<img src="<?php echo $data[0][$i]['anhchinh'] ?>">
					</a>
				</div>
				<?php }
				$i++;
			}
			?>
		</div>
		<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 all-product">
				<a href="product/List/BestSelling">
					<h2 title="Những sản phẩm bán chạy nhất tuần qua" class="content-menu">Mua Nhiều Tuần Qua 
						<span class="glyphicon glyphicon-menu-right" style="font-size: 18px"></span>
					</h2>
				</a>
				<?php
				for ($i=0; $i < count($data[2]); $i++) { 
					?>
					<div class='product-container' onclick="Display_PrdDetail('<?php echo $data[2][$i]['masp'] ?>')">
						<a data-toggle='modal' href='product/PrdDetail/<?php echo $data[2][$i]['masp'] ?>' data-target='#modal-id'>
							<div style="text-align: center;" class='product-img'>
								<img src='<?php echo $data[2][$i]['anhchinh'] ?>'>
							</div>
							<div class='product-info'>
								<h4><b><?php echo $data[2][$i]['tensp'] ?></b></h4>
								<b class='price'>Giá: <?php echo $data[2][$i]['gia'] ?> VND</b>
								<div class='buy'>
									<a class='btn btn-primary btn-md cart-container 
									<?php 
									if(isset($_SESSION['cart'])){
										if(array_search($data[2][$i]['masp'], $_SESSION['cart']) !== false){
											echo 'cart-ordered';
										}
									}
									?>
									' data-masp='<?php echo $data[2][$i]['masp'] ?>'>
									<i title='Thêm vào giỏ hàng' class='glyphicon glyphicon-shopping-cart cart-item'></i>
								</a>
								<a href="client/buynow/<?php echo $data[2][$i]['masp'] ?>" class="snip0050" href='order.php?masp=<?php echo $data[2][$i]['masp'] ?>'><span>Mua ngay</span><i class="glyphicon glyphicon-ok"></i>
								</a>
							</div>
						</div>
					</a>
				</div>
				<?php } ?>

				<a href="product/List/Newest">
					<h2 title="Những sản phẩm mới nhất" class="content-menu">Sản phẩm mới 
						<span class="glyphicon glyphicon-menu-right" style="font-size: 18px"></span>
					</h2>
				</a>

				<?php
				for ($i=0; $i < count($data[1]); $i++) { 
					?>
					<div class='product-container' onclick="Display_PrdDetail('<?php echo $data[1][$i]['masp'] ?>')">
						<a data-toggle='modal' href='product/PrdDetail/<?php echo $data[1][$i]['masp'] ?>' data-target='#modal-id'>
							<div style="text-align: center;" class='product-img'>
								<img src='<?php echo $data[1][$i]['anhchinh'] ?>'>
							</div>
							<div class='product-info'>
								<h4><b><?php echo $data[1][$i]['tensp'] ?></b></h4>
								<b class='price'>Giá: <?php echo $data[1][$i]['gia'] ?> VND</b>
								<div class='buy'>
									<a class='btn btn-primary btn-md cart-container 
									<?php
									if(isset($_SESSION['cart'])){
										if(array_search($data[1][$i]['masp'], $_SESSION['cart']) !== false){
											echo 'cart-ordered';
										}
									}
									 ?>' data-masp='<?php echo $data[1][$i]['masp'] ?>'>
									<i title='Thêm vào giỏ hàng' class='glyphicon glyphicon-shopping-cart cart-item'></i>
								</a>
								<a href="client/buynow/<?php echo $data[1][$i]['masp'] ?>" class="snip0050" href='order.php?masp=<?php echo $data[1][$i]['masp'] ?>'><span>Mua ngay</span><i class="glyphicon glyphicon-ok"></i>
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
