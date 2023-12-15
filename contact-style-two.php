

<?php include('header.php'); ?>

		<!-- START PAGE TITLE AREA -->
		<div class="page-title-area bg-6">
			<div class="container">
				<div class="page-title-content">
					<h2>Contact Style Two</h2>
					<ul>
						<li>
							<a href="index.html">
								Home 
							</a>
						</li>

						<li class="active">Contact Style Two</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE AREA -->
        
        <!-- START CONTACT FORM AREA --> 
		<section class="contact-form-area ptb-100">
            <div class="container">
                <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                    <h2>Get In Touch</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint repellendus molestiae, neque earum magnam enim, magni maiores laudantium ratione libero sapiente eum molestias.</p>
                </div>
                <div class="row">
                    <div data-aos="fade-up" data-aos-duration="1200" class="col-lg-6">
	                    <div class="get-in-touch">
	                        <h3>Contact Us</h3>
	                        <ul>
                                <li>
                                    <div class="icon">
                                        <i class="bx bx-location-plus"></i>
                                    </div>
                                    <span>Address:</span>
                                    124 Western Road, MacLeay Island QLD, Australia
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="bx bx-envelope"></i>
                                    </div>
                                    <span>Email:</span>
                                    hello@example.com
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="bx bx-phone-call"></i>
                                    </div>
                                    <span>Phone:</span>
                                    +1 (514) 312-6677
                                </li>
                            </ul>
	                        
	                        <!-- START MAP AREA -->
							<div data-aos="fade-up" data-aos-duration="1600" class="contact-map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9401047993993!2d-73.99173408522613!3d40.74134344375791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a3f79e5b77%3A0x25011fc87ca4dae!2s175%205th%20Ave%2C%20New%20York%2C%20NY%2010010%2C%20USA!5e0!3m2!1sen!2sbd!4v1633785743068!5m2!1sen!2sbd" width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							</div>
						    <!-- END MAP AREA -->
						</div>
	                </div>

                    <div data-aos="fade-up" data-aos-duration="1600" class="col-lg-6">
                        <div class="contact-form">
                            <h3>Drop Us A Message</h3>
                            <form method="post">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Your Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Your Email</label>
                                            <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Your Phone</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" required="" data-error="Please enter your phone" placeholder="Phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject" placeholder="Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Your Message</label>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required="" data-error="Write your message" placeholder="Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Send Message
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </section>
        <!-- END CONTACT FORM AREA -->

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