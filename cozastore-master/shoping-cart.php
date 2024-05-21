<?php
include("components/header.php")
?>
<!-- breadcrumb -->
<div class="container m-t-100">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<?php
				if (isset($_SESSION['cart'])) {
				?>

					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">

							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-5">Id</th>
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-5">remove</th>

								</tr>
								<?php
								if (isset($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $proCartData) {
										$total = $proCartData['pQuantity'] * $proCartData['pPrice']
								?>

										<tr class="table_row">
											<td class="column-5"><?php echo $proCartData["pId"] ?></td>
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="<?php echo $proImgRef . $proCartData['pImage'] ?>" alt="IMG">
												</div>
											</td>
											<td class="column-2"><?php echo $proCartData["pName"] ?></td>
											<td class="column-3">$ <?php echo $proCartData["pPrice"] ?></td>
											<td class="column-4">
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
													<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-minus"></i>
													</div>

													<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?php echo $proCartData["pQuantity"] ?>">

													<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-plus"></i>
													</div>
												</div>
											</td>
											<td class="column-5">$ <?php echo $total ?></td>
											<td class="column-5">
												<a href="?deleteCart=<?php echo $proCartData['pId'] ?>" class="btn btn-danger"> remove</a>
											</td>
										</tr>
								<?php
									}
								}
								?>



							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				<?php
				} else {

				?>
					<h2 class="ltext-105 cl0 txt-center text-dark">
						0 Item Count,Please Add Product Into Cart
					</h2>
				<?php
				}
				?>

			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>



					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								$ <?php echo $subTotal 	?>
							</span>
						</div>
					</div>
					<?php
					if (!isset($_SESSION['sessionEmail'])) {
					?>
						<a href="login.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Proceed to Checkout</a>
					<?php
					} else {
					?>
						<a href="checkout.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Proceed to Checkout</a>
					<?php
					}
					?>
				
				</div>
			</div>
		</div>
	</div>
</form>




<?php
include("components/footer.php")
?>