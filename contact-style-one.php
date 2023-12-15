

<?php include('header.php'); ?>

		<!-- START PAGE TITLE AREA -->
		<div class="page-title-area bg-6">
			<div class="container">
				<div class="page-title-content">
					<h2>Contact Style One</h2>
					<ul>
						<li>
							<a href="index.php">
								Home 
							</a>
						</li>

						<li class="active">Contact Style One</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE AREA -->

		<!-- START CONTACT INFO AREA -->
		<section class="contact-info-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div data-aos="fade-up" data-aos-duration="1200" class="col-lg-4 col-sm-6">
						<div class="single-contact-info">
							<i class="bx bx-envelope"></i>
							<h3>Email Us:</h3>
							<a href="mailto:hello@example.com">hello@example.com</a>
							<a href="mailto:info@medic.com">info@medic.com</a>
						</div>
					</div>

					<div data-aos="fade-up" data-aos-duration="1600" class="col-lg-4 col-sm-6">
						<div class="single-contact-info">
							<i class="bx bx-phone-call"></i>
							<h3>Call Us:</h3>
							<a href="tel:+123-456-789">+123-456-789</a>
							<a href="tel:+153-567-984">+153-567-984</a>
						</div>
					</div>

					<div data-aos="fade-up" data-aos-duration="2000" class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-0">
						<div class="single-contact-info">
							<i class="bx bx-location-plus"></i>
							<h3>London</h3>
							<a href="#">124, Western Road, Melbourne <br> Australia</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- START CONTACT INFO AREA -->

		<!-- START CONTACT AREA -->
		<section class="contact-area pb-100">
			<div class="container">
				<div class="contact-wrap">
					<div data-aos="fade-up" data-aos-duration="1200" class="section-title">
						<h2>Drop Us A Message For Any Query</h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint repellendus molestiae, neque earum magnam enim, magni maiores laudantium ratione libero sapiente eum molestias</p>
					</div>

					<form data-aos="fade-up" data-aos-duration="1600" method="post">
						<div class="row">
							<div class="col-lg-6 col-sm-6">
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6">
								<div class="form-group">
									<input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6">
								<div class="form-group">
									<input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12">
								<button type="submit" class="default-btn four">
									Send Message
								</button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- END CONTACT AREA -->

		<!-- START MAP AREA -->
		<div data-aos="fade-up" data-aos-duration="1200" class="map-area pb-100">
			<div class="container">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29624158.067582883!2d115.22492796537!3d-24.992291572825824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2sbd!4v1593639582793!5m2!1sen!2sbd" style="border:0;"></iframe>
			</div>
		</div>
		<!-- END MAP AREA -->

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