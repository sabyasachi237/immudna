<?php

include 'config.php';

// Initialize an empty array to store product IDs and quantities
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$url = $_SERVER['REQUEST_URI'];

if (strpos($url, 'product_id') !== false) {
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $product_id = $params['product_id'];

    if ($product_id) {
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            // Increment the quantity if the product is already in the cart
            $_SESSION['cart'][$product_id]++;
        } else {
            // Add the product to the cart with a quantity of 1
            $_SESSION['cart'][$product_id] = 1;
        }
    }
}

// If you want to remove a product from the cart, you can unset it from the session
if (strpos($url, 'remove') !== false) {
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $remove_id = $params['remove'];

    if (array_key_exists($remove_id, $_SESSION['cart'])) {
        unset($_SESSION['cart'][$remove_id]);
    }
}

// Display the cart with all the products and quantities
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    // Fetch product details from the `product_details` table based on $product_id
    $cartResult = mysqli_query($conn, "SELECT * FROM `product_details` WHERE product_id = '$product_id'");

    // Display product details and quantity
    if ($cartResult) {
        $product_details = mysqli_fetch_assoc($cartResult);
        echo "Product Name: " . $product_details['product_name'] . "<br>";
        echo "Product Price: " . $product_details['product_price'] . "<br>";
        echo "Quantity: " . $quantity . "<br>";
        // Add more information as needed
    }
}

// You can also display a total price or provide buttons for checkout, continue shopping, etc.
?>





<?php include('header.php'); ?>

<!-- START CART AREA -->
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
                                                <span class="subtotal-amount">$<?php echo $row['product_price'] * $row['quantity']; ?></span>
                                                <a href="cart.php?remove=<?php echo $row['product_id']; ?>" onclick="return confirm('Are you sure you want to remove this product?');">
                                                    <i class="bx bx-x-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-buttons">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-sm-7 col-md-7">
                                    <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all items from your cart?');" class="default-btn page-btn">
                                        Delete All
                                    </a>
                                </div>

                                <!-- <div class="col-lg-5 col-sm-5 col-md-5 text-right">
                                    <a href="#" class="default-btn page-btn">
                                        Update Cart
                                    </a>
                                </div> -->
                            </div>
                        </div>

                        <div class="cart-totals">
                            <h3>Cart Totals</h3>
                            <ul>
                                <li>Subtotal <span>$<?php echo number_format($grandTotal, 2); ?></span></li>
                                <!-- You can add additional lines for shipping, tax, or discounts if needed -->
                                <li>Total <span><b>$<?php echo number_format($grandTotal, 2); ?></b></span></li>
                            </ul>
                            <a href="checkout.php" class="default-btn page-btn">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $(".plus-btn, .minus-btn").on("click", function () {
        var productId =$(this).find('i').data("product-id") ;
        var quantity = parseInt($(this).closest("tr").find("input").val());

//alert(productId);
//alert(quantity);
        

        updateCartItemQuantity(productId, quantity);
    });

    function updateCartItemQuantity(productId, quantity) {
      //  alert(productId);
      //  alert(quantity);

        $.ajax({
            url: "updatecart.php", // Replace with the actual URL of your update script
            method: "POST",
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                // Handle the response if needed
                location.reload(); // Reload the page to reflect the updated cart
            }
        });
    }
});
</script>












<?php
include("config.php ");
$plus_minus = $_GET['plus_minus'];
$p_id = $_GET['p_id'];

if(!empty($_SESSION['cart_prodid']))
{
	if($plus_minus == 'plus')
	{
		$product_id = $_SESSION['product_id'];
		$cartitems = explode(",", $product_id);
		$product_id .= "," . $_GET['p_id'];
		$_SESSION['product_id'] = $product_id;
		
		$items = $_SESSION['product_id'];
		$cartitems = explode(",", $items);
		$numofprodmod_added = array_count_values($cartitems);
		$cnt_pro = count($cartitems);
		$total_price = '';
		foreach ($numofprodmod_added as $key=>$prod_id) {
		$res_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product_details WHERE product_id = $key1"));
		$price = $res_product['product_price']*$numofprodmod_added[$key1];
		$total_price = $total_price+$price;
		}
		echo number_format((float)$total_price, 2, '.', '')."||".$cnt_pro;
	}
	if($plus_minus == 'minus')
	{
		$cartsession = explode(",", $_SESSION['cart_prodid']);
		$prodid = array($_GET['p_id']);
		$match_value = array_intersect($cartsession,$prodid);
		$cnt = count($match_value);
		$array='';
		for($i=1;$i<=$cnt-1;$i++)
		{
			$array =$array.$_GET['p_id'].",";
		}
		$trim_val = rtrim($array,',');
		$exp_val = explode(',',$trim_val);
		$notmatch_value =array_diff($cartsession,$prodid);
		$marge_val = array_merge($exp_val, $notmatch_value);
		$final_val = implode(',',$marge_val);
		unset($_SESSION['cart_prodid']);
		$_SESSION['cart_prodid'] = $final_val;
		
		$items = $_SESSION['cart_prodid'];
		$cartitems = explode(",", $items);
		$numofprodmod_added = array_count_values($cartitems);
		$cnt_pro = count($cartitems);
		$total_price = '';
		foreach ($numofprodmod_added as $key=>$prod_id) {
		$res_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product_details WHERE product_id = $key1"));
		$price = $res_product['price']*$numofprodmod_added[$key];
		$total_price = $total_price+$price;
		}
		echo number_format((float)$total_price, 2, '.', '')."||".$cnt_pro;
	}
}
else if(!empty($_SESSION['user_id']))
{
	$res_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product_details WHERE id = '".$p_id." "));
	$res_add_cart = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cart_items WHERE product_id = '".$p_id."' AND user_id = '".$_SESSION['user_id']."'"));
	
	if($plus_minus == 'plus')
	{	
		$qty = $res_add_cart['quantity']+1;
		$tot_price = $res_product['price']*$qty;
		$query_update_data = mysqli_query($conn, "UPDATE cart_items SET quantity = '".$qty."',product_price = '".$tot_price."' WHERE user_id = '".$_SESSION['user_id']."' AND product_id = '".$p_id."'");
		$total_price = '';
		$cnt_pro = '';
		$query_add_cart = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id = '".$_SESSION['user_id']."'");
		while($res_add = mysqli_fetch_assoc($query_add_cart))
		{
			$total_price = $total_price+$res_add['product_price'];
			$cnt_pro = $cnt_pro+$res_add['quantity'];
		}
		echo number_format((float)$total_price, 2, '.', '')."||".$cnt_pro;
	}
	if($plus_minus == 'minus')
	{
		$qty = $res_add_cart['quantity']-1;
		$tot_price = $res_product['product_price']*$qty;
		$query_update_data = mysqli_query($conn, "UPDATE cart_items SET quantity = '".$qty."',product_price = '".$tot_price."' WHERE user_id = '".$_SESSION['user_id']."' AND product_id = '".$p_id."'");
		$total_price = '';
		$cnt_pro = '';
		$query_add_cart = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id = '".$_SESSION['user_id']."'");
		while($res_add = mysqli_fetch_assoc($query_add_cart))
		{
			$total_price = $total_price+$res_add['product_price'];
			$cnt_pro = $cnt_pro+$res_add['quantity'];
		}
		echo number_format((float)$total_price, 2, '.', '')."||".$cnt_pro;
	}
}

?>