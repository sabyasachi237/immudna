<?php
include 'config.php';
include 'header.php';

$grandTotal = 0;
$user_id = $_SESSION['user_id'];

$select_cart_query = "SELECT ci.*, p.product_name, p.product_price, p.product_image
    FROM cart_items ci
    JOIN product_details p ON ci.product_id = p.product_id
    WHERE ci.user_id = ?";

$stmt = mysqli_prepare($conn, $select_cart_query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
$cartResult = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($cartResult) > 0) {
?>

    <!-- START PAGE TITLE AREA -->
    <div class="page-title-area bg-4">
        <div class="container">
            <div class="page-title-content">
                <h2>Checkout</h2>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">
                        <a href="shop-grid.php">Shop</a>
                    </li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE AREA -->

    <!-- START CHECKOUT AREA -->
    <section class="checkout-area ptb-100">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1200" class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="user-actions">
                        <i class='bx bx-log-in-circle'></i>
                        <span>Returning customer? <a href="log-in.php">Click here to login</a></span>
                    </div>
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
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Country <span class="required">*</span></label>
										
											<div class="select-box">
												<select class="form-control">
													<option value="5">United Arab Emirates</option>
													<option value="0">China</option>
													<option value="1">United Kingdom</option>
													<option value="2">Germany</option>
													<option value="3">France</option>
													<option value="4">Japan</option>
													<option value="5">India</option>
													<option value="6">Pakistan</option>
													<option value="7">Srilanka</option>
												</select>
											</div>
										</div>
									</div>

									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Company Name</label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-lg-12 col-md-6">
										<div class="form-group">
											<label>Address <span class="required">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-lg-12 col-md-6">
										<div class="form-group">
											<label>Town / City <span class="required">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>State / County <span class="required">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Postcode / Zip <span class="required">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Email Address <span class="required">*</span></label>
											<input type="email" class="form-control">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Phone <span class="required">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-lg-16 col-md-6">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="create-an-account">
											<label class="form-check-label" for="create-an-account">Create an account?</label>
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="ship-different-address">
											<label class="form-check-label" for="ship-different-address">Ship to a different address?</label>
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<textarea name="notes" id="notes" cols="30" rows="5" placeholder="Order Notes" class="form-control"></textarea>
										</div>
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
                                            <th scope="col">Product</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($cartResult)) {
                                            $subtotal = $row['product_price'] * $row['quantity'];
                                            $grandTotal += $subtotal;
                                            ?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#">
                                                        <img src="uploaded_img/<?php echo $row['product_image']; ?>" alt="Image">
                                                    </a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="#"><?php echo $row['product_name']; ?></a>
                                                </td>

                                                <td class="product-price">
                                                    <span class="unit-amount">$<?php echo $row['product_price']; ?></span>
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="input-counter">
                                                        <span class="minus-btn">
                                                            <i class='bx bx-minus' data-product-id="<?php echo $row['product_id']; ?>"></i>
                                                        </span>
                                                        <input type="text" min="1" value="<?php echo $row['quantity']; ?>">
                                                        <span class="plus-btn">
                                                            <i class='bx bx-plus' data-product-id="<?php echo $row['product_id']; ?>"></i>
                                                        </span>
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">$<?php echo $subtotal; ?></span>
                                                    <a href="cart.php?remove=<?php echo $row['product_id']; ?>" onclick="return confirm('Are you sure you want to remove this product?');">
                                                        <i class="bx bx-x-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="payment-box">
                                <div class="payment-method">
                                    <p>
                                        <input type="radio" id="direct-bank-transfer" name="radio-group" checked>
                                        <label for="direct-bank-transfer">Direct Bank Transfer</label>

                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                    </p>
                                    <p>
                                        <input type="radio" id="paypal" name="radio-group">
                                        <label for="paypal">PayPal</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="cash-on-delivery" name="radio-group">
                                        <label for="cash-on-delivery">Cash On Delivery</label>
                                    </p>
                                </div>

                                <a href="#" class="default-btn">
                                    Place Order
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- END CHECKOUT AREA -->
    <!-- Rest of your HTML layout -->
    <!-- ... -->

<?php
} else {
    echo '<h1 style="text-align: center;">Cart is empty</h1>';
    exit();
}

include 'footer.php';
?>
