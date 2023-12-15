<?php
include 'config.php';
ini_set('display_errors', 0);

// echo $_SESSION['user_id'];

if (!empty($_SESSION['cart_prodid'])) {
	$items = $_SESSION['cart_prodid'];
	$cartitems = explode(",", $items);
	$numofprodmod_added = array_count_values($cartitems);
	$cnt_prod = count($cartitems);
} else if (!empty($_SESSION['user_id'])) {
	$query_sel_productcart = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id = '" . $_SESSION['user_id'] . "'");
	$product_model = array();
	while ($res_sel_productcart = mysqli_fetch_assoc($query_sel_productcart)) {
		for ($i = 0; $i < $res_sel_productcart['quantity']; $i++) {
			array_push($product_model, $res_sel_productcart['product_id']);
		}
	}
	$numofprodmod_added = array_count_values($product_model);
	$cnt_prod = count($product_model);
}
?>
<?php include 'header.php'; ?>

<div class="page-title-area bg-4">
	<div class="container">
		<div class="page-title-content">
			<h2>Checkout</h2>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="shop-grid.php">Shop</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
</div>

<section class="checkout-area ptb-100">
	<div class="container">
		<div data-aos="fade-up" data-aos-duration="1200" class="row">
			<div class="col-lg-12 col-md-12">
				<div class="user-actions"></div>
			</div>
		</div>

		<form method="POST" action="process_checkout.php">
			<div class="row">
				<div data-aos="fade-up" data-aos-duration="1600" class="col-lg-6 col-md-12">
					<div class="billing-details">
						<h3 class="title">Billing Details</h3>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>First Name <span class="required">*</span></label>
									<input type="text" class="form-control" name="first_name" id="first_name">
									<small class="text-danger first_name"></small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Last Name <span class="required">*</span></label>
									<input type="text" class="form-control" name="last_name" id="last_name">
									<small class="text-danger last_name"></small>

								</div>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<label>Country <span class="required">*</span></label>

									<div class="select-box">
										<select class="form-control" name="country" id="country">
											<small class="text-danger country"></small>
											<option value="United Arab Emirates">United Arab Emirates</option>
											<option value="China">China</option>
											<option value="United Kingdom">United Kingdom</option>
											<option value="Germany">Germany</option>
											<option value="France">France</option>
											<option value="Japan">Japan</option>
											<option value="India">India</option>
											<option value="Pakistan">Pakistan</option>
											<option value="Srilanka">Srilanka</option>
										</select>
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<label>Company Name</label>
									<input type="text" class="form-control" name="company_name" id="company_name">
								</div>
							</div>

							<div class="col-lg-12 col-md-6">
								<div class="form-group">
									<label>Address <span class="required">*</span></label>
									<input type="text" class="form-control" name="address" id="address">
									<small class="text-danger address"></small>

								</div>
							</div>

							<div class="col-lg-12 col-md-6">
								<div class="form-group">
									<label>Town / City <span class="required">*</span></label>
									<input type="text" class="form-control" name="city" id="city">
									<small class="text-danger city"></small>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>State <span class="required">*</span></label>
									<input type="text" class="form-control" name="state" id="state">
									<small class="text-danger state"></small>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Postcode / Zip <span class="required">*</span></label>
									<input type="text" class="form-control" name="pin" id="pin">
									<small class="text-danger pin"></small>
								</div>

							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Email Address <span class="required">*</span></label>
									<input type="email" class="form-control" name="email_id" id="email_id">
									<small class="text-danger email_id"></small>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Phone <span class="required">*</span></label>
									<input type="text" class="form-control" name="phone" id="phone">
									<small class="text-danger phone"></small>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>order notes</label>
									<input type="text" class="form-control" name="notes" id="notes">
								</div>
							</div>

							<!-- <div class="col-lg-16 col-md-6">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="create-an-account">
									<label class="form-check-label" for="create-an-account">Create an account?</label>
								</div>
							</div> -->

							<div class="col-lg-6 col-md-6">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="ship-different-address" name="ship_different_address">
									<label class="form-check-label" for="ship-different-address">Ship to a different address?</label>
								</div>
							</div>

							<div id="shipping-address-fields">
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Shipping First Name <span class="required">*</span></label>
											<input type="text" class="form-control" name="shipping_first_name" id="shipping_first_name">
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Shipping Last Name <span class="required">*</span></label>
											<input type="text" class="form-control" name="shipping_last_name" id="shipping_last_name">
										</div>
									</div>

									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Country <span class="required">*</span></label>

											<div class="select-box">
												<select class="form-control" name="shipping_country" id="shipping_country">
													<option value="United Arab Emirates">United Arab Emirates</option>
													<option value="China">China</option>
													<option value="United Kingdom">United Kingdom</option>
													<option value="Germany">Germany</option>
													<option value="France">France</option>
													<option value="Japan">Japan</option>
													<option value="India">India</option>
													<option value="Pakistan">Pakistan</option>
													<option value="Srilanka">Srilanka</option>
												</select>
											</div>
										</div>
									</div>

									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Company Name</label>
											<input type="text" class="form-control" name="shipping_company_name" id="shipping_compny_name">
										</div>
									</div>

									<div class="col-lg-12 col-md-6">
										<div class="form-group">
											<label>Address <span class="required">*</span></label>
											<input type="text" class="form-control" name="shipping_address" id="shipping_address">
										</div>
									</div>

									<div class="col-lg-12 col-md-6">
										<div class="form-group">
											<label>Town / City <span class="required">*</span></label>
											<input type="text" class="form-control" name="shipping_city" id="shipping_city">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>State <span class="required">*</span></label>
											<input type="text" class="form-control" name="shipping_state" id="shipping_state">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Postcode / Zip <span class="required">*</span></label>
											<input type="text" class="form-control" name="shipping_pin" id="shipping_pin">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Email Address <span class="required">*</span></label>
											<input type="email" class="form-control" name="shipping_email" id="shipping_email">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Phone <span class="required">*</span></label>
											<input type="text" class="form-control" name="shipping_phone" id="shipping_phone">
										</div>
									</div>
								</div>

								<!-- <div class="col-lg-6 col-md-6">
								<div class="form-group">
									<textarea name="notes" id="notes" cols="30" rows="5" placeholder="Order Notes" class="form-control"></textarea>
								</div>
							</div> -->
							</div>
						</div>
					</div>
				</div>

                <div data-aos="fade-up" data-aos-duration="2000" class="col-lg-6 col-md-12">
                    <div class="order-details">
                        <div class="order-table table-responsive">
                            <h3 class="title">Your Order</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product name</th>
                                        <th scope="col">price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total price</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$total_price1 = 0; // Initialize total price to zero
