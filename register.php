<?php
	if (isset($_POST['register'])) {
		require 'config/connection.php';

		$name = $_POST['customer-name'];
		$email = $_POST['customer-email'];
		$pass = $_POST['customer-password'];
		$address = $_POST['customer-address'];

		$sqlInsertCustomer = "INSERT INTO dbo.customer 
								(customer_name, customer_email, customer_password, customer_address)
								VALUES (?,?,?,?)";
		$params = array($name, $email, $pass, $address);
		$stmt = sqlsrv_query( $conn, $sqlInsertCustomer, $params);
		if ($stmt === false) {
			die(print_r(sqlsrv_errors(), true));
		}
		header('location:login.php?success=register');
	}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Đăng ký - Laptop 69</title>
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
											<li>Đăng ký</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content: Register form -->

		<main class="contact" id="main" data-page-content="account">
			<div class="container">
				<div class="row">

					<!-- Get in touch -->
					<div class="col-lg-12 contact_col">
						<div class="get_in_touch">
							<div class="section_title">Đăng ký tài khoản mới</div>
							<div class="section_subtitle">Qúy khách vui lòng nhập đầy đủ thông tin vào mẫu dưới đây</div>
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
											<!-- Email -->
											<label for="customer-email-input">Email</label>
											<input type="email" name="customer-email" id="customer-email-input" class="contact_input" required="required">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<!-- Password -->
											<label for="customer-password-input">Mật khẩu</label>
											<input type="password" name="customer-password" id="customer-password-input" class="contact_input" required="required">
										</div>
										<div class="col-lg-6">
											<!-- Password -->
											<label for="customer-password-repeat-input">Nhập lại mật khẩu</label>
											<input type="password" name="customer-password-repeat" id="customer-password-repeat-input" class="contact_input" required="required">
										</div>
									</div>
									<div>
										<label for="customer-address-input">Địa chỉ</label>
										<textarea name="customer-address" id="customer-address-input" class="contact_input customer-address" required="required"></textarea>
									</div>
									<button type="submit" name="register" class="button contact_button"><span>Đăng ký</span></button>
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