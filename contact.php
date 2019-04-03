<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Liên hệ - Laptop 69</title>
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

		<div class="home" id="main" data-page-content="contact">
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
											<li>Liên hệ</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content: Contact -->

		<main class="contact" id="main" data-page-content="contact">
			<div class="container">
				<div class="row">

					<!-- Get in touch -->
					<div class="col-lg-8 contact_col">
						<div class="get_in_touch">
							<div class="section_title">Liên hệ</div>
							<div class="section_subtitle">Gửi tin nhắn cho chúng tôi</div>
							<div class="contact_form_container">
								<form action="#" id="contact_form" class="contact_form">
									<div class="row">
										<div class="col-xl-6">
											<!-- Name -->
											<label for="contact_name">Họ*</label>
											<input type="text" id="contact_name" class="contact_input" required="required">
										</div>
										<div class="col-xl-6 last_name_col">
											<!-- Last Name -->
											<label for="contact_last_name">Tên*</label>
											<input type="text" id="contact_last_name" class="contact_input" required="required">
										</div>
									</div>
									<div>
										<!-- Subject -->
										<label for="contact_company">Chủ đè</label>
										<input type="text" id="contact_company" class="contact_input">
									</div>
									<div>
										<label for="contact_textarea">Nội dung thông điệp*</label>
										<textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
									</div>
									<button class="button contact_button"><span>Gửi</span></button>
								</form>
							</div>
						</div>
					</div>

					<!-- Contact Info -->
					<div class="col-lg-3 offset-xl-1 contact_col">
						<div class="contact_info">
							<div class="contact_info_section">
								<div class="contact_info_title">Bộ phận Marketing</div>
								<ul>
									<li>Điện thoại: <span>+53 345 7953 3245</span></li>
									<li>Email: <span>yourmail@gmail.com</span></li>
								</ul>
							</div>
							<div class="contact_info_section">
								<div class="contact_info_title">Bộ phận giao hàng, đổi trả và bảo hành</div>
								<ul>
									<li>Điện thoại: <span>+53 345 7953 3245</span></li>
									<li>Email: <span>yourmail@gmail.com</span></li>
								</ul>
							</div>
							<div class="contact_info_section">
								<div class="contact_info_title">Bộ phận tư vấn, thông tin chung</div>
								<ul>
									<li>Điện thoại: <span>+53 345 7953 3245</span></li>
									<li>Email: <span>yourmail@gmail.com</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row map_row">
					<div class="col">

						<!-- Google Map -->
						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<div id="map"></div>
								</div>
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