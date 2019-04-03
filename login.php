<?php
    session_start();

    if (isset($_POST['login'])) {
		require 'config/connection.php';
		
		$name = $_POST['customer-name'];
		$pass = $_POST['customer-password'];
    
        $sqlGetCustomerByName = "SELECT * FROM dbo.customer WHERE customer_name = ?";
        $params = array($name);
        $stmt = sqlsrv_query($conn, $sqlGetCustomerByName, $params);
        $customer = sqlsrv_fetch_array($stmt);
    
        $tmpPass = $customer['customer_password'];
        if ($pass === $tmpPass) {
            $isLoggedIn = true;
        }
        else {
            header('location:login.php?error=login');
        }
    
        if ($isLoggedIn) {
			session_start();
			$_SESSION['customer-id'] = $customer['customer_id'];
            $_SESSION['customer-name'] = $customer['customer_name'];
            $_SESSION['customer-email'] = $customer['customer_email'];
			$_SESSION['customer-address'] = $customer['customer_address'];
			$_SESSION['product-in-cart'] = array();
			$_SESSION['product-quantity'] = array();
			$_SESSION['product-subtotal'] = array();
			$_SESSION['cart-total'] = 0;
            
            header('location:index.php?success=login');
        }
    
        sqlsrv_close();
    }
?>

<?php
	if (isset($_GET['success'])) {
		if ($_GET['success'] === 'register') {
			echo "<script type='text/javascript'>alert('Đăng ký thành công! Giờ bạn đã có thể đăng nhập!');</script>";
		}
 	}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Đăng nhập - Laptop 69</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="src/css/contact.css">
	<link rel="stylesheet" type="text/css" href="src/css/contact_responsive.css">
</head>

<body>

	<div class="super_container">

		<!-- Header and Navigation bar + on mobile -->
		<?php include('webpage-components/nav.php'); ?>

		<!-- Home -->

		<div class="home" id="main" data-page-content="account">
			<div class="home_container">
				<div class="home_background" style="background-image:url(images/contact.jpg)"></div>
				<div class="home_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_content">
									<div class="breadcrumbs">
										<ul>
											<li><a href="index.php">Trang chủ</a></li>
											<li>Đăng nhập</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content: Login form -->

		<main class="contact" id="main" data-page-content="account">
			<div class="container">
				<div class="row">

					<!-- Get in touch -->
					<div class="col-lg-12 contact_col">
						<div class="get_in_touch">
							<div class="section_title">Đăng nhập</div>
							<div class="section_subtitle">Đăng nhập vào tài khoản thành viên để bắt đầu mua hàng</div>
							<div class="contact_form_container">
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="contact_form" class="contact_form" method="POST">
									<div class="row">
										<div class="col-lg-12">
											<!-- Name -->
											<label for="customer-name-input">Tên đăng nhập</label>
											<input type="text" name="customer-name" id="customer-name-input" class="contact_input" required="required">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<!-- Password -->
											<label for="customer-password-input">Mật khẩu</label>
											<input type="password" name="customer-password" id="customer-password-input" class="contact_input" required="required">
										</div>
									</div>
									<button type="submit" name="login" class="button contact_button"><span>Đăng nhập</span></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

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
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="src/js/contact.js"></script>
	<script src="src/js/nav.js"></script>
</body>

</html>