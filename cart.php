<?php
	if (isset($_GET['success'])) {
		switch ($_GET['success']) {
			case 'add':
				echo "<script type='text/javascript'>alert('Thêm sản phẩm vào giỏ hàng thành công!');</script>";
				break;
			case 'remove':
				echo "<script type='text/javascript'>alert('Xoá sản phẩm khỏi giỏ hàng thành công!');</script>";
				break;
			case 'order':
				echo "<script type='text/javascript'>alert('Đặt hàng thành công!');</script>";
				break;
			default:
				break;
		}
	}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Giỏ hàng - Laptop 69</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="src/css/cart.css">
	<link rel="stylesheet" type="text/css" href="src/css/cart_responsive.css">
</head>

<body>

	<div class="super_container">

		<!-- Header and Navigation bar + on mobile -->
		<?php include('webpage-components/nav.php'); ?>

		<!-- Home -->

		<div class="home" id="main" data-page-content="cart">
			<div class="home_container">
				<div class="home_background" style="background-image:url(images/cart.jpg)"></div>
				<div class="home_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_content">
									<div class="breadcrumbs">
										<ul>
											<li><a href="index.php">Trang chủ</a></li>
											<li>Giỏ hàng</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart Info -->

		<div class="cart_info">
			<div class="container">
				<div class="row">
					<div class="col">
						<!-- Column Titles -->
						<div class="cart_info_columns clearfix">
							<div class="cart_info_col cart_info_col_product">Tên sản phẩm</div>
							<div class="cart_info_col cart_info_col_price">Giá</div>
							<div class="cart_info_col cart_info_col_quantity">Số lượng</div>
							<div class="cart_info_col cart_info_col_total">Thành tiền</div>
						</div>
					</div>
				</div>
				<?php
					if (isset($_SESSION['product-in-cart']) && isset($_SESSION['product-quantity'])):
						require "config/connection.php";

						for ($i = 0; $i < count($_SESSION['product-in-cart']); $i++):
							$sqlReadProductById = "SELECT * FROM dbo.product WHERE product_id = ?";
							$params = array($_SESSION['product-in-cart'][$i]);
							$stmt = sqlsrv_query( $conn, $sqlReadProductById, $params);
							$currentProduct = sqlsrv_fetch_array($stmt);
				?>
					<div class="row cart_items_row">
						<div class="col">

							<!-- Cart Item -->
							<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
								<!-- Name -->
								<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
									<div class="cart_item_image">
										<div>
											<img src="<?php echo $currentProduct['product_img']; ?>" alt="">
										</div>
									</div>
									<div class="cart_item_name_container">
										<div class="cart_item_name">
											<a href="product-detail.php?id=<?php echo $currentProduct['product_id']; ?>">
												<?php echo $currentProduct['product_name']; ?>
											</a>
										</div>
										<div class="cart_item_edit">
											<a href="utils/process-cart.php?action=remove&id=<?php echo $currentProduct['product_id']; ?>">
												Xóa khỏi giỏ hàng</a>
										</div>
									</div>
								</div>
								<!-- Price -->
								<div class="cart_item_price">
									<?php echo $currentProduct['product_price']; ?>
								</div>
								<!-- Quantity -->
								<div class="cart_item_quantity">
									<div class="product_quantity_container">
										<div class="product_quantity clearfix">
											<span><?php echo $_SESSION['product-quantity'][$i]; ?></span>
										</div>
									</div>
								</div>
								<!-- Total -->
								<div class="cart_item_total">
									<?php
										$prod = ($currentProduct['product_price'] * $_SESSION['product-quantity'][$i]);
										echo $prod;
										$_SESSION['product-subtotal'][$i] = $prod; // update subtotal list
										// array_push($_SESSION['product-subtotal'], $prod); // update subtotal list
									?>
								</div>
							</div>

						</div>
					</div>
				<?php
						endfor;
					endif;
				?>
				<div class="row row_cart_buttons">
					<div class="col">
						<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
							<div class="button continue_shopping_button"><a href="index.php">Tiếp tục mua sắm</a></div>
							<div class="cart_buttons_right ml-lg-auto">
								<div class="button clear_cart_button"><a href="utils/reset-cart.php">Xóa giỏ hàng</a></div>
								<!-- <div class="button update_cart_button"><a href="cart.php">Cập nhật giỏ hàng</a></div> -->
							</div>
						</div>
					</div>
				</div>
				<div class="row row_extra">
					<div class="col-lg-4">
					
					</div>

					<div class="col-lg-6 offset-lg-2">
						<div class="cart_total">
							<div class="section_title">Thông tin đơn hàng</div>
							<div class="section_subtitle">Xin kiểm tra lại kỹ thông tin dưới đây trước khi đặt hàng</div>
							<div class="cart_total_container">
								<ul>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Tạm tính</div>
										<div class="cart_total_value ml-auto">
											<?php echo sumArray($_SESSION['product-subtotal']); ?>
										</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Vận chuyển</div>
										<div class="cart_total_value ml-auto">Miễn phí</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Thành tiền</div>
										<div class="cart_total_value ml-auto">
											<?php echo sumArray($_SESSION['product-subtotal']); ?>
										</div>
									</li>
								</ul>
							</div>
							<div class="button checkout_button">
								<a href="utils/process-cart.php?action=order">Đặt hàng</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php include('webpage-components/footer.php') ?>
	</div>

	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper-utils.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="src/lib/greensock/TweenMax.min.js"></script>
	<script src="src/lib/greensock/TimelineMax.min.js"></script>
	<script src="src/lib/scrollmagic/ScrollMagic.min.js"></script>
	<script src="src/lib/greensock/animation.gsap.min.js"></script>
	<script src="src/lib/greensock/ScrollToPlugin.min.js"></script>
	<script src="src/lib/easing/easing.js"></script>
	<script src="src/lib/parallax-js-master/parallax.min.js"></script>
	<script src="src/js/cart.js"></script>
	<script src="src/js/nav.js"></script>
</body>

</html>