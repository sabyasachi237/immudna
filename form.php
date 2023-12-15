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

<section class="checkout-area ptb-100">
    <div class="container">
        <div data-aos="fade-up" data-aos-duration="1200" class="row">
            <div class="col-lg-12 col-md-12">
                <div class="user-actions">
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
                                    <input type="text" class="form-control" name="first_name">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Country <span class="required">*</span></label>

                                    <div class="select-box">
                                        <select class="form-control" name="country">
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
                                    <input type="text" class="form-control" name="company_name">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="city">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>State / County <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="state">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="pin">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email_id">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="phone">
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
                                        <th scope="col">Product name</th>
                                        <th scope="col">price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col"> price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product details and order summary here -->
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-totals">
                        <h3>Cart Totals</h3>
                        <ul>
                            <li>Subtotal <span>$<?php echo number_format($grandTotal, 2); ?></span></li>
                            <li>Total <span><b>$<?php echo number_format($grandTotal, 2); ?></b></span></li>
                        </ul>
                        <input type="hidden" name="total_price" value="<?php echo number_format($grandTotal, 2); ?>">
                    </div>

                        <div class="payment-box">
                            <div class="payment-method">
                            </div>
                            <input type="submit" value="Place Order" name="order_btn" class="default-btn">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Rest of your HTML layout -->
<!-- ... -->