$a = 1;
foreach ($numofprodmod_added as $key1 => $prod_id1) {
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product_details WHERE product_id = '" . $key1 . "'"));
    $price1 = $row['product_price'] * $numofprodmod_added[$key1];
    $total_price1 += (float)$price1; // Accumulate the total price
?>

										<tr>
											<td class="product-thumbnail">
												<a href="#">
													<img src="admin/uploaded_img/<?php echo $row['product_image']; ?>" alt="Image">
												</a>
											</td>

											<td class="product-name">
												<a href="#"><?php echo $row['product_name']; ?></a>
											</td>

											<td class="product-price">
												<span class="unit-amount">$<?php echo $row['product_price']; ?></span>
											</td>

											<td class="quantity">
												<div class="input-counter">
													<?php echo $numofprodmod_added[$key1]; ?>
												</div>
												<input type="hidden" id="qtr_id" value="<?php echo $key1; ?>" />
											</td>

											<td class="product-subtotal">
												<span class="subtotal-amount">$<?php echo (float)$row['product_price'] * (int)$numofprodmod_added[$key1]; ?></span>
												<a href="deletecart.php?prod_id=<?php echo $key1; ?>" onclick="return confirm('Are you sure you want to remove this product?');">
													<i class="bx bx-x-circle"></i>
												</a>
											</td>
										</tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="cart-totals">
                            <h3>Cart Totals</h3>
                            <ul>
                                <li>Subtotal <span>$<?php echo number_format($total_price1, 2); ?></span></li>
                                <li>Total <span><b>$<?php echo number_format($total_price1, 2); ?></b></span></li>
                            </ul>
                        </div>

                        <div class="payment-box">
                            <div class="payment-method">
                                <input type="hidden" name="payment_mode" value="COD">
                                <!--<button type="submit" style="width: 100%;" name="order_btn" class="default-btn">Confirm and place order | COD</button>-->
                                <div id="paypal-button-container" style="margin-top: 20px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<?php include 'footer.php'; ?>

<script>
     document.addEventListener("DOMContentLoaded", function() {
         const shipDifferentAddressCheckbox = document.getElementById("ship-different-address");
         const shippingAddressFields = document.getElementById("shipping-address-fields");

         shipDifferentAddressCheckbox.addEventListener("change", function() {
             if (shipDifferentAddressCheckbox.checked) {
                 shippingAddressFields.style.display = "block";
             } else {
                 shippingAddressFields.style.display = "none";
             }
         });
     });
 </script>

<!-- JQUERY MIN JS -->
<script src="assets/js/jquery.min.js"></script>

<script src="https://www.paypal.com/sdk/js?client-id=Absm-pFBHrLMWfvS1JwrUgJdzrLiT6FDDI-iXXH0EhlL_re3T7XMFv_8Johz9rVMaTo24ZQE6uWlPfU1&currency=USD" data-namespace="paypal_sdk"></script>


<script>
    paypal_sdk.Buttons({
        onClick: function() {
            console.log("on click");
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var country = $('#country').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var pin = $('#pin').val();
            var email_id = $('#email_id').val();
            var phone = $('#phone').val();

            if (first_name.length == 0) {
                $('.first_name').text("*this field is required");
                return false;
            }

            if (last_name.length == 0) {
                $('.last_name').text("*this field is required");
                return false;
            }

            if (country.length == 0) {
                $('.country').text("*this field is required");
                return false;
            }

            if (address.length == 0) {
                $('.address').text("*this field is required");
                return false;
            }

            if (city.length == 0) {
                $('.city').text("*this field is required");
                return false;
            }

            if (state.length == 0) {
                $('.state').text("*this field is required");
                return false;
            }

            if (pin.length == 0) {
                $('.pin').text("*this field is required");
                return false;
            }

            if (email_id.length == 0) {
                $('.email_id').text("*this field is required");
                return false;
            }
            if (phone.length == 0) {
                $('.phone').text("*this field is required");
                return false;
            }
            // You can add further validations for other fields if needed

            // If all validations pass, proceed to PayPal payment
        },
        style: {
            layout: 'horizontal'
        },
        createOrder: function(data, actions) {
            console.log("on click");
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $total_price1 ?>'
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                console.log(orderData);
                const transaction = orderData.purchase_units[0].payments.captures[0];
                const status = orderData.status; // This will store the status of the PayPal transaction
                console.log('PayPal transaction status:', status);

                // Retrieve data from the form input
                var notes = $('#notes').val();
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var country = $('#country').val();
                var company_name = $('#company_name').val(); // Matching variable names
                var address = $('#address').val();
                var city = $('#city').val();
                var state = $('#state').val();
                var pin = $('#pin').val();
                var email_id = $('#email_id').val();
                var phone = $('#phone').val();
                var shipping_first_name = $('#shipping_first_name').val();
                var shipping_last_name = $('#shipping_last_name').val();
                var shipping_country = $('#shipping_country').val();
                var shipping_company_name = $('#shipping_company_name').val();
                var shipping_address = $('#shipping_address').val();
                var shipping_city = $('#shipping_city').val();
                var shipping_state = $('#shipping_state').val();
                var shipping_email = $('#shipping_email').val();
                var shipping_phone = $('#shipping_phone').val();
                var shipping_pin = $('#shipping_pin').val();



                $.ajax({
                    url: "paypal_process.php",
                    type: "POST",
                    data: {
                        first_name: first_name,
                        last_name: last_name,
                        country: country,
                        company_name: company_name,
                        address: address,
                        city: city,
                        state: state,
                        pin: pin,
                        email_id: email_id,
                        phone: phone,
                        orderNotes: notes,
                        method: "paypal",
                        payment_id: transaction.id,
                        payment_status: transaction.status,
                        shipping_first_name: shipping_first_name,
                        shipping_last_name: shipping_last_name,
                        shipping_country: shipping_country,
                        shipping_company_name: shipping_company_name,
                        shipping_address: shipping_address,
                        shipping_city: shipping_city,
                        shipping_state: shipping_state,
                        shipping_email: shipping_email,
                        shipping_phone: shipping_phone,
                        shipping_pin: shipping_pin,
                    },
                    success: function(data) {
                        alert(data);
                    },

                });




            });
        }
    }).render('#paypal-button-container');
</script>