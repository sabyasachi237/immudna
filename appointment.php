<!doctype html>
<html lang="zxx">
    <head>
		<!-- REQUIRED META TAGS -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- FAVICON -->
		<link rel="icon" type="image/png" href="assets/img/favicon.png">
		<!-- TITLE -->
		<title>Medic - Hospital, Diagnostic, Clinic, Health and Medical Lab HTML Website Template</title>

		<!-- BOOTSTRAP MIN CSS --> 
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- OWL THEME DEFAULT MIN CSS --> 
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		<!-- OWL CAROUSEL MIN CSS --> 
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<!-- MAGNIFIC POPUP MIN CSS --> 
		<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
		<!-- ANIMATE MIN CSS --> 
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<!-- BOXICONS CSS --> 
		<link rel="stylesheet" href="assets/css/boxicons.min.css"> 
		<!-- FLATICON CSS --> 
		<link rel="stylesheet" href="assets/css/flaticon.css">
		<!-- MEANMENU MIN CSS -->
		<link rel="stylesheet" href="assets/css/meanmenu.min.css">
		<!-- NICE SELECT MIN CSS -->
		<link rel="stylesheet" href="assets/css/nice-select.min.css">
		<!-- ODOMETER MIN CSS-->
		<link rel="stylesheet" href="assets/css/odometer.min.css">
		<!-- AOS CSS -->
		<link rel="stylesheet" href="assets/css/aos.css">
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<!-- RESPONSIVE CSS -->
		<link rel="stylesheet" href="assets/css/responsive.css">
    </head>

    <body>
		<!-- START PRELOADER AREA -->
		<div class="preloader">
			<div class="lds-ripple">
				<div></div>
				<div></div>
			</div>
		</div>
		<!-- END PRELOADER AREA -->
		<!-- START FOOTER BOTTOM AREA -->
		<?php include('header.php'); ?>

		<!-- START PAGE TITLE AREA -->
		<div class="page-title-area bg-7">
			<div class="container">
				<div class="page-title-content">
					<h2>Appointment</h2>
					<ul>
						<li>
							<a href="index.html">
								Home 
							</a>
						</li>

						<li>Pages</li>
						<li class="active">Appointment</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE AREA -->

		<!-- START APPOINTMENT AREA -->
		<section class="appointment-area ptb-100">
			<div class="container">
				<div class="row">
					<div data-aos="fade-up" data-aos-duration="1200" class="col-lg-6">
						<div class="appointment-here-form">
							<span class="top-title">Make An Appointment</span>
							<h2>We Are Here For You</h2>
		
							<form method="post">
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="Name" placeholder="Enter Your Name" required>
											<i class="bx bx-user"></i>
										</div>
									</div>
		
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="Email" placeholder="Enter Your Email" required>
											<i class="bx bx-user"></i>
										</div>
									</div>
		
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="Phone" placeholder="Enter Your Phone" required>
											<i class="bx bx-mobile-alt"></i>
										</div>
									</div>
									
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<select>
												<option value="">Select Service</option>
												<option value="">Surgery & Radiology</option>
												<option value="">Neurology</option>
												<option value="">Angiography</option>
												<option value="">Children Care</option>
												<option value="">Orthopedics</option>
												<option value="">Nuclear Magnetic</option>
												<option value="">Eye Treatment</option>
												<option value="">X-Ray</option>
											</select>	
											<i class="bx bx-heart"></i>
										</div>
									</div>
		
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<div class="input-group date" id="datetimepicker2">
												<input type="text" class="form-control" placeholder="Date" required>
												<span class="input-group-addon">
												</span>
											</div>	
											<i class="bx bx-calendar"></i>
										</div>
									</div>
		
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<select>
												<option value="">Seclect Time</option>
												<option value="2">09.00 AM To 10.00 AM</option>
												<option value="0">10.00 AM To 11.00 AM</option>
												<option value="3">11.00 AM To 12.00 PM</option>
												<option value="4">12.00 PM To 01.00 PM</option>
												<option value="5">01.00 PM To 03.00 PM</option>
												<option value="6">04.00 PM To 06.00 PM</option>
												<option value="7">07.00 PM To 10.00 PM</option>
												<option value="8">10.00 PM To 11.00 PM</option>
											</select>	
											<i class="bx bx-time"></i>
										</div>
									</div>
									
									<div class="col-lg-12">
										<div class="form-group">
											<textarea name="message" class="form-control" id="Message" cols="30" rows="8" placeholder="Your Message" required></textarea>
											<i class="bx bx-message"></i>
										</div>
									</div>
									
									<div class="col-12">
										<button type="submit" class="default-btn">Send Request</button>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div data-aos="fade-up" data-aos-duration="1600" class="col-lg-6">
						<div class="appointment-img"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- END APPOINTMENT AREA -->

		<!-- START SUBSCRIBE AREA -->
		<section class="subscribe-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<h2>Subscribe Now</h2>
						<p>Get our latest news & update regularly</p>
					</div>

					<div class="col-lg-6">
						<form class="newsletter-form" data-toggle="validator">
							<input type="email" class="form-control" placeholder="Enter Your Email" name="EMAIL" required autocomplete="off">

							<button class="default-btn" type="submit">
								Subscribe
							</button>

							<div id="validator-newsletter" class="form-result"></div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- END SUBSCRIBE AREA  -->

		<?php include('footer.php'); ?>
		
		<!-- START GO TOP AREA -->
		<div class="go-top">
			<i class='bx bx-chevrons-up'></i>
		</div>
		<!-- END GO TOP AREA -->

		<!-- Start LTR & RTL Button -->
		<div class="ltr-rtl-button">
			<a class="default-btn active ltr">
			    LTR
			</a>
			<a class="default-btn rtl">
			    RTL
			</a>
		</div>
		<!-- End LTR & RTL Button -->

        <!-- JQUERY MIN JS -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- BOOTSTRAP MIN JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- MEANMENU MIN JS -->
		<script src="assets/js/meanmenu.min.js"></script>
        <!-- WOW MIN JS -->
        <script src="assets/js/wow.min.js"></script>
        <!-- OWL CAROUSEL MIN JS -->
		<script src="assets/js/owl.carousel.min.js"></script>
        <!-- OWL MAGNIFIC POPUP MIN JS -->
		<script src="assets/js/magnific-popup.min.js"></script>
        <!-- NICE SELECT MIN JS -->
		<script src="assets/js/nice-select.min.js"></script>
		<!-- APPEAR MIN JS --> 
        <script src="assets/js/appear.min.js"></script>
		<!-- ODOMETER MIN JS --> 
		<script src="assets/js/odometer.min.js"></script>
		<!-- DATEPICKER MIN JS --> 
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<!-- FORM VALIDATOR MIN JS -->
		<script src="assets/js/form-validator.min.js"></script>
		<!-- CONTACT JS -->
		<script src="assets/js/contact-form-script.js"></script>
		<!-- AJAXCHIMP MIN JS -->
		<script src="assets/js/ajaxchimp.min.js"></script>
		<!-- AOS JS -->
		<script src="assets/js/aos.js"></script>
        <!-- CUSTOM JS -->
		<script src="assets/js/custom.js"></script>
    </body>
</html>