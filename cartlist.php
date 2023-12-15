<?php
include 'config.php';
include('header.php');

if (!empty($_SESSION['cart_prodid'])) 
{
    $items = $_SESSION['cart_prodid'];
    $cartitems = explode(",", $items);
    $numofprodmod_added = array_count_values($cartitems);
    $cnt_prod = count($cartitems); //
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




if (isset($_SESSION['user_id'])) {
    $checkoutLink = "checkout.php"; // Link for logged-in users
} else {
    $checkoutLink = "registration.php"; // Link for non-logged-in users
}

?>
<section class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form>
                    <div class="cart-wraps">
                        <div class="cart-table table-responsive">
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
                                    <?php

                                    $total_price1 = '';
                                    $a = 1;
                                    foreach ($numofprodmod_added as $key1 => $prod_id1) {

                                        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product_details WHERE product_id = '" . $key1 . "'"));

                                        $price1 = $row['product_price'] * $numofprodmod_added[$key1];
                                        $total_price1 = (float)$total_price1 + (float)$price1;
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
                                                <input type="hidden" name="prod_price_<?php echo $key1; ?>" id="prod_price_<?php echo $key1; ?>" value="<?php echo number_format((float)$row['product_price'], 2, '.', ''); ?>">

                                            </td>
                                            <td class="product-quantity">
                                                <div class="input-counter">
                                                    <span class="minus-btn" id="minus1" onclick="increaseorder('<?php echo $key1; ?>', 'minus');"><i class='bx bx-minus'></i></span>
                                                    <input type="text" name="qtr_<?php echo $key1; ?>" id="qtr_<?php echo $key1; ?>" minlength="1" value="<?php echo $numofprodmod_added[$key1]; ?>">
                                                    <span class="plus-btn" id="add1" onclick="increaseorder('<?php echo $key1; ?>', 'plus');"><i class='bx bx-plus'></i></span>
                                                </div>
                                                <input type="hidden" id="qtr_id" value="<?php echo $key1; ?>" />
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="subtotal-amount"  id="t_prices_<?php echo $key1; ?>">$<?php echo (float)$row['product_price'] * (int)$numofprodmod_added[$key1]; ?></span>
                                                <input type="hidden" name="t_price_<?php echo $key1; ?>" id="t_price_<?php echo $key1; ?>" value="<?php echo number_format((float)$total_price, 2, '.', ''); ?>">

                                                <a href="deletecart.php?product_id=<?php echo $key1; ?>" onclick="return confirm('Are you sure you want to remove this product?');">
                                                    <i class="bx bx-x-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="cart-buttons">
                             <div class="row align-items-center">
                                <div class="col-lg-7 col-sm-7 col-md-7">
                                    <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all items from your cart?');" class="default-btn page-btn">
                                        Delete All
                                    </a>
                                </div> 

                             <div class="col-lg-5 col-sm-5 col-md-5 text-right">
                                    <a href="#" class="default-btn page-btn">
                                        Update Cart
                                    </a>
                                </div>
                        </div> -->
                    </div>

                    <div class="cart-totals">
                        <h3>Cart Totals</h3>
                        <ul>
                            <!-- <li>Subtotal <span>$<?php echo number_format($total_price1, 2); ?></span></li> -->
                            <!-- You can add additional lines for shipping, tax, or discounts if needed -->
                            <li>Total <span><b id="total_price">$<?php echo number_format($total_price1, 2); ?></b></span></li>
                        </ul>
                        <a href="<?php echo $checkoutLink; ?>" class="default-btn page-btn">
                            Proceed to Checkout
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<!-- END CART AREA -->
<?php include('footer.php'); ?>
<script>
    var sourceSwap = function() {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        $this.data('alt-src', $this.attr('src'));
        $this.attr('src', newSource);
    }

    $(function() {
        $('img[data-alt-src]').each(function() {
            new Image().src = $(this).data('alt-src');
        }).hover(sourceSwap, sourceSwap);
    });
</script>
<script>
    function increaseorder(qtr_id, plus_minus) {
        var prod_price = document.getElementById('prod_price_' + qtr_id).value;

        var qty = document.getElementById('qtr_' + qtr_id).value;
      

        var currentVal = parseInt(qty);
        //qty.value(currentVal + 1);
        if (plus_minus == 'plus') {
            if (!isNaN(currentVal)) {
                document.getElementById('qtr_' + qtr_id).value = currentVal + 1
                var qt = currentVal + 1;
                var total_price = qt * prod_price;
                var x = total_price.toFixed(2);
                $.ajax({
                    type: 'GET',
                    url: 'increseorder.php',
                    data: {p_id: qtr_id,plus_minus: plus_minus},
                    success: function(response) {
                     //   alert(response);
                        var split_val = response.split("||");
                        document.getElementById("total_price").innerHTML = split_val[0];
                        document.getElementById("t_prices_" + qtr_id).innerHTML = split_val[0];
                        document.getElementById("t_price_" + qtr_id).value = split_val[0];
                    }
                });
            }
        } else {
            if (!isNaN(currentVal) && currentVal > 1) {
                document.getElementById('qtr_' + qtr_id).value = currentVal - 1
                var qt = currentVal - 1;
                var total_price = qt * prod_price;
                var x = total_price.toFixed(2);
                $.ajax({
                    type: 'GET',
                    url: 'increseorder.php',
                    data: {p_id: qtr_id,plus_minus: plus_minus},
                    cache: false,
                    success: function(response) {
                 //       alert(response);
                        var split_val = response.split("||");
                        document.getElementById("total_price").innerHTML = split_val[0];
                        document.getElementById("t_prices_" + qtr_id).innerHTML = split_val[0];
                        document.getElementById("t_price_" + qtr_id).value = split_val[0];
                    }
                });
            }
        }
    }
</script>