

		<?php include('header.php'); ?>

		<!-- Start 404 Error -->
		<div class="error-area ptb-100">
			<div class="error-content-wrap">
				<img data-aos="fade-up" data-aos-duration="1200" src="assets/img/404.jpg" alt="Image">
				<h3 data-aos="fade-up" data-aos-duration="1600" >Page Not Found</h3>
				<p data-aos="fade-up" data-aos-duration="2000" >We’re sorry, the page you have looked for does not exist in our database! Maybe go to our home page or try to use a search?</p>
				<a data-aos="fade-up" data-aos-duration="2400" href="index.html" class="default-btn page-btn active">
					Return To Home
				</a>
			</div>
		</div>
		<!-- End 404 Error -->

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
